<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Таблица акций
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            //Основа
            $table->integer('action_id')->comment('ID акции в 1C')->nullable();
            $table->integer('action_group_id')->comment('ID группы акции')->nullable();
            $table->integer('activity')->comment('Рассчитать акцию')->nullable();
            $table->integer('on_check')->comment('На чек')->nullable();
            $table->integer('combining_discounts')->comment('ID дисконтной карты')->nullable();
            $table->integer('status')->comment('Показать/скрыть в акциях')->nullable();
            $table->integer('status_product')->comment('Показать/скрыть на деталке продукта')->nullable();
            $table->integer('status_filter')->comment('Показать/скрыть в фильтре')->nullable();
            $table->integer('sort')->comment('Сортировка')->nullable();
            $table->string('title')->comment('Мета-тег Title')->nullable();
            $table->string('stocks1c')->comment('ID акций для фильтра')->nullable();
            $table->string('name')->comment('Название акции')->nullable();
            $table->string('alias')->comment('url')->nullable();
            $table->text('description')->comment('Описание')->nullable();
            $table->string('img')->comment('Изображение')->nullable();
            $table->string('img_mobile')->comment('Изображение мобильное')->nullable();
            $table->integer('status_app')->comment('Показывать акцию в приложении')->nullable();
            $table->integer('status_app_first')->comment('Показывать первой акцию в приложении')->nullable();
            $table->string('link_app')->comment('Ссылка в приложении')->nullable();
            $table->longText('body')->comment('Статья JS')->nullable();
            $table->longText('bodyHtml')->comment('Статья')->nullable();
            $table->timestamp('published_start')->comment('Дата начала')->nullable();
            $table->timestamp('published_end')->comment('Дата окончания')->nullable();
            $table->timestamp('early_created_at')->comment('Дата раннего показа')->nullable();
            $table->text('early_description')->comment('Описание раннего показа')->nullable();
            $table->string('img_early')->comment('Изображение раннего показа')->nullable();
            $table->integer('who_made_edits')->comment('id user — кто внес изменения')->nullable();
            $table->integer('sale_tip')->comment('Тип акции для сайта')->default(0);
            $table->integer('sale_discount')->comment('Размер скидки')->nullable();
            $table->string('name_product_one')->comment('Название акции для сайта первое поле')->nullable();
            $table->string('bg_color_one')->comment('Цвет фона первого поля')->nullable();
            $table->string('name_product_two')->comment('Название акции для сайта второе поле')->nullable();
            $table->string('bg_color_two')->comment('Цвет фона второго поля')->nullable();
            $table->string('text_warning', 512)->comment('Техт-предупреждение о применимости акции')->nullable();
            $table->string('marker_discount_color')->comment('Цвет текста скидки в карточке')->nullable();
            $table->string('marker_discount_bg_color')->comment('Цвет фона скидки в карточке')->nullable();

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
        Schema::dropIfExists('sales');
    }
}
