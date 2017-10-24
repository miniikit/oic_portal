<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles_table', function (Blueprint $table){
            $table->increments('id');//プロフィールID
            $table->string('profile_image');//プロフィール画像
            $table->string('profile_name',255);//プロフィール名
            $table->increments('course_id');//学科カテゴリID
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
        Schema::drop('profiles_table');
    }
}