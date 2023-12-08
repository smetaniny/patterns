<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('return_orders', function (Blueprint $table) {
            $table->string('phone')->comment('Телефон')->nullable();
            $table->string('email')->comment('Email')->nullable();
            $table->string('surname')->comment('Фамилия')->nullable();
            $table->string('name')->comment('Имя')->nullable();
            $table->string('patronymic')->comment('Отчество')->nullable();
            $table->date('date_of_birth')->comment('Дата рождения')->nullable();
            $table->string('passport_series')->comment('Паспорт серия')->nullable();
            $table->string('passport_number')->comment('Паспорт номер')->nullable();
            $table->date('passport_date_of_issue')->comment('Паспорт дата выдачи')->nullable();
            $table->string('passport_date_of_division')->comment('Паспорт код подразделения')->nullable();
            $table->text('passport_issued_by_whom')->comment('Паспорт кем выдан')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('return_orders', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'email',
                'surname',
                'name',
                'patronymic',
                'date_of_birth',
                'passport_series',
                'passport_number',
                'passport_date_of_issue',
                'passport_date_of_division',
                'passport_issued_by_whom',
            ]);
        });
    }
};
