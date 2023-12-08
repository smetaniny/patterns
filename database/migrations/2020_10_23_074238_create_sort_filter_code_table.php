<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortFilterCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sort_filter', function (Blueprint $table) {
            $table->id();

            $table->string('title')->comment('Название фильтра')->nullable();
            $table->string('name')->comment('Название')->nullable();
            $table->string('alias')->comment('Псевдоним')->nullable();
            $table->string('parent')->comment('Родитель')->nullable();
            $table->integer('sort')->comment('Сортировка')->nullable();

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
        Schema::dropIfExists('sort_filter');
    }
}
