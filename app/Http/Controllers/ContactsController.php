<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function show()
    {
        return view('contact.contact');
    }

    public function complete(Request $request)
    {
        $data = $request->all();

        Mail::send('mail.contact', compact('data'), function ($message) use ($request) {
            $message->to($request->email, $request->username)->cc('oicportalapp@gmail.com')->subject('お問い合わせ完了');
        });

        return view('contact.complete');
    }
}
