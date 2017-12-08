<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticlesCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_comments_table', function (Blueprint $table){
            $table->increments('id');//記事コメントID
            $table->integer('article_id');//記事ID
            $table->integer('user_id');//会員ID
            $table->string('article_comment_text',255);//記事コメント内容
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
        Schema::drop('articles_comments_table');
    }
}
