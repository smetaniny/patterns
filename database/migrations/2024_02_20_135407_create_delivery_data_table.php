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
        Schema::create('delivery_data', function (Blueprint $table) {
            $table->id();

            $table->string('city_from')->comment('Город отправления')->nullable();
            $table->bigInteger('city_code_from')->comment('Код города отправления')->nullable();
            $table->string('city_to')->comment('Город назначения')->nullable();
            $table->bigInteger('city_code_to')->comment('Код города назначения')->nullable();
            $table->string('type')->comment('Служба доставки')->nullable();
            $table->integer('delivery_days')->comment('Кол-во дней доставки')->default(1);
            $table->decimal('delivery_sum', 10)->comment('Стоимость доставки')->default(0);
            $table->date('delivery_date')->comment('Дата доставки')->nullable();
            $table->integer('delivery_days_express')->comment('Кол-во дней экспресс доставки')->default(1);
            $table->decimal('delivery_sum_express', 10)->comment('Стоимость экспресс доставки')->default(0);
            $table->date('delivery_date_express')->comment('Дата экспресс доставки')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_data');
    }
};
