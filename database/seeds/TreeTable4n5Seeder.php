<?php

use Illuminate\Database\Seeder;

class TreeTable4n5Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          \App\Tree_Table4::create([
            'sponsor'        => 1,            
            'user_id'        => '0',
            'placement_id'   => 0,
            'leg'   => '1',
            'type'   => 'vaccant'
        ]); 


         \App\Tree_Table5::create([
            'sponsor'        => 1,            
            'user_id'        => '0',
            'placement_id'   => 0,
            'leg'   => '1',
            'type'   => 'vaccant'
        ]); 

        \App\Tree_Table6::create([
            'sponsor'        => 1,            
            'user_id'        => '0',
            'placement_id'   => 0,
            'leg'   => '1',
            'type'   => 'vaccant'
        ]); 
    }
}
