<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDiscountCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $userDiscountTable = 'user_discount_card';
        $usersTableName = 'users';
        $discountTableName = 'discount_card';

        Schema::create($userDiscountTable, function (Blueprint $table) use ($userDiscountTable, $usersTableName, $discountTableName) {
            $table->id();

            $table->string('guid')->comment('1C')->nullable();
            $table->string('card_id')->comment('ID карты')->nullable();
            $table->integer('summan')->comment('Сумма всех покупок')->nullable();
            $table->integer('summab')->comment('Сумма бонусов')->nullable();

            $table->bigInteger('users_id')->unsigned()->comment('Связь с таблицей users')->nullable();
            $table->bigInteger('group_id')->unsigned()->comment('Связь с таблицей discount_card')->nullable();

            $table->timestamps();

            $table->foreign('group_id', "{$userDiscountTable}_group_id_foreign")
                ->references('id')
                ->on($discountTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('users_id', "{$userDiscountTable}_users_id_foreign")
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
        $userDiscountTable = 'user_discount_card';
        if (Schema::hasTable($userDiscountTable)) {
            if (DB::getDriverName() !== 'sqlite') {
                Schema::table($userDiscountTable, function (Blueprint $table) use ($userDiscountTable) {
                    $table->dropForeign("{$userDiscountTable}_group_id_foreign");
                    $table->dropColumn('group_id');

                    $table->dropForeign("{$userDiscountTable}_users_id_foreign");
                    $table->dropColumn('users_id');
                });
            }

            Schema::dropIfExists($userDiscountTable);
        }
    }
}
