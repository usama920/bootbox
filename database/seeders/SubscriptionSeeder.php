<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date = now()->toDateTimeString();
        $data = [
            ['name' => '3 months', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => '6 months', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => '9 months', 'created_at' => $current_date, 'updated_at' => $current_date],
        ];
        Subscription::insert($data);
    }
}
