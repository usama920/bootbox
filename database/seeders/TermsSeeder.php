<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermsSeeder extends Seeder
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
                'intro' => 'DINERS is a registered trademark of AL BARAKA APPAREL and has been in the fashion industry since 1990. We believe in satisfying customers through our quality and brilliant customer service.',
                'agreement' => 'Diners is one of the most reliable manufacturer & retailer of complete men’s, women’s, kid’s garments & footwear which are being used in all over the World. We struggled hard to set high standards and has acquired a high growth rate.
                    The constant research into quality raw materials, the introduction of new yarns and new dyeing and weaving techniques, finishing and extraordinary performance are the foundation on which the collections are created.
                    Moreover still we are working hard to satisfy the people around the globe.',
                'created_at' => $current_date,
                'updated_at' => $current_date
            ]
        ];
        Term::insert($data);
    }
}
