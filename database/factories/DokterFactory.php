<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'layanan_id' => mt_rand(1,8),
            'nama' => fake('id_ID')->name(),
            'hari' => "Senin - Jum'at",
            'jam' => "08.00 - 12.00",
            'tarif' => 150000,
        ];
    }
}
