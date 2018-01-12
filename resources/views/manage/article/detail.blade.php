@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_article_list') }}" class="breadcrumb">記事一覧</a>
    <a href="{{ route('manager_article_detail',$id) }}" class="breadcrumb">記事詳細</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">記事詳細</h1>
        </div>
        <div class="main-content">
            <table>
                <thead>
                <tr>
                    <th class="th-box">ID</th>
                    <td class="td-box">{{ $article->id }}</td>
                </tr>
                <tr>
                    <th class="th-box">記事タイトル</th>
                    <td class="td-box">{{ $article->article_title }}</td>
                </tr>
                <tr>
                    <th class="th-box">記事本文</th>
                    <td class="td-box">{{ $article->article_text }}</td>
                </tr>
                <tr>
                    <th class="th-box">記事画像</th>
                    <td class="td-box">{{ $article->article_image }}</td>
                </tr>
                <tr>
                    <th class="th-box">記事URL</th>
                    <td class="td-box">{{ $article->article_url }}</td>
                </tr>
                <tr>
                    <th class="th-box">サイト名</th>
                    <td class="td-box">{{ $article->news_site_name }}</td>
                </tr>
                <tr>
                    <th class="th-box">作成日</th>
                    <td class="td-box">{{ date('m月d日', strtotime($article->created_at)) }}</td>
                </tr>
                </thead>
            </table>
        </div>
        <div class="btn-box col s12">
            <div class="col s6 center">
                <a class="back-btn waves-effect waves-light btn" href="{{ route('manager_article_list') }}">戻る</a>
            </div>
            <div class="col s6 center">
                <a class="edit-btn waves-effect waves-light btn" href="{{ route('manager_article_edit',$id) }}">編集</a>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
