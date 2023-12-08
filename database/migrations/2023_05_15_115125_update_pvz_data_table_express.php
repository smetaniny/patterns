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
        Schema::table('pvz_data', function (Blueprint $table) {
            $table->integer('delivery_days_express')->comment('Кол-во дней экспресс доставки')->default(0);
            $table->date('delivery_date_express')->comment('Дата экспресс доставки')->nullable();
            $table->decimal('delivery_sum_express', 10, 2)->comment('Стоимость экспресс доставки')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pvz_data', function (Blueprint $table) {
            $table->dropColumn([
                'delivery_days_express',
                'delivery_date_express',
                'delivery_sum_express'
            ]);
        });
    }
};
