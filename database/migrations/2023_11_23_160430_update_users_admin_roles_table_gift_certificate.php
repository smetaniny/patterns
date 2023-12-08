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
        Schema::table('users_admin_roles', function (Blueprint $table) {
            $table->integer('giftCertificateList')->comment('Список подарочных сертификатов')->default(0);
            $table->integer('giftCertificateCreate')->comment('Создание подарочных сертификатов')->default(0);
            $table->integer('giftCertificateEdit')->comment('Редактирование подарочных сертификатов')->default(0);
            $table->integer('giftCertificateDelete')->comment('Удаление подарочных сертификатов')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_admin_roles', function (Blueprint $table) {
            $table->dropColumn([
                'giftCertificateList',
                'giftCertificateCreate',
                'giftCertificateEdit',
                'giftCertificateDelete',
            ]);
        });
    }
};
