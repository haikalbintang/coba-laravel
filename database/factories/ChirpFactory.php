<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chirp>
 */
class ChirpFactory extends Factory
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
            'user_id' => User::inRandomOrder()->first()->id,
            'parent_id' => null,
            'text' => $faker->text(255),
            'created_at' => $createdAt,
            'updated_at' => $faker->dateTimeBetween($createdAt, 'now'),
        ];
    }
}
