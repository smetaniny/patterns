<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Имя')->nullable();
            $table->string('phone')->comment('Телефон')->nullable();
            $table->string('email')->comment('Email')->nullable();
            $table->string('position')->comment('Желаемая должность')->nullable();
            $table->text('link_to_resume')->comment('Ссылка на резюме')->nullable();
            $table->text('description')->comment('Текст резюме')->nullable();
            $table->string('checkedPersonal')->comment('Согласие на обработку персональных данных')->nullable();
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
        Schema::dropIfExists('vacancies');
    }
}
