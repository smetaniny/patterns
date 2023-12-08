<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для таблицы "заявки на возврат"
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_orders_products', function (Blueprint $table) {
            $table->id();
            $table->string('size')->comment('Размер')->nullable();
            $table->string('insert', 512)->comment('Вставки')->nullable();
            $table->string('quantity')->comment('Количество')->nullable();
            $table->string('ves')->comment('Масса изделия')->nullable();
            $table->string('sum')->comment('Сумма без скидок')->nullable();
            $table->string('discount')->comment('Процент скидки')->nullable();
            $table->string('discount_sum')->comment('Сумма скидки')->nullable();
            $table->decimal('total', 10, 2)->comment('Сумма изделия')->nullable();
            $table->integer('cancel')->comment('Отмена заказа')->default(0);
            $table->decimal('bonus_add', 10, 2)->comment('Сумма начисленных бонусов')->default(0);
            $table->decimal('bonus_subtract', 10, 2)->comment('Сумма списанных бонусов')->default(0);
            $table->timestamps();

            //Столбец, связанный с таблицей возврат товаров
            $table->foreignId('return_order_id')->nullable()->constrained('return_orders')->onUpdate('cascade')->onDelete('restrict')->comment('Связь с таблицей return_orders');
            //Столбец, связанный с таблицей товары
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('restrict')->comment('Связь с таблицей return_orders');

            $table->index(['return_order_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Удаляем таблицу
        Schema::dropIfExists('return_orders_products');
    }
};
