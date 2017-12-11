@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
    <link rel="stylesheet" href="/css/manage/edit.css">
@endsection

@section('breadcrumb')
  <a href="#!" class="breadcrumb">Second</a>
  <a href="#!" class="breadcrumb">Third</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">記事詳細</h1>
        </div>
        <form action="{{ route('manager_event_update',$id) }}" method="POST">
            <div class="main-content">
                <table>
                    <thead>
                    <tr>
                        <th class="th-box">イベント名</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="name"
                                   value="{{ old('name',$event->event_title) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">イベント詳細</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="detail"
                                   value="{{ old('detail',$event->event_text) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">イベント画像</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="image"
                                   value="{{ old('image',$event->event_image) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">イベント開始日時</th>
                        <td class="td-box input-field">
                            <input type="datetime-local" class="validate" name="event_start_date_time"
                                   value="{{ old('event_start_date_time',\Carbon\Carbon::setToStringFormat($event->event_start_date_time)) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">イベント終了日時</th>
                        <td class="td-box input-field">
                            <input type="datetime-local" class="validate" name="event_end_date_time"
                                   value="{{ old('event_end_date_time',$event->event_end_date_time) }}">
                        </td>
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
                    <a href="{{ route('manager_event_detail',$id) }}" class="back-btn waves-effect waves-light btn">戻る</a>
                </div>
                <div class="col s6 center">
                    <button type="submit" class="edit-btn waves-effect waves-light btn">更新</button>
                </div>
            </div>
            {{ csrf_field() }}
        </form>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });
    </script>
@endsection
