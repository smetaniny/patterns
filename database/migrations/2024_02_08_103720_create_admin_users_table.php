<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique()->comment('Логин')->nullable();
            $table->string('email')->unique()->comment('Email');
            $table->string('password')->comment('Пароль');
            $table->string('surname')->comment('Фамилия')->nullable();
            $table->string('name')->comment('Имя')->nullable();
            $table->string('patronymic')->comment('Отчество')->nullable();
            $table->string('ip')->comment('IP-адрес')->nullable();
            $table->integer('owner')->comment('Владелец')->default(0);
            $table->integer('is_active')->comment('Блокировка пользователя')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        // Создаем главного пользователя
        DB::table('admin_users')->insert(
            [
                ['login' => 'admin', 'email' => 'platina-developer@yandex.ru', 'password' => Hash::make('admin'), 'owner' => 1, 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
};
