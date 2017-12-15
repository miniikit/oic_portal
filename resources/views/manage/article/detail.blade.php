@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/detail.css">
@endsection

@section('breadcrumb')
  {{-- TODO : 記事IDのところを変数に変更する  --}}
  <a href="{{ route('manager_article_list') }}" class="breadcrumb">記事管理</a>
  <a href="{{ route('manager_article_detail',1) }}" class="breadcrumb">記事詳細</a>
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
        <a class="edit-btn waves-effect waves-light btn" href="/manage/article/{id}/edit">編集</a>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection
