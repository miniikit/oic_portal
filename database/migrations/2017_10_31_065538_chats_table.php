<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats_table', function (Blueprint $table){
            $table->increments('id');//チャットID
            $table->integer('chat_user_id');//会員ID
            $table->integer('chat_user2_id');//会員2_ID
            $table->text('chat_text');//チャット内容
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
        Schema::drop('chats_table');
    }
}
