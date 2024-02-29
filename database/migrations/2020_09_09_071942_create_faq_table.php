<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTable extends Migration
{

    protected $tableName = 'faqs';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $faqTableName = 'faqs';
        $usersTableName = 'users';

        Schema::create($faqTableName, function (Blueprint $table) use ($faqTableName, $usersTableName) {
            $table->id();

            $table->string('subjectName')->comment('Тема обращения')->nullable();
            $table->string('question', 512)->comment('Вопрос')->nullable();
            $table->string('answer', 512)->comment('Ответ')->nullable();
            $table->integer('status_id')->default(1)->comment('id статуса обращения');
            $table->string('result_answer')->comment('Результат ответа')->nullable();
            $table->string('checkedPersonal')->comment('Согласие на обработку персональных данных')->nullable();

            $table->bigInteger('users_id')->unsigned()->comment('Связь с таблицей users');

            $table->timestamps();

            $table->foreign('users_id', "{$faqTableName}_users_id_foreign")
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
        $faqTableName = 'faqs';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($faqTableName, function (Blueprint $table) use ($faqTableName) {
                $table->dropForeign("{$faqTableName}_users_id_foreign");
                $table->dropColumn('users_id');
            });
        }

        Schema::dropIfExists($faqTableName);
    }
}
