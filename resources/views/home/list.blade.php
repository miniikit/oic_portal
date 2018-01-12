@extends('template/master')
@section('css')
    <link rel="stylesheet" href="/css/top/top.css">
@endsection
@section('nav-tab')
    <div class="nav-content">
        <ul class="tabs tabs-transparent">
            <li class="tab"><a class="active" href="#tab1">新着ニュース</a></li>
            <li class="tab"><a href="#tab2">IT・ビジネス系</a></li>
            <li class="tab"><a href="#tab3">ゲーム系</a></li>
            <li class="tab"><a href="#tab4">映像・CG・アニメーション</a></li>
            <li class="tab"><a href="#tab5">デザイン・WEB系</a></li>
        </ul>
    </div>
@endsection
@section('main')
    <div id="tab1" class="row">
        <form>
            <div class="input-field">
                <input id="search1" class="center" type="search" required>
                <label class="label-icon" for="search1"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>
        <div class="sort-box input-field col s6">
            <select>
                <option value="" disabled selected>並び替え</option>
                <option value="1">いいね順</option>
                <option value="2">コメント順</option>
                <option value="3">閲覧数順</option>
            </select>
        </div>
        <div class="sort-box input-field col s6">
            <select>
                <option value="" disabled selected>ジャンル</option>
                <option value="1">情報処理IT</option>
                <option value="2">ゲーム</option>
                <option value="3">CG・映像・アニメーション</option>
                <option value="4">デザイン・Web</option>
            </select>
        </div>
        <!-- article tab1 -->
        <div class="row">
            @foreach($articles as $article)
                <div class="col s4">
                    <div class="card hoverable">
                        <div class="card-wrapper">
                            <div class="card-image">
                                <a href="{{ $article->article_url }}"><img src="{{ $article->article_image }}"></a>
                            </div>
                          <div class="card-stacked">
                            <a href="{{ $article->article_url }}"></a>
                            <div class="card-content">
                                <span class="card-title">{{ $article->article_title }}</span>
                                <p class="card-text">{{ $article->article_text }}</p>
                            </div>
                            <div class="card-action">
                                <div class="tags">
                                    <div class="chip">
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
                                    </div>
                                </div>
                                {{-- カウンター 実装するか検討 --}}
                                {{-- <div class="counter">
                                  <i class="goodicon material-icons" id="counter">thumb_up</i>
                                  <label class="showcounter" for="counter">100</label>
                                </div>
                                <div class="counter">
                                  <i class="goodicon material-icons" id="counter">remove_red_eye</i>
                                  <label class="showcounter" for="counter">1000</label>
                                </div> --}}
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    {{--  tab2  --}}

    <div id="tab2" class="row">
        <form>
            <div class="input-field">
                <input id="search1" class="center" type="search" required>
                <label class="label-icon" for="search1"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>

        <div class="sort-box input-field col s6">
            <select>
                <option value="" disabled selected>並び替え</option>
                <option value="1">いいね順</option>
                <option value="2">コメント順</option>
                <option value="3">閲覧数順</option>
            </select>
        </div>
        <div class="sort-box input-field col s6">
            <select>
                <option value="" disabled selected>ジャンル</option>
                <option value="1">情報処理IT</option>
                <option value="2">ゲーム</option>
                <option value="3">CG・映像・アニメーション</option>
                <option value="4">デザイン・Web</option>
            </select>
        </div>


        <!-- article tab1 -->
        <div class="row">
            @foreach($article_its as $article_it)
                <div class="col s4">
                    <div class="card">
                        <div class="card-wrapper">
                            <div class="card-image">
                                <a href="{{ $article_it->article_url }}"><img src="{{ $article_it->article_image }}"></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title">{{ $article_it->article_title }}</span>
                                <p class="card-text">{{ $article_it->article_text }}</p>
                            </div>
                            <div class="card-action">
                                <a href="{{ $article_it->article_url }}">続きを読む</a>
                                <div class="tags">
                                    <div class="chip">
                                        IT
                                    </div>
                                    <div class="chip">
                                        デザイン
                                    </div>
                                    {{-- <div class="chip">
                                      映像
                                    </div>
                                    <div class="chip">
                                      アニメーション
                                    </div> --}}
                                </div>

                                {{-- カウンター 実装するか検討 --}}
                                {{-- <div class="counter">
                                  <i class="goodicon material-icons" id="counter">thumb_up</i>
                                  <label class="showcounter" for="counter">100</label>
                                </div>
                                <div class="counter">
                                  <i class="goodicon material-icons" id="counter">remove_red_eye</i>
                                  <label class="showcounter" for="counter">1000</label>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{--  tab3  --}}

    <div id="tab3" class="row">
        <form>
            <div class="input-field">
                <input id="search1" class="center" type="search" required>
                <label class="label-icon" for="search1"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>

        <div class="sort-box input-field col s6">
            <select>
                <option value="" disabled selected>並び替え</option>
                <option value="1">いいね順</option>
                <option value="2">コメント順</option>
                <option value="3">閲覧数順</option>
            </select>
        </div>
        <div class="sort-box input-field col s6">
            <select>
                <option value="" disabled selected>ジャンル</option>
                <option value="1">情報処理IT</option>
                <option value="2">ゲーム</option>
                <option value="3">CG・映像・アニメーション</option>
                <option value="4">デザイン・Web</option>
            </select>
        </div>


        <!-- article tab1 -->
        <div class="row">
            @foreach($article_games as $article_game)
                <div class="col s4">
                    <div class="card">
                        <div class="card-wrapper">
                            <div class="card-image">
                                <a href="{{ $article_game->article_url }}"><img src="{{ $article_game->article_image }}"></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title">{{ $article_game->article_title }}</span>
                                <p class="card-text">{{ $article_game->article_text }}</p>
                            </div>
                            <div class="card-action">
                                <a href="{{ $article_game->article_url }}">続きを読む</a>
                                <div class="tags">
                                    <div class="chip">
                                        IT
                                    </div>
                                    <div class="chip">
                                        デザイン
                                    </div>
                                    {{-- <div class="chip">
                                      映像
                                    </div>
                                    <div class="chip">
                                      アニメーション
                                    </div> --}}
                                </div>

                                {{-- カウンター 実装するか検討 --}}
                                {{-- <div class="counter">
                                  <i class="goodicon material-icons" id="counter">thumb_up</i>
                                  <label class="showcounter" for="counter">100</label>
                                </div>
                                <div class="counter">
                                  <i class="goodicon material-icons" id="counter">remove_red_eye</i>
                                  <label class="showcounter" for="counter">1000</label>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{--  tab4  --}}

    <div id="tab4" class="row">
        <form>
            <div class="input-field">
                <input id="search1" class="center" type="search" required>
                <label class="label-icon" for="search1"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>

        <div class="sort-box input-field col s6">
            <select>
                <option value="" disabled selected>並び替え</option>
                <option value="1">いいね順</option>
                <option value="2">コメント順</option>
                <option value="3">閲覧数順</option>
            </select>
        </div>
        <div class="sort-box input-field col s6">
            <select>
                <option value="" disabled selected>ジャンル</option>
                <option value="1">情報処理IT</option>
                <option value="2">ゲーム</option>
                <option value="3">CG・映像・アニメーション</option>
                <option value="4">デザイン・Web</option>
            </select>
        </div>


        <!-- article tab1 -->
        <div class="row">
            @foreach($article_designs as $article_design)
                <div class="col s4">
                    <div class="card">
                        <div class="card-wrapper">
                            <div class="card-image">
                                <a href="{{ $article_design->article_url }}"><img src="{{ $article_design->article_image }}"></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title">{{ $article_design->article_title }}</span>
                                <p class="card-text">{{ $article_design->article_text }}</p>
                            </div>
                            <div class="card-action">
                                <a href="{{ $article_design->article_url }}">続きを読む</a>
                                <div class="tags">
                                    <div class="chip">
                                        IT
                                    </div>
                                    <div class="chip">
                                        デザイン
                                    </div>
                                    {{-- <div class="chip">
                                      映像
                                    </div>
                                    <div class="chip">
                                      アニメーション
                                    </div> --}}
                                </div>

                                {{-- カウンター 実装するか検討 --}}
                                {{-- <div class="counter">
                                  <i class="goodicon material-icons" id="counter">thumb_up</i>
                                  <label class="showcounter" for="counter">100</label>
                                </div>
                                <div class="counter">
                                  <i class="goodicon material-icons" id="counter">remove_red_eye</i>
                                  <label class="showcounter" for="counter">1000</label>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{--  tab5  --}}

    <div id="tab5" class="row">
        <form>
            <div class="input-field">
                <input id="search1" class="center" type="search" required>
                <label class="label-icon" for="search1"><i class="material-icons">search</i></label>
                <i class="material-icons">close</i>
            </div>
        </form>

        <div class="sort-box input-field col s6">
            <select>
                <option value="" disabled selected>並び替え</option>
                <option value="1">いいね順</option>
                <option value="2">コメント順</option>
                <option value="3">閲覧数順</option>
            </select>
        </div>
        <div class="sort-box input-field col s6">
            <select>
                <option value="" disabled selected>ジャンル</option>
                <option value="1">情報処理IT</option>
                <option value="2">ゲーム</option>
                <option value="3">CG・映像・アニメーション</option>
                <option value="4">デザイン・Web</option>
            </select>
        </div>


        <!-- article tab1 -->
        <div class="row">
            @foreach($article_arts as $article_art)
                <div class="col s4">
                    <div class="card">
                        <div class="card-wrapper">
                            <div class="card-image">
                                <a href="{{ $article_art->article_url }}"><img src="{{ $article_art->article_image }}"></a>
                            </div>
                            <div class="card-content">
                                <span class="card-title">{{ $article_art->article_title }}</span>
                                <p class="card-text">{{ $article_art->article_text }}</p>
                            </div>
                            <div class="card-action">
                                <a href="{{ $article_art->article_url }}">続きを読む</a>
                                <div class="tags">
                                    <div class="chip">
                                        IT
                                    </div>
                                    <div class="chip">
                                        デザイン
                                    </div>
                                    {{-- <div class="chip">
                                      映像
                                    </div>
                                    <div class="chip">
                                      アニメーション
                                    </div> --}}
                                </div>

                                {{-- カウンター 実装するか検討 --}}
                                {{-- <div class="counter">
                                  <i class="goodicon material-icons" id="counter">thumb_up</i>
                                  <label class="showcounter" for="counter">100</label>
                                </div>
                                <div class="counter">
                                  <i class="goodicon material-icons" id="counter">remove_red_eye</i>
                                  <label class="showcounter" for="counter">1000</label>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(".button-collapse").sideNav();

        $(document).ready(function () {
            $('select').material_select();
        });
    </script>
@endsection
