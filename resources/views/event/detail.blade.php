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

    <div class="event-image">
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

    <div class="event-info col s12">
      <ul class="collapsible" data-collapsible="expandable">
        <li>
          <div class="collapsible-header"><i class="material-icons">date_range</i>日程</div>
          <div class="collapsible-body">
            <span>ここに日程</span>
          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">place</i>開催場所</div>
          <div class="collapsible-body">
            <span>ここにgoogle map</span>
          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">person</i>管理者</div>
          <div class="collapsible-body">
            <span>ここに管理者</span>
          </div>
        </li>
        <li>
          <div class="collapsible-header"><i class="material-icons">person_outline</i>参加者</div>
          <div class="collapsible-body">
            <span>ここに参加者</span>
          </div>
        </li>
      </ul>
    </div>

    <div class="comment col s12">
      <ul class="collection">
        <li class="collection-item avatar">
          <img src="/images/sample-icon1.jpg" alt="" class="circle">
          <span class="name">name</span>
          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
          <div class="wap-comment">
            <a class="comment-submit waves-effect waves-light btn">コメント</a>
          </div>
        </li>
      </ul>
    </div>

    <div class="comment-area col s12">
      <ul class="collection">
        @for ($i = 0; $i < 5; $i++)
          <li class="collection-item avatar">
            <img src="/images/sample-icon1.jpg" alt="" class="circle">
            <span class="name">name</span>
            <p>
              ここにコメントを表示
            </p>
          </li>
        @endfor
     </ul>
    </div>

  </div>
@endsection

@section('script')

@endsection
