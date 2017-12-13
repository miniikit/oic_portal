<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessagePosted;

class MessagesController extends Controller
{
    public function chat()
    {
        $user = Auth::user();
        return view('chat',compact('user'));
    }

    public function getmessages()
    {
        return Message::with('user')->get();
    }

    public function postmessages(Request $request)
    {
        $user = Auth::user();
        $message = $user->messages()->create(['message' => $request->get('message')]);
        broadcast(new MessagePosted($message, $user))->toOthers();
        return ['status' => 'OK'];
    }
    public function chat_other()
    {
      return view('chat_other');
    }
}
