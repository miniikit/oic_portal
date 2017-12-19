@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_site_list') }}" class="breadcrumb">サイト一覧</a>
    <a href="{{ route('manager_site_detail',$id) }}" class="breadcrumb">サイト詳細</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">サイト詳細</h1>
        </div>
        <div class="main-content">
            <table>
                <thead>
                <tr>
                    <th class="th-box">ID</th>
                    <td class="td-box">{{ $id }}</td>
                </tr>
                <tr>
                    <th class="th-box">サイト名</th>
                    <td class="td-box">{{ $site->news_site_name }}</td>
                </tr>
                <tr>
                    <th class="th-box">サイトURL</th>
                    <td class="td-box">{{ $site->news_site_url }}</td>
                </tr>
                <tr>
                    <th class="th-box">サイトカテゴリ</th>
                    <td class="td-box">{{ $site->news_site_category_name }}</td>
                </tr>
                <tr>
                    <th class="th-box">記事数(月間)</th>
                    <td class="td-box"></td>
                </tr>
                <tr>
                    <th class="th-box">最終更新日</th>
                    <td class="td-box"></td>
                </tr>
                </thead>
            </table>
        </div>
        <div class="btn-box col s12">
            <div class="col s6 center">
                <a class="back-btn waves-effect waves-light btn" href="{{ route('manager_site_list') }}">戻る</a>
            </div>
            <div class="col s6 center">
                <a class="edit-btn waves-effect waves-light btn" href="{{ route('manager_site_edit',$id) }}">編集</a>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
