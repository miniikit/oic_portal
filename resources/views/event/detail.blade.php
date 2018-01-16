@extends('template.master')

@section('css')
    <link rel="stylesheet" href="/css/event/detail.css">
@endsection

@section('main')
    @include('flash::message')
    <div class="main-panel row">
        <div class="date_link col s12">
            <p class="date">{{ $event->created_at }}</p>
        </div>

        <div class="event-title">
            <h1 class="title">{{ $event->event_title }}</h1>
        </div>

        <div class="event-image">
            <img class="image-box" width="100%" src="{{ $event->event_image }}">
        </div>

        <div class="text-area">
            <p class="main-contents-text">{{ $event->event_text }}</p>
            <div class="join-button center">
                @if(!Auth::guest())
                    @if($active_participant == null)
                        <a class="join waves-effect waves-light btn"
                           href="{{ '/event/'.$event->id.'/participants' }}">参加する</a>
                    @else
                        <a class="join waves-effect waves-light btn"
                           href="{{ '/event/'.$event->id.'/unparticipants' }}">参加取り消し</a>
                    @endif
                @endif
            </div>
        </div>
        <div class="border"></div>

        <div class="event-info col s12">
            <ul class="collapsible" data-collapsible="expandable">
                <li>
                    <div class="collapsible-header"><i class="material-icons">date_range</i>日程</div>
                    <div class="collapsible-body">
                        <span>開催日時 : {{$event->event_start_date_time }} ~ {{$event->event_end_date_time }}</span>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>開催場所</div>
                    <div class="collapsible-body">
                        <span>{{$event->event_spot }}</span>
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
                        <span>{{ $participant_ct }}</span>
                    </div>
                </li>
            </ul>
        </div>

        <!--
      <div class="comment col s12">
        <ul class="collection">
          <li class="collection-item avatar">
            <img src="/images/profile_images/default.jpg" alt="" class="circle">
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
            <li class="collection-item avatar">
              <img src="/images/profile_images/default.jpg" alt="" class="circle">
              <span class="name">name</span>
              <p>
                ここにコメントを表示
              </p>
            </li>
       </ul>
      </div>
      -->

    </div>
@endsection

@section('script')

@endsection
