@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/mypage/mypage.css">
@endsection

@section('nav-tab')
  <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a class="active" href="#tab1">プロフィール</a></li>
        <li class="tab"><a href="#tab2">お気に入り</a></li>
        <li class="tab"><a href="#tab3">ジャンル１</a></li>
        <li class="tab"><a href="#tab4">ジャンル２</a></li>
      </ul>
    </div>
@endsection

@section('main')
  <div class="row">
    <div id="tab1" class="col 12">

    </div>
  </div>

@endsection

@section('script')

@endsection
