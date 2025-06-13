<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matakuliahs')->insert([
            ['nama' => 'Pemrograman Dasar'],
            ['nama' => 'Pemrograman Lanjut'],
            ['nama' => 'Algoritma dan Struktur Data'],
            ['nama' => 'Sistem Basis Data'],
            ['nama' => 'Jaringan Komputer Dasar'],
        ]);
    }
} 