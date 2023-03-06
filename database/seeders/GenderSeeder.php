<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date = now()->toDateTimeString();
        $data = [
            ['name' => 'Men', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'Women', 'created_at' => $current_date, 'updated_at' => $current_date],
        ];
        Gender::insert($data);
    }
}
