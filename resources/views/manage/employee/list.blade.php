@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/managetemplete.css">
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">管理者一覧</h1>
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
                        <th class="tb-title">ユーザー名</th>
                        <th class="tb-title">氏名</th>
                        <th class="tb-title">学籍番号</th>
                        <th class="tb-title">権限名</th>
                        <th class="tb-title"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr class="tb-1">
                            <td class="tb-text">{{ $employee->id }}</td>
                            <td class="tb-text">{{ $employee->profile_name }}</td>
                            <td class="tb-text">{{ $employee->name }}</td>
                            <td class="tb-text">{{ substr($employee->email, 0, strcspn($employee->email,'@')) }}</td>
                            <td class="tb-text">{{ $employee->authority_name }}</td>
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

@endsection
