@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/detail.css">
@endsection

@section('main')
  <div class="row">
    <div class="title-box center">
      <h1 class="title">各種通知</h1>
    </div>
    <div class="main-content">
      <table>
        <thead>
            <tr>
              <th class="th-box">ID</th>
              <td class="td-box">ここに内容</td>
            </tr>
            <tr>
              <th class="th-box">カテゴリ</th>
              <td class="td-box">ここに内容</td>
            </tr>
            <tr>
              <th class="th-box">会員ID</th>
              <td class="td-box">ここに内容</td>
            </tr>
            <tr>
              <th class="th-box">通報内容</th>
              <td class="td-box">ここに内容</td>
            </tr>
            <tr>
              <th class="th-box">対処状態</th>
              <td class="td-box">ここに内容</td>
            </tr>
        </thead>
      </table>
    </div>
  </div>
@endsection

@section('script')

@endsection
