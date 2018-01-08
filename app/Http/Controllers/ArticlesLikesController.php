<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\ArticleLike;
use Laracasts\Flash\Flash;

class ArticlesLikesController extends Controller
{
  public function index()
  {
      return view('like.index');
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

    public function UnLike(Request $request,$id)
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
}
