@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/index/top.css">
@endsection

@section('nav-tab')
  <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a class="active" href="#tab1">新着ニュース</a></li>
        <li class="tab"><a href="#tab2">ランキング</a></li>
        <li class="tab"><a href="#tab3">ジャンル１</a></li>
        <li class="tab"><a href="#tab4">ジャンル２</a></li>
      </ul>
    </div>
@endsection

@section('main')
  <div id="tab1" class="col s12">
      <div class="row">
        @for ($i=0; $i < 9; $i++)
        <div id="tab1" class="col s4">
            <div class="card">
              <div class="card-image">
                <a href="details"><img src="images/sample-1.jpg"></a>
                <span class="card-title">記事タイトル</span>
              </div>
              <div class="card-content">
                <p>ここに記事の内容の一部を表示</p>
              </div>
              <div class="card-action">
                <a href="#">This is a link</a>
              </div>
            </div>
        </div>
        @endfor
      </div>

  <div id="tab2" class="col s12">
    ニュースを表示
  </div>

  <div id="tab3" class="col s12">
    Test 3
  </div>

  <div id="tab4" class="col s12">
    コミュニティを表示
  </div>
@endsection

@section('script')
  <script type="text/javascript">
    $(".button-collapse").sideNav();
  </script>
@endsection
