<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Order;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
