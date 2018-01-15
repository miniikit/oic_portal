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

        // 画像を保存
        if(!isset($data['profile_image']))
        {
            $profile_image = '/images/default.png';
        }else{
            $imgfile = $request->file('profile_image');

            $filename = $carbon->format('Y-m-d-H-i-s') . '.jpg';
            $imgfile->move(public_path('/images/profile_images/'), $filename);

            $profile_image = '/images/profile_images/' . $filename;
        }

        // 学年を入学年に変更
        $admission_year = $this->changeYearToDatatime($data['profile_admission_year']);

        $profile = $profileModel->create([
            'profile_image' => $profile_image,
            'profile_name' => $data['profile_name'],
            'course_id' => $data['course_id'],
            'profile_admission_year' => $admission_year,
            'profile_url' => $data['profile_url'],
            'profile_introduction' => $data['profile_introduction'],
        ]);

        $profile->save();

        if ($profile) {
            $profileId = $profile->id;
        }

        // email 確認
        if(session()->has('email'))
        {
            $email = session('email');
        } else {
            // TODO : エラーメッセージ表示を行う
            return redirect()->route('user_home')->with('message','恐れ入りますが再度お試しください');
        }

        $userModel->create([
            'email' => $email, // Googleから得た確実なアドレスを登録する
            'name' => $data['name'],
            'name_kana' => $data['kana'],
            'authority_id' => 1, // 学生
            'profile_id' => $profileId,
        ]);

        Mail::send('mail.register',compact('data'), function ($message) use ($request) {
            $message->to(session('email'), $request->name)->subject('会員登録完了');
        });

        return view('auth.register.complete');
    }


    /**
     * フォームで選択された学年をDB用の日付(入学年)に変更
     * ex) in:1 out:        date: 2016-04-01 09:00:00.0 Asia/Tokyo (+09:00)
     * TODO : Serviceに移行
     * @param $profile_admission_year
     * @return static  date
     */
    public function changeYearToDatatime($profile_admission_year)
    {
        $nowYear = Carbon::now()->year;
        $admission_year = $nowYear;

        // 入学年度を計算
        switch($profile_admission_year){
            case 1 :
            case 2 :
                $admission_year--;
                break;
            case 3 :
                $admission_year = $admission_year - 2;
                break;
            case 4 :
                $admission_year = $admission_year - 3;
                break;
            default :
        }


        // 年越し判定
        $nowMonth = Carbon::now()->month;
        if($nowMonth < 4){
            $admission_year--;
        }


        // yearをdatatimeに変換
        $admission_datatime = Carbon::create($admission_year,4,1,9,0,0);


        return $admission_datatime;
    }
}
