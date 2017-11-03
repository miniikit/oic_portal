<?php

namespace App\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Goutte\Client;


class CrawlService
{
    /**
     * ソースを返却
     * @param $url
     * @return \Symfony\Component\DomCrawler\Crawler
     */
    public function get_contents($url)
    {
        $client = new Client();

        $crawler = $client->request('GET', $url);

        return $crawler;
    }

    /**
     * 記事イメージを取得
     * @param $client
     * @param $urls
     * @return mixed
     */
    public function get_article_images($url, $image_custom_tag)
    {
        $crawler = $this->get_contents($url);

        $article_images = $crawler->filter($image_custom_tag)->each(function ($node) {
            $results = $node->attr('src');
            return $results;
        });

        return $article_images;
    }

    public function get_article_texts($url)
    {

    }


}