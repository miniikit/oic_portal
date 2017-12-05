<?php

namespace App\Http\Controllers\Auth;

use App\Mail\RegisterShipped;
use Mail;
use App\Profile;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        return view('auth.register.complete');
    }
}
