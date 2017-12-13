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

        return view('home.list',compact('articles','article_like'));
    }
}
