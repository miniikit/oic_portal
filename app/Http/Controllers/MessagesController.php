<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessagePosted;
use App\Profile;

class MessagesController extends Controller
{
    public function chat()
    {
        $user = Auth::user();
        $profile = app(Profile::class)->find($user->id);
        return view('chat_other',compact('user','profile'));
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
}
