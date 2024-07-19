<?php

use App\Models\AdminPage;
use App\Models\AdminRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('create')->comment('Создание')->default(0);
            $table->integer('show')->comment('Просмотр')->default(0);
            $table->integer('edit')->comment('Редактирование')->default(0);
            $table->integer('delete')->comment('Удаление')->default(0);
            $table->foreignIdFor(AdminRole::class)->comment('Связь с таблицей admin_roles')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(AdminPage::class)->comment('Связь с таблицей admin_users')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        // Создаем разрешения
//        DB::table('admin_permissions')->insert(
//            [
//                ['create' => 1, 'show' => 1, 'edit' => 1, 'destroy' => 1, 'admin_role_id' => 1, 'admin_page_id' => 1, 'created_at' => now(), 'updated_at' => now()],
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
        Schema::dropIfExists('admin_permissions');
    }
};
