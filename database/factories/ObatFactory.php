<?php

namespace Database\Factories;

use Carbon\Carbon;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;
use NumberFormatter;

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
            'nama' => 'obat-'. fake()->unique()->numberBetween(0, 10),
            'stok' => mt_rand(50, 500),
            'stok_min' => mt_rand(10, 50),
            'harga_jual' => '50000',
            'harga_beli' => '40000',
            'exp' => Carbon::createFromFormat('Y-m-d', mt_rand(2024, 2050).'-'.mt_rand(1, 12).'-'.mt_rand(1, 30))->format('Y-m-d'),
            'statuses_id' => mt_rand(1, 3),
        ];
    }
}
