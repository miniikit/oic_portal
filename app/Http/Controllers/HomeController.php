<?php

namespace App\Http\Controllers;

use App\Service\SQLService;
use Illuminate\Http\Request;
use App\Jobs\CheckNewArticles;
use App\ArticleLike;


class HomeController extends Controller
{
    protected $SQLService;

    public function __construct(SQLService $SQLService)
    {
        $this->SQLService = $SQLService;
    }

    // ホーム（記事一覧）
    public function index()
    {
        //$hoge = new CheckNewArticles();

        //$this->dispatch(new CheckNewArticles);

        $articles = $this->SQLService->getArticle();
        $article_like = $this->SQLService->getArticleLike();
        $article_its = $this->SQLService->getArticleIt();
        $article_games = $this->SQLService->getArticleGame();
        $article_designs = $this->SQLService->getArticleDesign();
        $article_arts = $this->SQLService->getArticleArt();
        $article_economys = $this->SQLService->getArticleEconomy();


        return view('home.list', compact('articles', 'article_like','article_its','article_games','article_designs','article_arts','article_economys'));
    }

    public function it()
    {
      $articles = $this->SQLService->getArticle();
      $article_like = $this->SQLService->getArticleLike();
      $article_its = $this->SQLService->getArticleIt();
      $article_games = $this->SQLService->getArticleGame();
      $article_designs = $this->SQLService->getArticleDesign();
      $article_arts = $this->SQLService->getArticleArt();
      $article_economys = $this->SQLService->getArticleEconomy();


      return view('home.list_it', compact('articles', 'article_like','article_its','article_games','article_designs','article_arts','article_economys'));

    }
    public function game()
    {
      $articles = $this->SQLService->getArticle();
      $article_like = $this->SQLService->getArticleLike();
      $article_its = $this->SQLService->getArticleIt();
      $article_games = $this->SQLService->getArticleGame();
      $article_designs = $this->SQLService->getArticleDesign();
      $article_arts = $this->SQLService->getArticleArt();
      $article_economys = $this->SQLService->getArticleEconomy();


      return view('home.list_game', compact('articles', 'article_like','article_its','article_games','article_designs','article_arts','article_economys'));

    }
    public function movie()
    {
      $articles = $this->SQLService->getArticle();
      $article_like = $this->SQLService->getArticleLike();
      $article_its = $this->SQLService->getArticleIt();
      $article_games = $this->SQLService->getArticleGame();
      $article_designs = $this->SQLService->getArticleDesign();
      $article_arts = $this->SQLService->getArticleArt();
      $article_economys = $this->SQLService->getArticleEconomy();


      return view('home.list_movie', compact('articles', 'article_like','article_its','article_games','article_designs','article_arts','article_economys'));

    }
    public function design()
    {
      $articles = $this->SQLService->getArticle();
      $article_like = $this->SQLService->getArticleLike();
      $article_its = $this->SQLService->getArticleIt();
      $article_games = $this->SQLService->getArticleGame();
      $article_designs = $this->SQLService->getArticleDesign();
      $article_arts = $this->SQLService->getArticleArt();
      $article_economys = $this->SQLService->getArticleEconomy();


      return view('home.list_design', compact('articles', 'article_like','article_its','article_games','article_designs','article_arts','article_economys'));

    }

    public function sort(Request $request)
    {
        $data = $request->all();

        $article_its = $this->SQLService->getArticleIt();
        $article_games = $this->SQLService->getArticleGame();
        $article_designs = $this->SQLService->getArticleDesign();
        $article_arts = $this->SQLService->getArticleArt();
        $article_economys = $this->SQLService->getArticleEconomy();

        if($data['sort'] == 1) {
            //いいね数順
            $articles = $this->SQLService->getArticleLike();
        }else if($data['sort'] == 2){
            //コメント数順
            $articles = $this->SQLService->getArticleComment();
        }else{
            //閲覧数順
            $articles = $this->SQLService->getArticle();
        }

        return view('home.list',compact('articles', 'article_like','article_its','article_games','article_designs','article_arts','article_economys'));
    }

    public function genre(Request $request)
    {

    }

}
