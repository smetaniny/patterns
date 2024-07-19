<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $socialAccountTable = 'social_accounts';
        $usersTableName = 'users';

        Schema::create($socialAccountTable, function (Blueprint $table) use ($socialAccountTable, $usersTableName) {
            $table->id();
//            $table->unsignedInteger('user_id');
            $table->bigInteger('user_id')->unsigned()->comment('Связь с таблицей users');
            $table->string('provider_id')->comment('ID аккаунта в социальной сети')->nullable();
            $table->string('provider')->comment('Идентификатор/имя социальной сети;')->nullable();
            $table->string('token', 512)->comment('Токен, предоставляемый социальной сетью после успешной аутентификации')->nullable();
            $table->string('avatar')->comment('Фото пользователя, если есть')->nullable();
            $table->timestamps();

            $table->foreign('user_id', "{$socialAccountTable}_user_id_foreign")
                ->references('id')
                ->on($usersTableName)
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
        $socialAccountTable = 'social_accounts';

        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($socialAccountTable, function (Blueprint $table) use ($socialAccountTable) {
                $table->dropForeign("{$socialAccountTable}_user_id_foreign");
                $table->dropColumn('user_id');
            });
        }

        Schema::dropIfExists($socialAccountTable);
    }
}
