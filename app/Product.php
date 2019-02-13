<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Order;

class Product extends Model
{
    //
    public function categories() {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function orders() {
        return $this->belongsToMany(Order::class, 'order_product');
    }
}
