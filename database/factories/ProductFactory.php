<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker\Factory as Faker;

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
        $faker = Faker::create('id_ID');
        $createdAt = $faker->dateTimeBetween('-1 month', 'now');
        return [
            "name" => ucwords($faker->word() ." ". $faker->word() . " " . $faker->word()),
            "description" => $faker->text(),
            "price" => $faker->randomNumber(6),
            "image" => $faker->imageUrl(200, 200),
            "is_sold" => $faker->randomElement([true, false]),
            "gender" => $faker->randomElement(['male', 'female', 'kids','unisex', '']),
            "user_id" => User::inRandomOrder()->first()->id,
            "created_at" => $createdAt,
            "updated_at" => $faker->dateTimeBetween($createdAt, 'now'),
        ];
    }
}
