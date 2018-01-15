@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
    <link rel="stylesheet" href="/css/manage/edit.css">
@endsection

@section('breadcrumb')
  <a href="{{ route('manager_crawl_home') }}" class="breadcrumb">クローラーホーム</a>
  <a href="{{ route('manager_crawl_detail',$id) }}" class="breadcrumb">詳細</a>
  <a href="{{ route('manager_crawl_edit',$id) }}" class="breadcrumb">編集</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">クローラーログ編集</h1>
        </div>
        <form action="" method="POST">
            <div class="main-content">
                <table>
                    <thead>
                    <tr>
                        <th class="th-box">担当者</th>
                        <td class="td-box">
                          <input type="text" class="validate" name=""
                                 value="{{ }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">開始時刻</th>
                        <td class="td-box input-field">
                          <input type="text" class="timepicker" name="t-set" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">終了時間</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name=""
                                   value="">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">実行状態</th>
                        <td class="td-box input-field">
                          <input type="text" class="validate" name=""
                                 value="{{ }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">追加記事数</th>
                        <td class="td-box input-field">
                          <input type="text" class="validate" name=""
                                 value="{{ }}">
                        </td>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="btn-box col s12">
                <div class="col s6 center">
                    <a href="{{ route('manager_crawl_detail',$id) }}"
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

        $('.timepicker').pickatime({
            default: 'now', // Set default time: 'now', '1:30AM', '16:30'
            fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
            twelvehour: false, // Use AM/PM or 24-hour format
            donetext: 'OK', // text for done-button
            cleartext: 'Clear', // text for clear-button
            canceltext: 'Cancel', // Text for cancel-button
            autoclose: false, // automatic close timepicker
            ampmclickable: true, // make AM PM clickable
            aftershow: function () {
            } //Function for after opening timepicker
        });


        $(function () {
            var setFileInput = $('.imgInput'),
                setFileImg = $('.imgView');
            setFileInput.each(function () {
                var selfFile = $(this),
                    selfInput = $(this).find('input[type=file]'),
                    prevElm = selfFile.find(setFileImg),
                    orgPass = prevElm.attr('src');
                selfInput.change(function () {
                    var file = $(this).prop('files')[0],
                        fileRdr = new FileReader();
                    if (!this.files.length) {
                        prevElm.attr('src', orgPass);
                        return;
                    } else {
                        if (!file.type.match('image.*')) {
                            prevElm.attr('src', orgPass);
                            return;
                        } else {
                            fileRdr.onload = function () {
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
