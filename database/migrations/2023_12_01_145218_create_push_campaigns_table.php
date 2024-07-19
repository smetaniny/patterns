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
        Schema::create('push_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название кампании')->nullable();
            $table->string('title')->comment('Заголовок')->nullable();
            $table->string('body')->comment('Тело')->nullable();
            $table->string('link')->comment('Ссылка')->nullable();
            $table->timestamp('send_date')->comment('Дата отправки')->nullable();
            $table->integer('status')->comment('Статус')->default(0);
            $table->text('result')->comment('Результат отправки')->nullable();
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
        Schema::dropIfExists('push_campaigns');
    }
};
