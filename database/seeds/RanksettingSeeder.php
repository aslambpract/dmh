<?php

use Illuminate\Database\Seeder;

class RanksettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Ranksetting::create([
            'rank_name'          => "Member",
            'rank_code'          => "Null",
            'top_up'   => 0,
            'quali_rank_id'   => 0,
            'quali_rank_count'   => 0,
            'rank_bonus'   => 0,
            'monthly_salary' =>0,
            'franchise_bonus'=>0,
            'life_insurance'=>0,
            'personal_pv'=>0,
            'consultant_bonus'=>0,
            'sales_development_bonus'=>0,
            'monthly_repurchase'=>0,
            'daily_capping_binary'=>0,
            'reward_points'=>0,
            'min_ratio'=>0,
            // 'max_ratio'=>0,
            'total_sales_volume'=>0,
        ]);
        \App\Ranksetting::create([
            'rank_name'          => "Distributor",
            'rank_code'          => "DC",
            'top_up'   => 0,
            'quali_rank_id'   => 0,
            'quali_rank_count'   => 0,
            'rank_bonus'   => 0,
            'monthly_salary' =>10,
            'franchise_bonus'=>0,
            'life_insurance'=>0,
            'personal_pv'=>51,
            'consultant_bonus'=>10,
            'sales_development_bonus'=>20,
            'monthly_repurchase'=>16,
            'daily_capping_binary'=>10000,
            'reward_points'=>3,
            'min_ratio'=>0,
            // 'max_ratio'=>0,
            'total_sales_volume'=>0,
        ]);
        \App\Ranksetting::create([
            'rank_name'          => "Silver",
            'rank_code'          => "TC",
            'top_up'   => 10,
            'quali_rank_id'   => 0,
            'quali_rank_count'   => 0,
            'rank_bonus'   => 0,
            'monthly_salary' =>10,
            'franchise_bonus'=>0,
            'life_insurance'=>2,
            'personal_pv'=>255,
            'consultant_bonus'=>15,
            'sales_development_bonus'=>20,
            'monthly_repurchase'=>16,
            'daily_capping_binary'=>5000,
            'reward_points'=>4,
             'min_ratio'=>0,
             'total_sales_volume'=>0,
            // 'max_ratio'=>0,
        ]);
         \App\Ranksetting::create([
            'rank_name'          => "Gold",
            'rank_code'          => "ETC",
            'top_up'   => 60,
            'quali_rank_id'   => 0,
            'quali_rank_count'   => 0,
            'rank_bonus'   => 0,
            'monthly_salary' =>10,
            'franchise_bonus'=>3,
            'life_insurance'=>5,
            'personal_pv'=>816,
            'consultant_bonus'=>20,
            'sales_development_bonus'=>20,
            'monthly_repurchase'=>16,
            'daily_capping_binary'=>100000,
            'reward_points'=>5,
             'min_ratio'=>0,
             'total_sales_volume'=>0,
            // 'max_ratio'=>0,
         ]);
         \App\Ranksetting::create([
            'rank_name'          => "Diamond",
            'rank_code'          => "DIR",
            'top_up'   => 160,
            'quali_rank_id'   => 0,
            'quali_rank_count'   => 0,
            'rank_bonus'   => 10000,
            'monthly_salary' =>10,
            'franchise_bonus'=>3,
            'life_insurance'=>0,
            'personal_pv'=>816,
            'consultant_bonus'=>20,
            'sales_development_bonus'=>20,
            'monthly_repurchase'=>32,
            'daily_capping_binary'=>100000,
            'reward_points'=>5,
             'min_ratio'=>30,
             'total_sales_volume'=>12500,
            // 'max_ratio'=>70,
         ]);
         \App\Ranksetting::create([
            'rank_name'          => "Blue Diamond",
            'rank_code'          => "ND",
            'top_up'   => 660,
            'quali_rank_id'   => 0,
            'quali_rank_count'   => 0,
            'rank_bonus'   => 1000000,
            'monthly_salary' =>10,
            'franchise_bonus'=>3,
            'life_insurance'=>0,
            'personal_pv'=>816,
            'consultant_bonus'=>20,
            'sales_development_bonus'=>20,
            'monthly_repurchase'=>32,
            'daily_capping_binary'=>100000,
            'reward_points'=>5,
             'min_ratio'=>30,
             'total_sales_volume'=>25000,
            // 'max_ratio'=>70,
         ]);
         \App\Ranksetting::create([
            'rank_name'          => "Black Diamond",
            'rank_code'          => "GD",
            'top_up'   => 1660,
            'quali_rank_id'   => 0,
            'quali_rank_count'   => 0,
            'rank_bonus'   => 10000000,
            'monthly_salary' =>10,
            'franchise_bonus'=>3,
            'life_insurance'=>0,
            'personal_pv'=>816,
            'consultant_bonus'=>20,
            'sales_development_bonus'=>20,
            'monthly_repurchase'=>32,
            'daily_capping_binary'=>100000,
            'reward_points'=>5,
            'min_ratio'=>30,
            'total_sales_volume'=>250000,
            // 'max_ratio'=>70,
         ]);
         // \App\Ranksetting::create([
         //    'rank_name'          => "Vice President",
         //    'rank_code'          => "VPR",
         //    'top_up'   => 3660,
         //    'quali_rank_id'   => 0,
         //    'quali_rank_count'   =>0,
         //    'rank_bonus'   => "Petrol Fee $300 per month",
         // ]);
         // \App\Ranksetting::create([
         //    'rank_name'          => "President",
         //    'rank_code'          => "PR",
         //    'top_up'   => 8660,
         //    'quali_rank_id'   => 0,
         //    'quali_rank_count'   => 0,
         //    'rank_bonus'   => "House fee for $1500 per mth",
         // ]);
         // \App\Ranksetting::create([
         //    'rank_name'          => "Crown 1",
         //    'rank_code'          => "CR1",
         //    'top_up'   => 0,
         //    'quali_rank_id'   => 7,
         //    'quali_rank_count'   => 3,
         //    'rank_bonus'   => "Global revenue share 1 %",
         // ]);
         // \App\Ranksetting::create([
         //    'rank_name'          => "Crown 2 ",
         //    'rank_code'          => "CR2 ",
         //    'top_up'   => 0,
         //    'quali_rank_id'   => 8,
         //    'quali_rank_count'   => 3,
         //    'rank_bonus'   => "Global revenue share 2 %",
         // ]);
    }
}
