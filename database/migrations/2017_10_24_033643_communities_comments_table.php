<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommunitiesCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities_comments_table', function (Blueprint $table){
           $table->increments('id');//コミュニティコメントID
           $table->integer('community_id');//コミュニティID
           $table->integer('user_id');//会員ID
           $table->string('community_comment_contents',255);//コメント内容
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
        Schema::drop('communities_comments_table');
    }
}
