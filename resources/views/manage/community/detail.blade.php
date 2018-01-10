@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_community_list') }}" class="breadcrumb">コミュニティ一覧</a>
    <a href="{{ route('manager_community_detail',$id) }}" class="breadcrumb">コミュニティ詳細</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">コミュニティ詳細</h1>
        </div>
        <div class="main-content">
            <table>
                <thead>
                <tr>
                    <th class="th-box">ID</th>
                    <td class="td-box">{{ $id }}</td>
                </tr>
                <tr>
                    <th class="th-box">コミュニティ名</th>
                    <td class="td-box">{{ $community->community_title }}</td>
                </tr>
                <tr>
                    <th class="th-box">コミュニティコンテンツ</th>
                    <td class="td-box">{{ $community->community_contents }}</td>
                </tr>
                <tr>
                    <th class="th-box">コミュニティカテゴリ</th>
                    <td class="td-box">{{ $community->community_category_name }}</td>
                </tr>
                <tr>
                    <th class="th-box">管理者</th>
                    <td class="td-box">{{ $community->name }} ( {{ $community->email }} ) </td>
                </tr>
                <tr>
                    <th class="th-box">サブ管理者</th>
                    <td class="td-box">{{ $subAdministrator->name }} ( {{ $subAdministrator->email }} ) </td>
                </tr>
                <tr>
                    <th class="th-box">参加人数</th>
                    <td class="td-box">{{ $participantsNum }}人</td>
                </tr>
                <tr>
                    <th class="th-box">作成日</th>
                    <td class="td-box">{{ $community->created_at }}</td>
                </tr>
                </thead>
            </table>
        </div>
        <div class="btn-box col s12">
            <div class="col s6 center">
                <a class="back-btn waves-effect waves-light btn" href="{{ route('manager_community_list') }}">戻る</a>
            </div>
            <div class="col s6 center">
                <a class="edit-btn waves-effect waves-light btn" href="{{ route('manager_community_edit',$id) }}">編集</a>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
