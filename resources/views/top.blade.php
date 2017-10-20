@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/top/top.css">
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
    <form>
      <div class="input-field">
            <input id="search" class="center" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
      </div>
    </form>
    <!-- Dropdown -->
    <div class="sort col s12 right-align">
      <a class='dropdown-button btn' href='#' data-activates='dropdown1'>並び替え</a>
      <ul id='dropdown1' class='dropdown-content'>
        <li><a href="#!">いいね順</a></li>
        <li><a href="#!">コメント順</a></li>
        <li><a href="#!">閲覧数順</a></li>
      </ul>
    </div>
    <!-- article tab1 -->
      <div class="row">
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
        <div id="tab1" class="col s4">
            <div class="card">
              <div class="card-image">
                <a href="details"><img src="images/sample-2.jpg"></a>
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
        <div id="tab1" class="col s4">
            <div class="card">
              <div class="card-image">
                <a href="details"><img src="images/sample-3.jpg"></a>
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
        <div id="tab1" class="col s4">
            <div class="card">
              <div class="card-image">
                <a href="details"><img src="images/sample-4.jpg"></a>
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
        <div id="tab1" class="col s4">
            <div class="card">
              <div class="card-image">
                <a href="details"><img src="images/sample-5.jpg"></a>
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
        <div id="tab1" class="col s4">
            <div class="card">
              <div class="card-image">
                <a href="details"><img src="images/sample-6.jpg"></a>
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
        <div id="tab1" class="col s4">
            <div class="card">
              <div class="card-image">
                <a href="details"><img src="images/sample-3.jpg"></a>
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
        <div id="tab1" class="col s4">
            <div class="card">
              <div class="card-image">
                <a href="details"><img src="images/sample-2.jpg"></a>
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

    $(".dropdown-button").dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false,
      hover: tr
      gutter:
      belowOrigin: false
      alignment: 'left',
      stopPropagation: false
    }
  );
  </script>
@endsection
