<?php

use App\Order;
use App\Product;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 20)->create();
        $products = Product::all();

        App\Order::all()->each(function ($order) use ($products) {
            $randomProducts = Product::all()->random(rand(1, 3));
            $order->products()->attach(
                $randomProducts
            );
            $order->setTotalAttribute($order->products()->get()->sum('price'));
        });
    }
}
