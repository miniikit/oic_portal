<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommunitiesParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities_participants_table', function (Blueprint $table) {
            $table->increments('id');//コミュニティ参加者ID
            $table->integer('community_id');//コミュニティID
            $table->integer('user_id');//会員ID
            $table->integer('authority_id');//権限ID
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
        Schema::drop('communities_participants_table');
    }
}
