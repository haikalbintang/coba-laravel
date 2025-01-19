<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            "name" => fake()->domainName(),
            "description" => fake()->text(),
            "price" => fake()->randomNumber(6),
            "image" => fake()->imageUrl(200, 200),
            "is_sold" => fake()->boolean(false),
        ];
    }
}
