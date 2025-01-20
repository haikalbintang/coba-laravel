<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('id_ID');
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'text' => $faker->paragraph(),
            'created_at' => $faker->dateTimeBetween('-1 week', 'now'),
            'updated_at' => $faker->dateTimeBetween('created_at', 'now'),
        ];
    }
}
