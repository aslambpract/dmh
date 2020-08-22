<?php

use Illuminate\Database\Seeder;

class StagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return 
     */
    public function run() 
    {
        \App\Stages::create([
            'stage_name'        => 'BRONZE'
            
        ]);
        \App\Stages::create([
            'stage_name'        => 'SILVER'
            
        ]);
         \App\Stages::create([
            'stage_name'        => 'GOLD'
            
        ]);
        \App\Stages::create([
            'stage_name'        => 'PLATINUM'
            
        ]);
         \App\Stages::create([
            'stage_name'        => 'DIAMOND'
            
        ]);
        \App\Stages::create([
            'stage_name'        => 'DIAMOND 1'
            
        ]);
       
    }
}
