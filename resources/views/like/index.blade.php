@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/like/like.css">
@endsection

@section('main')

  <div class="row center-align">
    <h1 class="title">
      お気に入り
    </h1>
  </div>

  <div class="row">
    <form class="edit" action="" method="post">
      <div class="delete col s12 right-align">
        <a id="delete-btn" class="waves-effect waves-light btn">削除</a>
        <a id="edit-btn" class="waves-effect waves-light btn">編集</a>
      </div>
    @for ($i=1; $i< 7; $i++)
    <div class="card-box col s4">
      <div class="card" id="check">
        <div class="card-wrapper">
          <div class="card-image">
            <a href="details"><img src="images/sample-{{ $i }}.jpg"></a>
            <span class="card-title">記事タイトル</span>
          </div>
          <div class="card-content">
            <p class="card-text">ここに記事の内容の一部を表示 ここに記事の内容の一部を表示 ここに記事の内容の一部を表示 ここに記事の内容の一部を表示</p>
          </div>
          <div class="card-action">
            <ul class="sub-content">
              <li class="sub-content-1">
                <i class="goodicon tiny material-icons" id="counter">thumb_up</i>
                <label class="showcounter" for="counter">100</label>
              </li>
              <li class="sub-content-2">
                <i class="goodicon tiny material-icons" id="counter">remove_red_eye</i>
                <label class="showcounter" for="counter">1000</label>
              </li>
              <li id="oncheck"class="sub-content-3">
                <input type="checkbox" id="check{{ $i }}">
                <label for="check{{ $i }}"></label>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <a href="#"></a>
    </div>
    @endfor
  </form>
  </div>
</div>

@endsection

@section('script')
  <script type="text/javascript">
  $(window).load(function (){
    $('#delete-btn').hide();
  });
  </script>

  <script type="text/javascript">
  $(function() {
    $('#edit-btn').click(function(){
        $('#oncheck').toggle();
        $('#delete-btn').toggle();
    });
  });
  </script>
@endsection
