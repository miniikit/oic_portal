@extends('template.master')

@section('css')
  <link rel="stylesheet" href="/css/auth/confirm.css">
@endsection

@section('main')

<div class="contents">
  <form role="form" class="col s12" method="POST" action="{{ url('/register/complete') }}">
    {{ csrf_field() }}
  <table>
    <tr>
      <th><p class="title">氏名</p></th>
      <td>
        <p class="ans">{{ $data['name'] }}</p>
        <input type="hidden" name="name" value="{{ $data['name'] }}">
      </td>
    </tr>
    <tr>
      <th><p class="title">フリガナ</p></th>
      <td>
        <p class="ans">{{ $data['kana'] }}</p>
        <input type="hidden" name="kana" value="{{ $data['kana'] }}">
      </td>
    </tr>
    <tr>
      <th><p class="title">メールアドレス</p></th>
      <td>
        <p class="ans">{{ $data['email'] }}</p>
        <input type="hidden" name="email" value="{{ $data['email'] }}">
      </td>
    </tr>
    <tr>
      <th><p class="title">学年</p></th>
      <td>
        <p class="ans">{{ $data['sc_year'] }}</p>
        <input type="hidden" name="sc_year" value="{{ $data['sc_year'] }}">
      </td>
    </tr>
    <tr>
      <th><p class="title">クラス</p></th>
      <td>
        <p class="ans">{{ $data['sc_class'] }}</p>
        <input type="hidden" name="sc_class" value="{{ $data['sc_class'] }}">
      </td>
    </tr>
    <tr>
      <th><p class="title">学科</p></th>
      <td>
        <p class="ans">{{ $data['major'] }}</p>
        <input type="hidden" name="major" value="{{ $data['major'] }}">
      </td>
    </tr>
    <tr>
      <th><p class="title">コース</p></th>
      <td>
        <p class="ans">{{ $data['course'] }}</p>
        <input type="hidden" name="course" value="{{ $data['course'] }}">
      </td>
    </tr>
    <tr>
      <th><p class="title">ポートフォリオ</p></th>
      <td>
        <p class="ans">{{ $data['portfolio'] }}</p>
        <input type="hidden" name="portfolio" value="{{ $data['portfolio'] }}">
      </td>
    </tr>
    <tr>
      <th><p class="title">自己紹介</p></th>
      <td>
        <p class="ans">{{ $data['introduction'] }}</p>
        <input type="hidden" name="introduction" value="{{ $data['introduction'] }}">
      </td>
    </tr>
  </table>

  <div class="row">
    <div class="col s6 center"><button type="button" class="waves-effect waves-light btn" onclick="history.back()">修正</button></div>
    <div class="col s6 center"><button type="submit" class="waves-effect waves-light btn">登録</button></div>
  </div>
  </form>
</div>

@endsection
