@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/home.css">
  <link rel="stylesheet" href="/css/manage/managetemplete.css">
@endsection

@section('breadcrumb')
  <a href="{{ route('manager_home') }}" class="breadcrumb">通知一覧</a>
@endsection

@section('main')
  <div class="row">
    <div class="title-box center">
      <h1 class="title">各種通知</h1>
    </div>
    <div class="col s12 m8 l9">
      <div class="main-content">
      {{-- ここにメインコンテンツ --}}
      <div class="col s12">
        <form>
            <div class="input-field">
                <input id="search1" class="center" type="search" required>
                <label class="label-icon" for="search1"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>
      </div>
      <div class="table-wrp">
        <table class="table-area">
          <thead>
            <tr>
                <th class="tb-title">ID</th>
                <th class="tb-title">カテゴリ</th>
                <th class="tb-title">会員ID</th>
                <th class="tb-title">通報内容</th>
                <th class="tb-title">対処状態</th>
            </tr>
          </thead>

          <tbody>
            @for ($i=0; $i < 30; $i++)
              <tr data-href="{{ route('manager_detail') }}">
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

    <div class="col s12 m4 l3">
      {{-- ここにグラフなどのコンテンツ --}}
      <div class="side-content card-panel teal">
          <span class="white-text">

          </span>
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
