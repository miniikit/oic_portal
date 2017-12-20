@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_employee_list') }}" class="breadcrumb">管理者一覧</a>
    <a href="{{ route('manager_employee_detail',$id) }}" class="breadcrumb">管理者詳細</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">管理者詳細</h1>
        </div>
        <div class="main-content">
            <table>
                <thead>
                    <tr>
                        <th class="th-box">ID</th>
                        <td class="td-box">{{ $id }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">権限</th>
                        <td class="td-box">{{ $employee->authority_name }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">ユーザ名</th>
                        <td class="td-box">{{ $employee->profile_name }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">氏名</th>
                        <td class="td-box">{{ $employee->name }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">フリガナ</th>
                        <td class="td-box">{{ $employee->name_kana }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">メールアドレス</th>
                        <td class="td-box">{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">学籍番号</th>
                        <td class="td-box">{{ substr($employee->email, 0, strcspn($employee->email,'@')) }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">学科</th>
                        <td class="td-box">{{ $employee->parent_course_name }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">コース</th>
                        <td class="td-box">{{ $employee->course_name }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">学年</th>
                        <td class="td-box">{{ $scYear }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">入学年度</th>
                        <td class="td-box">{{ date('Y年',strtotime($employee->profile_admission_year)) }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">プロフィール画像</th>
                        <td class="td-box">{{ $employee->profile_image }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">URL</th>
                        <td class="td-box">{{ $employee->profile_url }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">コメント</th>
                        <td class="td-box">{{ $employee->profile_introduction }}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="btn-box col s12">
            <div class="col s6 center">
                <a class="back-btn waves-effect waves-light btn" href="{{ route('manager_employee_list') }}">戻る</a>
            </div>
            <div class="col s6 center">
                <a class="edit-btn waves-effect waves-light btn" href="{{ route('manager_employee_edit',$id) }}">編集</a>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
