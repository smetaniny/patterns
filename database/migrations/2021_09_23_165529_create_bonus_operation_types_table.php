<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusOperationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_operation_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название типов операций')->nullable();
            $table->integer('activity')->comment('Активность')->nullable();
            $table->integer('bonus_operation_names_id')->comment('ID названия операции по бонусам')->nullable();
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
        Schema::dropIfExists('bonus_operation_types');
    }
}
