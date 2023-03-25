<?php

namespace Database\Seeders;

use App\Models\WeeklyMargin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeeklyMarginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date = now()->toDateTimeString();
        $data = [
            ['margin_amount' => 2.99, 'created_at' => $current_date, 'updated_at' => $current_date],
        ];
        WeeklyMargin::insert($data);
    }
}
