<?php

namespace Database\Seeders;

use App\Models\SafetyResistance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SafetyResistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date = now()->toDateTimeString();
        $data = [
            ['name' => 'chemical/heat/oil', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'static', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'water', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'all rounder', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'standard', 'created_at' => $current_date, 'updated_at' => $current_date],
        ];
        SafetyResistance::insert($data);
    }
}
