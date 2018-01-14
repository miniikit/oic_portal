@extends('template.master')

@section('css')
    <link rel="stylesheet" href="/css/articles/details.css">
@endsection

@section('main')
    @include('flash::message')
    <div class="row">

        <div class="col s12 l9">
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
                <p class="quote-text">引用元：ここに引用元を表示</p>
            </div>

            <div class="border"></div>

            @if(!Auth::guest())
                <div class="icon-button col s12 right-align">
                  <div class="col s12">
                    <div class="us-box">
                      <h1 class="user-name">投稿者：<a href="">投稿者名</a></h1>
                    </div>
                    <div class="category-tag tags">
                        <div class="chip">
                            ユーザー
                        </div>
                        {{-- <div class="chip">
                            IT
                        </div>
                        <div class="chip">
                            デザイン
                        </div>
                        <div class="chip">
                          映像
                        </div>
                        <div class="chip">
                          ゲーム
                        </div> --}}
                    </div>
                  </div>
                    @if($active_fav == null)
                        <a class="fav-btn waves-effect" href="{{ $article->article_url.'/favorite' }}">
                            <i class="goodicon material-icons">favorite</i>
                            <label for="conter">{{ $fav_ct }}</label>
                        </a>
                    @else
                        <a class="fav-btn waves-effect" href="{{ $article->article_url.'/unfavorite' }}">
                            <i class="goodicon material-icons" style="color:red">favorite</i>
                            <label for="conter">{{ $fav_ct }}</label>
                        </a>
                    @endif

                    @if($active_like == null)
                        <a class="good-btn waves-effect" href="{{ $article->article_url.'/like' }}">
                            <i class="goodicon material-icons" id="counter">thumb_up</i>
                            <label for="conter">{{ $like_ct }}</label>
                        </a>
                    @else
                        <a class="good-btn waves-effect" href="{{ $article->article_url.'/unlike' }}">
                            <i class="goodicon material-icons" id="counter" style="color:yellow">thumb_up</i>
                            <label for="conter">{{ $like_ct }}</label>
                        </a>
                    @endif
                </div>

                <div class="comment col s12">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img class="circle" src="{{$myprofile->profile_image}}">
                            <span class="name">{{ $myprofile->profile_name }}</span>
                            <form action="{{ route('user_article_comment',$id) }}" method="POST">
                                <input type="text" id="icon_prefix2" class="materialize-textarea" name="comment_text"
                                       size="50">
                                <div class="wap-comment">
                                    <input type="submit" value="コメント"
                                           class="comment-submit waves-effect waves-light btn">
                                </div>
                                {!! csrf_field() !!}
                            </form>
                        </li>
                    </ul>
                </div>
            @endif


            @if(count($comments) > 0)
            <div class="comment-area col s12">
                <ul class="collection">
                    @foreach($comments as $comment)
                        <li class="collection-item avatar">
                            <img class="circle" src="{{ $comment->profile_image }}">
                            <span class="name">{{ $comment->profile_name }}</span>
                            <p>
                                {{ $comment->article_comment_text }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif


        </div>

        <div class="col s12 l3">
            <div class="side row">
                <div class="card-panel teal white center">
                    <h2>関連記事</h2>
                </div>
                @foreach($relatedArticles as $relatedArticle)
                  <div class="col s12">
                    <div class="card hoverable">
                      <div class="card-wrapper">
                        <div class="card-images">
                            <a href="{{ route('user_article_detail',$relatedArticle->id) }}"><img src="{{ $relatedArticle->article_image }}"></a>
                        </div>
                        <div class="card-contents">
                            <p class="side-contents-text">{{ $relatedArticle->article_title }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>

        <div class="col s12 l3">
            <div class="side row">
                <div class="card-panel teal white center">
                    <h2>ランキング</h2>
                </div>
                @for ($i=0; $i < 3; $i++)
                  <div class="col s12">
                    <div class="relation card hoverable">
                        <div class="card-images">
                            <a href="details"><img src="/images/sample-3.jpg"></a>
                        </div>
                        <div class="card-contents">
                            <p class="side-contents-text">ミニスーファミにやりたいゲームが入ってない！って方に、同じくらいの値段で買えるSFC用のレトロフリーク</p>
                        </div>
                    </div>
                  </div>
                @endfor
            </div>
        </div>
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
