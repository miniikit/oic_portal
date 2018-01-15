<?php

namespace App\Http\Controllers\Manage;

use App\Service\CrawlerScheduleService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\CheckNewArticles;

use App\Service\SQLService;

class CrawlScheduleController extends Controller
{
    protected $crawlerScheduleService;

    public function __construct(CrawlerScheduleService $crawlerScheduleService)
    {
        $this->crawlerScheduleService = $crawlerScheduleService;
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
        $SQLService = new SQLService();


        // 全スケジュール
        $tasks = $SQLService->getCrawlSchedules();
        $status = $this->crawlerScheduleService->check();

        if ($status === true) {
            $status_message = "実行中";
        } else {
            $status_message = "停止中";
        }

        return view('manage.crawl.home', compact('tasks', 'status_message'));
    }


    // 手動実行
    public function execute(Request $request)
    {
        if (!$request->has('execute') && $request->input('execute') == "execute") {
            return redirect()->route('manager_crawl_home');
        }

        $SQLService = new SQLService();
        $result = $SQLService->addCrawler();

        if($result){
            // DB完了
        } else {
            // DB登録失敗
        }

        // 一時的
        return redirect()->route('manager_crawl_home');

    }


    // キャンセル
    public function cancel(Request $request)
    {
        if (!$request->has('cancel') && $request->input('cancel') == "cancel") {
            return redirect()->route('manager_crawl_home');
        }

        $SQLService = new SQLService();
        $result = $SQLService->cancelCrawler();

        if($result){
            // DB完了
        } else {
            // DB登録失敗
        }

        // 一時的
        return redirect()->route('manager_crawl_home');

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
        $SQLService = new SQLService();
        // TODO : 画面埋め込み
        $task = $SQLService->getCrawlSchedule($id);

        return view('manage.crawl.detail', compact('id', 'task'));
    }

    public function edit()
    {
        return view('manage.crawl.edit');
    }

    public function update($id, Request $request)
    {
        //dd($id,$request->all());
    }

    public function delete($id, Request $request)
    {
        //dd($id,$request->all());
    }
}
