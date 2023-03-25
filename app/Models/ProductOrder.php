<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'products_id',
        'subscription_types_id',
        'product_sizes_id',
        'status',
        'subscription_type',
        'strip_price_id',
        'total_amount',
        'installment_price',
        'name',
        'phone',
        'address_1',
        'address_2',
        'city',
        'state',
        'zipcode',
        'country'
    ];
    public function orderSubscription()
    {
        return $this->hasOne(SubscriptionType::class, 'id', 'subscription_types_id')->select('id', 'name');
    }
    public function orderProduct()
    {
        return $this->hasOne(Product::class, 'id', 'products_id')->select('id', 'product_name');
    }
    public function orderSizes()
    {
        return $this->hasOne(ProductSize::class, 'id', 'product_sizes_id')->select('id', 'sizes_id')->with('SizeName');
    }
}
