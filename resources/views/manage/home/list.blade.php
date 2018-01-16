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
        <div class="col s12">
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
                            <th class="tb-title"></th>
                            <th class="tb-title">カテゴリ</th>
                            <th class="tb-title">対処優先度</th>
                            <th class="tb-title">対処状態</th>
                            <th class="tb-title">通報日時</th>
                        </tr>
                        </thead>

                        <tbody><?php $i = 1; ?>
                        @foreach($reports as $report)
                            <tr data-href="{{ route('manager_report_detail',$report->report_id) }}">
                                <td class="tb-text">{{ $i++ }}</td>
                                <td class="tb-text">{{ $report->report_category_name }}</td>
                                <td class="tb-text">{{ $report->report_risk_category_name }}</td>
                                <td class="tb-text">{{ $report->report_risk_deal_status_name }}</td>
                                <td class="tb-text">{{ date('Y年m月d日', strtotime($report->created_at)) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- <div class="col s12 m4 l4">
            {{-- ここにグラフなどのコンテンツ --}}
            {{-- <canvas id="Graph" width="400" height="400"></canvas>

            <div class="side-content card-panel teal">
            <span class="white-text">
            </span>
            </div>
        </div>  --}}
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script>
        var ctx = document.getElementById("Graph");

        var myPieChart = new Chart(ctx,{
            type: 'pie',
            data: {
                datasets: [{
                    label: '対処件数',
                    data: [10, 20, 30]
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Red',
                    'Yellow',
                    'Blue'
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });


        var myPieChart = new Chart(ctx, {
            type: 'pie',

        });

        //
        // var myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        //         datasets: [{
        //             label: '対処件数',
        //             data: [12, 19, 3, 5, 2, 3],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255,99,132,1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 }
        //             }]
        //         }
        //     }
        // });
    </script>






    <script type="text/javascript">
        jQuery(function ($) {
            $('tr[data-href]').addClass('clickable')
                .click(function (e) {
                    if (!$(e.target).is('a')) {
                        window.location = $(e.target).closest('tr').data('href');
                    }
                    ;
                });
        });
    </script>
@endsection
