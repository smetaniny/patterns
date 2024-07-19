<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $faqMessagesTableName = 'faq_messages';
        $faqTableName = 'faqs';
        $usersTableName = 'users';

        Schema::create($faqMessagesTableName, function (Blueprint $table) use ($faqMessagesTableName, $faqTableName, $usersTableName) {
            $table->id();

            $table->text('message')->comment('Сообщение')->nullable();

            $table->bigInteger('faq_id')->unsigned()->comment('Связь с таблицей faqs')->nullable();
            $table->bigInteger('users_id')->unsigned()->comment('Связь с таблицей users')->nullable();

            $table->timestamps();

            $table->foreign('faq_id', "{$faqMessagesTableName}_faq_id_foreign")
                ->references('id')
                ->on($faqTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('users_id', "{$faqMessagesTableName}_users_id_foreign")
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
        $faqMessagesTableName = 'faq_messages';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($faqMessagesTableName, function (Blueprint $table) use ($faqMessagesTableName) {
                $table->dropForeign("{$faqMessagesTableName}_faq_id_foreign");
                $table->dropColumn('faq_id');

                $table->dropForeign("{$faqMessagesTableName}_users_id_foreign");
                $table->dropColumn('users_id');
            });
        }

        Schema::dropIfExists($faqMessagesTableName);
    }
}
