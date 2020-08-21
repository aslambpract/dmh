<?php

use Illuminate\Database\Seeder;

class LevelCommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


         App\LevelCommissionSettings::create([
            'type'=>'fixed',
            'criteria'=>'yes',
            'nlevel_1' =>'6',
            'nlevel_2' =>'5',
            'nlevel_3' =>'4',

            
           
            ]);
    }
}
