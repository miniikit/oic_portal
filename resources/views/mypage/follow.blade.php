@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/mypage/follow-follower.css">
@endsection

@section('main')
  <div class="row">
    <div class="col s12 center-align">
      <h1 class="title">フォロー</h1>
    </div>

    <div class="row">
      @for ($i=1; $i < 10; $i++)
        <div class="user_card col s4">
          <div class="card">
              <div class="card-image">
                <img src="/images/profile_images/default.jpg" class="user-image circle">
              </div>
              <div class="card-stacked">
                <div class="border-top card-content">
                  <a class="link_color" href="{{ route('user_profile') }}"><h1 class="card-name">ユーザー名</h1></a>
                </div>
                <div class="card-content">
                  <div class="user_info">
                    <div class="user_stats">
                      <strong>Post</strong>
                      <span>10</span>
                    </div>
                    <div class="user_stats">
                      <strong>follow</strong>
                      <span>50</span>
                    </div>
                    <div class="user_stats">
                      <strong>follower</strong>
                      <span>100</span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      @endfor
    </div>
  </div>
@endsection

@section('script')

@endsection
