<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUserDiscountCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
