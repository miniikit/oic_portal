<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');//会員ID
            $table->string('email',255)->unique();//メールアドレス
            $table->string('name',255);//氏名
            $table->string('name_kana',255);//フリガナ
            $table->integer('authority_id');//権限ID
            $table->integer('course_id');//学科カテゴリID
            $table->integer('profile_id');//プロフィールID
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
