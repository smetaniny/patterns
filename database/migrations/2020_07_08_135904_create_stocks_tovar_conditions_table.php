<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTovarConditionsTable extends Migration
{
    /**
     * Таблица условий акции — на чек в карзине
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks_tovar_conditions', function (Blueprint $table) {
            $table->id();

            $table->integer('action_group_id')->comment('Группа товаров')->nullable();
            $table->integer('quantity')->comment('Количество товаров из данной группы, которые должны быть в корзине')->nullable();
            $table->bigInteger('stocks_conditions_id')->unsigned()->comment('Связь с таблицей stocks_conditions');
            $table->foreign('stocks_conditions_id')->references('id')->on('stocks_conditions');

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
        Schema::dropIfExists('stocks_tovar_conditions');
    }
}
