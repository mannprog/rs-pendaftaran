<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => 'obat-'.mt_rand(1, 10),
            'stok' => mt_rand(50, 500),
            'stok_min' => mt_rand(10, 50),
            'harga_jual' => '50000',
            'harga_beli' => '40000',
            'exp' => Carbon::now()->subDays(rand(1, 30)),
            'statuses_id' => mt_rand(1, 3),
        ];
    }
}
