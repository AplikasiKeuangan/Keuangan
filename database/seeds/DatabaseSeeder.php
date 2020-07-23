<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswas')->insert([
            'nis' => 170700714,
            'nama_lengkap' => 'Al Azim',
            'nama_panggilan' => 'Azim',
            'jenis_kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Mungka',
            'tanggal_lahir' => '2002-06-28',
            'agama' => 'Islam',
            'kewarganegaraan' => 'WNI',
            'anak_ke' => '3',
            'jumlah_saudara'=> '2',
            'kondisi_siswa' => 'Berkecukupan',
            'status_siswa' => 'eksklusif',
            'bahasa_sehari_hari' => 'Minangkabau, Indonesia',
            'alamat' => 'Jalan simpang 3 kenanga, kenagarian sungai antuan, Mungka, Lima Puluh Kota, Sumatera Barat, 26254',
            'telepon' => NULL,
            'handphone' => '085156055275',
            'email' => 'alazim@gmail.com',
            'asal_sekolah' => 'MTsN Lima Puluh Kota',
        ]);
        DB::table('kas_tunais')->insert([
            'tanggal' => '2020-07-23',
            'no_bukti' => 0,
            'uraian' => 'TT SS',
            'debit' => '0',
            'kredit' => '300000',
        ]);
    }
}
