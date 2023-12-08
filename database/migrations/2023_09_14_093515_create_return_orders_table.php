<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Миграция для таблицы "возврат товаров"
 */
return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_orders', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default("Новая")->comment('Статус заявки на возврат: Новая / На рассмотрении / Требуется осмотр / В работе / Одобрена / Выполнена / Отклонена');
            $table->decimal('total', 10, 2)->comment('Сумма возврата')->nullable();
            $table->integer('quantity')->comment('Количество возврата')->nullable();
            $table->decimal('ves', 10, 2)->comment('Вес возврата')->nullable();
            $table->string('type')->default('Отказ от заказа')->comment('Вид заявки: Отказ от заказа / Надлежащее качество / Обмен украшений / Ненадлежащее качество / Гарантийный ремонт / Негарантийный ремонт');
            $table->string('refund_method')->nullable()->comment('Метод возврата денежных средств: bankCard - на ту же карту / bankAccount - по реквизитам на счет');
            $table->string('bankAccount_inn')->nullable()->comment('ИНН полуполучателя');
            $table->string('bankAccount_number')->nullable()->comment('Номер счета покупателя');
            $table->string('bankAccount_bik')->nullable()->comment('БИК банка');
            $table->string('bankAccount_correspondent_number')->nullable()->comment('Корреспондентский счет банка');
            $table->string('address')->nullable()->comment('Адрес проживания');
            $table->text('photo')->nullable()->comment('Фото товара к возврату');
            $table->string('reason_for_return', 1024)->nullable()->comment('Причина возврата');
            $table->date('received_date')->nullable()->comment('Дата получения заказа');
            $table->string('managers_comment', 1024)->comment('Комментарий менеджера')->nullable();
            $table->timestamps();

            //Столбец, связанный с таблицей заказов
            $table->foreignId('order_id')->constrained('orders')->onUpdate('cascade')->onDelete('restrict')->comment('Связь с таблицей orders');
            //Столбец, связанный с таблицей пользователей
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('restrict')->comment('Связь с таблицей users');

            $table->index(['order_id', 'user_id']);
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
        Schema::dropIfExists('return_orders');
    }
};
