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
        User::factory()->create([
            'name' => 'Haikal Bintang',
            'email' => 'haikalbintang@email.com',
        ]);
        $users = User::factory(5)->create();

        Product::factory(30)->create()->each(function (Product $product) use ($users) {
            $numComments = random_int(0, 4);

            Comment::factory($numComments)->create([
                'product_id' => $product->id,
                'user_id' => $users->random()->id,
            ]);
        });

        Chirp::factory(10)->create()->each(function (Chirp $chirp) use ($users) {
            $user = $users->random();
            $chirp->user()->associate($user);
            $chirp->created_at = fake()->dateTimeBetween($user->created_at, 'now');
            $chirp->updated_at = fake()->dateTimeBetween($chirp->created_at, 'now');
            $chirp->save();
        });
    }
}
