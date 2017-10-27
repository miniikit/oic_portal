<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportsRisksCategoriesMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_risks_categories_master', function (Blueprint $table){
            $table->increments('id');//通報危険度カテゴリID
            $table->string('report_risk_category_name',30);//通報危険度カテゴリ名
            $table->string('report_risk_num',3);//リスク数値
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
        Schema::drop('reports_risks_categories_master');
    }
}
