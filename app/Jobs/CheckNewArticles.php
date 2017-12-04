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
            $this->dateCheck($next_time);
            dd("end one");
        }
    }

    public function dateCheck($next)
    {
        $now = Carbon::now();

        // 時刻をすぎていれば
        if ($now->gte($next)) {

            //$this->getArticle();

            // 次回実行時刻
            $next = Carbon::now()->addMinute(12);

            //$next = Carbon::now()->addHour(12);
            time_sleep_until($next);
            return true;
        }

        dd("none");
        return false;
    }

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
                //本来 $title = $this->crawlService->getTitle($contents,$tag_for_title);
                //$image = $this->crawlService->getImages($contents,$tag_for_image);
                //$text = $this->crawlService->getText($contents,$tag_for_text);

                // 不要文字列除去
                //$text = $this->crawlService->replaceWord($text);

                // DB挿入
                $query = $SQL->insertArticle($title, 'test image path', 'test text',$article_url, $site_id);
            }
        }

    }


}
