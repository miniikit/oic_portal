@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/managetemplete.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_site_list') }}" class="breadcrumb">サイト一覧</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">サイト一覧</h1>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th class="tb-title">ID</th>
                        <th class="tb-title">サイト名</th>
                        <th class="tb-title">サイトURL</th>
                        <th class="tb-title">サイトカテゴリ</th>
                        <th class="tb-title">最終更新日</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($sites as $site)
                        <tr data-href="{{ route('manager_site_detail',$site->id) }}">
                            <td class="tb-text">{{ $site->id }}</td>
                            <td class="tb-text">{{ $site->news_site_name }}</td>
                            <td class="tb-text">{{ $site->news_site_url }}</td>
                            <td class="tb-text">{{ $site->news_site_category_name }}</td>
                            <td class="tb-text"></td>
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
        jQuery(function ($) {
            $('tr[data-href]').addClass('clickable')
                .click(function (e) {
                    if (!$(e.target).is('a')) {
                        window.location = $(e.target).closest('tr').data('href');
                    }
                    ;
                });
        });
    </script>
@endsection
