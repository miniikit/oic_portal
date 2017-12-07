<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportsRisksDealStatusMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_risks_deal_status_master', function (Blueprint $table){
           $table->increments('id');//通報対処状態ID
           $table->string('report_risk_deal_status_name',30);//通報対処状態名
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
        Schema::drop('reports_risks_deal_status_master');
    }
}
