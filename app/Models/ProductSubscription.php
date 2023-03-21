<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubscription extends Model
{
    use HasFactory;
    protected $fillable=['subscription_types_id', 'strip_price_id', 'weekly_strip_id', 'price', 'status', 'products_id'];

    public function SubscriptionName ()
    {
        return $this->hasOne(SubscriptionType::class, 'id', 'subscription_types_id')->select('id', 'name');
    }
}
