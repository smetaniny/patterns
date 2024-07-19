<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $usersTable = 'users';
        $discountCardsTable = 'discount_cards';
        $discountCardTypesTable = 'discount_card_types';

        Schema::create($discountCardsTable, function (Blueprint $table) use ($usersTable, $discountCardsTable, $discountCardTypesTable) {
            $table->id();

            $table->decimal('sum_accumulation', 10)->comment('Сумма накоплений')->default(0);
            $table->decimal('sum_bonus', 10)->comment('Сумма бонусов')->default(0);
            $table->bigInteger('users_id')->unsigned()->comment('Связь с таблицей users');
            $table->bigInteger('discount_card_types_id')->unsigned()->comment('Связь с таблицей discount_card_types')->default(1);
            $table->timestamps();

            $table->foreign('users_id', "{$discountCardsTable}_users_id_foreign")
                ->references('id')
                ->on($usersTable)
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('discount_card_types_id', "{$discountCardsTable}_discount_card_types_id_foreign")
                ->references('id')
                ->on($discountCardTypesTable)
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
        $discountCardsTable = 'discount_cards';

        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($discountCardsTable, function (Blueprint $table) use ($discountCardsTable) {
                $table->dropForeign("{$discountCardsTable}_users_id_foreign");
                $table->dropColumn('users_id');
                $table->dropForeign("{$discountCardsTable}_discount_card_types_id_foreign");
                $table->dropColumn('discount_card_types_id');
            });
        }
        Schema::dropIfExists($discountCardsTable);
    }
}
