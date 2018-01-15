<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrawlerScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawler_schedule_table', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('crawl_start_time');   // Crawl開始時刻
            $table->dateTime('crawl_end_time')->nullable();    // Crawl終了時刻
            $table->integer('crawl_status_id'); // Crawl状態
            $table->integer('added_articles_count');  // 追加個数
            $table->integer('user_id'); // 担当者ID
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
        Schema::dropIfExists('crawler_schedule_table');
    }
}
