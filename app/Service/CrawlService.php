<?php

namespace App\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Goutte\Client;


class CrawlService
{
    public function makeCrient()
    {
        $client = new Client();

        return $client;
    }

    public function getLists($client,$url,$tag_for_url)
    {
        $crawler = $client->request('GET', $url);

        // 記事URL取得
        $urls = $crawler->filter($tag_for_url)->each(function ($node) {
            $results = $node->text();
            return $results;
        });

        return $urls;
    }

    public function getContents($client,$url)
    {
        $crawler = $client->request('GET', $url);

        return $crawler;
    }

    public function getTitle($contents,$tag_for_title)
    {
        $title = $contents->filter($tag_for_title)->each(function ($node) {
            $results = $node->text();
            return $results;
        });

        return $title;
    }

    public function getImages($contents,$tag_for_image)
    {
        $image = $contents->filter($tag_for_image)->each(function ($node) {
            $results = $node->attr('src');
            return $results;
        });

        return $image;
    }

    public function get_contents($client,$url)
    {
        $crawler = $client->request('GET', $url);

        return $crawler;
    }

    /**
     * 記事イメージを取得
     * @param $client
     * @param $urls
     * @return mixed
     */
    public function get_article_images($client,$url, $image_custom_tag)
    {
        $crawler = $this->get_contents($client,$url);
        dd($crawler);

        $crawler = $client->request('GET', $url);
        dd($crawler);

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