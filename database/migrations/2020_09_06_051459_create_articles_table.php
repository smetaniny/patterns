<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Статьи блога
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->string('title')->comment('Заголовок')->nullable();
            $table->string('url')->comment('url')->nullable();
            $table->text('description')->comment('Описание')->nullable();
            $table->string('h1')->comment('H1')->nullable();
            $table->longText('imgPreview')->comment('Превью')->nullable();
            $table->longText('body')->comment('Статья JS')->nullable();
            $table->longText('bodyHtml')->comment('Статья')->nullable();
            $table->timestamp('published_start')->comment('Дата начала')->nullable();
            $table->timestamp('published_end')->comment('Дата окончания')->nullable();
            $table->integer('who_made_edits')->comment('id user — кто внес изменения')->nullable();
            $table->integer('status')->comment('Показать/скрыть в блоге')->default(0);
            $table->timestamps();

            $table->bigInteger('articles_id')->unsigned()->comment('Связь с таблицей articles_categories');
            $table->foreign('articles_id', "articles_promo_code_id_foreign")
                ->references('id')
                ->on('articles_categories')
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
        Schema::dropIfExists('articles');
    }
}
