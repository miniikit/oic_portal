@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/detail.css">
@endsection

@section('breadcrumb')
  <a href="#!" class="breadcrumb">Second</a>
@endsection


@section('main')
  <div class="row">
    <div class="title-box center">
      <h1 class="title">記事詳細</h1>
    </div>
    <div class="main-content">
      <table>
        <thead>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box">ここに内容</td>
            </tr>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box">ここに内容</td>
            </tr>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box">ここに内容</td>
            </tr>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box">ここに内容</td>
            </tr>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box">ここに内容</td>
            </tr>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box">ここに内容</td>
            </tr>
            <tr>
              <th class="th-box">ここにタイトル</th>
              <td class="td-box">ここに内容</td>
            </tr>
        </thead>
      </table>
    </div>
    <div class="btn-box col s12">
      <div class="col s6 center">
        <a class="back-btn waves-effect waves-light btn">戻る</a>
      </div>
      <div class="col s6 center">
        <a class="edit-btn waves-effect waves-light btn">編集</a>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection
