<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable=['id', 'name', 'categories_id', 'sub_category_slug'];

    public function CategoryData(){
        return $this->hasOne(Category::class, 'id', 'categories_id')->select('id', 'name', 'category_slug');
    }
}
