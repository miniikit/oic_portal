<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportsRisksMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_risks_master', function (Blueprint $table){
            $table->increments('id');//通報危険度ID
            $table->string('report_risk_name',30);//カテゴリ名
            $table->string('report_risk_num',3);//リスク数値
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
        Schema::drop('reports_risks_master');
    }
}
