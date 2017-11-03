<?php

namespace App\Http\Controllers\Crawl;

use function GuzzleHttp\Psr7\parse_request;
use Illuminate\Http\Request;
use App\Service\CrawlService;
use App\Http\Controllers\Controller;
use Goutte\Client;

class CrawlController extends Controller
{
    protected $crawlService;
    public function __construct(CrawlService $crawlService)
    {
        $this->crawlService = $crawlService;
    }

    public function customeCheck()
    {
        // TARGET PATH
        $rss_url = 'http://feed.rssad.jp/rss/gigazine/rss_2.0'; //サイトURL
        $articles_list_tag = 'item link';   // 記事一覧を取得するためのタグ

        // 処理
        $client = new Client();
        $crawler = $client->request('GET', $rss_url);

        // 記事URL取得
        $urls = $crawler->filter($articles_list_tag)->each(function ($node) {
            $results = $node->text();
            return $results;
        });

    }

    public function getRss()
    {
        // TARGET PATH
        $rss_url = 'http://feed.rssad.jp/rss/gigazine/rss_2.0';
        $articles_list_tag = 'item link';

        // 初期設定
        $client = new Client();
        $crawler = $client->request('GET', $rss_url);

        // 記事URL取得
        $urls = $crawler->filter($articles_list_tag)->each(function ($node) {
            $results = $node->text();
            return $results;
        });


        // DBに一致する記事があるか検索する処理
        $article_url = $urls[0];
        $image_custom_tag = 'div.cntimage a img';

        //　記事イメージを取得
        $article_images = $this->crawlService->get_article_images($client,$article_url,$image_custom_tag);
        /*
        $article_url = $urls[0];
        $crawler = $client->request('GET', $article_url);
        $article_images = $crawler->filter('div.cntimage a img')->each(function ($node) {
            $results = $node->attr('src');
            return $results;
        });
        */


        // 記事イメージ取得失敗時
        if (!$article_images) {

        }

        $article_text_tag = '#article div.cntimage p';

        // 記事本文を取得
        $article_text = $crawler->filter($article_text_tag)->each(function ($node) {
            $result = $node->text();
            return $result;
        });

        // DBに格納

        return view('crawl', compact('urls'));
    }

    public function getImage()
    {
        dd(123);
    }

    public function get()
    {
        $client = new Client();

        $crawler = $client->request('GET', 'http://photoshopvip.net/');


        // 記事URL取得
        $urls = $crawler->filter('#main article div a')->each(function ($node) {
            $results = $node->attr('href');
            return $results;
        });
        dd($urls);

        //dd($crawler->filter('article'));

        return view('crawl', compact('links', 'titles'));

        // タイトル
        $crawler->filter('title')->each(function ($node) {
            echo $node->text();
        });

        //
    }
}
