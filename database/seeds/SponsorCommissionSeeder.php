<?php

use Illuminate\Database\Seeder;

class SponsorCommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          App\SponsorCommission::create([
            'type'=>'fixed',
            'criteria'=>'yes',
            'sponsor_commission' =>'5',
            'period'=>'instant',
           
            ]);
    }
}
