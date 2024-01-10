<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suplier>
 */
class SuplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_suplier'=> fake()->randomNumber(5, true),
            'nama_suplier' => fake()->name(),
            'alamat' => fake()->streetAddress(),
            'no_telepon' => fake()->phoneNumber(),
        ];
    }
}
