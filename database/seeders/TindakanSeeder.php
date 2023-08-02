<?php

namespace Database\Seeders;

use App\Models\Tindakan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tindakan::factory()->count(8)->sequence(
            ['nama' => 'Konsultasi Dokter Umum', 'tarif' => '100000', 'status' => 1],
            ['nama' => 'Pemeriksaan Darah Lengkap (Complete Blood Count/CBC)', 'tarif' => '150000', 'status' => 2],
            ['nama' => 'Foto Rontgen Dada', 'tarif' => '400000', 'status' => 3],
            ['nama' => 'USG (Ultrasonografi) Abdomen', 'tarif' => '500000', 'status' => 1],
            ['nama' => 'Biaya Rawat Inap Rumah Sakit', 'tarif' => '1150000', 'status' => 1],
            ['nama' => 'Operasi Apendiktomi', 'tarif' => '10000000', 'status' => 3],
            ['nama' => 'Pemeriksaan EKG', 'tarif' => '200000', 'status' => 2],
            ['nama' => 'Terapi Fisik (Sesi 1 jam)', 'tarif' => '300000', 'status' => 2],
        )->create();
    }
}
