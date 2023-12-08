<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoRedirectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_redirect', function (Blueprint $table) {
            $table->id();

            $table->string('correctUrl')->comment('Корректный url')->nullable();
            $table->string('invalidUrl')->comment('Не корректный url')->nullable();
            $table->integer("redirectOn")->comment('Да / нет')->default(0);

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
        Schema::dropIfExists('seo_redirect');
    }
}
