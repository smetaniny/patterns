<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_admin_roles', function (Blueprint $table) {
            $table->integer('returnOrderList')->comment('Список товаров на возврат')->default(0);
            $table->integer('returnOrderCreate')->comment('Создание товара на возврат')->default(0);
            $table->integer('returnOrderEdit')->comment('Редактирование товара на возврат')->default(0);
            $table->integer('returnOrderDelete')->comment('Удаление товара на возврат')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_admin_roles', function (Blueprint $table) {
            $table->dropColumn([
                'returnOrderList',
                'returnOrderCreate',
                'returnOrderEdit',
                'returnOrderDelete',
            ]);
        });
    }
};
