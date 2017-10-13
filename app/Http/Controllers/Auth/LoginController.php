<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getGoogleAuth()
    {
        $scopes = [
            'https://www.googleapis.com/auth/plus.me',
            'https://www.googleapis.com/auth/plus.profile.emails.read'
        ];

        $parameters = [
            'approval_prompt' => 'auto', //認可されている状態であれば確認画面スキップ
        ];

        return Socialite::driver('google')->scopes($scopes)->with($parameters)->redirect();

    }

    public function getGoogleAuthCallback()
    {
        $getUser = Socialite::driver('google')->user();

        $userModel = app( User::class );
        $user = $userModel->where('email',$getUser->email)->first();

        if(!$user instanceof User){
            if(!Str::contains($user->email,'@oic.jp')){
                return redirect('/')->flash('メールアドレスがoic.jpではありません。')->error();
            }
            return redirect('/register');
        }else{
            Auth::loginUsingId($user->id);
            return redirect('/');
        }
    }
}
