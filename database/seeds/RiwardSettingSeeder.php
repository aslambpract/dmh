<?php

use Illuminate\Database\Seeder;

class RiwardSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\RiwardSetting::create([
            'rank'          => "Member",
            'percentage'          => 0,
            'mini_monthly_income'   => 0,
            'points'   => 0,
            'allow_after_six_months'   => "Purchase tour",
            
        ]);
        \App\RiwardSetting::create([
            'rank'          => "Distributor",
            'percentage'          => 3,
            'mini_monthly_income'   => 500,
            'points'   => 15,
            'allow_after_six_months'   => "Purchase tour",
            
        ]);
        \App\RiwardSetting::create([
            'rank'          => "Silver",
            'percentage'          => 4,
            'mini_monthly_income'   => 500,
            'points'   => 20,
            'allow_after_six_months'   => "Purchase Bike",
            
        ]);

        \App\RiwardSetting::create([
            'rank'          => "Gold",
            'percentage'          => 5,
            'mini_monthly_income'   => 500,
            'points'   => 25,
            'allow_after_six_months'   => "Purchase Car",
            
        ]);

         \App\RiwardSetting::create([
            'rank'          => "Diamond",
            'percentage'          => 5,
            'mini_monthly_income'   => 500,
            'points'   => 25,
            'allow_after_six_months'   => "Purchase Car",
            
        ]);

        \App\RiwardSetting::create([
            'rank'          => "Blue Diamond",
            'percentage'          => 5,
            'mini_monthly_income'   => 500,
            'points'   => 25,
            'allow_after_six_months'   => "Purchase House",
            
        ]); 

         \App\RiwardSetting::create([
            'rank'          => "Black Diamond",
            'percentage'          => 5,
            'mini_monthly_income'   => 500,
            'points'   => 25,
            'allow_after_six_months'   => "Purchase House",
            
        ]); 
    }
}
