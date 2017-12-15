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

        <form action="{{ route('manager_event_update',$id) }}" method="POST">
            <div class="main-content">
                <table>
                    <thead>
                    <tr>
                        <th class="th-box">イベント名</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="event_name"
                                   value="{{ old('event_title',$event->event_title) }}" required >
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
                            <img class="imgView" src="{{ old('event_image',$event->event_image) }}">
                            <input class="validate" type="file" id="getfile" name="event_image" required>
                            <div class="">※ 拡張子: jpg jpeg</div>
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
                        <td class="td-box" required>{{ $eventParticipant }} / {{ $event->event_capacity }} 人</td>
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

        $(function(){
            var setFileInput = $('.imgInput'),
                setFileImg = $('.imgView');
            setFileInput.each(function(){
                var selfFile = $(this),
                    selfInput = $(this).find('input[type=file]'),
                    prevElm = selfFile.find(setFileImg),
                    orgPass = prevElm.attr('src');
                selfInput.change(function(){
                    var file = $(this).prop('files')[0],
                        fileRdr = new FileReader();
                    if (!this.files.length){
                        prevElm.attr('src', orgPass);
                        return;
                    } else {
                        if (!file.type.match('image.*')){
                            prevElm.attr('src', orgPass);
                            return;
                        } else {
                            fileRdr.onload = function() {
                                prevElm.attr('src', fileRdr.result);
                            }
                            fileRdr.readAsDataURL(file);
                        }
                    }
                });
            });
        });
    </script>
@endsection
