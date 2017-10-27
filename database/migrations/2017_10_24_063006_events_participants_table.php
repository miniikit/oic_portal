<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventsParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_participants_table', function (Blueprint $table){
           $table->increments('id');//イベント参加者ID
           $table->integer('event_id');//イベントID
           $table->integer('event_user_id');//会員ID
           $table->integer('event_authority_id');//権限ID
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
        Schema::drop('events_participants_table');
    }
}
