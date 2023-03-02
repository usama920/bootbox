<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date = now()->toDateTimeString();
        $data = [
            ['name' => 'small', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'medium', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'large', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'extra large', 'created_at' => $current_date, 'updated_at' => $current_date],
        ];
        Size::insert($data);
    }
}
