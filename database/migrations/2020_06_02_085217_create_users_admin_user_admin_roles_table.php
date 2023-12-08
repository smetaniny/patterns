<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAdminUserAdminRolesTable extends Migration
{
    /**
     * Связывающая таблица для users_admin и users_admin_roles.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_admin_users_admin_roles', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('users_admin_id')->unsigned()->nullable()->comment('Связь с таблицей users_admin');
            $table->foreign('users_admin_id')->references('id')->on('users_admin');

            $table->bigInteger('users_admin_roles_id')->unsigned()->nullable()->comment('Связь с таблицей users_admin_roles');;
            $table->foreign('users_admin_roles_id')->references('id')->on('users_admin_roles');

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
        Schema::dropIfExists('users_admin_users_admin_roles');
    }
}
