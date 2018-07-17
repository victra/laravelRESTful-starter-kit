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

        $this->validate($request, [
            'content' => 'required',
        ]);

        if ($user->id==$for_user->id) {
            throw new  \Exception("You cannot chat your self.");
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
        $chatContent->save();

        //push notif
        $title = 'Codedoct';
        $body = $user->name . ' : ' .$chatContent->content;
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
        $chats = Chat::where('user_id', $user->id)
                        ->orWhere('for_user_id', $user->id)
                        ->orderBy('updated_at', 'desc')
                        ->get();
        

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

        $this->readAllChat($user->id, $chat);

        $chatContent = ChatContent::where('chat_id', $chat->id)->orderBy('created_at', 'desc')->paginate(20);

        \DB::commit();
        return response()->json($chatContent);
    }

    public function listChatContentById(Request $request, Chat $chat)
    {
        \DB::beginTransaction();

        $user = $request->user();
        $this->readAllChat($user->id, $chat);

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
            $title = 'Codedoct';
            $body = 'Codedoct' . ' : ' .$chatContent->content;
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

    public function readAllChatContent(Request $request, Chat $chat)
    {
        $user = $request->user();
        $this->readAllChat($user->id, $chat);

        return response()->json(true);
    }

    /*
    |--------------------------------------------------------------------------
    | Private function
    |--------------------------------------------------------------------------
    */
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