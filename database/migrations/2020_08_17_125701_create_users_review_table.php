<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersReviewTable extends Migration
{
    /**
     * Таблица с отзывами
     *
     * @return void
     */
    public function up()
    {
        $faqTableName = 'users_review';
        $usersTableName = 'users';
        $productsTableName = 'products';

        Schema::create($faqTableName, function (Blueprint $table) use ($faqTableName, $usersTableName, $productsTableName) {
            $table->id();

            $table->string('author')->comment('Автор со старого сайта')->nullable();
            $table->text('text')->comment('Текст отзыва')->nullable();
            $table->integer('rating')->comment('Рейтинг')->nullable();
            $table->integer('status')->comment('Показать/скрыть')->nullable();
            $table->string('img', 500)->comment('Изображения загруженные пользователем')->nullable();
            $table->integer('is_bonuses')->comment('Флаг начислений по бонусам')->default(0);
            $table->bigInteger('users_id')->unsigned()->comment('Связь с таблицей users');
            $table->bigInteger('product_id')->unsigned()->comment('Связь с таблицей products');


            $table->timestamps();

            $table->foreign('users_id', "{$faqTableName}_users_id_foreign")
                ->references('id')
                ->on($usersTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('product_id', "{$faqTableName}_product_id_foreign")
                ->references('id')
                ->on($productsTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $faqTableName = 'users_review';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($faqTableName, function (Blueprint $table) use ($faqTableName) {
                $table->dropForeign("{$faqTableName}_users_id_foreign");
                $table->dropColumn('users_id');

                $table->dropForeign("{$faqTableName}_product_id_foreign");
                $table->dropColumn('product_id');
            });
        }

        Schema::dropIfExists($faqTableName);
    }
}
