<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesCategoriesTable extends Migration
{
    /**
     * Категория статьей
     *
     * @return void
     */
    public function up()
    {
        $faqTableName = 'articles_categories';

        Schema::create($faqTableName, function (Blueprint $table) use ($faqTableName) {
            $table->id();
            $table->string('category')->comment('Категория статьей')->nullable();
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
        Schema::dropIfExists('articles_categories');
    }
}
