@extends('template.master')

@section('css')
    <link rel="stylesheet" href="/css/articles/details.css">
@endsection

@section('main')
    <div class="row">

        <div class="col s12 m8 l9">
            <div class="date_link col s12">
                <!--  TODO : null日付  !-->
                <p>{{ $article->created_at }}</p>
            </div>

            <div class="page-title">
                <h1 class="title">{{ $article->article_title }}</h1>
            </div>

            <div class="article-image">
                <img class="image-box" width="100%" src="{{ $article->article_image }}">
            </div>

            <div class="text-area">
                <p class="main-contents-text">{{ $article->article_text }}</p>
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

            <div class="comment col s12">
                <ul class="collection">
                    <li class="collection-item avatar">
                        <img src="/images/sample-icon2.jpg" alt="" class="circle">
                        <span class="name">name</span>
                        <form action="{{ route('user_article_comment',$id) }}" method="POST">
                            <input type="text" id="icon_prefix2" class="materialize-textarea" name="comment_text" size="50">
                            <div class="wap-comment">
                                <input type="submit" value="コメント" class="comment-submit waves-effect waves-light btn">
                            </div>
                            {!! csrf_field() !!}
                        </form>
                    </li>
                </ul>
            </div>

            <div class="comment-area col s12">
                <ul class="collection">
                        @foreach($comments as $comment)
                        <li class="collection-item avatar">
                            <img src="{{ $comment->profile_image }}" alt="" class="circle">
                            <span class="name">{{ $comment->name }}</span>
                            <p>
                                {{ $comment->article_comment_text }}
                            </p>
                        </li>
                        @endforeach
                </ul>
            </div>

        </div>

        <div class="col s12 m4 l3">
            <div class="side row">
                <div class="card-panel teal white center">
                    <h2>関連記事</h2>
                </div>
                @foreach($relatedArticles as $relatedArticle)
                    <div class="relation card">
                        <div class="card-image">
                            <a href="details"><img src="{{ $relatedArticle->article_image }}"></a>
                        </div>
                        <div class="card-contents">
                            <p class="side-contents-text">{{ $relatedArticle->article_title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col s12 m4 l3">
            <div class="side row">
                <div class="card-panel teal white center">
                    <h2>ランキング</h2>
                </div>
                @for ($i=0; $i < 3; $i++)
                    <div class="relation card">
                        <div class="card-image">
                            <a href="details"><img src="/images/sample-3.jpg"></a>
                        </div>
                        <div class="card-contents">
                            <p class="side-contents-text">ミニスーファミにやりたいゲームが入ってない！って方に、同じくらいの値段で買えるSFC用のレトロフリーク</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

    </div>

    <div class="pager">
        <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('#icon_prefix2').trigger('autoresize');

        // $(document).ready(function() {
        // $('textarea#icon_prefix2').characterCounter();
        // });
    </script>
@endsection
