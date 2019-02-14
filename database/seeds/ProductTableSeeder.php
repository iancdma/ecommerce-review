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

        for ($i = 0; $i < 50; $i++) {
            App\Product::create([
                'name' => $faker->company,
                'price' => $faker->numberBetween($min = 1000, $max = 9000),
                'category_id' => Category::inRandomOrder()->first()->id,
            ]);

        }
    }
}
