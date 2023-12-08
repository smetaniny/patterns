<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $faqTableName = 'basket';
        $usersTableName = 'users';
        $productsTableName = 'products';
        $productsDataTableName = 'products_data';

        Schema::create($faqTableName, function (Blueprint $table) use ($faqTableName, $usersTableName, $productsTableName, $productsDataTableName) {
            $table->id();

            $table->string('count')->comment('Количество')->nullable();

            $table->bigInteger('user_id')->unsigned()->comment('Связь с таблицей users');
            $table->bigInteger('product_id')->unsigned()->comment('Связь с таблицей products_data');
            $table->bigInteger('product_data_id')->unsigned()->comment('Связь с таблицей products_data');

            $table->timestamps();

            $table->foreign('user_id', "{$faqTableName}_user_id_foreign")
                ->references('id')
                ->on($usersTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('product_id', "{$faqTableName}_product_id_foreign")
                ->references('id')
                ->on($productsTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('product_data_id', "{$faqTableName}_product_data_id_foreign")
                ->references('id')
                ->on($productsDataTableName)
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
        $faqTableName = 'basket';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($faqTableName, function (Blueprint $table) use ($faqTableName) {
                $table->dropForeign("{$faqTableName}_user_id_foreign");
                $table->dropColumn('user_id');

                $table->dropForeign("{$faqTableName}_product_id_foreign");
                $table->dropColumn('product_id');

                $table->dropForeign("{$faqTableName}_product_data_id_foreign");
                $table->dropColumn('product_data_id');
            });
        }

        Schema::dropIfExists($faqTableName);
    }
}
