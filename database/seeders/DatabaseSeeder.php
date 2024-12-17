<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SuratMasuk;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Factories\ColorListFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    public function run(): void
    {
        $factory = new ColorListFactory();
        try {
            $factory->insertAll();
            echo "Data berhasil dimasukkan";
        } catch (\Exception $e) {
            dd('Gagal menyisipkan data: ', $e->getMessage());
        }

        User::factory(20)->create();

        User::factory()->create([
            'name' => 'Rio Sofhaniel Bush',
            'email' => 'riobush32@gmail.com',
            'password' => Hash::make('#Adinda2112'),
            'role' => '',
            'active' => '',
            'position' => fake()->jobTitle(),
            'nip' => fake()->numerify('user-####'),
            'remember_token' => Str::random(10),
        ]);

        // SuratMasuk::factory(20)->create();
    }
}
