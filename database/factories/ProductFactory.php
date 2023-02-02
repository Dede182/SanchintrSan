<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $begin = Carbon::now();
        $end = Carbon::now()->subDays(10);
        $created = fake()->dateTimeBetween($end,$begin);
        return [
            'title' => fake()->text(30),
            'description' => fake()->word(40),
            'price' => fake()->numberBetween(0,6000),
            'created_at' => $created,
            'updated_at' => $created,
        ];
    }
}
