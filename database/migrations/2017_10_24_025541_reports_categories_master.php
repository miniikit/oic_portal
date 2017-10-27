<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportsCategoriesMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_categories_master', function (Blueprint $table){
            $table->increments('id');//通報カテゴリID
            $table->string('report_category_name',30);//通報カテゴリ名
            $table->integer('report_risk_id');//危険度ID
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
        Schema::drop('reports_categories_master');
    }
}
