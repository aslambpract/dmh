<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Packages::create(['package'=>'CIRCLE 00','amount'=>'0.009','positions_in_fly'=>'0.0078','accounts_in_infinity'=>'0','positions_in_infinity'=>'0','payout'=>'0.0162']);
      App\Packages::create(['package'=>'CIRCLE 0','amount'=>'0.009','positions_in_fly'=>'0.0078','accounts_in_infinity'=>'0','positions_in_infinity'=>'0','payout'=>'0.0162']);
      App\Packages::create(['package'=>'CIRCLE 1','amount'=>'0.012','positions_in_fly'=>'0.0052','accounts_in_infinity'=>'0','positions_in_infinity'=>'4','payout'=>'0.0038']);
      App\Packages::create(['package'=>'CIRCLE 2','amount'=>'0.03','positions_in_fly'=>'0','accounts_in_infinity'=>'0','positions_in_infinity'=>'0','payout'=>'0.025']);
      App\Packages::create(['package'=>'CIRCLE 3','amount'=>'0.095','positions_in_fly'=>'0.065','accounts_in_infinity'=>'0','positions_in_infinity'=>'50','payout'=>'0.102']);
      App\Packages::create(['package'=>'CIRCLE 4','amount'=>'0.195','positions_in_fly'=>'0.045','accounts_in_infinity'=>'1','positions_in_infinity'=>'100','payout'=>'0.51']);
    }
}
