<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Order extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function setTotalAttribute($total) {
        $this->attributes['total'] = $total;
    }

    public function updateProducts($products) {
        $this->products()->detach();
        $products_new = Product::findOrFail($products);
        $this->products()->attach($products_new);
        $this->setTotalAttribute($products_new->sum('price'));

    }
}
