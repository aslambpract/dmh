<?php

use Illuminate\Database\Seeder;

class PurchaseHistory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\PurchaseHistory::create([
            'id'=>1,
            'user_id'=>1,
            'purchase_user_id'=>1,
            'package_id'=>1,
            'product'=>1,
            
         
            ]);
    }
}
