@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/managetemplete.css">
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">通報一覧</h1>
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
                <table class="table striped">
                    <thead>
                    <tr>
                        <th class="tb-title">ID</th>
                        <th class="tb-title">危険度</th>
                        <th class="tb-title">カテゴリ</th>
                        <th class="tb-title">対処者</th>
                        <th class="tb-title">対処状態</th>
                        <th class="tb-title">通報日時</th>
                        <th class="tb-title"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                        <tr data-href="{{ route('manager_report_detail',$report->id) }}">
                            <td class="tb-text">{{ $report->id }}</td>
                            <td class="tb-text">{{ $report->report_risk_category_name }}</td>
                            <td class="tb-text">{{ $report->report_category_name }}</td>
                            <td class="tb-text">{{ $report->name }}</td>
                            <td class="tb-text">{{ $report->report_risk_deal_status_name }}</td>
                            <td class="tb-text">{{ date('Y年m月d日', strtotime($report->created_at)) }}</td>
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
