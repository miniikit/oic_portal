@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/articles/confirm.css">
@endsection

@section('main')
  <div class="content">
    <form class="col s10" method="POST" action="{{ url('/articles/user/edit/complete') }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="title-box">
        <p class="title">記事プレビュー</p>
      </div>
        <div class="row">
        <div class="date_link col s12">
          <p>{{ date('Y-m-d H:i' ,strtotime($carbon)) }}</p>
        </div>

        <div class="page-title">
          <h1 class="title">{{ $data['article_title'] }}</h1>
          <input type="hidden" name="article_title" value="{{ $data['article_title'] }}">
        </div>

        <div class="article-image">
          <img class="image-box" width="100%" src="{{ $articles_image }}">
          <input type="hidden" name="article_image" value="{{ $articles_image }}">
        </div>

        <div class="text-area">
          <p class="main-contents-text">{{ $data['article_text'] }}</p>
          <input type="hidden" name="article_text" value="{{ $data['article_text'] }}">
          </div>

          <input type="hidden" name="category" value="{{ $data['category'] }}">
          <input type="hidden" name="article_id" value="{{ $data['article_id'] }}">

          <div class="border"></div>

          <div class="icon-button col s12 right-align">
            <a class="fav-btn waves-effect">
              <i class="goodicon material-icons">favorite</i>
            </a>
            <a class="good-btn waves-effect">
              <i class="goodicon material-icons" id="counter">thumb_up</i>
            </a>
          </div>
        </div>
      <div class="row">
          <div class="col s6 right-align"><button type="button" class="back-btn waves-effect waves-light btn" onclick="history.back()">戻る</button></div>
          <div class="col s6 left-align"><button type="submit" class="send-btn waves-effect waves-light btn">送信</button></div>
      </div>
    </form>
    </div>

@endsection
