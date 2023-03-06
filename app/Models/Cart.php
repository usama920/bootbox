<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['users_id', 'products_id', 'quantity', 'subscription_price', 'total_price', 'sizes_id', 'subscriptions_id'];
}
