@extends('template.master')

@section('css')
    <link rel="stylesheet" href="/css/event/creat.css">
@endsection

@section('main')

    <div class="content">
        <div class="page_title center-align">
            <h1 class="title">イベント作成</h1>
        </div>
        <form class="col s10" action="{{route('')}}" method="post">
            <div class="input-field col s12">
                <input placeholder="イベント名" id="first_name" name="event_name" type="text" class="validate">
                <label for="first_name">イベント名</label>
            </div>
            <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea" name="event_text" data-length="50"></textarea>
                <label for="textarea1">イベント内容</label>
            </div>
            <div class="file-field input-field">
                <input type="file" name="event_image">
                <div class="file-path-wrapper">
                    <input class="file-path validate" name="event_image" type="text" placeholder="画像選択">
                    <label for="image">画像選択</label>
                </div>
            </div>
            <div class="input-field col s12">
                <input type="text" name="event_spot" data-length="30">
                <label for="spot">開催場所</label>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <div class="parent">
                        <div id="hoge">
                            <select name="event_category">
                                <option value='' disabled selected style='display:none;'>ジャンル</option>
                                <option value="1">IT</option>
                                <option value="2">デザイン</option>
                                <option value="3">映像</option>
                                <option value="4">ゲーム</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="event_start_date_time" class="datepicker">
                    <label for="password">イベント予定日時</label>
                </div>
                <div class="input-field col s12">
                    <input type="text" name="event_end_date_time" class="datepicker">
                    <label for="password">イベント終了日時</label>
                </div>
                <div class="input-field col s12">
                    <input type="number" name="event_capacity">
                    <label for="password">イベント定員数</label>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col s6 right-align">
                <button type="button" class="back-btn waves-effect waves-light btn">戻る</button>
            </div>
            <div class="col s6 left-align">
                <button type="submit" class="creat-btn waves-effect waves-light btn">作成</button>
            </div>
        </div>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('select').material_select();
        });
    </script>

    <script type="text/javascript">
        $(function () {
            var $content = $('#hoge:last-child');
            $('#btn1').on('click', function () {
                $content.clone(true).appendTo('.parent');
            });
            $('.parent').on('click', '#btn2', function () {
                $(this).parents('#hoge').remove();
            });
        });
    </script>
    <script type="text/javascript">

    </script>
@endsection
