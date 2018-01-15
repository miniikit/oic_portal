@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/detail.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_crawl_home') }}" class="breadcrumb">クローラーホーム</a>
    <a href="{{ route('manager_crawl_detail',$id) }}" class="breadcrumb">詳細</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">クローラー詳細</h1>
        </div>
        <div class="main-content">
            <table>
                <thead>
                <tr>
                    <th class="th-box">担当者</th>
                    <td class="td-box">ここに担当者</td>
                </tr>
                <tr>
                    <th class="th-box">開始時刻</th>
                    <td class="td-box">ここに開始時刻</td>
                </tr>
                <tr>
                  {{-- @if(is_null($task->crawl_end_time))
                    <th class="th-box">終了時刻</th>
                    <td class="td-box"> - </td>
                  @else --}}
                    <th class="th-box">終了時刻</th>
                    <td class="td-box">ここに終了時刻</td>
                  {{-- @endif --}}
                </tr>
                <tr>
                    <th class="th-box">実行状態</th>
                    <td class="td-box">ここに状態</td>
                </tr>
                <tr>
                  {{-- @if($task->crawler_status === "予約")
                    <th class="th-box">追加記事数</th>
                    <td class="td-box"> - </td>
                  @else --}}
                    <th class="th-box">追加記事数</th>
                    <td class="td-box">ここに記事数</td>
                  {{-- @endif --}}
                </tr>
                </thead>
            </table>
        </div>
        <div class="btn-box col s12">
            <div class="col s6 center">
                <a class="back-btn waves-effect waves-light btn" href="{{ route('manager_crawl_home') }}">戻る</a>
            </div>
            <div class="col s6 center">
                <a class="edit-btn waves-effect waves-light btn" href="{{ route('manager_crawl_edit',$id) }}">編集</a>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
