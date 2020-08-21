<?php

use Illuminate\Database\Seeder;

class BinaryCommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\BinaryCommissionSettings::create([
            'period'=>'instant',
            'type'=>'fixed',
            'pair_value' => 100,
            'pair_commission' =>json_encode(array('0' => "10",'1'=>"20",'2'=>"30")),
            'pair_commission_percent' =>json_encode(array('0' => "10",'1'=>"20",'2'=>"30")),
            'binary_cap'=>'no',
            'ceiling' =>10,
         
            ]);
    }
}
