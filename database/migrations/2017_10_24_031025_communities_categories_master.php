<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommunitiesCategoriesMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities_categories_master', function (Blueprint $table){
           $table->increments('community_category_id');//コミュニティカテゴリID
           $table->string('community_category_name',255);//コミュニティカテゴリ名
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
        Schema::drop('communities_categories_master');
    }
}
