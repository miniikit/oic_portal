<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Article;
use App\ArticleLike;
use App\ArticleComment;


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

    // 投稿確認
    public function confirm(Request $request)
    {
        $data = $request->all();
        $carbon = Carbon::now();
        $imgfile = $request->file('article_image');
        $filename = $carbon->format('Y-m-d-H-i-s') . '.jpg';
        $imgfile->move(public_path('/images/article_images/'), $filename);
        $articles_image = '/images/article_images/' . $filename;
        return view('articles.confirm', compact('data', 'articles_image'));
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
            'news_site_id' => 1,  //0のときはセルフ記事
            'article_url' => '/articles/'.Carbon::now(),
            'user_id' => $userId,
        ]);

        $article->save();

        if($article)
        {
           $article_id = $article->id;
        }

        $articles_model->where('id',$article_id)->update(['article_url' => '/articles/'.$article_id]);
        return view('articles.complete');
    }

    // 詳細
    public function detail($id)
    {
        $userId = Auth::user()->id;
        $article_comment_model = app(ArticleComment::class);
        $article = DB::table('articles_table')
            ->join('news_sites_master', 'news_sites_master.id', '=', 'articles_table.news_site_id')
            ->where('articles_table.id', $id)
            ->first();

        /*
        $comments = DB::table('articles_comments_table')
            ->join('users', 'users.id', '=', 'articles_comments_table.user_id')
            ->join('profiles_table', 'profiles_table.id', '=', 'users.profile_id')
            ->select('users.name', 'profiles_table.profile_image', 'articles_comments_table.article_comment_text')
            ->where('articles_comments_table.id', $id)
            ->get();
        */

        $comments = $article_comment_model
            ->where('article_id',$id)
            ->orderBy('id','desc')
            ->get();

        foreach ($comments as $comment) {
            $comment_userId = $comment->user_id;
        }

        $comment_users = app(User::class)->where('id',$comment_userId)->get();

        foreach ($comment_users as $comment_user) {
            $comment_userName = $comment_user->name;
        }




        $categoryId = $article->news_site_category_id;
        $relatedArticles = DB::table('news_sites_master')
            ->join('articles_table', 'articles_table.news_site_id', '=', 'news_sites_master.id')
            ->where('news_sites_master.news_site_category_id', '=', $categoryId)
            ->orderBy('articles_table.id', 'DESC')
            ->limit(3)
            ->get();

        $articles_likes_model = app(ArticleLike::class);

        $active_like = $articles_likes_model
            ->where('user_id',$userId)
            ->where('article_id',$id)
            ->first();

        $like_ct = $articles_likes_model->where('article_id',$id)->get()->count();




        return view('articles.detail', compact('article', 'id', 'comments', 'relatedArticles','like_ct','active_like','comment_userName'));
    }

    // 編集
    public function edit($id)
    {
        $article = app(Article::class)->find($id);
        return view('articles.edit', compact('article'));
    }

    // 編集確認
    public function edit_confirm(Request $request)
    {
        $data = $request->all();
        $id = $data['article_id'];
        $carbon = Carbon::now();
        $request_image = $request->file('article_image');

        if($request_image == null)
        {
            $article = app(Article::class)->find($id);
            $articles_image = $article->article_image;

        }else{
            $filename = $carbon->format('Y-m-d-H-i-s') . '.jpg';
            $request_image->move(public_path('/images/event_images/'), $filename);
            $articles_image = '/images/event_images/' . $filename;
        }

        return view('articles.confirm', compact('data', 'articles_image'));
    }

    //編集完了
    public function edit_complete(Request $request)
    {
        $data = $request->all();
        $article = app(Article::class)->where('id',$data->article_id)->first();

        $article->article_title = $data['article_title'];
        $article->article_image = $data['article_image'];
        $article->articlearticle_text = $data['article_text'];

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
    public function store(Request $request,$article_id)
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

    public function fav()
    {

    }
}
