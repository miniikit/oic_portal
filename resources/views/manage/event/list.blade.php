@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/managetemplete.css">
@endsection

@section('main')
  <div class="row">
    <div class="title-box center">
      <h1 class="title">イベント管理</h1>
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
              <th class="tb-title">イベントタイトル</th>
              <th class="tb-title">予定日</th>
              <th class="tb-title">作成者</th>
              <th class="tb-title">定員</th>
              <th class="tb-title"></th>
          </tr>
        </thead>

        <tbody>
          @foreach($events as $event)
            <tr data-href="{{ route('manager_event_detail',1) }}">
                <td class="tb-text">{{ $event->id }}</td>
                <td class="tb-text">{{ $event->event_title }}</td>
              <td class="tb-text">{{ date('Y年m月d日 H時i分' ,strtotime($event->event_start_date_time)) }}</td>
                <td class="tb-text">{{ $event->name }}</td>
                <td class="tb-text">{{ $event->event_capacity }}名</td>
              <td class="tb-btn"><a class="del-btn waves-effect waves-light btn">削除</a></td>
            </tr>
          @endforeach
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
