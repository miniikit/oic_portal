<?php

namespace App\Http\Controllers\Auth;

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

     // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'kana' => 'required|max:100',
            'sc_year' => 'required',
            'sc_class' => 'required',
            'major' => 'required',
            'course' => 'required',
            'portfolio' =>'url',
            'introduction' =>'string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
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

            $profile->save(); //多分いらない??

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
    //}
}
