<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortLinkServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_link_service', function (Blueprint $table) {
            $table->id();
            $table->string('link', 512)->comment('Ссылка на которую нужно перенаправить')->nullable();
            $table->string('shortLink', 512)->comment('Короткая ссылка')->nullable();
            $table->string('description', 1024)->comment('Описание')->nullable();
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
        Schema::dropIfExists('short_link_service');
    }
}
