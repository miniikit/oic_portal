<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

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
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'kana' => $data['kana'],
            'sc_year' => $data['sc_year'],
            'sc_class' => $data['sc_class'],
            'major' => $data['major'],
            'course' => $data['course'],
            'portfolio' => $data['portfolio'],
            'introduction' => $data['introduction'],
            'authority_id' => 1,
        ]);
    }

    public function confirm(Request $request)
    {
        $data = $request->all();

        return view('auth.register.confirm',compact('data'));
    }

    public function complete(Request $request)
    {
        $data = $request->all();

        event(new Registered($user = $this->create($data)));

        return view('auth.register.complete');
    }
}
