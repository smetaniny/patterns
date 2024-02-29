<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProductsTable extends Migration
{
    /**
     * Таблица с товарами
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('guid')->comment('Уникальный идентификатор 1C')->unique();
            $table->string('article')->comment('Артикул')->nullable();
            $table->string('articleNotDash')->comment('Артикул без -')->nullable();
            $table->text('title')->comment('Заголовок страницы')->nullable();
            $table->text('description')->comment('Описание страницы')->nullable();
            $table->text('h1')->comment('H1 страницы')->nullable();
            $table->text('text')->comment('Текст страницы')->nullable();
            $table->integer('show')->comment('Ручное заполнение SEO')->default(0);
            $table->string('stocksName')->comment('Наименование акции')->nullable();
            $table->string('stocksNameAlias')->comment('Наименование акции транслит')->nullable();
            $table->string('category')->comment('Категория')->nullable();
            $table->string('categoryAlias')->comment('Категория транслит')->nullable();
            $table->string('view')->comment('Вид')->nullable();
            $table->string('viewAlias')->comment('Вид транслит')->nullable();
            $table->string('inserts')->comment('Вставка')->nullable();
            $table->string('insertsAlias')->comment('Вставка транслит')->nullable();
            $table->string('insertsColor')->comment('Цвет вставки')->nullable();
            $table->string('insertsColorAlias')->comment('Цвет вставки транслит')->nullable();
            $table->string('metal')->comment('Металл')->nullable();
            $table->string('metalAlias')->comment('Металл транслит')->nullable();
            $table->string('metalType')->comment('Тип метала')->nullable();
            $table->string('metalTypeAlias')->comment('Тип метала транслит')->nullable();
            $table->string('sex')->comment('Пол')->nullable();
            $table->string('sexAlias')->comment('Пол транслит')->nullable();
            $table->string('viewDesign')->comment('Вид дизайна')->nullable();
            $table->string('viewDesignAlias')->comment('Вид дизайна транслит')->nullable();
            $table->string('thematics')->comment('Тематика')->nullable();
            $table->string('thematicsAlias')->comment('Тематика транслит')->nullable();
            $table->string('collection')->comment('Коллекция')->nullable();
            $table->string('collectionAlias')->comment('Коллекция транслит')->nullable();
            $table->string('size')->comment('Размер')->nullable();
            $table->string('sizeAlias')->comment('Размер транслит')->nullable();
            $table->decimal('ratingAVG', 10, 1)->comment('Средний рейтинг')->nullable();
            $table->integer('ratingCount')->comment('Количество отзывов')->nullable();
            $table->string('img')->comment('Превью')->nullable();
            $table->text('imgDetail')->comment('Для детальной')->nullable();
            $table->text('imgModel')->comment('Модель')->nullable();
            $table->text('imgBasic')->comment('Основная')->nullable();
            $table->integer('price')->comment('Цена')->nullable();
            $table->decimal('weight', 10)->comment('Вес')->nullable();
            $table->integer('ordersort')->comment('Сортировка')->nullable();
            $table->string('garnitur')->comment('Гарнитур')->nullable();
            $table->text('stockAlias')->comment('УИДы магазинов')->nullable();
            $table->integer('status')->comment('Скрыть/показать')->nullable();
            $table->integer('grup')->comment('Ценовая группа')->nullable();
            $table->string('action')->comment('Коды акционных групп')->nullable();
            $table->integer('hit')->comment('Хит')->nullable();
            $table->integer('new')->comment('Новинка')->nullable();
            $table->decimal('productWidth', 5)->comment('Ширина артикула')->nullable();
            $table->integer('card_discount')->comment('Скидка товара')->nullable();
            $table->integer('card_price')->comment('Цена со скидкой')->nullable();
            $table->string('card_date_end')->comment('Дата окончания акции с текстом')->nullable();
            $table->timestamp('date_end_stock')->comment('Дата окончания акции без текста')->nullable();
            $table->string('productMetal')->comment('Металл артикула')->nullable();
            $table->integer('online_discount')->comment('Скидка при онлайн оплате')->nullable();
            $table->integer('bonuses_subtract_1')->comment('Списание бонусов при статусе Silver')->nullable();
            $table->integer('bonuses_subtract_2')->comment('Списание бонусов при статусе Gold')->nullable();
            $table->integer('bonuses_subtract_3')->comment('Списание бонусов при статусе Platinum')->nullable();
            $table->integer('bonuses_subtract_4')->comment('Списание бонусов при статусе Diamond')->nullable();
            $table->integer('promo_code_subtract')->comment('Скидка по промокоду')->nullable();
            $table->string('promo_code_text')->comment('Текст скидки по промокоду')->nullable();
            $table->string('marker_discount_color')->comment('Цвет текста скидки')->nullable();
            $table->string('marker_discount_bg_color')->comment('Цвет фона скидки')->nullable();
            $table->integer('saved_price')->comment('Сохраненная цена')->nullable();
            $table->string('model')->comment('Модель артикула')->nullable();
            $table->integer('kol')->comment('Количество')->default(0);
            $table->string('weaving')->comment('Вид плетения')->nullable();
            $table->string('weavingAlias')->comment('Вид плетения транслит')->nullable();
            $table->timestamps();
        });

        DB::table('products')->insert(
            [
                ['id' => 1, 'guid' => 'Подарочный сертификат', 'h1' => 'Подарочный сертификат PLATINA'],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
