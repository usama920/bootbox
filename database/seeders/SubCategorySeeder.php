<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date = now()->toDateTimeString();
        $data = [
            ['name' => 'Casual Shoes', 'sub_category_slug'=>'casual-shoes', 'categories_id' => 1, 'created_at' => $current_date, 'updated_at' => $current_date],
        ];
        SubCategory::insert($data);
    }
}
