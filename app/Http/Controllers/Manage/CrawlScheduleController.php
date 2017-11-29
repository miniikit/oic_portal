<?php

namespace App\Http\Controllers\Manage;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\CheckNewArticles;

use App\Service\SQLService;


class CrawlScheduleController extends Controller
{
    protected $sqlService;

    public function __construct(SQLService $sqlService)
    {
        $this->sqlService = $sqlService;
    }


    public function start()
    {
        $this->dispatch(new CheckNewArticles);
    }

    /**
     * ホーム画面　TODO : viewに値埋め込み、Service切り分け
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        // 全スケジュール
        $tasks = $this->sqlService->getCrawlSchedules();
        // 未実行
        $scheduled = array();

        // 開始時刻を過ぎているもの
        $finished = array();

        $now = Carbon::now();

        // 未実行と実行完了を切り分け
        foreach($tasks as $task)
        {
            if($task->crawl_start_time >= $now) {
                $scheduled[] = $task;
            } else {
                $finished[] = $task;
            }
        }
        return view('manage.crawl.home',compact('tasks','scheduled','finished'));
    }

    public function index()
    {
        // TODO : homeと統合？必要？
        return view('manage.crawl.list');
    }

    /**
     * クローラースケジュール詳細画面
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        // TODO : 画面埋め込み
        $task = $this->sqlService->getCrawlSchedule($id);

        return view('manage.home',compact('id','task'));
    }

    public function edit()
    {
        return view('manage.home');
    }

    public function update($id,Request $request)
    {
        //dd($id,$request->all());
    }

    public function delete($id,Request $request)
    {
        //dd($id,$request->all());
    }
}
