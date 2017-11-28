@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/mypage/mypage.css">
@endsection

@section('main')
  <div class="row">

        <div class="profile col s12">
          <div class="profile-rap col s12 center">
            {{-- <img class="image circle" src="{{ $profile['profile_image'] }}" alt=""> --}}
            <img class="image circle" src="{{App\Profile::find(Auth::user()->profile_id)->profile_image}}" alt="">
            <a class="edit-btn btn-floating waves-effect waves-light green"><i class="material-icons">edit</i></a>
          </div>
        </div>

      <div class="prfbox col s12">
        <div class="username center-align">
          <h1>{{ $profile['profile_name'] }}</h1>
          {{-- <div class="follow-button col s12 center-align">
            <a class="waves-effect waves-light btn">フォロー</a>
          </div> --}}
        </div>

        <div class="prf col s12">
          <div class="prf-content col s4">
            <h1 class="item" id="">投稿</h1>
            <label class="item-sub" for="">XXX</label>
          </div>
          <div class="prf-content col s4">
            <a class="color" href="{{ route('user_mypage_follow') }}"><h1 class="item" id="follow">フォロー</h1></a>
            <label class="item-sub" for="follow">XXX</label>
          </div>
          <div class="prf-content col s4">
            <a class="color" href="{{ route('user_mypage_follower') }}"><h1 class="item" id="follower">フォロワー</h1></a>
            <label class="item-sub" for="follower">XXX</label>
          </div>
        </div>

        <div class="prf col s12">
          <div class="prf-content col s4">
            <h1 class="item" id="department">学科</h1>
            <label class="item-sub" for="department">{{ $course->course_major }}</label>
          </div>
          <div class="prf-content col s4">
            <h1 class="item" id="course">コース</h1>
            <label class="item-sub" for="course">{{ $course->course_name }}</label>
          </div>
          <div class="prf-content col s4">
            <h1 class="item" id="year">学年</h1>
            <label class="item-sub" for="year">{{ $profile->profile_scyear }}</label>
          </div>
        </div>

        <div class="prf-text col s12 left-align">
          <h2 class="text col s12">{{ $profile['profile_introduction'] }}</h2>
        </div>
      </div>

      <div class="border col s12"></div>

      <div class="wap col s12">
        @for ($i=1; $i < 5; $i++)
          <div class="col s6">
            <div class="card">
              <div class="card-image">
                <a href="{{ route('user_article_detail',1) }}"><img src="/images/sample-{{ $i }}.jpg"></a>
              </div>
              <div class="card-content">
                <span class="card-title">記事タイトル</span>
                <p class="card-text">ここに記事の内容の一部を表示 ここに記事の内容の一部を表示 ここに記事の内容の一部を表示 ここに記事の内容の一部を表示</p>
              </div>
              <div class="card-action">
                <a href="{{ route('user_article_detail',1) }}">READ MORE</a>
                <div class="tags">
                  <div class="chip">
                    IT
                  </div>
                  <div class="chip">
                    デザイン
                  </div>
                  {{-- <div class="chip">
                    映像
                  </div>
                  <div class="chip">
                    アニメーション
                  </div> --}}
                </div>

                {{-- カウンター 実装するか検討 --}}
                {{-- <div class="counter">
                  <i class="goodicon material-icons" id="counter">thumb_up</i>
                  <label class="showcounter" for="counter">100</label>
                </div>
                <div class="counter">
                  <i class="goodicon material-icons" id="counter">remove_red_eye</i>
                  <label class="showcounter" for="counter">1000</label>
                </div> --}}

              </div>
            </div>
          </div>
        @endfor
      </div>

  </div>

@endsection
