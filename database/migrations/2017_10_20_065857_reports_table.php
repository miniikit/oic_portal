<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_table', function (Blueprint $table){
            $table->increments('id');//通報ID
            $table->integer('report_category_id');//通報カテゴリID
            $table->integer('user_id');//会員ID
            $table->string('report_contents',255);//通報内容
            $table->integer('report_deal_status_id');//通報対処状態ID
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
        Schema::drop('reports_table');
    }
}
