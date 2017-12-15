@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
    <link rel="stylesheet" href="/css/manage/edit.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_event_list') }}" class="breadcrumb">イベント一覧</a>
    <a href="{{ route('manager_event_detail',$id) }}" class="breadcrumb">イベント詳細</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">イベント詳細</h1>
        </div>

        {{-- TODO : バリデーションエラーの表示 --}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('manager_event_update',$id) }}" method="POST" enctype="multipart/form-data">
            <div class="main-content">
                <table>
                    <thead>
                    <tr>
                        <th class="th-box">イベント名</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="event_name"
                                   value="{{ old('event_title',$event->event_title) }}" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">イベント詳細</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="event_text"
                                   value="{{ old('event_text',$event->event_text) }}" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">イベント画像</th>
                        <td class="td-box input-field imgInput">
                            <img id="preview" class="mb" src="{{ old('event_image',$event->event_image) }}" alt="">
                            <input type="file" id="getfile" name="event_image" value=""/>
                            <div class="caption mt">※ 横:366px 縦:223px 拡張子: jpg jpeg</div>
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">イベント開始日時</th>
                        <td class="td-box input-field">
                            <input type="datetime-local" class="validate" name="event_start_date_time"
                                   value="{{ old('event_start_date_time',$event->event_end_date_time) }}" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">イベント終了日時</th>
                        <td class="td-box input-field">
                            <input type="datetime-local" class="validate" name="event_end_date_time"
                                   value="{{ old('event_end_date_time',$event->event_end_date_time) }}" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">イベント参加者数</th>
                        <td class="td-box">{{ $eventParticipant }} 人</td>
                    </tr>
                    <tr>
                        <th class="th-box">イベント定員</th>
                        <td class="td-box" style="width: 100%;">
                            <div style="width: 50%;">
                                <input type="number" class="validate" name="event_capacity"
                                       value="{{ old('event_capacity',$event->event_capacity) }}" required>
                            </div>
                            <div style="width: 50%; float: left">
                                a
                            </div>
                        </td>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="btn-box col s12">
                <div class="col s6 center">
                    <a href="{{ route('manager_event_detail',$id) }}"
                       class="back-btn waves-effect waves-light btn">戻る</a>
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

        var file = document.querySelector('#getfile');
        file.onchange = function () {
            var fileList = file.files;
            //読み込み
            var reader = new FileReader();
            reader.readAsDataURL(fileList[0]);
            //読み込み後
            reader.onload = function () {
                document.querySelector('#preview').src = reader.result;
            };
        };
    </script>
@endsection
