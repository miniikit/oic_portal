@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/auth/complete.css">
@endsection

@section('main')

<div class="content">
  <div class="center-align">
    <div class="content_title">
      <p class="title">ようこそ</p>
    </div>
    <div class="content_text">
      <p class="text">登録完了しました</p>
      <p class="text_1">あなたのアカウント名はaaaaaaです</p>
    </div>
    <div class="but">
        <div class="re_b"><button type="submit" class="submit-btn waves-effect waves-light btn">トップ</button></div>
    </div>
  </div>
</div>



@endsection
