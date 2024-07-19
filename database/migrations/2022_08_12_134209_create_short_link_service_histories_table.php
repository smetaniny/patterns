<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortLinkServiceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $shortLinkServiceHistoriesTableName = 'short_link_service_histories';
        $shortLinkServiceTableName = 'short_link_service';

        Schema::create($shortLinkServiceHistoriesTableName, function (Blueprint $table) use ($shortLinkServiceHistoriesTableName, $shortLinkServiceTableName) {
            $table->id();
            $table->string('ip')->comment('IP-адрес')->nullable();
            $table->bigInteger('short_link_service_id')->unsigned()->comment('Связь с таблицей short_link_service');
            $table->timestamps();

            $table->foreign('short_link_service_id', "{$shortLinkServiceHistoriesTableName}_short_link_service_id_foreign")
                ->references('id')
                ->on($shortLinkServiceTableName)
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
        $shortLinkServiceHistoriesTableName = 'short_link_service_histories';

        Schema::table($shortLinkServiceHistoriesTableName, function (Blueprint $table) use ($shortLinkServiceHistoriesTableName) {
            $table->dropForeign("{$shortLinkServiceHistoriesTableName}_short_link_service_id_foreign");
            $table->dropColumn('short_link_service_id');
        });

        Schema::dropIfExists($shortLinkServiceHistoriesTableName);
    }
};
