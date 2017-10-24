<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_table', function (Blueprint $table){
           $table->increments('id');//イベントID
           $table->string('event_title');//イベントタイトル
           $table->string('event_text');//イベント詳細テキスト
           //イベント予定日時
           //イベント終了日時
           $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events_table');
    }
}
