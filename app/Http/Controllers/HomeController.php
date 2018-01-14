<?php

namespace App\Http\Controllers;

use App\Service\SQLService;
use Illuminate\Http\Request;
use App\Jobs\CheckNewArticles;
use App\ArticleCategory;


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

        $categories = app(ArticleCategory::class)->get();

        $articles = $this->SQLService->getArticle();
        $article_like = $this->SQLService->getArticleLike();
        $article_its = $this->SQLService->getArticleIt();
        $article_games = $this->SQLService->getArticleGame();
        $article_designs = $this->SQLService->getArticleDesign();
        $article_arts = $this->SQLService->getArticleArt();
        $article_economys = $this->SQLService->getArticleEconomy();


        return view('home.list', compact('articles', 'article_like','article_its','article_games','article_designs','article_arts','article_economys','categories'));
    }


    public function sort(Request $request)
    {
        $data = $request->all();

        $categories = app(ArticleCategory::class)->get();

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

        return view('home.list',compact('articles', 'categories'));
    }

    public function genre(Request $request)
    {
        $data = $request->all();

        $category_model = app(ArticleCategory::class);

        $postCategory = $category_model->where('id',$data['category'])->first();

        $categories = $category_model->get();

        $categoryId = $data['category'];

        if($data['category'] == 1){
            $articles = $this->SQLService->getArticleIt();
        }else if($data['category'] == 2){
            $articles = $this->SQLService->getArticleGame();
        }else if($data['category'] == 3){
            $articles = $this->SQLService->getArticleDesign();
        }else if($data['category'] == 4){
            $articles = $this->SQLService->getArticleArt();
        }else if($data['category'] == 5){
            $articles = $this->SQLService->getArticleEconomy();
        }else{
            $articles = $this->SQLService->getArticleOther();
        }

        return view('home.list',compact('articles','categories','postCategory','categoryId'));
    }

}
