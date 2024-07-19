<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('admin_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название страницы')->nullable();
            $table->string('section')->comment('Раздел к которому относится страница')->nullable();
            $table->string('url')->comment('Адрес страницы')->unique()->nullable();
            $table->integer('sort')->comment('Сортировка')->nullable();
            $table->timestamps();
        });

        // Создаем страницу
        DB::table('admin_pages')->insert(
            [
                ['name' => 'Разделы', 'section' => 'admin', 'url' => 'pages', 'sort' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Пользователи', 'section' => 'admin', 'url' => 'adminUsers', 'sort' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Роли пользователя', 'section' => 'admin', 'url' => 'adminRoles', 'sort' => 3, 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_pages');
    }
};
