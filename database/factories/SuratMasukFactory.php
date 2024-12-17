<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuratMasuk>
 */
class SuratMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_surat' => fake()->randomNumber(9, true),
            'instansi_pengirim' => fake()->words(3, true),
            'tanggal_surat' => fake()->date(),
            'tanggal_diterima' => fake()->date(),
            'nomor_agenda' => fake()->words(3, true),
            'klasifikasi'=> fake()->word(),
            'lampiran' => fake()->words(3, true),
            'status'=> fake()->word(),
            'sifat' => fake()->word(),
            'file_patch' => fake()->word(),
        ];
    }
}
