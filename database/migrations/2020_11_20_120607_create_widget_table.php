<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $widget = 'widget';

        Schema::create($widget, function (Blueprint $table) use ($widget) {
            $table->id();

            $table->string('phone')->comment('Телефон')->nullable();
            $table->string('comment', 512)->comment('Вопрос')->nullable();
            $table->string('status')->comment('Статус')->nullable();
            $table->string('manager')->comment('Менеджер')->nullable();
            $table->text('result')->comment('Результат')->nullable();

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
        $widget = 'widget';
        Schema::dropIfExists($widget);
    }
}
