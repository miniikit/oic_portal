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
            $table->increments('parent_course_id')->nullable();//親学科カテゴリID
            $table->string('course_depth',2);//深さ
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
        Schema::drop('courses_master');
    }
}
