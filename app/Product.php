<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Order;

class Product extends Model
{
    protected $guarded = [];
    
    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }
}
