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
        $createdAt = $faker->dateTimeBetween('-1 month', 'now');
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'text' => $faker->text(255),
            'created_at' => $createdAt,
            'updated_at' => $faker->dateTimeBetween($createdAt, 'now'),
        ];
    }
}
