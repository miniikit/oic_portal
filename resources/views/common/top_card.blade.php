<div class="row">
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
            <option value="1">新着ニュース</option>
            <option value="2">IT・ビジネス系</option>
            <option value="3">ゲーム系</option>
            <option value="4">映像・CG・アニメーション</option>
            <option value="5">デザイン・WEB系</option>
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
                            <p class="card-text">{{ mb_strimwidth($article->article_text,0,132,"...") }}</p>
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
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
