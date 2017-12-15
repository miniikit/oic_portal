@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
    <link rel="stylesheet" href="/css/manage/edit.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_user_list') }}" class="breadcrumb">ユーザー一覧</a>
    <a href="{{ route('manager_user_detail',$id) }}" class="breadcrumb">ユーザー詳細</a>
    <a href="{{ route('manager_user_edit',$id) }}" class="breadcrumb">ユーザー編集</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">ユーザー編集</h1>
        </div>
        <form action="{{ route('manager_user_update',$id) }}" method="POST">
            <div class="main-content">
                <table>
                    <thead>
                    <tr>
                        <th class="th-box">ID</th>
                        <td class="td-box">{{ $id }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">ユーザー名</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="userName"
                                   value="{{ old('username',$user->profile_name) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">氏名</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="name"
                                   value="{{ old('name',$user->name) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">フリガナ</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="nameKana"
                                   value="{{ old('nameKana',$user->name_kana) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">メールアドレス</th>
                        <td class="td-box">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">学籍番号</th>
                        <td class="td-box">{{ substr($user->email, 0, strcspn($user->email,'@')) }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">学科</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="parentCourse"
                                   value="{{ old('parentCourse',$user->parent_course_name) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">コース</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="course"
                                   value="{{ old('course',$user->course_name) }}">
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
                        <td class="td-box">{{ date('Y年',strtotime($user->profile_admission_year)) }}</td>
                    </tr>
                    <tr>
                        <th class="th-box">プロフィール画像</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="image"
                                   value="{{ old('image',$user->profile_image) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">URL</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="url"
                                   value="{{ old('url',$user->profile_url) }}">
                        </td>
                    </tr>
                    <tr>
                        <th class="th-box">コメント</th>
                        <td class="td-box input-field">
                            <input type="text" class="validate" name="introduction"
                                   value="{{ old('introduction',$user->profile_introduction) }}">
                        </td>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="btn-box col s12">
                <div class="col s6 center">
                    <a href="{{ route('manager_user_detail',$id) }}"
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
