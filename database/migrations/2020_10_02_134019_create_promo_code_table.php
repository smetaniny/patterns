<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $faqTableName = 'promo_code';
        $usersAdminTableName = 'users_admin';

        Schema::create($faqTableName, function (Blueprint $table) use ($faqTableName, $usersAdminTableName) {
            $table->id();

            //Основные поля
            $table->string('name')->comment('Название промокода')->nullable();
            $table->string('code')->comment('Промокод')->nullable();
            $table->string('type')->comment('Процент или фиксированная сумма')->nullable();
            $table->integer('discount')->comment('Размер скидки')->nullable();
            $table->integer('discount_sum')->comment('Максимальный процент от стоимости заказа, который можно списать')->nullable();
            $table->integer('sum_min')->comment('Минимальная сумма, начиная с которой купон действителен')->nullable();
            $table->integer('all_max_use')->comment('Сколько раз максимально, можно использовать промокод. Для бесконечного использования 0')->nullable();
            $table->integer('user_max_use')->comment('Cколько раз максимально, клиент может использовать один промокод . Для бесконечного использования 0')->nullable();
            $table->timestamp('published_start')->comment('Дата начала')->nullable();
            $table->timestamp('published_end')->comment('Дата окончания')->nullable();

            //Для фильтров
            $table->integer('category_add_remove')->comment('Включить или исключить список категорий')->nullable();
            $table->integer('metal_add_remove')->comment('Включить или исключить список металлов')->nullable();
            $table->integer('action_add_remove')->comment('Включить или исключить список акционных групп товаров')->nullable();
            $table->integer('collection_add_remove')->comment('Включить или исключить список коллекций')->nullable();

            $table->integer('who_made_edits')->comment('id user — кто внес изменения')->nullable();

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
        $faqTableName = 'promo_code';
        Schema::dropIfExists($faqTableName);
    }
}
