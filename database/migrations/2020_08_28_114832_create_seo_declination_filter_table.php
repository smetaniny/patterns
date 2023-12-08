<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoDeclinationFilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_declination_filter', function (Blueprint $table) {
            $table->id();

            $table->string('filter_item')->comment('Категория фильтра')->nullable();

            $table->string('filter_value')->comment('Как пришел с 1С')->nullable();
            $table->string('filter_valueAlias')->comment('Как пришел с 1С - транслит')->nullable();

            $table->string('catalog')->comment('Для каталога')->nullable();
            $table->string('detailed')->comment('Для деталки')->nullable();

            $table->integer('filter_item_check')->comment('Правили в админке')->nullable();

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
        Schema::dropIfExists('seo_declination_filter');
    }
}
