<?php

use App\Models\AdminRole;
use App\Models\AdminUser;
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
        Schema::create('admin_role_admin_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AdminRole::class)->comment('Связь с таблицей admin_roles')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(AdminUser::class)->comment('Связь с таблицей admin_users')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        // Создаем роль
//        DB::table('admin_role_admin_user')->insert(
//            [
//                ['admin_role_id' => 1, 'admin_user_id' => 1, 'created_at' => now(), 'updated_at' => now()],
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
        Schema::table('admin_role_admin_user', function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(AdminRole::class);
            $table->dropConstrainedForeignIdFor(AdminUser::class);
        });
        Schema::dropIfExists('admin_role_admin_user');
    }
};
