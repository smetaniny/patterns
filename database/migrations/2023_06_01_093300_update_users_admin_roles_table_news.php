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
        Schema::table('users_admin_roles', function (Blueprint $table) {
            $table->integer('newsList')->comment('Список новостей')->default(0);
            $table->integer('newsCreate')->comment('Создание новости')->default(0);
            $table->integer('newsEdit')->comment('Редактирование новости')->default(0);
            $table->integer('newsDelete')->comment('Удаление новости')->default(0);
            $table->integer('newsCategoriesList')->comment('Список категорий новостей')->default(0);
            $table->integer('newsCategoriesCreate')->comment('Создание категории для новостей')->default(0);
            $table->integer('newsCategoriesEdit')->comment('Редактирование категории для новостей')->default(0);
            $table->integer('newsCategoriesDelete')->comment('Удаление категории для новостей')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_admin_roles', function (Blueprint $table) {
            $table->dropColumn([
                'newsList',
                'newsCreate',
                'newsEdit',
                'newsDelete',
                'newsCategoriesList',
                'newsCategoriesCreate',
                'newsCategoriesEdit',
                'newsCategoriesDelete',
            ]);
        });
    }
};
