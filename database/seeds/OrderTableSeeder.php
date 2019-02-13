<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Order;
use App\User;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $products = Product::all();
        $users = User::all();

        for($i = 0; $i < 20; $i++) {
            $randomProducts = $products->random(rand(1, 3));
            
            $order = App\Order::create([
                'user_id' => $users->random(1)->first()->id,
                'total' => $randomProducts->sum('price'),
            ]);
            $order->products()->attach($randomProducts);
        }

    }
}
