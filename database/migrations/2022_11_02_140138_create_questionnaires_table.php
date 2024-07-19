<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'answers_questions';
        $usersTableName = 'users';

        Schema::create($tableName, function (Blueprint $table) use ($tableName, $usersTableName) {
            $table->id();
            $table->bigInteger('users_id')->unsigned()->comment('Связь с таблицей users');
            $table->string('questionnaire_name')->comment('Название анкеты')->nullable();
            $table->text('answer_1')->comment('Ответ 1')->nullable();
            $table->text('answer_2')->comment('Ответ 2')->nullable();
            $table->text('answer_3')->comment('Ответ 3')->nullable();
            $table->text('answer_4')->comment('Ответ 4')->nullable();
            $table->text('answer_5')->comment('Ответ 5')->nullable();
            $table->text('answer_6')->comment('Ответ 6')->nullable();
            $table->text('answer_7')->comment('Ответ 7')->nullable();
            $table->text('answer_8')->comment('Ответ 8')->nullable();
            $table->text('answer_9')->comment('Ответ 9')->nullable();
            $table->text('answer_10')->comment('Ответ 10')->nullable();
            $table->text('answer_11')->comment('Ответ 11')->nullable();
            $table->text('answer_12')->comment('Ответ 12')->nullable();
            $table->text('answer_13')->comment('Ответ 13')->nullable();
            $table->text('answer_14')->comment('Ответ 14')->nullable();
            $table->text('answer_15')->comment('Ответ 15')->nullable();

            $table->timestamps();

            $table->foreign('users_id', "{$tableName}_users_id_foreign")
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
        $tableName = 'answers_questions';

        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                $table->dropForeign("{$tableName}_users_id_foreign");
                $table->dropColumn('users_id');
            });
        }

        Schema::dropIfExists($tableName);
    }
};
