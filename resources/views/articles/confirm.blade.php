@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/articles/confirm.css">
@endsection

@section('main')
  <div class="content">
    <div>
      <p class="title">確認画面</p>
    </div>
      <form>
        <div class="row">
        <div class="date_link col s12">
          <div class="col s6">
            <p class="backlink"><a class="backlink">戻る</a></p>
          </div>
          <div class="col s6 right-align">
            <p class="date">2017/xx/yy</p>
          </div>
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
        </div>
      </form>
      <div class="row">
          <div class="col s6 right-align"><button type="button" class="waves-effect waves-light btn">戻る</button></div>
          <div class="col s6 left-align"><button type="submit" class="waves-effect waves-light btn">送信</button></div>
      </div>
    </div>

@endsection
