@extends('template/master')

@section('css')
  <link rel="stylesheet" href="/css/articles/details.css">
@endsection

@section('main')
  <div class="row">

      <div class="col s12 m8 l9">
        <div class="rap">
          <div class="col s12 m6 l7">
              <p>2017/xx/yy</p>
          </div>
          <div class="col s12 m6 l5">
              <p class="backlink"><a href="#">back</a></p>
          </div>
        </div>

        <div class="page-title">
          <h1>Title</h1>
        </div>

        <div class="article-image">
          <img class="image-box" width="100%" src="images/sample-1.jpg">
        </div>

        <div class="text">
          <p>仮想通貨Bitcoin(ビットコイン)のマイニングで利益を得るには、高性能な専用マシンを使うのが必須で、さらには電力コストを抑えるために電気代の安い国に拠点を構えることが求められます。マイナーたちが軍拡競争のような熾烈なサバイバルを繰り広げる中で、システムを維持するためのマイニングに必要なエネルギーが高まり続ける状況は、将来的にビットコインシステムの維持そのものを不可能にすると指摘されています。</p>
        </div>

        <div class="comment">
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s11">
                  <i class="material-icons prefix">mode_edit</i>
                  <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                  <label for="icon_prefix2">コメント</label>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="comment-area col s12 center-align">
          <div class="col s2">
            <img class="square" src="images/sample-icon.jpg">
          </div>
          <div class="col s10">
            <h4 class="comment-text">ここにコメントを表示</h4>
          </div>
        </div>

      </div>

      <div class="col s12 m4 l3">
        <div class="row">

          <div class="backnumber">
            <ul>
              <li>
                <div class="card horizontal">
                  <div class="card-image">
                    <img src="https://lorempixel.com/100/190/nature/6">
                  </div>
                  <div class="card-stacked">
                    <div class="card-content">
                      <p>I am a very simple card. I am good at containing small bits of information.</p>
                    </div>
                    <div class="card-action">
                      <a href="#">This is a link</a>
                    </div>
                  </div>
                </div>
              </li>
              <li></li>
              <li></li>
              <li></li>
              <li></li>
            </ul>
          </div>

        </div>
      </div>

  </div>

  <div class="pager">
    <ul class="pagination">
      <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
      <li class="active"><a href="#!">1</a></li>
      <li class="waves-effect"><a href="#!">2</a></li>
      <li class="waves-effect"><a href="#!">3</a></li>
      <li class="waves-effect"><a href="#!">4</a></li>
      <li class="waves-effect"><a href="#!">5</a></li>
      <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
  </div>


@endsection
