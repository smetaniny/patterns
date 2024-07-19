<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusOperationRulesTable extends Migration
{
    /**
     * Run the migrations.
     * Правила начислений/списаний бонусов
     * @return void
     */
    public function up()
    {
        $bonusOperationRulesTable = 'bonus_operation_rules';
        $bonusOperationTypesTable = 'bonus_operation_types';
        $discountCardTypesTable = 'discount_card_types';

        Schema::create($bonusOperationRulesTable, function (Blueprint $table) use ($bonusOperationRulesTable, $bonusOperationTypesTable, $discountCardTypesTable) {
            $table->id();
            $table->string('vid_operation')->comment('Вид транзакции')->nullable();
            $table->string('name')->comment('Название правил')->nullable();
            $table->integer('action_group_id')->comment('Акционная группа товаров')->nullable();
            $table->integer('sum_percent')->comment('Значение начислений/списаний')->nullable();
            $table->integer('is_percent')->comment('Процент или сумма')->nullable();
            $table->bigInteger('discount_card_types_id')->unsigned()->comment('Связь с таблицей discount_card_types')->nullable();
            $table->bigInteger('bonus_operation_types_id')->unsigned()->comment('Связь с таблицей bonus_operation_types');
            $table->timestamps();

            $table->foreign('discount_card_types_id', "{$bonusOperationRulesTable}_discount_card_types_id_foreign")
                ->references('id')
                ->on($discountCardTypesTable)
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('bonus_operation_types_id', "{$bonusOperationRulesTable}_bonus_operation_types_id_foreign")
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
        $bonusOperationRulesTable = 'bonus_operation_rules';

        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($bonusOperationRulesTable, function (Blueprint $table) use ($bonusOperationRulesTable) {
                $table->dropForeign("{$bonusOperationRulesTable}_discount_card_types_id_foreign");
                $table->dropColumn('discount_card_types_id');
                $table->dropForeign("{$bonusOperationRulesTable}_bonus_operation_types_id_foreign");
                $table->dropColumn('bonus_operation_types_id');
            });
        }

        Schema::dropIfExists($bonusOperationRulesTable);
    }
}
