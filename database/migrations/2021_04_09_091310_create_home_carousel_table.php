<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeCarouselTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_carousel', function (Blueprint $table) {
            $table->id();

            $table->integer("status")->comment('Показать / скрыть')->default(0);
            $table->integer("sort")->comment('Сортировка')->default(0);

            $table->timestamp("dateStart")->comment('Время начала показа')->nullable();
            $table->timestamp("dateEnd")->comment('Время конца паказа')->nullable();

            $table->string('label')->comment('Описание')->nullable();
            $table->string('link')->comment('Ссылка')->nullable();
            $table->string('imgPath')->comment('Изображение')->nullable();
            $table->string('imgMobilePath')->comment('Изображение мобильное')->nullable();
            $table->integer('status_app')->comment('Показать / скрыть в приложении')->default(0);
            $table->string('link_app')->comment('Ссылка в приложении')->nullable();

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
        Schema::dropIfExists('home_carousel');
    }
}
