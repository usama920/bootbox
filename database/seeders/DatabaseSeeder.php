<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(RoleSeeder::class);
       $this->call(UserSeeder::class);
       $this->call(StyleSeeder::class);
       $this->call(SizeSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(TermsSeeder::class);
        $this->call(PrivacySeeder::class);
        $this->call(ContactSeeder::class);
       $this->call(WeeklyMarginSeeder::class);
       $this->call(GenderSeeder::class);
       $this->call(SubscriptionTypeSeeder::class);
       $this->call(CategorySeeder::class);
       $this->call(SubCategorySeeder::class);
       $this->call(MaterialSeeder::class);
       $this->call(TierLevelSeeder::class);
       $this->call(SafetyResistanceSeeder::class);
    }
}
