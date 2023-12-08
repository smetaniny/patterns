<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $faqStatusesTableName = 'faq_statuses';

        Schema::create($faqStatusesTableName, function (Blueprint $table) use ($faqStatusesTableName) {
            $table->id();
            $table->string('name')->comment('Имя статуса');
            $table->timestamp('created_at')->useCurrent()->comment('Дата создания');
            $table->timestamp('updated_at')->useCurrent()->comment('Дата обновления');
        });

        DB::table($faqStatusesTableName)->insert(
            [
                ['name' => 'Новый'],
                ['name' => 'Есть ответ'],
                ['name' => 'Отклонен'],
                ['name' => 'Решено'],
                ['name' => 'Не решено'],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $faqStatusesTableName = 'faq_statuses';
        Schema::dropIfExists($faqStatusesTableName);
    }
}
