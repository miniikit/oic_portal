@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_report_list') }}" class="breadcrumb">通報一覧</a>
    <a href="{{ route('manager_report_list',$id) }}" class="breadcrumb">通報詳細</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">通報詳細</h1>
        </div>
        <div class="main-content">
            <table>
                <thead>
                    <tr>
                        <th class="th-box">ID</th>
                        <td class="td-box">{{ $id }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">危険度</th>
                        <td class="td-box">{{ $report->report_risk_category_name }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">カテゴリ</th>
                        <td class="td-box">{{ $report->report_category_name }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">対処者</th>
                        <td class="td-box">{{ $report->name }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">対処状態</th>
                        <td class="td-box">{{ $report->report_risk_deal_status_name }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">通報日時</th>
                        <td class="td-box">{{ date('Y年m月d日', strtotime($report->report_created_at)) }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">通報内容</th>
                        <td class="td-box">{{ $report->report_contents }}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="btn-box col s12">
            <div class="col s6 center">
                <a href="{{ route('manager_report_list') }}" class="back-btn waves-effect waves-light btn">戻る</a>
            </div>
            <div class="col s6 center">
                <a href="{{ route('manager_report_edit',$id) }}" class="edit-btn waves-effect waves-light btn">編集</a>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
