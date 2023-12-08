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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('guid')->comment('Уникальный идентификатор склада')->nullable();
            $table->string('type')->comment('Тип склада')->nullable();
            $table->string('phone')->comment('Телефон')->nullable();
            $table->string('view')->comment('Имя склада')->nullable();
            $table->string('city')->comment('Город')->nullable();
            $table->string('address')->comment('Адрес')->nullable();
            $table->string('latitude')->comment('Координаты широты')->nullable();
            $table->string('longitude')->comment('Координаты долготы')->nullable();
            $table->string('operationMode')->comment('Режим работы')->nullable();
            $table->integer('status')->comment('Статус доступности')->default(0);
            $table->integer('delivery_days')->comment('Кол-во дней доставки')->default(0);
            $table->date('delivery_date')->comment('Дата доставки')->nullable();
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
        Schema::dropIfExists('shops');
    }
};
