<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\Profile;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use App\Http\Requests\RegisterRequest;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function complete(Request $request)
    {
        $data = $request->all();
        $userModel = app(User::class);
        $profileModel = app(Profile::class);

        $carbon = Carbon::now();

        $imgfile = $request->file('profile_image');

        $filename = $carbon->format('Y-m-d-H-i-s') . '.jpg';
        $imgfile->move(public_path('/images/profile_images/'), $filename);


        $profile_image = '/images/profile_images/' . $filename;
        $now_admission_year = Carbon::now()->year;

        if ($data['profile_admission_year'] == 1) {

            $data['profile_admission_year'] = $now_admission_year . '-04-01';

        } else if ($data['profile_admission_year'] == 2) {

            $data['profile_admission_year'] = $now_admission_year - 1 . '-04-01';

        } else if ($data['profile_admission_year'] == 3) {

            $data['profile_admission_year'] = $now_admission_year - 2 . '-04-01';

        } else {
            $data['profile_admission_year'] = $now_admission_year . '-04-01';
        }

        $profile = $profileModel->create([
            'profile_image' => $profile_image,
            'profile_name' => $data['profile_name'],
            'course_id' => $data['course_id'],
            'profile_admission_year' => Carbon::now(),
            'profile_url' => $data['profile_url'],
            'profile_introduction' => $data['profile_introduction'],
        ]);

        $profile->save();

        if ($profile) {
            $profileId = $profile->id;
        }

        $userModel->create([
            'email' => $data['email'],
            'name' => $data['name'],
            'name_kana' => $data['kana'],
            'authority_id' => 1,
            'profile_id' => $profileId,
        ]);

        Mail::send('mail.register',compact('data'), function ($message) use ($request) {
            $message->to($request->email, $request->name)->subject('会員登録完了');
        });

        return view('auth.register.complete');
    }
}
