@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
    <link rel="stylesheet" href="/css/manage/edit.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_employee_list') }}" class="breadcrumb">管理者一覧</a>
    <a href="{{ route('manager_employee_detail',$id) }}" class="breadcrumb">管理者詳細</a>
    <a href="{{ route('manager_employee_edit',$id) }}" class="breadcrumb">管理者編集</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">管理者編集</h1>
        </div>
        <form action="{{ route('manager_employee_update',$id) }}" method="POST">
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
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="userName"
                                   value="{{ old('username',$employee->profile_name) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">氏名</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="name"
                                   value="{{ old('name',$employee->name) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">フリガナ</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="nameKana"
                                   value="{{ old('nameKana',$employee->name_kana) }}">
                        </td>
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
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="parentCourse"
                                   value="{{ old('parentCourse',$employee->parent_course_name) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">コース</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="course"
                                   value="{{ old('course',$employee->course_name) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">学年</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="scYear"
                                   value="{{ old('image',$scYear) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">入学年度</th>
                        <td class="td-box">{{ date('Y年',strtotime($employee->profile_admission_year)) }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">プロフィール画像</th>
                        <td class="td-box input-field imgInput">
                            <img id="preview" class="mb" src="{{ old('image',$employee->profile_image) }}" alt="">
                            <input type="file" id="getfile" name="event_image" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">URL</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="url"
                                   value="{{ old('url',$employee->profile_url) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">コメント</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="introduction"
                                   value="{{ old('introduction',$employee->profile_introduction) }}">
                        </td>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="btn-box col s12">
                <div class="col s6 center">
                    <a href="{{ route('manager_employee_detail',$id) }}"
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
    </script>
@endsection
