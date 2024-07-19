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
        $currentTableName = 'news';
        $newsCategoriesTableName = 'news_categories';

        Schema::create('news', function (Blueprint $table) use ($currentTableName, $newsCategoriesTableName) {
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

            $table->bigInteger('news_id')->unsigned()->comment('Связь с таблицей news_categories');
            $table->foreign('news_id', "{$currentTableName}_news_id_foreign")
                ->references('id')
                ->on($newsCategoriesTableName)
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
        $currentTableName = 'news';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table('News', function (Blueprint $table) use ($currentTableName) {
                $table->dropForeign("{$currentTableName}_news_id_foreign");
                $table->dropColumn('news_id');
            });
        }

        Schema::dropIfExists($currentTableName);
    }
};
