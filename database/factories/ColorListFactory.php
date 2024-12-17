<?php

namespace Database\Factories;

use App\Models\ColorList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ColorList>
 */
class ColorListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ColorList::class;
    public function definition(): array
    {
        return [ ];
    }
    public function insertAll()
    {
        $tailwindColors = [
                'red' => 'red-600',
                'blue' => 'blue-600',
                'green' => 'green-600',
                'yellow' => 'yellow-600',
                'purple' => 'purple-600',
                'pink' => 'pink-600',
                'gray' => 'gray-600',
                'indigo' => 'indigo-600',
                'cyan' => 'cyan-600',
                'emerald' => 'emerald-600',
                'orange' => 'orange-600',
                'teal' => 'teal-600',
                'lime' => 'lime-600',
                'red_300' => 'red-300',
                'blue_300' => 'blue-300',
                'green_300' => 'green-300',
                'yellow_300' => 'yellow-300',
                'purple_300' => 'purple-300',
                'pink_300' => 'pink-300',
                'gray_300' => 'gray-300',
                'indigo_300' => 'indigo-300',
                'cyan_300' => 'cyan-300',
                'emerald_300' => 'emerald-300',
                'orange_300' => 'orange-300',
                'teal_300' => 'teal-300',
                'lime_300' => 'lime-300',
            ];


        foreach ($tailwindColors as $colorCode => $colorName) {
            ColorList::create([
                'name' => $colorCode,
                'color' => $colorName,
            ]);
        }
    }
}
