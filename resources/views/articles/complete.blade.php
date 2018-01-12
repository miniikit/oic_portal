@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/articles/complete.css">
@endsection

@section('main')

<div class="row col s8">
  <div class="content">
    <div class="center-align">
      <p class="text">送信しました</p>
    </div>
  </div>
  <div class="row col s12">
    <div class="center-align"><a type="button" class="waves-effect waves-light btn" href="{{ route('user_home') }}">記事へ</a></div>
  </div>
</div>


@endsection
