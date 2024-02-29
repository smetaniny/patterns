<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название акции')->nullable();
            $table->string('url')->comment('url')->nullable();
            $table->integer('pdf')->comment('Файл/Статья')->nullable();
            $table->string('pdf_url')->comment('Путь до файла')->nullable();
            $table->string('pdf_name')->comment('Имя файла')->nullable();
            $table->longText('body')->comment('Статья JS')->nullable();
            $table->longText('bodyHtml')->comment('Статья')->nullable();
            $table->timestamp('published_start')->comment('Дата начала')->nullable();
            $table->timestamp('published_end')->comment('Дата окончания')->nullable();
            $table->integer('who_made_edits')->comment('id - кто создал/изменил')->nullable();
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
        Schema::dropIfExists('rule');
    }
}
