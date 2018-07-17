<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Ideas;
use App\Models\Blog;
use App\Models\Vendor;
use App\Models\VendorLevel;
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
		if ($user->role->hash_id=='zxc123') { //student
			$user->append('top_three');
		}

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
		if ($request->user()->role_id!=1) {
			if ($user->role->hash_id=='zxc123') { //student
				$user->append('top_three');
			}
		}

		return response()->json($user);
	}

	public function getUsers(Request $request)
	{
		$users = User::where('role_id', '!=', 1);

		$user = $request->user();
		if ($user->role->hash_id=='qwe123') { //superadmin
			if ($request->input('is_vendor')!=null && $request->input('is_vendor')>=0) {
				if ($request->input('is_vendor')==1) {
					$users = $users->where('role_id', 2); //vendor admin
				} elseif ($request->input('is_vendor')==0) {
					$users = $users->where('role_id', 3); //student
				}
			}

			if ($request->input('vendor_id')!=null && $request->input('is_vendor')>=0) {
				$users = $users->where('vendor_id', $request->input('vendor_id'));
			}
		} elseif ($user->role->hash_id=='asd123') { // vendor admin
			$users = $users->where('role_id', 3);
		}

		$search = $request->input('search');
        $users = $users->where(function ($query) use ($search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%');
            $query->orWhere('username', 'LIKE', '%'.$search.'%');
            $query->orWhere('email', 'LIKE', '%'.$search.'%');
        });

		return response()->json($users->paginate(10));
	}

	public function getTopSummary(Request $request)
	{
        $user = request()->user();
        
		$result['ideas'] = Ideas::where('status', 1)
								->where(\DB::raw('CONCAT(title, " ", description)'), 'LIKE', '%'.$request->input('search').'%')
								->select('ideas.*')
								->leftJoin('vendors', 'vendors.id', '=', 'ideas.vendor_id')
								->orderBy('vendors.vendor_level_id', 'desc')
								->orderBy('created_at', 'desc')->take(8)->get();
	    foreach ($result['ideas'] as $idea) {
	        if ($user) {
	            $idea['is_save'] = \DB::table('ideas_users')->where('user_id', $user->id)->where('ideas_id', $idea->id)->exists();
	        }
	    }

	    $result['vendors'] = Vendor::where('is_active', 1)
									->where(\DB::raw('CONCAT(name, " ", address)'), 'LIKE', '%'.$request->input('search').'%')
	    							->orderBy('created_at', 'desc')->take(8)->get();

	    $result['blogs'] = Blog::where('status', 1)
								->where('title', 'LIKE', '%'.$request->input('search').'%')
	    						->orderBy('created_at', 'desc')->take(8)->get();

	    foreach ($result['blogs'] as $blog) {
	    	$userBlog = User::find($blog->user_id);
	    	$blog['username'] = $userBlog->username;
	    	$blog['name'] = $userBlog->name;
	    }

		return response()->json($result);
	}

	public function getStudentBlog(User $user)
	{
		$blogs = $user->blogs();
		return response()->json($blogs->paginate(10));
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