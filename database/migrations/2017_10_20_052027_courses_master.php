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
            $table->string('course_depth',2);//深さ
            $table->dateTime('course_admission_year');//年度
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
