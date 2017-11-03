<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function chat()
    {
        $user = Auth::user();
        return view('chat',compact('user'));
    }

    public function getmessages()
    {
        return App\Message::with('user')->get();
    }

    public function postmessages()
    {
        $user = Auth::user();
        $message = $user->messages()->create(['message' => request()->get('message')]);
        broadcast(new MessagePosted($message, $user))->toOthers();
        return ['status' => 'OK'];
    }
}
