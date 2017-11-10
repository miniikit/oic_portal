@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/event/detail.css">
@endsection

@section('main')
  <div class="row">
    <div class="date_link col s12">
      <div class="col s6 left-align">
        <p class="backlink"><a class="backlink" href="">戻る</a></p>
      </div>
      <div class="col s6 right-align">
        <p class="date">2017/xx/yy</p>
      </div>
    </div>

    <div class="event-title">
      <h1 class="title">Event Title</h1>
    </div>

    <div class="article-image">
      <img class="image-box" width="100%" src="/images/sample-1.jpg">
    </div>

    <div class="text-area">
      <p class="main-contents-text">@for ($i=0; $i < 30; $i++)
        ここにイベント詳細文を表示
      @endfor</p>

      <p class="schedule">
        開催日時 : 2017/xx/yy ~ 2017/xx/yy
      </p>
    </div>
    <div class="border"></div>




  </div>
@endsection

@section('script')

@endsection
