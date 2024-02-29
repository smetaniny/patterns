<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $ordersTableName = 'orders';
        $usersTableName = 'users';

        Schema::create($ordersTableName, function (Blueprint $table) use ($ordersTableName, $usersTableName) {
            $table->id();
            $table->string('address')->comment('Адрес доставки')->nullable();
            $table->string('payment_method')->comment('Метод оплаты')->nullable();
            $table->string('source_from')->comment('Источник откуда заказ')->nullable();
            $table->string('promo_id')->comment('Номер промокода')->nullable();
            $table->decimal('promo_sum', 10)->comment('Сумма промокода если применился')->default(0);
            $table->string('promo_type')->comment('Тип промокода, сумма или процент')->nullable();
            $table->string('card_id')->comment('Номер дисконтной карты, если есть')->nullable();
            $table->integer('quantity')->comment('Количество заказанных изделий')->nullable();
            $table->decimal('ves', 10)->comment('Вес')->nullable();
            $table->decimal('total', 10)->comment('Конечная сумма заказа к оплате')->nullable();
            $table->decimal('certificate_sum', 10)->comment('Сумма примененного сертификата')->nullable();
            $table->decimal('cost', 10)->comment('Себестоимость заказа')->nullable();
            $table->string('shipping_method')->comment('Способ доставки')->nullable();
            $table->decimal('shipping_sum', 10)->comment('Стоимость доставки')->nullable();
            $table->string('shipping_track_number')->comment('Трэк номер от службы доставки')->nullable();
            $table->text('comment')->comment('Комментарий к заказу')->nullable();
            $table->integer('exchange_statuses')->comment('Статус обмена с 1с')->default(1);
            $table->string('payment_id_sberbank')->comment('ID заказа в системе сбербанка')->nullable();
            $table->string('payment_bank')->comment('Платежный банк')->nullable();
            $table->bigInteger('users_id')->unsigned()->comment('Связь с таблицей users');
            $table->integer("send_status")->comment('Статус отправки писем по заказам')->default(0);
            $table->integer("isFitting")->comment('Примерка')->default(0);
            $table->integer('clientId')->comment('ID клиента для аналитики')->nullable();
            $table->integer('ignoreStatistics')->comment('Не учитывать в статистике')->default(0);
            $table->decimal('onlineDiscount', 10)->comment('Скидка при онлайн оплате/рассрочке')->nullable();
            $table->string('bankFormUrl')->comment('URL для оплаты через сбер')->nullable();
            $table->string('delivery_service')->comment('Служба доставки')->nullable();
            $table->date('delivery_date')->comment('Дата доставки')->nullable();
            $table->string('managers_comment', 1024)->comment('Комментарий менеджера')->nullable();
            $table->string('delivery_type')->comment('Тип доставки')->nullable();
            $table->string('recipient_surname')->comment('Фамилия получателя')->nullable();
            $table->string('recipient_name')->comment('Имя получателя')->nullable();
            $table->string('recipient_phone')->comment('Телефон получателя')->nullable();
            $table->string('recipient_email')->comment('Email получателя')->nullable();
            $table->boolean('managers_call')->comment('Требуется звонок менеджера');
            $table->timestamps();

            $table->foreign('users_id', "{$ordersTableName}_users_id_foreign")
                ->references('id')
                ->on($usersTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $ordersTableName = 'orders';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($ordersTableName, function (Blueprint $table) use ($ordersTableName) {
                $table->dropForeign("{$ordersTableName}_users_id_foreign");
                $table->dropColumn('users_id');
            });
        }

        Schema::dropIfExists($ordersTableName);
    }
}
