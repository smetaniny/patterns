<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodeActionFilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $faqTableName = 'promo_code_action_filter';
        $promoCodeTableName = 'promo_code';

        Schema::create($faqTableName, function (Blueprint $table) use ($faqTableName, $promoCodeTableName) {
            $table->id();

            $table->string('action_filter')->comment('Группа акций')->nullable();
            $table->string('action_filter_alias')->comment('Группа акций алиас')->nullable();

            $table->bigInteger('promo_code_id')->unsigned()->comment('Связь с таблицей promo_code')->nullable();

            $table->timestamps();

            $table->foreign('promo_code_id', "{$faqTableName}_promo_code_id_foreign")
                ->references('id')
                ->on($promoCodeTableName)
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
        $faqTableName = 'promo_code_action_filter';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($faqTableName, function (Blueprint $table) use ($faqTableName) {
                $table->dropForeign("{$faqTableName}_promo_code_id_foreign");
                $table->dropColumn('promo_code_id');
            });
        }

        Schema::dropIfExists($faqTableName);
    }
}
