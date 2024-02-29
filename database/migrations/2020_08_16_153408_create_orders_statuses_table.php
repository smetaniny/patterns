<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $ordersStatusesTableName = 'orders_statuses';
        $ordersTableName = 'orders';
        Schema::create($ordersStatusesTableName, function (Blueprint $table) use ($ordersStatusesTableName, $ordersTableName) {
            $table->string('status_id')->comment('ID статуса')->nullable();
            $table->dateTime('date')->comment('Дата изменения статуса')->nullable();
            $table->bigInteger('orders_id')->unsigned()->comment('Связь с таблицей orders');
            $table->timestamps();

            $table->foreign('orders_id', "{$ordersStatusesTableName}_orders_id_foreign")
                ->references('id')
                ->on($ordersTableName)
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
        $ordersStatusesTableName = 'orders_statuses';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($ordersStatusesTableName, function (Blueprint $table) use ($ordersStatusesTableName) {
                $table->dropForeign("{$ordersStatusesTableName}_orders_id_foreign");
                $table->dropColumn('orders_id');
            });
        }

        Schema::dropIfExists($ordersStatusesTableName);
    }
}
