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
        Schema::create('profiles_master', function (Blueprint $table){
            $table->increments('id');//プロフィールID
            $table->string('profile_image');//プロフィール画像
            $table->string('profile_name',255);//プロフィール名
            $table->integer('profile_scyear');//学年
            $table->integer('course_id');//学科カテゴリID
            $table->dateTime('profile_admission_year');//入学年度
            $table->text('profile_url')->nullable();//URL
            $table->text('profile_introduction')->nullable();//自己紹介
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
        Schema::drop('profiles_master');
    }
}
