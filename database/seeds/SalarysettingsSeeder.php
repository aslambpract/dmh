<?php

use Illuminate\Database\Seeder;

class SalarysettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\SalarySetting::create([
            'post_name'             => "Supervisor",
            'monthly_repurchase'    => "16sv",
            'calculation_periods'   => "6 Months",
            'sales_volume'          => "10,000sv" ,
            'ratio'         => "20% Left/Right and 80% Left/Right",
            'payment'               => "Monthly to Salary",
            'carry_forward_volume'  =>"Flush out every 6 months",
            
        ]);

        \App\SalarySetting::create([
            'post_name'             => "Manager",
            'monthly_repurchase'    => "16sv",
            'calculation_periods'   => "6 Months",
            'sales_volume'          => "100,000sv" ,
            'ratio'         => "20% Left/Right and 80% Left/Right",
            'payment'               => "Monthly to Salary",
            'carry_forward_volume'  =>"Flush out every 6 months",
            
        ]); 

        \App\SalarySetting::create([
            'post_name'             => "CEO",
            'monthly_repurchase'    => "16sv",
            'calculation_periods'   => "6 Months",
            'sales_volume'          => "200,000sv" ,
            'ratio'         => "20% Left/Right and 80% Left/Right",
            'payment'               => "Monthly to Salary",
            'carry_forward_volume'  =>"Flush out every 6 months",
            
        ]); 
    }
}
