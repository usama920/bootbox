<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_stripe_id',
        'product_name',
        'product_slug',
        'description',
        'product_price',
        'status',
        'sub_categories_id',
        'styles_id',
        'genders_id',
        'materials_id',
        'tier_levels_id',
        'safety_resistances_id'
    ];

    public function SubCategoryName(){
        return $this->hasOne(SubCategory::class, 'id', 'sub_categories_id')->select('id', 'name', 'categories_id')->with('CategoryData');
    }

    public function StyleName(){
        return $this->hasOne(Style::class, 'id', 'styles_id')->select('id', 'name');
    }

    public function MaterialName(){
        return $this->hasOne(Material::class, 'id', 'materials_id')->select('id', 'name');
    }

    public function TierName(){
        return $this->hasOne(TierLevel::class, 'id', 'tier_levels_id')->select('id', 'name');
    }

    public function SafetyName(){
        return $this->hasOne(TierLevel::class, 'id', 'safety_resistances_id')->select('id', 'name');
    }

    public function GenderName(){
        return $this->hasOne(Gender::class, 'id', 'genders_id')->select('id', 'name');
    }

    public function ProductImages(){
        return $this->hasMany(ProductImage::class, 'products_id', 'id')->select('id', 'products_id', 'name');
    }

    public function ProductSizes(){
        return $this->hasMany(ProductSize::class, 'products_id', 'id')->select('id', 'products_id', 'sizes_id', 'status')->with('SizeName');
    }

    public function ProductSubscriptions(){
        return $this->hasMany(ProductSubscription::class, 'products_id', 'id')->select('id', 'products_id', 'strip_price_id', 'weekly_strip_id', 'subscription_types_id', 'price', 'status')->orderBy('subscription_types_id', 'ASC');
    }

    public function SubscribeOptions (){
        return $this->hasMany(ProductSubscription::class, 'products_id', 'id')->select('id', 'products_id', 'strip_price_id', 'weekly_strip_id', 'subscription_types_id', 'price', 'status')->where('status', 1)->with('SubscriptionName');
    }
}
