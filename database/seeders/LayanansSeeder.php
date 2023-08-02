<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayanansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Layanan::factory()->count(8)->sequence(
            ['nama' => 'Poli Anak'],
            ['nama' => 'Poli Bedah'],
            ['nama' => 'Poli Kandung'],
            ['nama' => 'Poli Laboratorium'],
            ['nama' => 'Poli Penyakit Dalam'],
            ['nama' => 'Poli Radiologi'],
            ['nama' => 'Poli Saraf'],
            ['nama' => 'Poli THT'],
        )->create();
    }
}
