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
}