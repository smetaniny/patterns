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
            $table->integer('pushCampaignList')->comment('Список кампаний')->default(0);
            $table->integer('pushCampaignCreate')->comment('Создание кампании')->default(0);
            $table->integer('pushCampaignEdit')->comment('Редактирование кампании')->default(0);
            $table->integer('pushCampaignDelete')->comment('Удаление кампании')->default(0);
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
                'pushCampaignList',
                'pushCampaignCreate',
                'pushCampaignEdit',
                'pushCampaignDelete',
            ]);
        });
    }
};
