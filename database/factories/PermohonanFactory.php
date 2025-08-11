<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permohonan>
 */
class PermohonanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'layanan' => $this->faker->randomElement(['Surat Keterangan', 'SKTM', 'KTP']),
            'status' => $this->faker->randomElement(['menunggu', 'diproses', 'selesai']),
        ];
    }
}
