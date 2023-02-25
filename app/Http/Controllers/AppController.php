<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fundraising;
use App\Models\Chat;
use App\Models\Message;
use Auth;

class AppController extends Controller
{
    public function getChatInfo($profile) {
        // Getting chats and settings up user type as foundatour
        if(Auth::user()->id == $profile->id) {
            $chats = Chat::where('foundator_id', '=', $profile->id)->get();
            $type = "foundator";
        }
        
        // Getting chat and settings up user type as user
        else {
            $chats = Chat::where('foundator_id', '=', $profile->id)->where('user_id', '=', Auth::user()->id)->get();
            $type = "user";
        }

        $response = [
            'chats' => $chats,
            'type' => $type,
        ];

        return $response;
    }

    public function checkIsEmptyOrNot($profile, $chat) {
        if($chat->isEmpty() && Auth::user()->id != $profile->id) {
            $chat = new Chat;
            $chat->name = Auth::user()->name.'\'s chat';
            $chat->foundator_id = $profile->id;
            $chat->user_id = Auth::user()->id;
            $chat->save();

            return $chat;
        }

        return False;
    }

    public function user_public_profile_page($id) {
        $profile = User::find($id);

        $fundraisings = Fundraising::where('foundator_id', '=', $profile->id)->get()->sortByDesc('id');
        
        $response = $this->getChatInfo($profile);
        $chats = $response['chats'];
        $type = $response['type'];

        // If not isset chat - create new
        if($this->checkIsEmptyOrNot($profile, $chats)) {
            $chats = $this->checkIsEmptyOrNot($profile, $chats);
        }

        // Getting chat and settings up user type as user
        if($type == "user") {
            foreach($chats as $chat) {
                $messages = Message::where('chat_id', '=', $chat->id)->get();
            }
        }
        else {
            $messages = null;
        }

        $fundraisings_count = $fundraisings->count();

        return view('profile.user-public-profile-page', ['user' => $profile, 'fundraisings' => $fundraisings, 'messages' => $messages, 'chat_id' => $id, 'fundraisings_count' => $fundraisings_count, 'chats' => $chats, 'type' => $type]);
    }

    public function chatView($profile_id, $chat_id) {
        $chat = Chat::find($chat_id);
        $messages = Message::where('chat_id', '=', $chat->id)->get();

        return view('founder_chat', ['chat' => $chat, 'messages' => $messages, 'profile_id' => $profile_id]);
    }


    public function chat_send_message(Request $req, $id) {
        $from = Auth::user()->id;
        $text = $req->input('text');
        $chat_id = $req->input('chat_id');;

        $message = new Message;
        $message->from = $from;
        $message->chat_id = $chat_id;
        $message->text = $text;

        $message->save();

        $name = $req->route()->getName();
        
        return back();
    }
}
