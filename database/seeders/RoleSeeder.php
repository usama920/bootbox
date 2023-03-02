<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date = now()->toDateTimeString();
        $data = [
            ['name' => 'Admin', 'created_at' => $current_date, 'updated_at' => $current_date],
            ['name' => 'User', 'created_at' => $current_date, 'updated_at' => $current_date],
        ];
        Role::insert($data);
    }
}
