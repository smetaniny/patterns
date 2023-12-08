<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoCatalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_catalog', function (Blueprint $table) {
            $table->id();

            $table->string('url')->comment('Адресс страницы')->nullable();
            $table->text('title')->comment('Заголовок страницы')->nullable();
            $table->text('description')->comment('Описание страницы')->nullable();
            $table->text('h1')->comment('H1 страницы')->nullable();
            $table->text('text')->comment('Текст страницы')->nullable();
            $table->integer('show')->comment('Ручное заполнение SEO')->default(0);
            $table->string('canonical')->comment('canonical для url')->nullable();
            $table->string('robots')->comment('robots для url')->nullable();
            $table->integer('isSiteMap')->comment('Добавить/исключить из SiteMap')->default(0);

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
        Schema::dropIfExists('seo_catalog');
    }
}
