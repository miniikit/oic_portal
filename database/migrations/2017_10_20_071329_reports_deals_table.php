<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportsDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_deals_table', function (Blueprint $table){
            $table->increments('id');//通報対処ID
            $table->integer('report_id');//通報ID
            $table->integer('user_id');//会員ID
            $table->string('report_deal_comment',300);//コメント
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
        Schema::drop('reports_deals_table');
    }
}
