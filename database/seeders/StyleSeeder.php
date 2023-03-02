<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date = now()->toDateTimeString();
        $data = [
            ['name' => 'pull on steel toe boot', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'zip up and lace steel toe boot', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'formal workwear boot', 'created_at' => $current_date, 'updated_at' => $current_date],
        ];
        Style::insert($data);
    }
}
