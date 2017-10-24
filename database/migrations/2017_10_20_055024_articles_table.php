<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_table', function (Blueprint $table){
            $table->increments('id');//記事ID
            $table->string('article_title',255);//記事タイトル
            $table->text('article_text');//記事本文
            $table->string('article_image',100);//記事画像
            $table->increments('news_site_id');//ニュースサイトID
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
        Schema::drop('articles_table');
    }
}
