@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/event/event.css">
@endsection

@section('main')

  <div class="row center-align">
    <h1 class="title">
      イベント
    </h1>
  </div>

  <div class="c_but">
    <a href="{{ route('user_event_create') }}" class="add_btn btn-floating btn-large waves-effect waves-light"><i class="material-icons">add</i></a>
  </div>

  <div class="row">
      <form class="col s12">
          <div class="input-field">
              <input id="search1" class="center" type="search" required>
              <label class="label-icon" for="search1"><i class="material-icons">search</i></label>
              <i class="material-icons">close</i>
          </div>
      </form>

      <div class="sort-box input-field col s4">
        <select>
          <option value="" disabled selected>並び替え</option>
          <option value="1">新着順</option>
          <option value="2">人気順</option>
        </select>
      </div>
      <div class="sort-box input-field col s4">
        <select>
          <option value="" disabled selected>ジャンル</option>
          <option value="1">情報処理IT</option>
          <option value="2">ゲーム</option>
          <option value="3">CG・映像・アニメーション</option>
          <option value="4">デザイン・Web</option>
        </select>
      </div>
      <div class="sort-box input-field col s4">
        <select>
          <option value="" disabled selected>開催状態</option>
          <option value="1">未開催</option>
          <option value="2">開催済みを含める</option>
        </select>
      </div>

      <div class="row">
        @foreach($events as $event)
          <div class="col s12">
            <div class="change card hoverable horizontal">
                <div class="card-image">
                  <a href="{{ route('user_event_detail') }}"><img src="{{ $event->event_image }}"></a>
                </div>
                <div class="card-stacked">
                  <a href="{{ route('user_event_detail') }}"></a>
                  <div class="card-content">
                    <span class="card-title">{{ $event->event_title }}</span>
                    <p class="card-sentence">{{ $event->event_text }}</p>
                    <span class="date">掲載期間 {{ $event->event_start_date_time }} ~ {{ $event->event_end_date_time }}</span>
                  </div>
                  <div class="card-action">
                    <div class="join">
                      <p>参加人数 {{ $event->num }}/{{ $event->event_capacity }}</p>
                    </div>
                    <div class="tags">
                        <div class="chip">
                            IT
                        </div>
                        <div class="chip">
                            デザイン
                        </div>
                        <div class="chip">
                          映像
                        </div>
                        <div class="chip">
                          ゲーム
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="pager center">
        <ul class="pagination">
          <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
          <li class="active"><a href="#!">1</a></li>
          <li class="waves-effect"><a href="#!">2</a></li>
          <li class="waves-effect"><a href="#!">3</a></li>
          <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
      </div>

  </div>

@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
  });

  $(window).ready(function(){
    var w = $(window).width();
    var x = 800;
    if (w <= x) {
        $('.change').removeClass("horizontal");
    } else {
        $('.change').addClass("horizontal");
    }
  });
</script>

@endsection
