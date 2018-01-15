<?php

namespace App\Service;

use Carbon\Carbon;
use function GuzzleHttp\default_ca_bundle;
use Illuminate\Support\Facades\DB;
use Goutte\Client;
use App\Service\SQLService;


class CrawlerScheduleService
{

    protected $sqlService;

    public function __construct(SQLService $sqlService)
    {
        $this->sqlService = $sqlService;
    }

    /**
     * 現在のクローラー動作状態を返却
     * @return bool
     */
    public function check()
    {
        $status = $this->sqlService->checkCrawlStatus();

        if(count($status)){
            return true;    // 動作中
        } else {
            return false;   // 動作なし
        }
    }
}