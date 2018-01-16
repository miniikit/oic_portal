<div class="row">
        <div class="input-field">
            <form action="{{ route('user_search') }}" method="get">
            {{ csrf_field() }}
            <input id="search1" class="center" type="search" name="keyword" required>
            <label class="label-icon" for="search1"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
            </form>
        </div>
    <div class="sort-box input-field col s6">
        <form action="{{ route('user_sort') }}" method="post">
            {{ csrf_field() }}
            <select required="required" name="sort" onchange="submit()">
                <option value="" disabled selected>並び替え</option>
                <option value="1">いいね順</option>
                <option value="2">コメント順</option>
                <option value="3">閲覧数順</option>
            </select>
        </form>
    </div>
    <div class="sort-box input-field col s6">
        <form action="{{ route('user_genre') }}" method="post">
            {{ csrf_field() }}

            <select required="required" name="category" onchange="submit()">
                @if(isset($categoryId))
                    <option value="" disabled>カテゴリ</option>
                @else
                    <option value="" selected disabled>カテゴリ</option>
                @endif
                @foreach($categories as $category)
                    @if(isset($categoryId))
                        @if($categoryId == $category->id)
                            <option value="{{ $category->id }}"
                                    selected> {{ $category->articles_category_name }} </option>
                        @else
                            <option value="{{ $category->id }}"> {{ $category->articles_category_name }} </option>
                        @endif
                    @else
                        <option value="{{ $category->id }}"> {{ $category->articles_category_name }} </option>
                    @endif
                @endforeach
            </select>
        </form>
    </div>
    <!-- article tab1 -->
    <div class="row">
        @foreach($articles as $article)
            <div class="col s4">
                <div class="card hoverable">
                    <div class="card-wrapper">
                        <div class="card-image">
                            <a href="{{ $article->article_url }}"><img src="{{ $article->article_image }}"></a>
                            {{--  ここにタグの実装  --}} <span
                                    class="ct-tag chip btn-floating halfway-fab circle blue-grey lighten-5">IT</span>
                        </div>

                        <div class="card-stacked">
                            <a href="{{ $article->article_url }}"></a>
                            <div class="card-content">
                                <span class="card-title">{{ mb_strimwidth($article->article_title,0,60,"...") }}</span>
                                {{-- 記事内容--}}
                                {{--<p class="card-text">{{ mb_strimwidth($article->article_text,0,132,"...") }}</p>--}}
                            </div>

                            {{-- TODO : 記事カテゴリ --}}
                            {{--<div class="card-action">--}}
                            {{--<div class="tags">--}}
                            {{--@if($article->news_site_category_name)--}}
                            {{--<div class="chip">--}}
                            {{--{{ $article->news_site_category_name }}--}}
                            {{--</div>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
