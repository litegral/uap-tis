<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodis')->insert([
            ['nama' => 'Teknologi Informasi'],
            ['nama' => 'Sistem Informasi'],
            ['nama' => 'Pendidikan Teknologi Informasi'],
            ['nama' => 'Teknik Informatika'],
            ['nama' => 'Teknik Komputer'],
        ]);
    }
} 