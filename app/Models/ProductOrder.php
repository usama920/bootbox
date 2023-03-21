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
        ' address_2',
        'city',
        'state',
        'zipcode',
        'country'
    ];
}
