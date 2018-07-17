<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Role;
use App\Models\User;
use App\Models\ConfigContent;
use App\Models\UserPoint;
use App\Models\VendorCategory;
use App\Http\Services\ImageService;
use App\Http\Services\PointService;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function test() {
        $result = [
            'id' => 1,
            'name' => 'Victra',
        ];
        return response()->json($result);
    }

    public function storeUser(Request $request, ImageService $imageService, LoginController $loginController, PointService $pointService)
    {
        \DB::beginTransaction();

        $this->validate($request, [
            'image' => 'nullable|image',
            'email' => 'required|email|unique:App\Entities\User,email',
            'password' => 'required|string|min:6',
            'username' => 'required|string|min:2|max:30|unique:App\Entities\User,username|without_spaces',
            'name' => 'required|max:255',
            'role' => 'required|exists:App\Entities\Role,hash_id|in:asd123,zxc123',
            'birth_date' => 'nullable|date_format:Y-m-d',
            'gender' => 'nullable|in:male,female',
            'phone' => 'nullable|min:1|max:25',
            // 'phone' => 'required_if:role,==,asd123|min:9|max:15',
            'phone_2' => 'nullable|min:1|max:25',
            'provider' => 'nullable|in:google,facebook',
            'referral' => 'nullable|exists:App\Entities\User,hash_id',
        ]);

        $input = $request->except(['role', 'referral']);
        $user = User::create($input);

        if ($request->input('role')=='zxc123') {//student
            if ($request->input('referral')) {
                $userReferral = User::where('hash_id', $request->input('referral'))->first();
                if ($userReferral->role->hash_id=='zxc123') {//student
                    if ($userReferral->is_active==User::STATUS_BANNED) {
                        throw new  \Exception("User referral banned.");
                    }
                    //save referral
                    $user->referral = $request->input('referral');
                }
            }
        }

        $role = Role::where('hash_id', $request->input('role'))->first();
        $user->role()->associate($role);

        if ($request->file('image')) {
            // upload image
            $uploadImage = $imageService->uploadImage($request->file('image'), 'profile', $user, 800);

            $user->image = $uploadImage;
        }
        
        // register by sosmed
        if ($request->input('provider') && $request->input('provider_id')) {
            $user->is_active = true;
            $user->save();

            //get point
            if ($user->referral) {
                $userReferral = User::where('hash_id', $user->referral)->first();
                $pointInviter = ConfigContent::where('config_id', 8)->where('name', 'Referral inviter')->first();
                $pointInvited = ConfigContent::where('config_id', 8)->where('name', 'Referral invited')->first();
                if (!$pointInviter || !$pointInvited) {
                    throw new  \Exception("Config not found");
                }
                $dataInviter = [
                    'description' => $user->username,
                    'point' => $pointInviter->value,
                ];
                $dataInvited = [
                    'description' => $userReferral->username,
                    'point' => $pointInvited->value,
                ];
                $pointService->increaseDecreasePoint(UserPoint::TYPE_REFERRAL_INVITER, $dataInviter, $userReferral);
                $pointService->increaseDecreasePoint(UserPoint::TYPE_REFERRAL_INVITED, $dataInvited, $user);
            }

            $response = $loginController->loginSocial($request)->original;
        } else {
            $user->save();
            $response = $user;
            dispatch(new \App\Jobs\SendNotificationEmail($user, new \App\Mail\NewRegistrationMail($user)));
        }

        \DB::commit();
        return response()->json($response);
    }

    public function activateUser(Request $request, PointService $pointService)
    {
        \DB::beginTransaction();

        $this->validate($request, [
            'email' => 'required|email',
            'code' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))
                    ->where('code', $request->input('code'))->first();

        if (!$user) {
            throw new  \Exception("User not found.");
        }

        $user->is_active = 1;
        $user->save();

        //get point
        if ($user->referral) {
            $userReferral = User::where('hash_id', $user->referral)->first();
            $pointInviter = ConfigContent::where('config_id', 8)->where('name', 'Referral inviter')->first();
            $pointInvited = ConfigContent::where('config_id', 8)->where('name', 'Referral invited')->first();
            if (!$pointInviter || !$pointInvited) {
                throw new  \Exception("Config not found");
            }
            $dataInviter = [
                'description' => null,
                'point' => $pointInviter->value,
            ];
            $dataInvited = [
                'description' => null,
                'point' => $pointInvited->value,
            ];
            $pointService->increaseDecreasePoint(UserPoint::TYPE_REFERRAL_INVITER, $dataInviter, $userReferral);
            $pointService->increaseDecreasePoint(UserPoint::TYPE_REFERRAL_INVITED, $dataInvited, $user);
        }

        \DB::commit();

        return response()->json($user);
    }
}
