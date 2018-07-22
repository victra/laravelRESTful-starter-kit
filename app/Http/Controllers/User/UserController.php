<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Http\Services\ImageService;

use Illuminate\Http\Request;

class UserController extends Controller
{
	public function activeDeactiveUser(Request $request, User $user)
	{
		$this->validate($request, [
	        'is_active' => 'required|in:0,1,2',
	    ]);

		$user->is_active = $request->input('is_active');
		$user->save();

		return response()->json($user);
	}

	public function showMyProfile(Request $request)
	{
		$user = $request->user();

		return response()->json($user);
	}

	public function updateMyProfile(Request $request, ImageService $imageService)
	{
        \DB::beginTransaction();

		$user = $request->user();
		$this->validate($request, [
            'image' => 'nullable|image',
            'username' => 'required|string|min:2|max:30|without_spaces|unique:App\Entities\User,username,'.$user->id,
            'name' => 'nullable|max:255',
            'role' => 'required|exists:App\Entities\Role,hash_id|in:asd123,zxc123',
            'birth_date' => 'nullable|date_format:Y-m-d',
            'gender' => 'nullable|in:male,female',
            'phone' => 'nullable|min:1|max:25',
            'phone_2' => 'nullable|min:1|max:25',
        ]);

        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->birth_date = $request->input('birth_date');
        $user->gender = $request->input('gender');
        $user->phone = $request->input('phone');
        $user->phone_2 = $request->input('phone_2');

        $role = Role::where('hash_id', $request->input('role'))->first();
        $user->role()->associate($role);

        if ($request->file('image')) {
        	// delete image
            $imageService->deleteFile($user->image);

            // upload image
            $uploadImage = $imageService->uploadImage($request->file('image'), 'profile', $user, 800);

            $user->image = $uploadImage;
        }

        $user->save();

        \DB::commit();
		return response()->json($user);
	}

	public function showProfile(Request $request, User $user)
	{
		return response()->json($user);
	}

	public function getUsers(Request $request)
	{
		$users = User::where('role_id', '!=', 1);

		$search = $request->input('search');
        $users = $users->where(function ($query) use ($search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%');
            $query->orWhere('username', 'LIKE', '%'.$search.'%');
            $query->orWhere('email', 'LIKE', '%'.$search.'%');
        });

		return response()->json($users->paginate(10));
	}

	public function requestChangeEmail(Request $request)
	{
		\DB::beginTransaction();

		$user = $request->user();
		$this->validate($request, [
            'new_email' => 'required|email|unique:App\Entities\User,email',
        ]);

        $user->code = rand(pow(10, 3), pow(10, 4)-1);
        $user->save();

        $user->email = $request->input('new_email');

        dispatch(new \App\Jobs\SendNotificationEmail($user, new \App\Mail\RequestChangeEmail($user)));

        \DB::commit();
		return response()->json($user);
	}

	public function setNewEmail(Request $request)
	{
		\DB::beginTransaction();

		$user = $request->user();
		$this->validate($request, [
            'new_email' => 'required|email|unique:App\Entities\User,email',
            'code' => 'required',
        ]);

        $user = $user->where('code', $request->input('code'))->first();

        if (!$user) {
            throw new  \Exception("User not found.");
        }

        $user->email = $request->input('new_email');
        $user->save();

        dispatch(new \App\Jobs\SendNotificationEmail($user, new \App\Mail\SetNewEmail($user)));

        \DB::commit();
		return response()->json($user);
	}
}