<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAdminTable extends Migration
{
    /**
     * Пользователи админки
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_admin', function (Blueprint $table) {
            $table->id();

            $table->string('login')->comment('Логин')->unique()->nullable();
            $table->string('password')->comment('Пароль');
            $table->string('password_start')->comment('Пароль стартовый');
            $table->string('surname')->comment('Фамилия')->nullable();
            $table->string('name')->comment('Имя')->nullable();
            $table->string('patronymic')->comment('Отчество')->nullable();
            $table->string('email')->unique()->comment('Email');
            $table->timestamp('email_verified_at')->nullable()->comment('Дата проверки email');
            $table->string('ip')->comment('IP-адрес')->nullable();
            $table->text('token')->comment('Токен')->nullable();
            $table->integer('status')->comment('Блокировка пользователя')->nullable();

            $table->integer('who_made_edits')->comment('id user — кто внес изменения')->nullable();

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
        Schema::dropIfExists('users_admin');
    }
}
