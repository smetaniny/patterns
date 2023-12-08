<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersInfoStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $ordersInfoStatusesTableName = 'orders_info_statuses';

        Schema::create($ordersInfoStatusesTableName, function (Blueprint $table) use ($ordersInfoStatusesTableName) {
            $table->id();
            $table->string('name')->comment('Имя статуса');
            $table->timestamp('created_at')->useCurrent()->comment('Дата создания');
            $table->timestamp('updated_at')->useCurrent()->comment('Дата обновления');
        });

        DB::table($ordersInfoStatusesTableName)->insert(
            [
                ['name' => 'Новый'],
                ['name' => 'В обработке'],
                ['name' => 'Согласован'],
                ['name' => 'Ожидает отправки'],
                ['name' => 'Отправлен'],
                ['name' => 'Получен'],
                ['name' => 'Отменен'],
                ['name' => 'Завершен'],
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
        $ordersInfoStatusesTableName = 'orders_info_statuses';
        Schema::dropIfExists($ordersInfoStatusesTableName);
    }
}
