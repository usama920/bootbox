<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionInstallments extends Model
{
    use HasFactory;
    protected $table = "subscription_installments";
    protected $fillable = [
        'cus_id', 'sub_id', 'charge_id', 'invoice_url', 'product_id', 'paid_amount', 'start_at', 'currency', 'end_at'
    ];
}
