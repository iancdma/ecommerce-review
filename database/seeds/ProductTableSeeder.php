<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = Category::all();

        for($i = 0; $i < 50; $i++) {
            $product = App\Product::create([
                'name' => $faker->company,
                'price' => $faker->randomDigitNotNull,
            ]);
            $product->categories()->attach($categories->random(rand(1, 3)));
        }
    }
}
