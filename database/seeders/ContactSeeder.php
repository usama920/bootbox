<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_date = now()->toDateTimeString();
        $data = [
            [
                'id' => 1,
                'phone_text' => 'DINERS is a registered trademark of AL BARAKA APPAREL and has been in the fashion industry',
                'phone' => '+1 252 525 255',
                'email' => 'examle@example.com',
                'email_text' => 'DINERS is a registered trademark of AL BARAKA APPAREL and has been in the fashion industry',
                'created_at' => $current_date,
                'updated_at' => $current_date
            ]
        ];
        Contact::insert($data);
    }
}
