@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/managetemplete.css">
@endsection

@section('breadcrumb')
  <a href="{{ route('manager_community_list') }}" class="breadcrumb">コミュニティ一覧</a>
@endsection

@section('main')
  <div class="row">
    <div class="title-box center">
      <h1 class="title">コミュニティ管理</h1>
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
              <th class="tb-title">コミュニティ名</th>
              <th class="tb-title">コミュニティコンテンツ</th>
          </tr>
        </thead>

        <tbody>
          @for ($i=0; $i < 30; $i++)
            <tr data-href="{{ route('manager_community_detail',1) }}">
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
