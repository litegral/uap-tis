<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            [
                'nim' => '1111111111',
                'nama' => 'Budi Doremi',
                'angkatan' => 2021,
                'password' => Hash::make('password'),
                'prodi_id' => 1
            ],
            [
                'nim' => '2222222222',
                'nama' => 'Ani Suryani',
                'angkatan' => 2021,
                'password' => Hash::make('password'),
                'prodi_id' => 1
            ],
            [
                'nim' => '3333333333',
                'nama' => 'Candra Wijaya',
                'angkatan' => 2022,
                'password' => Hash::make('password'),
                'prodi_id' => 3
            ],
            [
                'nim' => '4444444444',
                'nama' => 'Dewi Lestari',
                'angkatan' => 2022,
                'password' => Hash::make('password'),
                'prodi_id' => 4
            ],
            [
                'nim' => '5555555555',
                'nama' => 'Eka Kurniawan',
                'angkatan' => 2023,
                'password' => Hash::make('password'),
                'prodi_id' => 5
            ]
        ]);
    }
} 