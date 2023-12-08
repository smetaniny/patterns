<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_firebase_connect', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned()->comment('ID Пользователя')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');

            $table->string('device_id')->comment('Уникальный номер телефона пользователя')->nullable();
            $table->string('token_firebase')->comment('Регистрационный токен пользователя для соединения с Firebase')->nullable();

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
        Schema::dropIfExists('app_firebase_connect');
    }
};
