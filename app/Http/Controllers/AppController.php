<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fundraising;
use App\Models\Message;
use Auth;

class AppController extends Controller
{
    public function user_public_profile_page($id) {
        $user = User::find($id);

        $fundraisings = Fundraising::where('foundator_id', '=', $user->id)->get()->sortByDesc('id');
        $messages = Message::where('chat_id', '=', $id)->get();
        $fundraisings_count = $fundraisings->count();

        return view('profile.user-public-profile-page', ['user' => $user, 'fundraisings' => $fundraisings, 'messages' => $messages, 'chat_id' => $id, 'fundraisings_count' => $fundraisings_count]);
    }

    public function chat_send_message(Request $req, $id) {
        $from = Auth::user()->id;
        $text = $req->input('text');
        $chat_id = $id;

        $message = new Message;
        $message->from = $from;
        $message->chat_id = $chat_id;
        $message->text = $text;

        $message->save();

        return redirect()->route('user_public_profile_page', ['id' => $chat_id]);
    }
}
