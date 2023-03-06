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
            ['name' => '8', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => '9', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => '10', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => '11', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => '12', 'created_at' => $current_date, 'updated_at' => $current_date],
        ];
        Size::insert($data);
    }
}
