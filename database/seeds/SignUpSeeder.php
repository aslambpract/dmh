<?php

use Illuminate\Database\Seeder;

class SignUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\SignupBonus::create([
            'rank'=>"Gold Star",
            'qualify_personal_sv'=>172800,
            'income'=>3,
            'capping'=>"unlimitted",
           
            
         
            ]);
    }
}
