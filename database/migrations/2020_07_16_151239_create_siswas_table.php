<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->bigInteger('nis');
            $table->primary('nis');
            $table->string('nama_siswa');
            $table->bigInteger('id_kelas');
            $table->bigInteger('id_jurusan');
            $table->time('tgl_mulai_byr');
            $table->time('tgl_berhenti_byr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
