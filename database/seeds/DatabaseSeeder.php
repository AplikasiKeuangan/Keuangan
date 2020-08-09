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
        DB::table('kas_tunais')->insert([
            'tanggal' => '2020-07-23',
            'no_bukti' => 0,
            'uraian' => 'TT SS',
            'debit' => '300000',
            'kredit' => '0',
        ]);
        DB::table('users')->insert([
            'name' => 'Nocen',
            'email' => 'email@admin.com',
            'password' => bcrypt('secret123'),
            'role' => 1,
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);
    }
}
