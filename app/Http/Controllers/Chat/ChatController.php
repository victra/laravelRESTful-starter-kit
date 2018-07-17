<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatAutomated;
use App\Models\ChatContent;
use App\Models\ChatContentRead;
use App\Http\Services\NotificationService;

use Illuminate\Http\Request;

class ChatController extends Controller
{
	public function storeChat(Request $request, User $for_user, NotificationService $notificationService)
    {
        \DB::beginTransaction();

        $user = $request->user();

        if ($request->input('automated_message')==1) {
            if ($user->vendor_id) {
                $vendor_message = \DB::table('vendors')->where('id', $user->vendor_id)->first();
                $request->merge(['content' => 'Halo, '.$for_user->name.'! Thanks for visiting '.$vendor_message->name.'. If you have any questions, don’t hesitate to ask!
                                                '.$vendor_message->automated_message
                                ]);

                ChatAutomated::create([
                    'user_id' => $for_user->id,
                    'vendor_id' => $user->vendor_id
                ]);
            }
        }

        if (!$request->input('attached_vendor')) {
            $this->validate($request, [
                'content' => 'required',
            ]);
        }

        if ($user->id==$for_user->id) {
            throw new  \Exception("You cannot chat your self.");
        }

        if ($user->vendor_id) { //user is vendor check is_chatting_allowed
            $vendor = \DB::table('vendors')->where('id', $user->vendor_id)->first();
            if (!$vendor->is_chatting_allowed) {
                throw new  \Exception("Please contact admin for feature chat.");
            }
        } elseif ($for_user->vendor_id) { //for_user is vendor check is_chatting_allowed
            $vendor = \DB::table('vendors')->where('id', $for_user->vendor_id)->first();
            if (!$vendor->is_chatting_allowed) {
                throw new  \Exception("This vendor don't have access for feature chat.");
            }
        }

        $chat = Chat::where('user_id', $user->id)->where('for_user_id', $for_user->id)
                        ->orWhere(function ($chat) use ($user, $for_user) {
                            $chat->where('user_id', $for_user->id)->where('for_user_id', $user->id);
                        })->first();

        //if chat was exists
        $chatContent = new ChatContent;
        if ($chat) {
            $chat->update(['updated_at' => new \Datetime()]);
            $chatContent->chat_id = $chat->id;
        } else {
            $newChat = new Chat;
            $newChat->user_id = $user->id;
            $newChat->for_user_id = $for_user->id;
            $newChat->save();

            $chatContent->chat_id = $newChat->id;
        }

        $chatContent->user_id = $user->id;
        $chatContent->for_user_id = $for_user->id;
        $chatContent->content = $request->input('content');
        if ($request->input('attached_vendor')) {
            if ($user->role_id == 1 && $for_user->role_id == 3) { //just admin to student
                $this->validate($request, [
                    'attached_vendor' => 'exists:App\Entities\Vendor,hash_id',
                ]);
                $chatContent->attached_vendor = $request->input('attached_vendor');
            }
        }
        $chatContent->save();

        //push notif
        $title = 'Ezyedu';
        $body = $user->name . ' : ' .$chatContent->content;
        if ($user->role_id==2 && $user->vendor_id) {//send by vendor
            $vendor = \DB::table('vendors')->where('id', $user->vendor_id)->first();
            $body = $vendor->name . ' : ' .$chatContent->content;
        } elseif ($user->role_id==1) { //superadmin
            $fromChat = 'Livia';
            $body = $fromChat . ' : ' .$chatContent->content;
            if ($request->input('attached_vendor') && $for_user->role_id == 3) {//if any attachment for student
                $body = $fromChat . ' sent you an attachment';
            }
        }
        $recipients = $notificationService->getDeviceToken($chatContent->for_user_id);
        $data = $chatContent->toArray();
        $data['type'] = 'chat';
        if ($recipients) {
            $notificationService->pushNotification($title, $body, $recipients, $data, $chatContent->for_user_id);
        }

        \DB::commit();
        return response()->json($chatContent);
    }

    public function listChat(Request $request)
    {
        $user = $request->user();

        if ($user->role->hash_id == 'asd123') { //vendor
            $chatsNonOfficials = Chat::where('user_id', $user->id)
                            ->orWhere('for_user_id', $user->id)
                            ->orderBy('updated_at', 'desc')
                            ->get();

            //prinsipnya di cabut
            foreach ($chatsNonOfficials as $key => $chat) {
                if($chat['type'] == 'blast') {
                    unset($chatsNonOfficials[$key]);
                    // array_unshift($chats, $chat);
                }
            }

            //ini buat jadiin array lg, goblok sih
            $chats = [];
            foreach ($chatsNonOfficials  as $key => $value) {
                $chats[] = $value;
            }
        } else {
            $chats = Chat::where('user_id', $user->id)
                            ->orWhere('for_user_id', $user->id)
                            ->orderBy('updated_at', 'desc')
                            ->get();
            
        }

        return response()->json($chats);
    }

    public function listChatContentByUser(Request $request, User $for_user)
    {
        \DB::beginTransaction();

        $user = $request->user();
        if ($user->id==$for_user->id) {
            throw new  \Exception("You cannot chat your self.");
        }

        $chat = Chat::where('user_id', $user->id)->where('for_user_id', $for_user->id)
                                    ->orWhere(function ($chatContent) use ($user, $for_user) {
                                        $chatContent->where('user_id', $for_user->id)->where('for_user_id', $user->id);
                                    })->first();

        $this->checkBlast($user->id, $chat);

        $chatContent = ChatContent::where('chat_id', $chat->id)->orderBy('created_at', 'desc')->paginate(20);

        \DB::commit();
        return response()->json($chatContent);
    }

    public function listChatContentById(Request $request, Chat $chat)
    {
        \DB::beginTransaction();

        $user = $request->user();
        $this->checkBlast($user->id, $chat);

        $chatContent = ChatContent::where('chat_id', $chat->id)->orderBy('created_at', 'desc')->paginate(20);

        \DB::commit();
        return response()->json($chatContent);
    }

    public function adminBlast(Request $request, NotificationService $notificationService)
    {
        \DB::beginTransaction();

        $this->validate($request, [
            'content' => 'required',
        ]);

        $user = $request->user();
        $forUsers = User::where('id', '!=', $user->id)->get();

        foreach ($forUsers as $forUser) {
            $chat = Chat::where('user_id', $user->id)->where('for_user_id', $forUser->id)
                        ->orWhere(function ($chat) use ($user, $forUser) {
                            $chat->where('user_id', $forUser->id)->where('for_user_id', $user->id);
                        })->first();

            //if chat was exists
            $chatContent = new ChatContent;
            if ($chat) {
                $chat->update(['updated_at' => new \Datetime()]);
                $chatContent->chat_id = $chat->id;
            } else {
                $newChat = new Chat;
                $newChat->user_id = $user->id;
                $newChat->for_user_id = $forUser->id;
                $newChat->save();

                $chatContent->chat_id = $newChat->id;
            }

            $chatContent->user_id = $user->id;
            $chatContent->for_user_id = $forUser->id;
            $chatContent->content = $request->input('content');
            $chatContent->save();

            //push notif
            $title = 'Ezyedu';
            $body = 'Livia' . ' : ' .$chatContent->content;
            $recipients = $notificationService->getDeviceToken($chatContent->for_user_id);
            $data = $chatContent->toArray();
            $data['type'] = 'chat';
            if ($recipients) {
                $notificationService->pushNotification($title, $body, $recipients, $data, $chatContent->for_user_id);
            }
        }

        \DB::commit();
        return response()->json(true);
    }

    public function vendorBlast(Request $request, UserService $userService, NotificationService $notificationService)
    {
        \DB::beginTransaction();

        $this->validate($request, [
            'content' => 'required',
        ]);

        $vendor = $userService->getSelfVendor();
        if (!$vendor->is_chatting_allowed) {
            throw new  \Exception("Please contact admin for feature chat.");
        }

        $user = $request->user();
        $chat = Chat::where('user_id', $user->id)
                        ->where('for_user_id', null)
                        ->where('type', 'blast')
                        ->first();

        //if chat was exists
        $chatContent = new ChatContent;
        if ($chat) {
            $chat->update(['updated_at' => new \Datetime()]);
            $chatContent->chat_id = $chat->id;
        } else {
            $newChat = new Chat;
            $newChat->type = 'blast';
            $newChat->user_id = $user->id;
            $newChat->save();

            $chatContent->chat_id = $newChat->id;
        }

        $chatContent->user_id = $user->id;
        $chatContent->content = $request->input('content');
        $chatContent->save();

        //create unread chat blast
        $userConnecteds = $vendor->users()->get();
        foreach ($userConnecteds as $userConnected) {
            $chatContentRead = new ChatContentRead;
            $chatContentRead->user_id = $userConnected->id;
            $chatContentRead->chat_content_id = $chatContent->id;
            $chatContentRead->save();

            //push notif
            $title = 'Ezyedu';
            $body = $vendor->name . ' : ' .$chatContent->content;
            $recipients = $notificationService->getDeviceToken($userConnected->id);
            $data = $chatContent->toArray();
            $data['type'] = 'chat_blast';
            if ($recipients) {
                $notificationService->pushNotification($title, $body, $recipients, $data, $userConnected->id);
            }
        }

        \DB::commit();
        return response()->json($chatContent);
    }

    public function listChatOfficial(Request $request)
    {
        $user = $request->user();

        if ($user->role_id==2) {//vendor
            $chat_blast = Chat::where('user_id', $user->id)
                                ->where('for_user_id', null)
                                ->where('type', 'blast')
                                ->orderBy('updated_at', 'desc')
                                ->first();
        } else {//student
            $vendors = $user->vendors()->get();
            $arrayUserIds = [];
            foreach ($vendors as $vendor) {
                array_push($arrayUserIds, $vendor->user->id);
            }

            $chat_blast = Chat::whereIn('user_id', $arrayUserIds)
                                ->where('for_user_id', null)
                                ->where('type', 'blast')
                                ->orderBy('updated_at', 'desc')
                                ->get();
        }

        return response()->json($chat_blast);
    }

    public function readAllChatContent(Request $request, Chat $chat)
    {
        $user = $request->user();
        $this->checkBlast($user->id, $chat);

        return response()->json(true);
    }

    /*
    |--------------------------------------------------------------------------
    | Private function
    |--------------------------------------------------------------------------
    */
    private function checkBlast($user_id, $chat)
    {
        if ($chat->type == 'blast') {
            $chatContents = $chat->chatContent()->where('is_read', false)->get();
            
            foreach ($chatContents as $chatContent) {
                //read chat content blast
                ChatContentRead::where('chat_content_id', $chatContent->id)
                                ->where('user_id', $user_id)
                                ->where('is_read', false)
                                ->update(['is_read' => true]);

                $countChatContentRead = ChatContentRead::where('chat_content_id', $chatContent->id)
                                                        ->where('user_id', $user_id)
                                                        ->where('is_read', false)
                                                        ->count();
                if ($countChatContentRead==0) { //jika sudah dibaca semua
                    $this->readAllChat($user_id, $chat, $chatContent->id);
                }
            }
        } else {
            $this->readAllChat($user_id, $chat);
        }
    }

    private function readAllChat($user_id, $chat, $chat_content_id=null)
    {
        $lastChat = ChatContent::where('chat_id', $chat->id)->orderBy('created_at', 'desc')->first();

        if ($lastChat && ($lastChat->user_id != $user_id)) {
            if ($chat->type=='blast') {
                $chatContents = ChatContent::where('id', $chat_content_id)->get();
            } else {
                $chatContents = ChatContent::where('chat_id', $chat->id)->where('is_read', false)->where('for_user_id', $user_id)->get();
            }

            foreach ($chatContents as $chatContent) {
                $chatContent->is_read = true;
                $chatContent->update();
            }
        }

        return true;
    }
}