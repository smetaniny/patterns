<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * @var string
     */
    protected string $certificatesTable = 'certificates';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->certificatesTable, function (Blueprint $table) {
            $table->id();
            $table->string('number')->comment('')->nullable();
            $table->integer('type')->comment('Вид сертификата')->default(3);
            $table->decimal('total', 10, 2)->comment('Сумма сертификата')->nullable();
            $table->integer('status')->comment('Статус сертификата')->default(0);
            $table->decimal('balance', 10, 2)->comment('Остаток суммы на сертификате')->nullable();
            $table->date('date_start')->comment('Дата начала действия сертификата')->nullable();
            $table->date('date_end')->comment('Дата окончания действия сертификата')->nullable();
            $table->string('template')->comment('Шаблон сертификата')->default("0");
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
        Schema::dropIfExists($this->certificatesTable);
    }
};
