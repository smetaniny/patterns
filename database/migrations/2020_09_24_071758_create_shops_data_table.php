<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $shopsDataTableName = 'shops_data';
        Schema::create($shopsDataTableName, function (Blueprint $table) {
            $table->id();
            $table->string('city', 512)->comment('Город')->nullable();
            $table->integer('tip')->comment('Тип магазина')->nullable();
            $table->string('name', 512)->comment('Название магазина')->nullable();
            $table->string('address', 512)->comment('Адрес магазина')->nullable();
            $table->string('targetx', 512)->comment('Широта')->nullable();
            $table->string('targety', 512)->comment('Долгота')->nullable();
            $table->string('metro', 512)->comment('Станция метро или другой ориентир')->nullable();
            $table->string('phone', 512)->comment('Телефон')->nullable();
            $table->string('operating_mode', 512)->comment('Режим работы')->nullable();
            $table->integer('joint_sale')->comment('Учавствует в совместной акции')->default(0);
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
        $shopsDataTableName = 'shops_data';
        Schema::dropIfExists($shopsDataTableName);
    }
}
