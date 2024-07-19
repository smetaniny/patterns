<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProductsDataTable extends Migration
{
    /**
     * Все товары одного артикула
     *
     * @return void
     */
    public function up()
    {
        $productsDataTableName = 'products_data';
        $usersTableName = 'products';

        Schema::create($productsDataTableName, function (Blueprint $table) use ($productsDataTableName, $usersTableName) {
            $table->id();

            $table->string('razmer')->comment('Размер')->nullable();
            $table->decimal('ves', 10)->comment('Вес')->nullable();
            $table->integer('price')->comment('Цена')->nullable();
            $table->text('insert')->comment('Описание')->nullable();
            $table->integer('kol')->comment('Количество')->nullable();
            $table->integer('status')->comment('Скрыть/показать')->nullable();

            $table->bigInteger('product_id')->unsigned()->comment('Связь с таблицей product');

            $table->timestamps();

            $table->foreign('product_id', "{$productsDataTableName}_product_id_foreign")
                ->references('id')
                ->on($usersTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });

        DB::table($productsDataTableName)->insert(
            [
                ['id' => 1, 'product_id' => 1],
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
        $productsDataTableName = 'products_data';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($productsDataTableName, function (Blueprint $table) use ($productsDataTableName) {
                $table->dropForeign("{$productsDataTableName}_product_id_foreign");
                $table->dropColumn('product_id');
            });
        }

        Schema::dropIfExists($productsDataTableName);
    }
}
