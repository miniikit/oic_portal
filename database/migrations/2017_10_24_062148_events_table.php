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
           $table->string('event_title',100);//イベントタイトル
           $table->text('event_text');//イベント詳細テキスト
           $table->string('event_image',100);//イベント画像
           $table->dateTime('event_start_date_time');//イベント予定日時
           $table->dateTime('event_end_date_time');//イベント終了日時
           $table->integer('event_capacity');//イベント定員数
           $table->integer('event_maker_id');//イベント作成者ID
           $table->timestamps();
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
