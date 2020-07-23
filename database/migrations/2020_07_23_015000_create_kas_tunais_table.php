<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasTunaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kas_tunais', function (Blueprint $table) {
            $table->bigIncrements('id_kas_tunai');
            $table->date('tanggal');
            $table->integer('no_bukti')->nullable();
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
        Schema::dropIfExists('kas_tunais');
    }
}
