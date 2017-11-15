<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CoursesMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_master', function (Blueprint $table){
            $table->increments('id');//学科カテゴリID
            $table->string('course_name', 255);//カテゴリ名
            $table->integer('parent_course_id');//親学科カテゴリID
            $table->integer('course_depth');//深さ
            $table->integer('course_year');// 何年制
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
        Schema::drop('courses_master');
    }
}
