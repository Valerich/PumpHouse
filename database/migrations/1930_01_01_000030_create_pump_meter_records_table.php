<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePumpMeterRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Показания счётчика водокачки
        Schema::create('pump_meter_records', function (Blueprint $table) {
            $table->id();
            $table->float('amount_volume');     // Показания счетчика на конец периода
            $table->foreignId('period_id')->unique()->constrained('periods');    // Ссылка на период (уникальна, на 1 период должна быть 1 запись счетчика)  
        // Внешний ключ: нельзя удалять период по которому уже внесены данные счетчика
        // если при вводе показаний счетчика, в таблице periods нет записи на соответствующий месяц, то надо её создать 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pump_meter_records');
    }
}
