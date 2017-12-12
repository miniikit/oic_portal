<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Article;


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
        $imgfile->move(public_path('/images/event_images/'), $filename);
        $articles_image = '/images/event_images/' . $filename;
        return view('articles.confirm',compact('data','articles_image'));
    }

    //投稿完了
    public function complete(Request $request)
    {
        $data = $request->all();
        $articles_model = app(Article::class);
        $articles_model->create([
            'article_title' => $data['article_title'],
            'article_image' => $data['article_image'],
            'article_text'  => $data['article_text'],
            'news_site_id'  => 0,  //0のときはセルフ記事
            'article_url'   => 0,
        ]);

        return view('articles.complete');
    }

    // 詳細
    public function detail($id)
    {
        $article = DB::table('articles_table')
            ->join('news_sites_master','news_sites_master.id','=','articles_table.news_site_id')
            ->where('articles_table.id', $id)
            ->first();

        $comments = DB::table('articles_comments_table')
            ->join('users', 'users.id', '=', 'articles_comments_table.user_id')
            ->join('profiles_table', 'profiles_table.id', '=', 'users.profile_id')
            ->select('users.name', 'profiles_table.profile_image', 'articles_comments_table.article_comment_text')
            ->where('articles_comments_table.id', $id)
            ->get();

        $categoryId = $article->news_site_category_id;
        $relatedArticles = DB::table('news_sites_master')
            ->join('articles_table','articles_table.news_site_id','=','news_sites_master.id')
            ->where('news_sites_master.news_site_category_id','=',$categoryId)
            ->orderBy('articles_table.id','DESC')
            ->limit(3)
            ->get();

        return view('articles.detail', compact('article', 'id', 'comments','relatedArticles'));
    }

    // 編集
    public function edit($id)
    {
        $article = app(Article::class)->find($id);
        return view('articles.edit',compact('article'));
    }

    // コメント
    public function store($article_id, Request $request)
    {
        if ($request->input('name')) {
            // TODO : エラー処理
        }

        $comment_text = $request->input('comment_text');

        DB::table('articles_comments_table')->insert([
            'article_id' => $article_id,
            'user_id' => 1,
            'article_comment_text' => $comment_text
        ]);

        return redirect()->route('user_article_detail', compact('article_id'));
    }
}
