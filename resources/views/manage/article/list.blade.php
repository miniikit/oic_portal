@extends('template/manage')

@section('css')
    <link rel="stylesheet" href="/css/manage/managetemplete.css">
@endsection

@section('breadcrumb')
    <a href="{{ route('manager_article_list') }}" class="breadcrumb">記事一覧</a>
@endsection

@section('main')
    <div class="row">
        <div class="title-box center">
            <h1 class="title">記事一覧</h1>
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
                        <th class="tb-title">記事タイトル</th>
                        <th class="tb-title">サイト名</th>
                        <th class="tb-title">掲載日</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($articles as $article)
                        <tr data-href="{{ route('manager_article_detail',$article->id) }}">
                            <td class="tb-text">{{ $article->id }}</td>
                            <td class="tb-text">{{ mb_strimwidth($article->article_title,0,60,'...') }}</td>
                            <td class="tb-text">{{ $article->news_site_name }}</td>
                            <td class="tb-text">{{ date('m月d日', strtotime($article->created_at)) }}</td>
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
