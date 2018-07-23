<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserSession;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Socialite;
use Carbon\Carbon;

class LoginController extends Controller
{
    //login social handle by client, BE just retrieve provider
    public function loginSocial(Request $request)
    {
        \DB::beginTransaction();

        $this->validate($request, [
            'provider' => 'required|in:google,facebook',
            'provider_id' => 'required',
        ]);

        $authUser = User::where('provider_id', $request->input('provider_id'))
                        ->where('provider', $request->input('provider'))->first();

        if (!$authUser) {
            throw new  \Exception("User social media not found!");
        }

        $date = new Carbon();

        $user_session = new UserSession;
        $user_session->session = encrypt(str_random());
        $user_session->user_agent = request()->header('User-Agent');
        $user_session->is_active = true;
        $user_session->user()->associate($authUser);
        $user_session->expired_at = $date->addDay(15);
        $user_session->save();

        config()->set('constants.CURRENT_USER_SESSION', $user_session->session);

        Auth::login($authUser);

        $response['session'] = config('constants.CURRENT_USER_SESSION');
        $response['user'] = $authUser;

        \DB::commit();
        return response()->json($response);
    }

    public function login(Request $request)
    {
        // Mostly handled in Middleware/AuthenticateUserSession.php

        $user = request()->user();
        
        $response['session'] = config('constants.CURRENT_USER_SESSION');
        $response['user'] = $user;

        return response()->json($response);
    }

    public function logout(Request $request)
    {
        \DB::beginTransaction();

        $authorization_header = $request->header('Authorization');
        $user_session = UserSession::where('session', $authorization_header)->first();

        if (!$user_session) {
            throw new \Illuminate\Auth\AuthenticationException('Invalid session.');
        }

        $user_session->is_active = false;
        $user_session->save();

        if ($request->input('device_token')) {
            \DB::table('user_devices')->where('user_id', $user_session->user_id)
                                        ->where('token', $request->input('device_token'))
                                        ->delete();
        }

        \DB::commit();
        return response()->json(true);
    }

    public function forgotPassword(Request $request) 
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            throw new  \Exception("User not found.");
        }

        $user->code = rand(pow(10, 3), pow(10, 4)-1);
        $user->save();

        dispatch(new \App\Jobs\SendNotificationEmail($user, new \App\Mail\ForgotPasswordMail($user)));

        return response()->json(true);
    }

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'key' => 'required|min:4|max:4',
            'new_password' => 'required|string|min:6'
        ]);

        $user = User::where('email', $request->input('email'))
                    ->where('code', $request->input('key'))->first();

        if (!$user) {
            throw new  \Exception("The key you entered is incorrect.");
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return response()->json(true);  
    }

    public function changePassword(Request $request)
    {
        $user = request()->user();

        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ];
        
        $messages = [];
        if (!Hash::check($request->input('current_password'), $user->password)) {
            $rules['current_password'] .= '|same:'.$user->password;
            $messages['current_password.same'] = 'Password lama salah.';
        }

        $validator = \Validator::make(request()->all(), $rules, $messages);
        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        $user->password = Hash::make(request()->input('new_password'));
        $user->save();

        return response()->json($user);
    }
}
