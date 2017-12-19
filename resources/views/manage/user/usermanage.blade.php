@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/managetemplete.css">
@endsection

@section('main')
  <div class="row">
    <div class="title-box center">
      <h1 class="title">ユーザ一覧</h1>
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
      <table class="table">
        <thead>
          <tr>
              <th class="tb-title">ID</th>
              <th class="tb-title">ユーザ名</th>
              <th class="tb-title">フリガナ</th>
              <th class="tb-title">ユーザ画像</th>
              <th class="tb-title">学科</th>
              <th class="tb-title">入学年度</th>
              <th class="tb-title">ポートフォリオ</th>
              <th class="tb-title">自己紹介</th>
          </tr>
        </thead>

        <tbody>
          @for ($i=0; $i < 30; $i++)
            <tr data-href="{{ route('manager_user_detail',1) }}">
              <td class="tb-text">ここに内容</td>
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
