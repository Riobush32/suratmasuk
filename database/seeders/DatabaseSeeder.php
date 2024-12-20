<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Status;
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
    protected static ?string $password;



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
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => static::$password ??= Hash::make('password'),
            'role' => 'admin',
            'active' => 'active',
            'position' => fake()->jobTitle(),
            'nip' => fake()->numerify('user-####'),
            'remember_token' => Str::random(10),
        ]);

        Status::factory()->create([
            'color_list_id' => 1,
            'name' => 'diperiksa staff'
        ]);

        Status::factory()->create([
            'color_list_id' => 2,
            'name' => 'diperiksa sekertaris'
        ]);

        Status::factory()->create([
            'color_list_id' => 3,
            'name' => 'diperiksa kepala'
        ]);

        Status::factory()->create([
            'color_list_id' => 4,
            'name' => 'selesai'
        ]);

        // SuratMasuk::factory(20)->create();
    }
}
