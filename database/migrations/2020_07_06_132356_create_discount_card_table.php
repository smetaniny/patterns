<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCardTable extends Migration
{
    /**
     * Дисконтные карты
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_card', function (Blueprint $table) {
            $table->id();

            $table->string('name')->comment('Имя')->nullable();
            $table->string('percent_bonuses')->comment('Процент списания бонусов')->nullable();
            $table->string('img')->comment('Изображение карты')->nullable();
            $table->string('threshold')->comment('Пороговая величина')->nullable();

            $table->timestamps();
        });

        DB::table('discount_card')->insert(
            [
                ['id' => 5, 'name' => 'Серебро', 'percent_bonuses' => 10],
                ['id' => 6, 'name' => 'Золото', 'percent_bonuses' => 20],
                ['id' => 7, 'name' => 'Платина', 'percent_bonuses' => 30],
                ['id' => 8, 'name' => 'VIP', 'percent_bonuses' => 40]
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
        Schema::dropIfExists('discount_card');
    }
}
