<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Счета к оплате
        Schema::create('bills', function (Blueprint $table) {
            $table->id();                       // Номер выставленного счёта
            $table->foreignId('resident_id')    // Внешний ключ: нельзя удалять дачника которому уже выставлен счёт
                  ->constrained('periods');     // Ссылка на дачника
            $table->foreignId('period_id')      // Внешний ключ: нельзя удалять период по которому уже выставлен счёт
                  ->constrained('periods');     // Ссылка на период
            $table->float('amount_rub');        // Сумма к оплате
            $table->unique(['resident_id', 'period_id']); // Дачнику за период выставляется только один счёт
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
