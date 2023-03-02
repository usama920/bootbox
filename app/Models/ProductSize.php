<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $fillable=[
        'products_id',
        'sizes_id',
        'status',
    ];
    public function SizeName(){
        return $this->hasOne(Size::class, 'id', 'sizes_id')->select('id', 'name');
    }
}
