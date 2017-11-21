@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/mypage/follow.css">
@endsection

@section('main')
  <div class="row">
    <div class="col s12 center-align">
      <h1 class="title">フォロー</h1>
    </div>

    <div class="follow-list col s12">
      <div class="row">
        <div class="col s4">
          <div class="card">
            <div class="card-content">
              <img src="/images/profile_images/default.jpg" alt="" class="uesr-icon circle">
              <span class="card-title">ユーザー名</span>
              <p>

              </p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- <div class="follow-list col s12">
      <ul class="collection">
        @for ($i = 0; $i < 10; $i++)
          <li class="collection-item avatar">
            <img src="/images/default.jpg" alt="" class="circle">
            <span class="name">name</span>
            <p>
              ここにコメントを表示
            </p>
          </li>
        @endfor
     </ul>
    </div> --}}

  </div>
@endsection

@section('script')

@endsection
