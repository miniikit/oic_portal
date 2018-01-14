<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Article;
use App\ArticleLike;
use App\ArticleFavorite;
use Laracasts\Flash\Flash;

class ArticlesLikesController extends Controller
{
  public function index()
  {
      $userId = Auth::user()->id;
      $article_fav_model = app(ArticleFavorite::class);
      $article_model = app(Article::class);

      $article_fav_lists = $article_fav_model
          ->where('user_id',$userId)
          ->orderby('id','desc')
          ->get();

      foreach ($article_fav_lists as $article_fav_list) {
          $article_fav_id = $article_fav_list->article_id;
          $article_lists = $article_model->where('id',$article_fav_id)->get();
      }

      return view('like.index',compact('article_lists'));
  }

  public function like(Request $request,$id)
  {
      $articlelike_model = app(ArticleLike::class);
      $userId = Auth::user()->id;

      $articlelike_model->create([
          'article_id' => $id,
          'user_id' => $userId,
      ]);

      //flushでメッセージ表示
      Flash::success('いいねしました。');
      return redirect()->route('user_article_detail', ['id' => $id]);
  }

    public function Unlike(Request $request,$id)
    {
        $articlelike_model = app(ArticleLike::class);
        $userId = Auth::user()->id;

        $active_like = $articlelike_model
            ->where('user_id',$userId)
            ->where('article_id',$id)
            ->first();

        $active_like->delete();

        //flushでメッセージ表示
        Flash::success('いいねを解除しました。');
        return redirect()->route('user_article_detail', ['id' => $id]);
    }

    public function favorite($id)
    {
        $userId = Auth::user()->id;
        $article_fav_model = app(ArticleFavorite::class);

        $article_fav_model->create([
            'article_id' => $id,
            'user_id' => $userId
        ]);

        Flash::success('記事をお気に入りに追加しました。');
        return redirect()->route('user_article_detail', ['id' => $id]);
    }

    public function Unfavorite($id)
    {
        $userId = Auth::user()->id;
        $article_fav_model = app(ArticleFavorite::class);

        $active_fav = $article_fav_model
            ->where('article_id',$id)
            ->where('user_id',$userId)
            ->first();

        $active_fav->delete();

        Flash::success('記事をお気に入りから削除しました。');
        return redirect()->route('user_article_detail', ['id' => $id]);
    }
}
