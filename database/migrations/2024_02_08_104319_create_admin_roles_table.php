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
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('Название роли')->nullable();
            $table->string('description')->comment('Описание роли')->nullable();
            $table->timestamps();
        });

        // Создаем роль
//        DB::table('admin_roles')->insert(
//            [
//                ['name' => 'admin', 'description' => 'Администратор', 'created_at' => now(), 'updated_at' => now()],
//            ]
//        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_roles');
    }
};
