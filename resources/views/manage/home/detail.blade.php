@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/detail.css">
@endsection

@section('breadcrumb')
  <a href="{{ route('manager_home') }}" class="breadcrumb">通知一覧</a>
  <a href="{{ route('manager_detail',1) }}" class="breadcrumb">通知詳細</a>
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

    <div class="comment col s12">
        <ul class="collection">
            <li class="collection-item avatar">
                <span class="name">name</span>
                <form method="">
                    <input type="text" id="icon_prefix2" class="materialize-textarea" name="comment_text" size="50">
                    <div class="wap-comment">
                        <input type="submit" value="コメント" class="comment-submit waves-effect waves-light btn">
                    </div>
                    {!! csrf_field() !!}
                </form>
            </li>
        </ul>
    </div>

    <div class="col s12">
      <div class="log-area card-panel teal white center">
        <h2 class="l-title">対処ログ</h2>
        <div class="log-a">
          @for ($i = 0; $i < 3; $i++)
            <h1 class="log-text">ここに対処コメントを表示ここに対処コメントを表示ここに対処コメントを表示</h1>
          @endfor
        </div>
      </div>
    </div>

    <div class="btn-box col s12">
      <div class="col s6 center">
        <a class="back-btn waves-effect waves-light btn">戻る</a>
      </div>
      <div class="col s6 center">
        <a href="{{ route('manager_report_update',1) }}" class="edit-btn waves-effect waves-light btn">更新</a>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection
