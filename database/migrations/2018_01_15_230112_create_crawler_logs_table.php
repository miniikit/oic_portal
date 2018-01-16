<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrawlerLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawler_logs_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('news_site_id'); // ニュースサイトID
            $table->integer('schedule_id'); // クローラースケジュールID
            $table->integer('status_id'); // 実行状況 0: 見実行 1: 実行中 2:完了 3:失敗
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crawler_logs_table');
    }
}
