<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\UserSession;
// use App\Models\Logging;

use Carbon\Carbon;
// use Jenssegers\Agent\Agent;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateUserSession
{
    /**
     * @param Request $request
     * @param $next
     * @return \Illuminate\Http\JsonResponse
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function handle($request, $next, $isLogin = false)
    {
        $date = new Carbon();
        $authorization_header = request()->header('Authorization');

        if ($isLogin=='login') {
            $data = explode(':', base64_decode($authorization_header));
            $email = isset($data[0]) ? $data[0]: null;
            $password = isset($data[1]) ? $data[1] : null;

            $user = User::where('email', $email)->first();

            if (!$user) {
                throw new \Illuminate\Auth\AuthenticationException('Login error.');
            }

            if (!Hash::check($password, $user->password)) {
                throw new \Illuminate\Auth\AuthenticationException('Login error. Wrong password!');
            }

            $user_session = new UserSession;
            $user_session->session = encrypt(str_random());
            $user_session->user_agent = request()->header('User-Agent');
            $user_session->is_active = true;
            $user_session->user()->associate($user);
        } elseif ($isLogin=='general') {
            if (!$authorization_header) { //public api
                return $next($request);
            }

            // Check if can be decrypted
            try {
                decrypt($authorization_header);
            } catch (DecryptException $e) {
                throw new \Illuminate\Auth\AuthenticationException();
            }

            $user_session = UserSession::where('session', $authorization_header)->where('is_active', true)->where('expired_at', '>=', $date)->first();
            if (!$user_session) {
                throw new \Illuminate\Auth\AuthenticationException('Invalid session.');
            }

            $user = $user_session->user;
        } else {
            // Check if can be decrypted
            try {
                decrypt($authorization_header);
            } catch (DecryptException $e) {
                throw new \Illuminate\Auth\AuthenticationException();
            }

            $user_session = UserSession::where('session', $authorization_header)->where('is_active', true)->where('expired_at', '>=', $date)->first();
            if (!$user_session) {
                throw new \Illuminate\Auth\AuthenticationException('Invalid session.');
            }

            $user = $user_session->user;
        }

        if ($user->is_active==0) {
            throw new \Illuminate\Auth\AuthenticationException('User is inactive!');
        }
        if ($user->is_active==2) {
            throw new \Illuminate\Auth\AuthenticationException('User is banned!');
        }

        $user_session->expired_at = $date->addDay(15);
        $user_session->save();

        // $this->getLoggingData($request, $next($request), $user);

        config()->set('constants.CURRENT_USER_SESSION', $user_session->session);

        Auth::login($user);

        return $next($request);
    }

    //blom diimplementasi
    public function getLoggingData(Request $request, $response, User $user) {
        $agent = new Agent;
        $begin_request = microtime(true);
        /** @var Response $response */
        $responseContent = json_decode($response->getContent(), 1);
        $status = @$responseContent["status"];
        $result = null;

        if(@$responseContent["messages"]){
            $result = $responseContent["messages"];
        }else if(@$responseContent["message"]){
            $result = $responseContent["message"];
        }else if(@$responseContent["error"]){
            $result = $responseContent["error"];
        }else if(@$responseContent["errors"]){
            $result = $responseContent["errors"];
        }else if(@$responseContent["result"]){
            $result = $responseContent["result"];
        }else if(@$responseContent["results"]){
            $result = $responseContent["results"];
        }

        $device_type = '';
        $data = $request->except([
            "password",
            "current_password",
            "password_confirmation",
            "new_password",
            "new_password_confirmation"
        ]);

        if ($agent->isMobile()) {
            $device_type = 'MOBILE';
        } else if ($agent->isTablet()) {
            $device_type = 'TABLET';
        } else if ($agent->isDesktop()) {
            $device_type = 'DESKTOP';
        } else if ($agent->isRobot()) {
            $device_type = 'ROBOT';
        }

        $logging = new Logging();
        // $input['user'] = user();
        $logging->type = $request->getMethod();
        $logging->url = $request->getUri();
        $logging->data = @json_encode($data);
        $logging->status = $status;
        $logging->result = @json_encode($result);
        $logging->ip = $request->getClientIp();
        $logging->device = $agent->device();
        $logging->device_type = $device_type;
        $logging->platform = $agent->platform();
        $logging->platform_version = $agent->version($agent->platform());
        $logging->browser = $agent->browser();
        $logging->browser_version = $agent->version($agent->browser());
        $logging->app_version = $request->header('app-version');
        $logging->os = $request->header('os');
        $logging->os_version = $request->header('os-version');
        $logging->duration = microtime(true) - $begin_request;

        if ($logging->type != 'GET') {
            $logging->user()->associate($user);
            $logging->save();
        }
    }
}