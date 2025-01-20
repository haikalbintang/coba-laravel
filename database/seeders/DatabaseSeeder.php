<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        Product::factory(30)->create()->each(function (Product $product) {
            $numComments = random_int(0, 4);

            Comment::factory($numComments)->create([
                'product_id' => $product->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ]);
        });
    }
}
