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
        @for ($i=1; $i < 7; $i++)
          <div class="col s12">
            <div class="change card horizontal">
                <div class="card-image">
                  <a href="/event/1000"><img src="/images/sample-{{ $i }}.jpg"></a>
                </div>
                <div class="card-stacked">
                  <div class="card-content">
                    <span class="card-title">Card Title</span>
                    <p>ここにイベント情報の一部を表示ここにイベント情報の一部を表示ここにイベント情報の一部を表示ここにイベント情報の一部を表示ここにイベント情報の一部を表示ここにイベント情報の一部を表示</p>
                  </div>
                  <div class="card-action">
                    <span class="date">掲載期間 2017/XX/YY ~ 2017/XX/YY</span>
                    <span class="people">xx/50</span>
                  </div>
                </div>
            </div>
          </div>
        @endfor
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
