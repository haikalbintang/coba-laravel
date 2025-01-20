<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Chirp;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(5)->create();

        Product::factory(30)->create()->each(function (Product $product) use ($users) {
            $numComments = random_int(0, 4);

            Comment::factory($numComments)->create([
                'product_id' => $product->id,
                'user_id' => $users->random()->id,
            ]);
        });

        Chirp::factory(10)->create()->each(function (Chirp $chirp) use ($users) {
            $chirp->user()->associate($users->random());
            $chirp->save();
        });
    }
}
