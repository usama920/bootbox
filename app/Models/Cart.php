<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['users_id', 'products_id', 'quantity', 'subscription_price', 'total_price', 'sizes_id', 'subscriptions_id'];

    public function CartProduct(){
        return $this->hasOne(Product::class, 'id', 'products_id')->select('id', 'product_name')->with('ProductImages');
    }

    public function CartSize(){
        return $this->hasOne(Size::class, 'id', 'sizes_id')->select('id', 'name');
    }

    public function CartSubscription(){
        return $this->hasOne(Subscription::class, 'id', 'subscriptions_id')->select('id', 'name');
    }
}
