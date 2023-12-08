<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusOperationFuturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $bonusOperationFuturesTable = 'bonus_operation_futures';
        $ordersTable = 'orders';
        $discountCardsTable = 'discount_cards';
        $bonusOperationTypesTable = 'bonus_operation_types';

        Schema::create($bonusOperationFuturesTable, function (Blueprint $table) use ($bonusOperationFuturesTable, $ordersTable, $discountCardsTable, $bonusOperationTypesTable) {
            $table->id();
            $table->string('vid_operation')->comment('Вид транзакции')->nullable();
            $table->decimal('sum_bonus', 10, 2)->comment('Сумма')->default(0);
            $table->integer('status')->comment('Статус обмена')->default(0);
            $table->bigInteger('order_id')->unsigned()->comment('Связь с таблицей orders')->nullable();
            $table->bigInteger('discount_cards_id')->unsigned()->comment('Связь с таблицей discount_cards');
            $table->bigInteger('bonus_operation_types_id')->unsigned()->comment('Связь с таблицей bonus_operation_types')->nullable();
            $table->timestamps();

            $table->foreign('order_id', "{$bonusOperationFuturesTable}_discount_card_types_id_foreign")
                ->references('id')
                ->on($ordersTable)
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('discount_cards_id', "{$bonusOperationFuturesTable}_discount_cards_id_foreign")
                ->references('id')
                ->on($discountCardsTable)
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('bonus_operation_types_id', "{$bonusOperationFuturesTable}_bonus_operation_types_id_foreign")
                ->references('id')
                ->on($bonusOperationTypesTable)
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
        $bonusOperationFuturesTable = 'bonus_operation_futures';

        Schema::dropIfExists($bonusOperationFuturesTable);
    }
}
