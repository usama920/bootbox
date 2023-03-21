<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyMargin extends Model
{
    use HasFactory;
    protected $fillable=[
        'margin_amount'
    ];
}
