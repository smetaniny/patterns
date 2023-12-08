<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Order;
use App\Models\Certificate;

return new class extends Migration {
    /**
     * @var string
     */
    protected string $certificateOperationsTable = 'certificate_operations';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->certificateOperationsTable, function (Blueprint $table) {
            $table->id();
            $table->string('vid_operation')->comment('Вид транзакции')->nullable();
            $table->decimal('sum_cert', 10, 2)->comment('Остаток суммы на сертификате')->nullable();
            $table->integer('status')->comment('Статус транзакции')->default(0);
            $table->foreignIdFor(Order::class)->comment('Связь с таблицей orders')->constrained()->onUpdate('cascade')->onDelete('restrict');
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
        Schema::table($this->certificateOperationsTable, function (Blueprint $table) {
            $table->dropConstrainedForeignIdFor(Order::class);
            $table->dropConstrainedForeignIdFor(Certificate::class);
        });

        Schema::dropIfExists($this->certificateOperationsTable);
    }
};
