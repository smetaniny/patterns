<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Certificate;

return new class extends Migration {
    /**
     * @var string
     */
    protected string $certificateRecipientsTable = 'certificate_recipients';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->certificateRecipientsTable, function (Blueprint $table) {
            $table->id();
            $table->string('recipient_name')->comment('Имя получателя')->nullable();
            $table->string('recipient_phone')->comment('Телефон получателя')->nullable();
            $table->string('recipient_email')->comment('Email получателя')->nullable();
            $table->string('recipient_message')->comment('Сообщение получателя')->nullable();
            $table->integer('send_status')->comment('Статус отправки сертификата получателю')->default(0);
            $table->timestamp('send_date')->comment('Дата отправки сертификата получателю')->nullable();
            $table->foreignIdFor(User::class)->comment('Связь с таблицей users')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->foreignIdFor(Certificate::class)->comment('Связь с таблицей certificate')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::table($this->certificateRecipientsTable, function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(User::class);
            $table->dropConstrainedForeignIdFor(Certificate::class);
        });
        Schema::dropIfExists($this->certificateRecipientsTable);
    }
};
