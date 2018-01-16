<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Article;
use App\ArticleLike;
use App\ArticleComment;
use App\ArticleFavorite;
use App\NewsSite;
use App\ArticleCategory;


class ArticlesController extends Controller
{
    // 一覧
    public function index()
    {
        return view('articles.index');
    }

    //　投稿
    public function write()
    {
        return view('articles.write');
    }

    //投稿確認
    public function confirm(Request $request)
    {
        $data = $request->all();
        $carbon = Carbon::now();
        $imgfile = $request->file('article_image');
        $filename = $carbon->format('Y-m-d-H-i-s') . '.jpg';
        $imgfile->move(public_path('/images/article_images/'), $filename);
        $articles_image = '/images/article_images/' . $filename;
        return view('articles.confirm', compact('data', 'articles_image', 'carbon'));
    }

    //投稿完了
    public function complete(Request $request)
    {
        $userId = Auth::user()->id;
        $data = $request->all();

        $articles_model = app(Article::class);
        $article = $articles_model->create([
            'article_title' => $data['article_title'],
            'article_image' => $data['article_image'],
            'article_text' => $data['article_text'],
            'news_site_id' => null,
            'article_category_id' => $data['category'],
            'article_url' => '/articles/user/' . Carbon::now(),
            'user_id' => $userId,
        ]);

        $article->save();

        if ($article) {
            $article_id = $article->id;
        }

        $articles_model->where('id', $article_id)->update(['article_url' => '/articles/user/' . $article_id]);
        return view('articles.complete');
    }

    // 詳細
    public function detail($id)
    {
        $article_model = app(Article::class);
        $article_comment_model = app(ArticleComment::class);
        $user_model = app(User::class);
        $profile_model = app(Profile::class);
        $articles_likes_model = app(ArticleLike::class);
        $articles_fav_model = app(ArticleFavorite::class);
        $newssite_model = app(NewsSite::class);
        $newssite_category_model = app(ArticleCategory::class);

        /*
        $article = DB::table('articles_table')
            ->join('news_sites_master', 'news_sites_master.id', '=', 'articles_table.news_site_id')
            ->where('articles_table.id', $id)
            ->first();
        */

        $article = $article_model
            ->where('id', $id)
            ->first();

        // TODO : 変数名修正
        if (isset($article->user_id)) {
            $newssite = $user_model->where('id', $article->user_id)->first();
        } else {
            $newssite = $newssite_model->where('id', $article->news_site_id)->first();
        }

        $categoryId = $article->article_category_id;
        $relatedArticles = DB::table('news_sites_master')
            ->join('articles_table', 'articles_table.news_site_id', '=', 'news_sites_master.id')
            ->where('news_sites_master.article_category_id', '=', $categoryId)
            ->orderBy('articles_table.id', 'DESC')
            ->limit(3)
            ->get();

        /*
        $comments = DB::table('articles_comments_table')
            ->join('users', 'users.id', '=', 'articles_comments_table.user_id')
            ->join('profiles_table', 'profiles_table.id', '=', 'users.profile_id')
            ->select('users.name', 'profiles_table.profile_image', 'articles_comments_table.article_comment_text')
            ->where('articles_comments_table.id', $id)
            ->get();
        */

        $comments = $article_comment_model
            ->where('article_id', $id)
            ->orderBy('id', 'desc')
            ->get();

        foreach ($comments as $comment) {
            $user_id = $comment->user_id;
            $profile = $profile_model->where('id', $user_id)->first();

            $comment->profile_name = $profile->profile_name;
            $comment->profile_image = $profile->profile_image;
        }


        if (!Auth::guest()) {
            $userId = Auth::user()->id;
            $getprofile_id = $user_model->where('id', $userId)->first();
            $myprofile = $profile_model->where('id', $getprofile_id->profile_id)->first();

            $active_like = $articles_likes_model
                ->where('user_id', $userId)
                ->where('article_id', $id)
                ->first();

            $active_fav = $articles_fav_model
                ->where('user_id', $userId)
                ->where('article_id', $id)
                ->first();
        }

        $like_ct = $articles_likes_model->where('article_id', $id)->get()->count();
        $fav_ct = $articles_fav_model->where('article_id', $id)->get()->count();

        return view('articles.detail', compact('article', 'id', 'comments', 'relatedArticles', 'like_ct', 'active_like', 'active_fav', 'fav_ct', 'myprofile', 'newssite'));
    }

    // 編集
    public function edit($id)
    {
        $article = app(Article::class)->find($id);
        $categories = app(ArticleCategory::class)->get();
        $article_category = app(ArticleCategory::class)->where('id', $article->article_category_id)->first();

        return view('articles.edit', compact('article', 'article_category', 'categories'));
    }

    // 編集確認
    public function edit_confirm(Request $request)
    {
        $data = $request->all();
        $id = $data['article_id'];
        $carbon = Carbon::now();
        $request_image = $request->file('article_image');

        if ($request_image == null) {
            $article = app(Article::class)->find($id);
            $articles_image = $article->article_image;

        } else {
            $filename = $carbon->format('Y-m-d-H-i-s') . '.jpg';
            $request_image->move(public_path('/images/event_images/'), $filename);
            $articles_image = '/images/event_images/' . $filename;
        }

        return view('articles.edit_confirm', compact('data', 'articles_image', 'carbon'));
    }

    //編集完了
    public function edit_complete(Request $request)
    {
        $data = $request->all();
        $article = app(Article::class)->where('id', $data['article_id'])->first();

        $article->article_title = $data['article_title'];
        $article->article_image = $data['article_image'];
        $article->article_text = $data['article_text'];

        $article->save();
        return view('articles.complete');
    }

    //削除
    public function delete($id)
    {
        $article = app(Article::class)->find($id);

        $article->delete();
        return redirect('/mypage');
    }


    // コメント
    public function store(Request $request, $article_id)
    {
        $userId = Auth::user()->id;
        if ($request->input('name')) {
            // TODO : エラー処理
        }

        $comment_text = $request->input('comment_text');

        DB::table('articles_comments_table')->insert([
            'article_id' => $article_id,
            'user_id' => $userId,
            'article_comment_text' => $comment_text
        ]);

        return redirect()->route('user_article_detail', compact('article_id'));
    }
}
