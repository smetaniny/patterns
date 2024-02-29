<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $bonusOperationsTable = 'bonus_operations';
        $discountCardsTable = 'discount_cards';

        Schema::create($bonusOperationsTable, function (Blueprint $table) use ($bonusOperationsTable, $discountCardsTable) {
            $table->string('operation_name')->comment('Название транзакции')->nullable();
            $table->string('vid_operation')->comment('Вид транзакции')->nullable();
            $table->decimal('sum_bonus', 10)->comment('Сумма')->default(0);
            $table->date('date')->comment('Дата')->nullable();
            $table->bigInteger('discount_cards_id')->unsigned()->comment('Связь с таблицей discount_cards');
            $table->timestamps();

            $table->foreign('discount_cards_id', "{$bonusOperationsTable}_discount_cards_id_foreign")
                ->references('id')
                ->on($discountCardsTable)
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
        $bonusOperationsTable = 'bonus_operations';

        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($bonusOperationsTable, function (Blueprint $table) use ($bonusOperationsTable) {
                $table->dropForeign("{$bonusOperationsTable}_discount_cards_id_foreign");
                $table->dropColumn('discount_cards_id');
            });
        }

        Schema::dropIfExists($bonusOperationsTable);
    }
}
