@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/managetemplete.css">
@endsection

@section('main')
  <div class="row">
    <div class="title-box center">
      <h1 class="title">記事管理</h1>
    </div>
    <div class="main-content col s12">
      <form>
          <div class="input-field">
              <input id="search1" class="center" type="search" required>
              <label class="label-icon" for="search1"><i class="material-icons">search</i></label>
              <i class="material-icons">close</i>
          </div>
      </form>
    <div class="table-wrp col s12">
      <table class="tb-table table">
        <thead class="center">
          <tr>
            <th class="tb-title">ID</th>
            <th class="tb-title">タイトル</th>
            <th class="tb-title">本文</th>
            <th class="tb-title">画像</th>
            <th class="tb-title">ジャンル</th>
            <th class="tb-title">記事URL</th>
            <th class="tb-title">公開・非公開</th>
          </tr>
        </thead>

        <tbody>
          @for ($i=0; $i < 30; $i++)
            <tr data-href="{{ route('manager_article_detail',1) }}">
              <td class="tb-text">ここに内容</td>
              <td class="tb-text">ここに内容</td>
              <td class="tb-text">ここに内容</td>
              <td class="tb-text">ここに内容</td>
              <td class="tb-text">ここに内容</td>
              <td class="tb-text">ここに内容</td>
              <td class="tb-text">ここに内容</td>
              <td class="tb-btn"><a class="del-btn waves-effect waves-light btn">削除</a></td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>
  </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript">
  jQuery(function($) {
  $('tr[data-href]').addClass('clickable')
    .click(function(e) {
      if(!$(e.target).is('a')){
        window.location = $(e.target).closest('tr').data('href');
      };
  });
  });
  </script>
@endsection
