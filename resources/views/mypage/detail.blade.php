@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/mypage/mypage.css">
@endsection

@section('main')
  <div class="row">
    <div class="col s12">
      <div class="col s12">
        <div class="profile-image center">
          <div class="profile-rap">
            <img class="image circle" src="/images/sample-icon2.jpg" alt="">
          </div>
        </div>
      </div>

      <div class="prfbox row">
        <div class="username col s12 center-align">
          <h1>UserName</h1>
        @if (Auth::guest())
          <div class="follow-button col s12 center-align">
            <a class="waves-effect waves-light btn">フォロー</a>
          </div>
        @else
          <div class="switch">
            <label>
              change
              <input type="checkbox">
              <span class="lever"></span>
            </label>
          </div>
        @endif
        </div>

        <div class="prf col s12 left-align">
          <div class="col s4">
            <h1 class="item" id="">投稿</h1>
            <label class="item-sub" for="">XXX</label>
          </div>
          <div class="col s4">
            <a href="{{ route('user_mypage_follow') }}"><h1 class="item" id="follow">フォロー</h1></a>
            <label class="item-sub" for="follow">XXX</label>
          </div>
          <div class="col s4">
            <a href="#"><h1 class="item" id="follower">フォロワー</h1></a>
            <label class="item-sub" for="follower">XXX</label>
          </div>
        </div>
        <div class="prf col s12 left-align">
          <div class="col s4">
            <h1 class="item" id="department">学科</h1>
            <label class="item-sub" for="department">ここに学科</label>
          </div>
          <div class="col s4">
            <h1 class="item" id="course">コース</h1>
            <label class="item-sub" for="course">ここにコース</label>
          </div>
          <div class="col s4">
            <h1 class="item" id="year">学年</h1>
            <label class="item-sub" for="year">ここに学年</label>
          </div>
        </div>

        <div class="prf-text col s12 left-align">
          <h2 class="text col s12">ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介
          ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介ここに自己紹介</h2>
        </div>
      </div>

      <div class="wap row">
        @for ($i=1; $i< 5; $i++)
        <div class="contents col s6">
          <div class="card">
            <div class="card-wrapper">
              <div class="card-image">
                <a href="{{ route('user_article_detail') }}"><img src="/images/sample-{{ $i }}.jpg"></a>
                <span class="card-title">記事タイトル</span>
              </div>
              <div class="card-content">
                <p class="card-text">ここに記事の内容の一部を表示 ここに記事の内容の一部を表示 ここに記事の内容の一部を表示 ここに記事の内容の一部を表示</p>
              </div>
              <div class="card-action">
                  <i class="goodicon material-icons" id="counter">thumb_up</i>
                  <label class="showcounter" for="counter">100</label>
                  <i class="goodicon material-icons" id="counter">remove_red_eye</i>
                  <label class="showcounter" for="counter">1000</label>
              </div>
            </div>
          </div>
        </div>
        @endfor
      </div>

    </div>
  </div>

@endsection
