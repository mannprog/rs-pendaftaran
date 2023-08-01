<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234'),
            'is_admin' => 0,
            'jabatan' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Petugas Pendaftaran',
            'username' => 'petugas',
            'email' => 'petugas@petugas.com',
            'password' => bcrypt('1234'),
            'is_admin' => 0,
            'jabatan' => 'pendaftaran',
        ]);

        User::factory()->create([
            'name' => 'Kasir',
            'username' => 'kasir',
            'email' => 'kasir@kasir.com',
            'password' => bcrypt('1234'),
            'is_admin' => 0,
            'jabatan' => 'kasir',
        ]);

        User::factory()->create([
            'name' => 'Pasien',
            'username' => 'pasien',
            'email' => 'pasien@pasien.com',
            'password' => bcrypt('1234'),
            'is_admin' => 1,
            'jabatan' => 'pasien',
        ]);
    }
}
