<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryAddressTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'delivery_address';
        $usersTableName = 'users';

        Schema::create($tableName, function (Blueprint $table) use ($tableName, $usersTableName) {
            $table->bigIncrements('id');
            $table->string('fullAddress')->comment('Адресс доставки')->nullable();
            $table->bigInteger('users_id')->unsigned()->comment('Связь с таблицей users');
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
        $tableName = 'delivery_address';

        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                $table->dropForeign("{$tableName}_users_id_foreign");
                $table->dropColumn('users_id');
            });
        }

        Schema::dropIfExists($tableName);
    }
}
