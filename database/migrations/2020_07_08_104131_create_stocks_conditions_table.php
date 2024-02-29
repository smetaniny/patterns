<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks_conditions', function (Blueprint $table) {
            $table->id();

            $table->integer('condition_id')->comment('ID условия акции 1C')->nullable();
            $table->string('condition_name')->comment('Название')->nullable();
            $table->timestamp('date_start')->comment('Старт')->nullable();
            $table->timestamp('date_end')->comment('Конец')->nullable();
            $table->integer('discount')->comment('Скидка')->nullable();
            $table->integer('card_discount_birthday')->comment('Скидка если день рождения')->nullable();
            $table->integer('card_discount_birthday_before')->comment('За сколько дней включить скидку на день рождения')->nullable();
            $table->integer('card_discount_birthday_after')->comment('Через сколько дней выключить скидку на день рождения')->nullable();
            $table->integer('action_group_id')->comment('ID группы акции')->nullable();
            $table->integer('card_discount_group_id')->comment('ID дисконтной карты')->nullable();
            $table->integer('payment_group_id')->comment('ID группы оплаты')->default(0);
            $table->bigInteger('stocks_id')->unsigned()->comment('Связь с таблицей sales');
            $table->foreign('stocks_id')->references('id')->on('sales');

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
        Schema::dropIfExists('stocks_conditions');
    }
}
