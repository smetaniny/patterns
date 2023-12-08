<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $ordersProductsTableName = 'orders_products';
        $ordersTableName = 'orders';
        $productsTableName = 'products';

        Schema::create($ordersProductsTableName, function (Blueprint $table) use ($ordersProductsTableName, $ordersTableName, $productsTableName) {

            $table->bigInteger('orders_id')->unsigned()->comment('Связь с таблицей orders');
            $table->bigInteger('product_id')->unsigned()->comment('Связь с таблицей products');

            $table->string('size')->comment('Размер')->nullable();
            $table->string('insert', 512)->comment('Вставки')->nullable();
            $table->string('quantity')->comment('Количество')->nullable();
            $table->string('ves')->comment('Масса изделия')->nullable();
            $table->string('sum')->comment('Сумма без скидок')->nullable();
            $table->string('discount')->comment('Процент скидки')->nullable();
            $table->string('discount_sum')->comment('Сумма скидки')->nullable();
            $table->string('total')->comment('Сумма изделия')->nullable();
            $table->string('action_id')->comment('ID акции')->nullable();
            $table->string('condition_id')->comment('ID условия акции')->nullable();
            $table->integer('cancel')->comment('Отмена заказа')->default(0);
            $table->decimal('bonus_add', 10, 2)->comment('Сумма начисленных бонусов')->default(0);
            $table->decimal('bonus_subtract', 10, 2)->comment('Сумма списанных бонусов')->default(0);

            $table->timestamps();

            $table->foreign('orders_id', "{$ordersProductsTableName}_orders_id_foreign")
                ->references('id')
                ->on($ordersTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('product_id', "{$ordersProductsTableName}_product_id_foreign")
                ->references('id')
                ->on($productsTableName)
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
        $ordersProductsTableName = 'orders_products';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($ordersProductsTableName, function (Blueprint $table) use ($ordersProductsTableName) {
                $table->dropForeign("{$ordersProductsTableName}_orders_id_foreign");
                $table->dropColumn('orders_id');

                $table->dropForeign("{$ordersProductsTableName}_product_id_foreign");
                $table->dropColumn('product_id');
            });
        }

        Schema::dropIfExists($ordersProductsTableName);
    }
}
