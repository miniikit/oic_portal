@extends('template/manage')

@section('css')
  <link rel="stylesheet" href="/css/manage/detail.css">
@endsection

@section('main')
  <div class="row">
    <div class="title-box center">
      <h1 class="title">サイト詳細</h1>
    </div>
    <div class="main-content">
      <table>
        <thead>
            <tr>
              <th class="th-box">イベント名</th>
              <td class="td-box">{{ $event->event_title }}</td>
            </tr>
            <tr>
              <th class="th-box">イベント詳細</th>
              <td class="td-box">{{ $event->event_text }}</td>
            </tr>
            <tr>
              <th class="th-box">イベント画像</th>
              <td class="td-box">{{ $event->event_image }}</td>
            </tr>
            <tr>
              <th class="th-box">イベント開始日時</th>
              <td class="td-box">{{ date('Y年 m月 d日  H時i分' ,strtotime($event->event_start_date_time)) }}</td>
            </tr>
            <tr>
              <th class="th-box">イベント終了日時</th>
              <td class="td-box">{{ date('Y年 m月 d日  H時i分' ,strtotime($event->event_end_date_time)) }}</td>
            </tr>
            <tr>
              <th class="th-box">イベント参加者数</th>
              <td class="td-box">{{ $eventParticipant }} / {{ $event->event_capacity }} 人</td>
            </tr>
        </thead>
      </table>
    </div>
    <div class="btn-box col s12">
      <div class="col s6 center">
        <a class="back-btn waves-effect waves-light btn" href="{{ route('manager_event_list') }}">戻る</a>
      </div>
      <div class="col s6 center">
        <a class="edit-btn waves-effect waves-light btn" href="{{ route('manager_event_edit',$id) }}">編集</a>
      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection
