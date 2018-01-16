<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

//use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Crawl\CrawlController;
use App\Service\CrawlService;
use App\Service\SQLService;
use App\Http\Controllers\Controller;
use Goutte\Client;
use Carbon\Carbon;

class CheckNewArticles implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->doWhile();
    }

    public function doWhile()
    {
        $next_time = Carbon::now();

        while (true) {
            $next_time = $this->dateCheck($next_time);

            time_sleep_until($next_time);

            //dd("一周");
        }
    }


    public function dateCheck($next)
    {
        $SQLService = new SQLService();

        $now = Carbon::now();

        // 時刻をすぎていれば
        if ($now->gte($next)) {

            // TODO : 実行処理の記述
            $status = $SQLService->checkCrawlStatus();

            if(isset($status) && $status->crawl_status_id != 2){
                return $now->addMinute();
            }

            $this->getLists();


            // 次回実行時刻
            $next = Carbon::now()->addHour();

            //$next = Carbon::now()->addHour(12);
            time_sleep_until($next);
            return true;
        }

        // 次回実行時刻
        $next = Carbon::now()->addMinute(10);

        //dd("test fin");
        return $next;
    }


    public function getLists()
    {
        $SQLService = new SQLService();
        $crawlService = new CrawlService();



        $sites = $SQLService->getAllSites();

        foreach ($sites as $site) {

            // TARGET PATH
            $site_id = $site->id;
            $category_id = $SQLService->getNewsSiteCategoryId($site_id);

            $url = $site->news_site_url;    // サイト自体のURL
            $tag_for_url = $site->news_site_tag_url;    // 記事URL
            $tag_for_title = $site->news_site_tag_title;
            $tag_for_image = $site->news_site_tag_image;
            $tag_for_text = $site->news_site_tag_text;

            // 初期設定
            $client = $crawlService->makeCrient();
            $urls = $crawlService->getLists($client, $url, $tag_for_url);
            $titles = $crawlService->getLists($client, $url, $tag_for_title);

            /*
            // サイトに更新があるか確認
            $latest_2_article_urls = $crawlService->getLatest2ArticleUrlByDB($site_id);
            //$latest_article_url = "http://gigazine.net/news/20171128-dennys-cheese-dak-galbi/";
            dd($latest_2_article_urls);


            $a = \DB::table('articles_table')->where('news_site_id','=',2)->orderBy('id','desc')->limit(2)->select('articles_table.article_url')->get();


            // $urlsの中にDBの最終URLが含まれているか確認
            if(in_array($latest_2_article_urls[0]->article_url,$urls)){

                $result = $crawlService->checkNewArticle($latest_2_article_urls,$urls);

            } else {
                //dd($latest_2_article_urls,"false",$urls);
            }
            */




            // 取得した新着記事URL一覧のうち、DBにあるものを除外する
            for ($i = 0; $i < count($urls); $i++) {
                $urls = $crawlService->checkUrlInDB($urls, $site_id);
            }

            /*
            // 取得URLが存在しない場合
            if(count($urls) < 1){
                $SQLService->updateCrawlerLog($site_id);
            }
            */


            // 記事取得＋DB挿入
            for ($i = count($urls) - 1; $i > 0; $i--) {

                // 記事取得
                $contents = $crawlService->getContents($client, $urls[$i]);
                //$title = $crawlService->getTitle($contents,$tag_for_title);
                //dd($title,$tag_for_title);
                $title = $titles[$i];
                // 本来 $title = $crawlService->getTitle($contents,$tag_for_title);
                $image = $crawlService->getImages($contents, $tag_for_image);
                $texts = $crawlService->getText($contents, $tag_for_text);

                // 配列から変数に変換
                $resultText = "";
                foreach ($texts as $text) {
                    $resultText = $resultText . $text;
                }


                // 不要文字列除去
                //$text = $crawlService->replaceWord($text);

                // DB挿入
                // $query = $SQL->insertArticle($title, $image[0], $resultText,$urls[$i], $site_id);
                $query = $SQLService->insertArticle($title, $image, $resultText, $urls[$i], $site_id, $category_id);
                //dd(123);
            }

        }

       // $articles = $SQLService->getArticlesTEST();
       // dd(555, $articles);

    }





    /*
    public function getArticle()
    {
        $crawlService = new CrawlService();

        $SQL = new SQLService();
        $sites = $SQL->getRssSites();

        $cnt = 0;
        foreach ($sites as $site) {

            if($cnt++ >= 1){
                break;
            }

            // TARGET PATH
            $site_id = $site->id;
            $url = $site->news_site_url;    // サイト自体のURL
            $tag_for_url = $site->news_site_tag_url;    // 記事URL
            $tag_for_title = $site->news_site_tag_title;
            $tag_for_image = $site->news_site_tag_image;
            $tag_for_text = $site->news_site_tag_text;


            $new = $crawlService->newArticleCheck($site_id);

            // 初期設定
            $client = $crawlService->makeCrient();
            $urls = $crawlService->getLists($client, $url, $tag_for_url);
            $titles = $crawlService->getLists($client, $url, $tag_for_title);


            for ($i = count($urls) - 1; $i > 0; $i--) {
                // 記事取得
                $contents = $crawlService->getContents($client, $urls[$i]);
                $title = $titles[$i];
                $article_url = $client->getHistory()->current()->getUri();
                //本来 $title = $crawlService->getTitle($contents,$tag_for_title);
                //$image = $crawlService->getImages($contents,$tag_for_image);
                //$text = $crawlService->getText($contents,$tag_for_text);

                // 不要文字列除去
                //$text = $crawlService->replaceWord($text);

                // DB挿入
                $query = $SQL->insertArticle($title, 'test image path', 'test text',$article_url, $site_id);
            }
        }

    }
    */


}
