<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusOperationNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $bonusOperationNamesTable = 'bonus_operation_names';

        Schema::create($bonusOperationNamesTable, function (Blueprint $table) use ($bonusOperationNamesTable) {
            $table->id();
            $table->string('name')->comment('Имя')->nullable();
            $table->timestamp('created_at')->useCurrent()->comment('Дата создания');
            $table->timestamp('updated_at')->useCurrent()->comment('Дата обновления');
        });

        DB::table($bonusOperationNamesTable)->insert(
            [
                ['id' => 1, 'name' => 'Приветственные бонусы'],
                ['id' => 2, 'name' => 'Бонусы за покупку украшений'],
                ['id' => 3, 'name' => 'Бонусы за подписку на Push'],
                ['id' => 4, 'name' => 'Бонусы за подписку в соцсетях'],
                ['id' => 5, 'name' => 'Бонусы за отзыв'],
                ['id' => 6, 'name' => 'Бонусы за установку приложения'],
                ['id' => 7, 'name' => 'Акционные бонусы'],
                ['id' => 8, 'name' => 'Бонусы за покупку онлайн'],
                ['id' => 9, 'name' => 'Бонусы за анкетирование'],
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
        $bonusOperationNamesTable = 'bonus_operation_names';
        Schema::dropIfExists($bonusOperationNamesTable);
    }
}
