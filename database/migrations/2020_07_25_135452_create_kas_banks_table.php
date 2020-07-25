<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_banks', function (Blueprint $table) {
            $table->bigIncrements('id_kas_bank');
            $table->date('tanggal');
            $table->string('no_bukti')->nullable();
            $table->string('no_rekening')->nullable();
            $table->text('uraian');
            $table->bigInteger('debit')->nullable();
            $table->bigInteger('kredit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kas_banks');
    }
}
