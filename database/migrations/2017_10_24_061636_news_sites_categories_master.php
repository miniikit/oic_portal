<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsSitesCategoriesMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_sites_categories_master', function (Blueprint $table){
           $table->increments('id');//ニュースサイトカテゴリID
           $table->string('news_site_category_name',50);//ニュースサイトカテゴリ名
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
        Schema::drop('news_sites_categories_master');
    }
}
