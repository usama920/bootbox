<?php

namespace Database\Seeders;

use App\Models\TierLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TierLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date = now()->toDateTimeString();
        $data = [
            ['name' => 'basic', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'medium', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'platinum', 'created_at' => $current_date, 'updated_at' => $current_date],
        ];
        TierLevel::insert($data);
    }
}
