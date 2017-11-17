@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/articles/details.css">
@endsection

@section('main')
  <div class="row">

      <div class="col s12 m8 l9">
          <div class="date_link col s12">
              <p>2017/xx/yy</p>
          </div>

        <div class="page-title">
          <h1 class="title">Title</h1>
        </div>

        <div class="article-image">
          <img class="image-box" width="100%" src="/images/sample-1.jpg">
        </div>

        <div class="text-area">
          <p class="main-contents-text">仮想通貨Bitcoin(ビットコイン)のマイニングで利益を得るには、高性能な専用マシンを使うのが必須で、さらには電力コストを抑えるために電気代の安い国に拠点を構えることが求められます。マイナーたちが軍拡競争のような熾烈なサバイバルを繰り広げる中で、システムを維持するためのマイニングに必要なエネルギーが高まり続ける状況は、将来的にビットコインシステムの維持そのものを不可能にすると指摘されています。
          仮想通貨Bitcoin(ビットコイン)のマイニングで利益を得るには、高性能な専用マシンを使うのが必須で、さらには電力コストを抑えるために電気代の安い国に拠点を構えることが求められます。マイナーたちが軍拡競争のような熾烈なサバイバルを繰り広げる中で、システムを維持するためのマイニングに必要なエネルギーが高まり続ける状況は、将来的にビットコインシステムの維持そのものを不可能にすると指摘されています。</p>
        </div>

        <div class="border"></div>

        <div class="icon-button col s12 right-align">
          <a class="fav-btn waves-effect">
            <i class="goodicon material-icons">favorite</i>
          </a>
          <a class="good-btn waves-effect">
            <i class="goodicon material-icons" id="counter">thumb_up</i>
            <label for="conter">1000</label>
          </a>
        </div>

        <div class="comment col s12">
          <ul class="collection">
            <li class="collection-item avatar">
              <img src="/images/sample-icon2.jpg" alt="" class="circle">
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
            @for ($i = 0; $i < 8; $i++)
              <li class="collection-item avatar">
                <img src="/images/sample-icon2.jpg" alt="" class="circle">
                <span class="name">name</span>
                <p>
                  ここにコメントを表示
                </p>
              </li>
            @endfor
         </ul>
        </div>

      </div>

      <div class="col s12 m4 l3">
        <div class="side row">
          <div class="card-panel teal white center">
            <h2>関連記事</h2>
          </div>
          @for ($i=0; $i < 3; $i++)
            <div class="relation card">
                <div class="card-image">
                  <a href="details"><img src="/images/sample-2.jpg"></a>
                </div>
                <div class="card-contents">
                  <p class="side-contents-text">ミニスーファミにやりたいゲームが入ってない！って方に、同じくらいの値段で買えるSFC用のレトロフリーク</p>
                </div>
            </div>
          @endfor
        </div>
      </div>

      <div class="col s12 m4 l3">
        <div class="side row">
          <div class="card-panel teal white center">
            <h2>ランキング</h2>
          </div>
          @for ($i=0; $i < 3; $i++)
            <div class="relation card">
                <div class="card-image">
                  <a href="details"><img src="/images/sample-3.jpg"></a>
                </div>
                <div class="card-contents">
                  <p class="side-contents-text">ミニスーファミにやりたいゲームが入ってない！って方に、同じくらいの値段で買えるSFC用のレトロフリーク</p>
                </div>
            </div>
          @endfor
        </div>
      </div>

  </div>

  <div class="pager">
    <ul class="pagination">
      <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
      <li class="active"><a href="#!">1</a></li>
      <li class="waves-effect"><a href="#!">2</a></li>
      <li class="waves-effect"><a href="#!">3</a></li>
      <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
  </div>

@endsection

@section('script')
  <script type="text/javascript">
    $('#icon_prefix2').trigger('autoresize');

    // $(document).ready(function() {
    // $('textarea#icon_prefix2').characterCounter();
  // });
  </script>
@endsection
