@extends('template.master')

@section('css')
    <link rel="stylesheet" href="/css/articles/confirm.css">
@endsection

@section('main')
    <div class="content">
        <form class="col s10" method="POST" action="{{ route('user_community_create_complete') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <p class="title">確認画面</p>
            </div>
            <div class="row">
                <div class="date_link col s12">
                    <div class="col s6">
                        <p class="backlink"><a class="backlink">戻る</a></p>
                    </div>
                    <div class="col s6 right-align">
                        <p class="date">2017/xx/yy</p>
                    </div>
                </div>

                <div class="page-title">
                    <h1 class="title">{{ $data['community_name'] }}</h1>
                    <input type="hidden" name="article_title" value="{{ $data['community_name'] }}">
                </div>

                <div class="article-image">
                    <img class="image-box" width="100%" src="{{ $data['community_image'] }}">
                    <input type="hidden" name="article_image" value="{{ $data['community_image'] }}">
                </div>

                <div class="text-area">
                    <p class="main-contents-text">{{ $data['community_detail'] }}</p>
                    <input type="hidden" name="article_text" value="{{ $data['community_detail'] }}">
                </div>

                <div class="border"></div>

                <div class="icon-button col s12 right-align">
                    <a class="fav-btn waves-effect">
                        <i class="goodicon material-icons">favorite</i>
                    </a>
                    <a class="good-btn waves-effect">
                        <i class="goodicon material-icons" id="counter">thumb_up</i>
                        <label for="conter">1000</label>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col s6 right-align"><button type="button" class="waves-effect waves-light btn" onclick="history.back()">戻る</button></div>
                <div class="col s6 left-align"><button type="submit" class="waves-effect waves-light btn">送信</button></div>
            </div>
        </form>
    </div>

@endsection