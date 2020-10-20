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
      App\Packages::create([
        'package'=>'level_1',
        'amount'=>'0.009',
        'positions_in_fly'=>'0.0078',
        'accounts_in_infinity'=>'0',
        'positions_in_infinity'=>'0',
        'payout'=>'0.0162',

        'stage'                   =>'1',
        'fee'                     =>'100',
        'upgrade_fee_old'             =>'80',
        'charge'                  =>'20',
        'member_benefit'          =>'0',
        'downline_bonus'          =>'0',
        'insurace_completing_fee' =>'0',
        'longrich_reg_fee'        =>'0',
        'insurance_reg_fee'       =>'0',

        'upline_fee'       =>'80',
        'upgrade_fee'       =>'160',

      ]);


      App\Packages::create([
        'package'=>'level_2',
        'amount'=>'0.009',
        'positions_in_fly'=>'0.0078',
        'accounts_in_infinity'=>'0',
        'positions_in_infinity'=>'0',
        'payout'=>'0.0162',

        'stage'                   =>'1',
        'fee'                     =>'320',
        'upgrade_fee_old'             =>'160',
        'charge'                  =>'40',
        'member_benefit'          =>'80',
        'downline_bonus'          =>'0',
        'insurace_completing_fee' =>'0',
        'longrich_reg_fee'        =>'0',
        'insurance_reg_fee'       =>'0',

        'upline_fee'       =>'0',
        'upgrade_fee'       =>'200',
      ]);

      App\Packages::create([
        'package'=>'level_3',
        'amount'=>'0.012',
        'positions_in_fly'=>'0.0052',
        'accounts_in_infinity'=>'0',
        'positions_in_infinity'=>'4',
        'payout'=>'0.0038',

        'stage'                   =>'1',
        'fee'                     =>'400',
        'upgrade_fee_old'             =>'200',
        'charge'                  =>'40',
        'member_benefit'          =>'160',
        'downline_bonus'          =>'0',
        'insurace_completing_fee' =>'0',
        'longrich_reg_fee'        =>'0',
        'insurance_reg_fee'       =>'0',

        'upline_fee'       =>'0',
        'upgrade_fee'       =>'200',
      ]);

      App\Packages::create([

        'package'=>'level_1',
        'amount'=>'0.03',
        'positions_in_fly'=>'0',
        'accounts_in_infinity'=>'0',
        'positions_in_infinity'=>'0',
        'payout'=>'0.025',

        'stage'                   =>'2',
        'fee'                     =>'400',
        'upgrade_fee_old'             =>'200',
        'charge'                  =>'0',
        'member_benefit'          =>'0',
        'downline_bonus'          =>'0',
        'insurace_completing_fee' =>'0',
        'longrich_reg_fee'        =>'0',
        'insurance_reg_fee'       =>'0',

        'upline_fee'       =>'0',
        'upgrade_fee'       =>'400',
      ]);

      App\Packages::create([
        'package'=>'level_2',
        'amount'=>'0.095',
        'positions_in_fly'=>'0.065',
        'accounts_in_infinity'=>'0',
        'positions_in_infinity'=>'50',
        'payout'=>'0.102',

        'stage'                   =>'2',
        'fee'                     =>'800',
        'upgrade_fee_old'             =>'400',
        'charge'                  =>'0',
        'member_benefit'          =>'200',
        'downline_bonus'          =>'0',
        'insurace_completing_fee' =>'0',
        'longrich_reg_fee'        =>'0',
        'insurance_reg_fee'       =>'0',

        'upline_fee'       =>'0',
        'upgrade_fee'       =>'600',
      ]);

      App\Packages::create([
        'package'=>'level_3',
        'amount'=>'0.195',
        'positions_in_fly'=>'0.045',
        'accounts_in_infinity'=>'1',
        'positions_in_infinity'=>'100',
        'payout'=>'0.51',

        'stage'                   =>'2',
        'fee'                     =>'1200',
        'upgrade_fee_old'             =>'600',
        'charge'                  =>'120',
        'member_benefit'          =>'380',
        'downline_bonus'          =>'100',
        'insurace_completing_fee' =>'0',
        'longrich_reg_fee'        =>'0',
        'insurance_reg_fee'       =>'0',

        'upline_fee'       =>'0',
        'upgrade_fee'       =>'600',
      ]);


       App\Packages::create([
          'package'=>'level_1',
          'amount'=>'0.03',
          'positions_in_fly'=>'0',
          'accounts_in_infinity'=>'0',
          'positions_in_infinity'=>'0',
          'payout'=>'0.025',

          'stage'                   =>'3',
          'fee'                     =>'1200',
          'upgrade_fee_old'             =>'600',
          'charge'                  =>'0',
          'member_benefit'          =>'0',
          'downline_bonus'          =>'0',
          'insurace_completing_fee' =>'0',
          'longrich_reg_fee'        =>'0',
          'insurance_reg_fee'       =>'0',

          // 'upline_fee'       =>'0',
          'upgrade_fee'       =>'1200',
      ]);
        App\Packages::create([
            'package'=>'level_2',
            'amount'=>'0.03',
            'positions_in_fly'=>'0',
            'accounts_in_infinity'=>'0',
            'positions_in_infinity'=>'0',
            'payout'=>'0.025',

            'stage'                   =>'3',
            'fee'                     =>'2400',
            'upgrade_fee_old'             =>'1200',
            'charge'                  =>'0',
            'member_benefit'          =>'400',
            'downline_bonus'          =>'0',
            'insurace_completing_fee' =>'0',
            'longrich_reg_fee'        =>'0',
            'insurance_reg_fee'       =>'0',

            'upline_fee'       =>'0',
            'upgrade_fee'       =>'2000',
      ]);
         App\Packages::create([
            'package'=>'level_3',
            'amount'=>'0.03',
            'positions_in_fly'=>'0',
            'accounts_in_infinity'=>'0',
            'positions_in_infinity'=>'0',
            'payout'=>'0.025',
            'stage'                   =>'3',
            'fee'                     =>'4000',
            'upgrade_fee_old'             =>'2000',
            'charge'                  =>'400',
            'member_benefit'          =>'1400',
            'downline_bonus'          =>'200',
            'insurace_completing_fee' =>'0',
            'longrich_reg_fee'        =>'0',
            'insurance_reg_fee'       =>'0',

            'upline_fee'       =>'0',
            'upgrade_fee'       =>'2000',
      ]);

         App\Packages::create([
            'package'=>'level_1',
            'amount'=>'0.03',
            'positions_in_fly'=>'0',
            'accounts_in_infinity'=>'0',
            'positions_in_infinity'=>'0',
            'payout'=>'0.025',

            'stage'                   =>'4',
            'fee'                     =>'4000',
            'upgrade_fee_old'             =>'2000',
            'charge'                  =>'0',
            'member_benefit'          =>'0',
            'downline_bonus'          =>'0',
            'insurace_completing_fee' =>'0',
            'longrich_reg_fee'        =>'0',
            'insurance_reg_fee'       =>'0',

            'upline_fee'       =>'0',
            'upgrade_fee'       =>'4000',
      ]);

         App\Packages::create([
            'package'=>'level_2',
            'amount'=>'0.03',
            'positions_in_fly'=>'0',
            'accounts_in_infinity'=>'0',
            'positions_in_infinity'=>'0',
            'payout'=>'0.025',

            'stage'                   =>'4',
            'fee'                     =>'8000',
            'upgrade_fee_old'             =>'4000',
            'charge'                  =>'0',
            'member_benefit'          =>'1250',
            'downline_bonus'          =>'0',
            'insurace_completing_fee' =>'0',
            'longrich_reg_fee'        =>'1750',
            'insurance_reg_fee'       =>'0',

            'upline_fee'       =>'0',
            'upgrade_fee'       =>'5000',
      ]);

         App\Packages::create([
            'package'=>'level_3',
            'amount'=>'0.03',
            'positions_in_fly'=>'0',
            'accounts_in_infinity'=>'0',
            'positions_in_infinity'=>'0',
            'payout'=>'0.025',

            'stage'                   =>'4',
            'fee'                     =>'10000',
            'upgrade_fee_old'             =>'5000',
            'charge'                  =>'600',
            'member_benefit'          =>'3000',
            'downline_bonus'          =>'400',
            'insurace_completing_fee' =>'0',
            'longrich_reg_fee'        =>'0',
            'insurance_reg_fee'       =>'1000',

            'upline_fee'       =>'0',
            'upgrade_fee'       =>'5000',
      ]);


         ///

           App\Packages::create([
            'package'=>'level_1',
            'amount'=>'0.03',
            'positions_in_fly'=>'0',
            'accounts_in_infinity'=>'0',
            'positions_in_infinity'=>'0',
            'payout'=>'0.025',

            'stage'                   =>'5',
            'fee'                     =>'10000',
            'upgrade_fee_old'             =>'5000',
            'charge'                  =>'0',
            'member_benefit'          =>'0',
            'downline_bonus'          =>'0',
            'insurace_completing_fee' =>'0',
            'longrich_reg_fee'        =>'0',
            'insurance_reg_fee'       =>'0',

            'upline_fee'       =>'0',
            'upgrade_fee'       =>'10000',
      ]);

             App\Packages::create([
            'package'=>'level_2',
            'amount'=>'0.03',
            'positions_in_fly'=>'0',
            'accounts_in_infinity'=>'0',
            'positions_in_infinity'=>'0',
            'payout'=>'0.025',

            'stage'                   =>'5',
            'fee'                     =>'20000',
            'upgrade_fee_old'             =>'10000',
            'charge'                  =>'0',
            'member_benefit'          =>'4000',
            'downline_bonus'          =>'0',
            'insurace_completing_fee' =>'1000',
            'longrich_reg_fee'        =>'0',
            'insurance_reg_fee'       =>'0',

            'upline_fee'       =>'0',
            'upgrade_fee'       =>'15000',
      ]);

               App\Packages::create([
            'package'=>'level_3',
            'amount'=>'0.03',
            'positions_in_fly'=>'0',
            'accounts_in_infinity'=>'0',
            'positions_in_infinity'=>'0',
            'payout'=>'0.025',

            'stage'                   =>'5',
            'fee'                     =>'30000',
            'upgrade_fee_old'             =>'15000',
            'charge'                  =>'3000',
            'member_benefit'          =>'15000',
            'downline_bonus'          =>'2000',
            'insurace_completing_fee' =>'0',
            'longrich_reg_fee'        =>'0',
            'insurance_reg_fee'       =>'0',

            'upline_fee'       =>'0',
            'upgrade_fee'       =>'10000',
      ]);
       //    
       
         App\Packages::create([
            'package'=>'level_1',
            'amount'=>'0.03',
            'positions_in_fly'=>'0',
            'accounts_in_infinity'=>'0',
            'positions_in_infinity'=>'0',
            'payout'=>'0.025',

            'stage'                   =>'6',
            'fee'                     =>'20000',
            'upgrade_fee_old'             =>'10000',
            'charge'                  =>'0',
            'member_benefit'          =>'0',
            'downline_bonus'          =>'0',
            'insurace_completing_fee' =>'0',
            'longrich_reg_fee'        =>'0',
            'insurance_reg_fee'       =>'0',

            'upline_fee'       =>'0',
            'upgrade_fee'       =>'20000',
      ]);

        App\Packages::create([
            'package'=>'level_2',
            'amount'=>'0.03',
            'positions_in_fly'=>'0',
            'accounts_in_infinity'=>'0',
            'positions_in_infinity'=>'0',
            'payout'=>'0.025',

            'stage'                   =>'6',
            'fee'                     =>'40000',
            'upgrade_fee_old'             =>'20000',
            'charge'                  =>'0',
            'member_benefit'          =>'10000',
            'downline_bonus'          =>'0',
            'insurace_completing_fee' =>'0',
            'longrich_reg_fee'        =>'0',
            'insurance_reg_fee'       =>'0',

            'upline_fee'       =>'0',
            'upgrade_fee'       =>'30000',
      ]);

        App\Packages::create([
            'package'=>'level_3',
            'amount'=>'0.03',
            'positions_in_fly'=>'0',
            'accounts_in_infinity'=>'0',
            'positions_in_infinity'=>'0',
            'payout'=>'0.025',

            'stage'                   =>'6',
            'fee'                     =>'60000',
            'upgrade_fee_old'             =>'30000',
            'charge'                  =>'6000',
            'member_benefit'          =>'50000',
            'downline_bonus'          =>'4000',
            'insurace_completing_fee' =>'0',
            'longrich_reg_fee'        =>'0',
            'insurance_reg_fee'       =>'0',

            'upline_fee'       =>'0',
            'upgrade_fee'       =>'0',
      ]);    
    }
}
