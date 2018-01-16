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
        Schema::create('articles_table', function (Blueprint $table) {
            $table->increments('id'); // 記事ID
            $table->string('article_title', 255); // 記事タイトル
            $table->text('article_text'); // 記事本文
            $table->string('article_image', 100); // 記事画像
            $table->integer('news_site_id')->nullable(); // ニュースサイトID
            $table->text('article_url'); // 記事URL
            $table->text('article_original_url')->nullable(); // 引用元URL
            $table->integer('likes_count')->default(0); //Likeカウント TODO : default 0はintegerの場合デフォルトでセットされると
            $table->integer('user_id')->nullable();
            $table->integer('article_category_id'); //カテゴリID
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
        Schema::drop('articles_table');
    }
}
