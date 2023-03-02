<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date = now()->toDateTimeString();
        $data = [
            ['name' => 'Leather', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => ' PU Leather', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'Vegan', 'created_at' => $current_date, 'updated_at' => $current_date],
        ];
        Material::insert($data);
    }
}
