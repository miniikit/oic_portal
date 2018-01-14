@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/crawl/home.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_crawl_home') }}" class="breadcrumb">クローラー</a>
@endsection

@section('main')
    <div class="row">
        <div class="center">
            <h1 class="title">クローラー</h1>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="card-panel center">
                <h1 class="state">現在の状態</h1>
                @if($status_message === "実行中")
                    <h1 class="state">{{ $status_message }}</h1>
                @else
                    <h2 class="state">{{ $status_message }}</h2>
                @endif
            </div>
        </div>
        <div class="col s6">
            <div class="schedule-set card-panel teal white center">
                <form class="" action="index.html" method="post">
                    <h2 class="s-title">スケジュール</h2>
                    <div class="switch">
                        <label>
                            Off
                            <input type="checkbox">
                            <span class="lever"></span>
                            On
                        </label>
                    </div>
                    <div class="time-set col s6">
                        <input type="text" class="timepicker" name="t-set" required>
                        <label for="t-set">開始時刻の設定</label>
                    </div>
                    <div class="count-set col s6">
                        <input type="time" class="timelist" name="c-set" list="data1">
                        <datalist id="data1">
                            <option value="00:30"></option>
                            <option value="01:00"></option>
                            <option value="02:00"></option>
                            <option value="03:00"></option>
                            <option value="04:00"></option>
                            <option value="05:00"></option>
                        </datalist>
                        <label for="c-set">周期時間の設定</label>
                    </div>
                </form>
            </div>
        </div>
        <div class="col s6">
            <div class="schedule-set card-panel teal white center">
                <form action="{{ route('manager_crawl_form_execute') }}" method="post">
                    <h2 class="s-title">直ちに実行</h2>
                    <div class="switch">
                        <label>
                            <input type="checkbox" name="execute" onchange="submit()">
                            <span class="lever"></span>
                        </label>
                    </div>
                    {{ csrf_field() }}
                </form>
                <form action="{{ route('manager_crawl_form_cancel') }}" method="post">
                    <h2 class="s-title">直ちにキャンセル</h2>
                    <div class="switch">
                        <label>
                            <input type="checkbox" name="cancel" onchange="submit()">
                            <span class="lever"></span>
                        </label>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        <div class="col s12">
            <div class="log-area card-panel teal white center">
                <h2 class="l-title">クローラーログ</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="tb-title">担当者</th>
                            <th class="tb-title">開始時刻</th>
                            <th class="tb-title">終了時刻</th>
                            <th class="tb-title">実行状況</th>
                            <th class="tb-title">追加記事数</th>
                        </tr>
                        </thead>

                        <tbody>
                        <div class="log-a">
                            @foreach($tasks as $task)
                                <tr data-href="{{ route('manager_event_detail',$task->crawler_id) }}" class="log-text">
                                    <td class="tb-text">{{ $task->name }}</td>
                                    <td class="tb-text">{{ date('Y年m月d日 H時i分' ,strtotime($task->crawl_start_time)) }}</td>
                                    @if(is_null($task->crawl_end_time))
                                        <td class="tb-text"> - </td>
                                    @else
                                        <td class="tb-text">{{ date('Y年m月d日 H時i分' ,strtotime($task->crawl_end_time)) }}</td>
                                    @endif
                                        <td class="tb-text">{{ $task->crawler_status }}</td>
                                    @if($task->crawler_status === "予約")
                                        <th class="tb-title"> - </th>
                                    @else
                                        <th class="tb-title">{{ $task->added_articles_count }}</th>
                                    @endif
                                </tr>
                            @endforeach
                        </div>
                        </tbody>
                    </table>
            </div>
        </div>

        @endsection

        @section('script')
            <script type="text/javascript">
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
            </script>
@endsection
