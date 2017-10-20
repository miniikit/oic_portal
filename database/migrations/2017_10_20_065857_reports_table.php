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
            $table->increments('id');
            $table->increments('report_category_id');
            $table->increments('user_id');
            $table->string('report_contents',255);
            $table->increments('report_contents');
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
        Schema::drop('reports_table');
    }
}
