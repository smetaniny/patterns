<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $context = 'context';
        $ordersProductsTableName = 'orders';
        $usersTableName = 'users';

        Schema::create($context, function (Blueprint $table) use ($context, $ordersProductsTableName, $usersTableName) {
            $table->id();

            $table->string('utm_source')->comment('Источник')->nullable();
            $table->string('utm_medium')->comment('Канал')->nullable();
            $table->string('utm_campaign')->comment('Кампания')->nullable();
            $table->string('utm_term')->comment('Фраза')->nullable();
            $table->text('utm_content')->comment('Объявление')->nullable();

            $table->bigInteger('context_orders_id')->unsigned()->comment('Связь с таблицей orders');
            $table->bigInteger('context_user_id')->unsigned()->comment('Связь с таблицей users');

            $table->timestamps();

            $table->foreign('context_orders_id', "{$context}_context_orders_id_foreign")
                ->references('id')
                ->on($ordersProductsTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('context_user_id', "{$context}_context_user_id_foreign")
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
        $context = 'context';

        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($context, function (Blueprint $table) use ($context) {

                $table->dropForeign("{$context}_context_orders_id_foreign");
                $table->dropColumn('context_orders_id');

                $table->dropForeign("{$context}_context_user_id_foreign");
                $table->dropColumn('context_user_id');
            });
        }

        Schema::dropIfExists($context);
    }
}
