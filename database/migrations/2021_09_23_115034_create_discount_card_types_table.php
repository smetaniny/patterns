<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCardTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $discountCardTypesTable = 'discount_card_types';

        Schema::create($discountCardTypesTable, function (Blueprint $table) use ($discountCardTypesTable) {
            $table->id();
            $table->string('name')->comment('Имя')->nullable();
            $table->integer('threshold')->comment('Пороговая величина')->nullable();
            $table->string('img')->comment('Изображение карты')->nullable();
            $table->timestamp('created_at')->useCurrent()->comment('Дата создания');
            $table->timestamp('updated_at')->useCurrent()->comment('Дата обновления');
        });

        DB::table($discountCardTypesTable)->insert(
            [
                ['id' => 1, 'name' => 'SILVER', 'threshold' => 0, 'img' => '/img/account/silver.png'],
                ['id' => 2, 'name' => 'GOLD', 'threshold' => 50000, 'img' => '/img/account/gold.png'],
                ['id' => 3, 'name' => 'PLATINUM', 'threshold' => 150000, 'img' => '/img/account/platinum.png'],
                ['id' => 4, 'name' => 'DIAMOND', 'threshold' => 250000, 'img' => '/img/account/vip.png']
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
        $discountCardTypesTable = 'discount_card_types';
        Schema::dropIfExists($discountCardTypesTable);
    }
}
