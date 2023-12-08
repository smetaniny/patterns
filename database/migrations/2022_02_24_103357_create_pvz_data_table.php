<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePvzDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pvz_data', function (Blueprint $table) {
            $table->id();
            $table->string('region')->comment('Регион')->nullable();
            $table->string('city')->comment('Город')->nullable();
            $table->bigInteger('city_code')->comment('Код города')->nullable();
            $table->string('type')->comment('Служба доставки')->nullable(); // (dpd, ozon)
            $table->string('view')->comment('Вид (ПВЗ или постамат)')->nullable();
            $table->string('code')->comment('Код ПВЗ')->nullable();
            $table->string('latitude')->comment('Широта')->nullable();
            $table->string('longitude')->comment('Долгота')->nullable();
            $table->string('address', 1024)->comment('Данные о городе, улице, доме')->nullable();
            $table->string('howToGet', 8192)->comment('Описание как добраться')->nullable();
            $table->string('phone')->comment('Телефон ПВЗ')->nullable();
            $table->string('operationMode')->comment('Режим работы')->nullable();
            $table->integer('status')->comment('Статус ПВЗ')->nullable(); // Существует или уже нет
            $table->string('value', 1024)->comment('Значение для списка')->nullable();
            $table->string('label', 1024)->comment('Представление для списка')->nullable();
            $table->boolean('have_cashless')->comment('Признак наличия терминала оплаты')->default(false);
            $table->boolean('have_cash')->comment('Признак оплаты наличными')->default(false);
            $table->integer('delivery_days')->comment('Кол-во дней доставки')->default(0);
            $table->date('delivery_date')->comment('Дата доставки')->nullable();
            $table->decimal('delivery_sum', 10, 2)->comment('Стоимость доставки')->default(0);
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
        Schema::dropIfExists('pvz_data');
    }
}
