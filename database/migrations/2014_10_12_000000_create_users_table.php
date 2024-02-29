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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

//            $table->integer('auth_admin')->default(0);
            $table->string('surname')->comment('Фамилия')->nullable();
            $table->string('name')->comment('Имя')->nullable();
            $table->string('patronymic')->comment('Отчество')->nullable();
            $table->string('avatar')->comment('Аватар')->nullable();
            $table->string('phone')->unique()->comment('Телефон')->nullable();
            $table->string('email')->unique()->comment('Email')->nullable();
            $table->string('sex')->comment('Пол')->nullable();
            $table->date('date_of_birth')->comment('Дата рождения')->nullable();
            $table->string('passport_number')->comment('Паспорт номер')->nullable();
            $table->string('passport_series')->comment('Паспорт серия')->nullable();
            $table->date('passport_date_of_issue')->comment('Паспорт дата выдачи')->nullable();
            $table->string('passport_date_of_division')->comment('Паспорт код подразделения')->nullable();
            $table->text('passport_issued_by_whom')->comment('Паспорт кем выдан')->nullable();
            $table->text('passport_img')->comment('Паспорт фото')->nullable();
            $table->string('password')->comment('Пароль')->nullable();
            $table->string('ip')->comment('ip')->nullable();
            $table->string('card_number')->comment('Номер карты')->nullable();
            $table->integer('mail_basket_status')->comment('Напоминание о товарах в корзине')->default(1);
            $table->integer('mail_action_new_post')->comment('Акции, скидки, обновление ассортимента')->default(1);
            $table->integer('push_notifications')->comment('Push уведомления')->default(1);
            $table->string('password_old')->comment('Пароль со старого сайта')->nullable();
            $table->string('salt_old')->comment('Соль к паролю со старого сайта')->nullable();
            $table->timestamp("user_active_date")->comment('Время последнего посещения пользователя')->useCurrent();
            $table->integer("user_status_basket")->comment('Статус отправки писем по брошенной корзине')->default(0);
            $table->integer("exchange_statuses")->comment('Статус обмена с 1с')->default(0);
            $table->timestamp('email_verified_at')->comment('Дата проверки email')->nullable();
            $table->integer("is_active")->comment('Доступ к сайту')->default(1);
            $table->integer("payment_only_online")->comment('Только онлайн оплата заказов')->default(0);
            $table->integer('is_barcode')->comment('Доступ к камере для сканирования')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
