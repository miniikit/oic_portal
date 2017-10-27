@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/articles/details.css">
@endsection

@section('main')
  <div class="row">

      <div class="col s12 m8 l9">
          <div class="date_link col s12">
            <div class="col s6">
              <p class="date">2017/xx/yy</p>
            </div>
            <div class="col s6">
              <p class="backlink"><a class="backlink" href="/top">back</a></p>
            </div>
          </div>

        <div class="page-title">
          <h1 class="title">Title</h1>
        </div>

        <div class="article-image">
          <img class="image-box" width="100%" src="images/sample-1.jpg">
        </div>

        <div class="text-area">
          {{-- <img class="text-image" src="images/" alt=""> --}}
          <p class="main-contents-text">仮想通貨Bitcoin(ビットコイン)のマイニングで利益を得るには、高性能な専用マシンを使うのが必須で、さらには電力コストを抑えるために電気代の安い国に拠点を構えることが求められます。マイナーたちが軍拡競争のような熾烈なサバイバルを繰り広げる中で、システムを維持するためのマイニングに必要なエネルギーが高まり続ける状況は、将来的にビットコインシステムの維持そのものを不可能にすると指摘されています。
          仮想通貨Bitcoin(ビットコイン)のマイニングで利益を得るには、高性能な専用マシンを使うのが必須で、さらには電力コストを抑えるために電気代の安い国に拠点を構えることが求められます。マイナーたちが軍拡競争のような熾烈なサバイバルを繰り広げる中で、システムを維持するためのマイニングに必要なエネルギーが高まり続ける状況は、将来的にビットコインシステムの維持そのものを不可能にすると指摘されています。</p>
        </div>

        <div class="comment">
          <div class="input-text col s12">
            <div class="col s2">
              <img class="account-image circle" src="images/sample-icon2.jpg">
            </div>
            <form class="col s10">
                <div class="input-field">
                  {{-- <img class="main-image circle" src="images/sample-icon2.jpg"> --}}
                  <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                  <label for="icon_prefix2">コメント</label>
                </div>
            </form>
          </div>
        </div>

        @for ($i=0; $i < 5; $i++)
          <div class="comment-area col s12 center-align">
            <div class="col s2">
              <img class="circle" src="images/sample-icon2.jpg">
            </div>
            <div class="col s10">
              <div class="comment-areasub row left-align">
                <h4 class="comment-text">ここにコメントを表示ここにコメントを表示ここにコメントを表示ここにコメントを表示ここにコメントを表示ここにコメントを表示ここにコメントを表示</h4>
              </div>
            </div>
          </div>
        @endfor
      </div>

      <div class="col s12 m4 l3">
        <div class="side row">
          <div class="card-panel teal white center">
            <h2>関連記事</h2>
          </div>
          @for ($i=0; $i < 3; $i++)
            <div class="relation card">
                <div class="card-image">
                  <a href="details"><img src="images/sample-2.jpg"></a>
                </div>
                <div class="card-contents">
                  <p class="side-contents-text">ミニスーファミにやりたいゲームが入ってない！って方に、同じくらいの値段で買えるSFC用のレトロフリーク</p>
                </div>
                {{-- <div class="card-action">
                  <a href="#">This is a link</a>
                </div> --}}
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
                  <a href="details"><img src="images/sample-3.jpg"></a>
                </div>
                <div class="card-contents">
                  <p>ミニスーファミにやりたいゲームが入ってない！って方に、同じくらいの値段で買えるSFC用のレトロフリーク</p>
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
