<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\BinaryCommissionSettings;
use App\PointTable;

class BinaryBonus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'binary:bonus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

  


        $binary_settings=BinaryCommissionSettings::find(1);
        if ($binary_settings->type == 'fixed') {
            $point_users=PointTable::where('left_carry', '>=', $binary_settings->pair_value)
                  ->where('right_carry', '>=', $binary_settings->pair_value)
                  ->select('user_id', 'left_carry', 'right_carry')
                  // ->where('user_id',27)
                  ->get();
        } else {
            $point_users=PointTable::where('left_carry', '>', 0)
                  ->where('right_carry', '>', 0)
                  ->select('user_id', 'left_carry', 'right_carry')
                  ->get();
        }

        foreach ($point_users as $key => $user) {
            echo "user".$user->user_id."\n";
            if ($binary_settings->period == 'instant') {
                echo "period1\n";
                BinaryCommissionSettings::BinaryCommsion($binary_settings, $user, 1);
            }
            if ($binary_settings->period == 'daily') {
                // if(date('H:i:s') == '00:00:00'){
                 BinaryCommissionSettings::BinaryCommsion($binary_settings, $user, 2);
             // }
            }
            if ($binary_settings->period == 'weekly') {
                 echo "period3\n";

                // if(date('D') == 'Tue'){
                 BinaryCommissionSettings::BinaryCommsion($binary_settings, $user, 3);
             // }
            }
            if ($binary_settings->period == 'monthly') {
                 echo "period4\n";

                // if(date('Y-m-d') == date('Y-m-t')){
                     BinaryCommissionSettings::BinaryCommsion($binary_settings, $user, 4)
                     ;
                 // }
            }
            if ($binary_settings->period == 'every') {
                 echo "period5\n";

                // if((date('Y-m-d') == date('Y-m-15')) || (date('Y-m-d') == date('Y-m-30'))){
                     BinaryCommissionSettings::BinaryCommsion($binary_settings, $user, 5);
                 // }
            }
        }
    }
}
