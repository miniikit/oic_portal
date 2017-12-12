<?php

namespace App\Service;

use Carbon\Carbon;
use function GuzzleHttp\default_ca_bundle;
use Illuminate\Support\Facades\DB;
use Goutte\Client;


class CommonService
{
    /**
     * フォームのinputタグのdatetime-localのvalue用に、DBのdatatimeを変換
     * @param $datetime
     * @return string
     */
    public function ChangeDateToFormFormat($datetime)
    {
        $date = substr($datetime,0,10);
        $time = substr($datetime,11,5);
        $new_datetime = $date . 'T' . $time;
        return $new_datetime;
    }
}