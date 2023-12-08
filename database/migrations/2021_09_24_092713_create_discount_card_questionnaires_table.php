<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCardQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $discountCardQuestionnairesTable = 'discount_card_questionnaires';
        $discountCardsTable = 'discount_cards';

        Schema::create($discountCardQuestionnairesTable, function (Blueprint $table) use ($discountCardQuestionnairesTable, $discountCardsTable) {
            $table->id();
            $table->string('surname')->comment('Фамилия')->nullable();
            $table->string('name')->comment('Имя')->nullable();
            $table->string('patronymic')->comment('Отчество')->nullable();
            $table->date('date_of_birth')->comment('Дата рождения')->nullable();
            $table->string('address', 512)->comment('Адрес регистрации')->nullable();
            $table->string('phone')->unique()->comment('Телефон')->nullable();
            $table->string('email')->unique()->comment('Email')->nullable();
            $table->integer('phone_action_new_post')->comment('Подписка на смс рассылку')->nullable();
            $table->string('passport_series')->comment('Паспорт серия')->nullable();
            $table->string('passport_number')->comment('Паспорт номер')->nullable();
            $table->date('passport_date_of_issue')->comment('Паспорт дата выдачи')->nullable();
            $table->string('passport_date_of_division')->comment('Паспорт код подразделения')->nullable();
            $table->text('passport_issued_by_whom')->comment('Паспорт кем выдан')->nullable();
            $table->text('passport_img')->comment('Паспорт фото')->nullable();
            $table->bigInteger('discount_cards_id')->unsigned()->comment('Связь с таблицей discount_cards');
            $table->timestamps();

            $table->foreign('discount_cards_id', "{$discountCardQuestionnairesTable}_discount_cards_id_foreign")
                ->references('id')
                ->on($discountCardsTable)
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
        $discountCardQuestionnairesTable = 'discount_card_questionnaires';

        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($discountCardQuestionnairesTable, function (Blueprint $table) use ($discountCardQuestionnairesTable) {
                $table->dropForeign("{$discountCardQuestionnairesTable}_discount_cards_id_foreign");
                $table->dropColumn('discount_cards_id');
            });
        }

        Schema::dropIfExists($discountCardQuestionnairesTable);
    }
}
