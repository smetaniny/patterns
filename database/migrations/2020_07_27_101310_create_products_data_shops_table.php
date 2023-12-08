<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsDataShopsTable extends Migration
{
    /**
     * Все магазины одного артикула
     *
     * @return void
     */
    public function up()
    {
        $faqTableName = 'products_data_shops';
        $usersTableName = 'products_data';

        Schema::create($faqTableName, function (Blueprint $table) use ($faqTableName, $usersTableName) {
            $table->id();

            $table->string('guid_shop')->comment('Уникальный идентификатор 1C');
            $table->integer('kol')->comment('Количество')->nullable();

            $table->bigInteger('product_data_id')->unsigned()->comment('Связь с таблицей product_data');

            $table->timestamps();

            $table->foreign('product_data_id', "{$faqTableName}_product_data_id_foreign")
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
        $faqTableName = 'products_data_shops';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($faqTableName, function (Blueprint $table) use ($faqTableName) {
                $table->dropForeign("{$faqTableName}_product_data_id_foreign");
                $table->dropColumn('product_data_id');
            });
        }

        Schema::dropIfExists($faqTableName);
    }
}
