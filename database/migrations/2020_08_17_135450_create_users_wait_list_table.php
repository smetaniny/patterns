<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersWaitListTable extends Migration
{
    /**
     * Таблица лист ожидания
     *
     * @return void
     */
    public function up()
    {
        $faqTableName = 'users_wait_list';
        $usersTableName = 'users';
        $productsTableName = 'products';
        $ordersTableName = 'orders';

        Schema::create($faqTableName, function (Blueprint $table) use ($faqTableName, $usersTableName, $productsTableName, $ordersTableName) {
            $table->id();

            $table->string('size')->comment('Размер')->nullable();
            $table->integer('status_id')->default(1)->comment('Статус ожидания');
            $table->foreign('users_id', "{$faqTableName}_users_id_foreign")
                ->references('id')
                ->on($usersTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');


            $table->bigInteger('product_id')->unsigned()->comment('ID продукта из таблицы products');
            $table->bigInteger('users_id')->unsigned()->comment('Связь с таблицей users');
            $table->foreign('product_id', "{$faqTableName}_product_id_foreign")
                ->references('id')
                ->on($productsTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');


            $table->string('comment', 512)->comment('Комментарий')->nullable();
            $table->integer("deleted")->comment('Удален пользователем')->default(0);
            $table->timestamp('deleted_date')->comment('Дата удаления пользователем')->nullable();
            $table->integer("mail_sent")->comment('Отправлено письмо пользователю')->default(0);
            $table->timestamp('mail_sent_date')->comment('Дата отправки письма')->nullable();
            $table->bigInteger('orders_id')->unsigned()->comment('Связь с таблицей orders')->nullable();

            $table->foreign('orders_id', "{$faqTableName}_orders_id_foreign")
                ->references('id')
                ->on($ordersTableName)
                ->onUpdate('cascade')
                ->onDelete('restrict');

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
        $faqTableName = 'users_wait_list';
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($faqTableName, function (Blueprint $table) use ($faqTableName) {
                $table->dropForeign("{$faqTableName}_users_id_foreign");
                $table->dropColumn('users_id');

                $table->dropForeign("{$faqTableName}_product_id_foreign");
                $table->dropColumn('product_id');
            });
        }

        Schema::dropIfExists($faqTableName);
    }
}
