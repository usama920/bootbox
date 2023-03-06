<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubscription extends Model
{
    use HasFactory;
    protected $fillable=['subscriptions_id', 'status', 'products_id'];

    public function SubscriptionName ()
    {
        return $this->hasOne(Subscription::class, 'id', 'subscriptions_id')->select('id', 'name');
    }
}
