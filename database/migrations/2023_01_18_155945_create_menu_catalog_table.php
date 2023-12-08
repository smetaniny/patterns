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
        Schema::create('menu_catalog', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('Тип')->nullable();
            $table->string('name')->comment('Имя')->nullable();
            $table->integer('sort')->comment('Сортировка')->nullable();
            $table->integer('parent_id')->comment('ID родителя')->nullable();
            $table->string('url')->comment('')->nullable();
            $table->string('img')->comment('Путь к изображению')->nullable();
            $table->string('svg')->comment('Имя svg')->nullable();
            $table->integer('status')->comment('Статус')->nullable();
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
        Schema::dropIfExists('menu_catalog');
    }
};
