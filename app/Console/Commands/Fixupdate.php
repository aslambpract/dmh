<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Commission;
use DB;
use App\PendingTable;
use App\Packages;

class Fixupdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cloud:fixupdate  {account_id} {level}';

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
        

                            

        $placement_id = $this->argument('account_id') ;
        $level = $this->argument('level') ;
        $cyclecount =1 ;

         try {
                DB::beginTransaction();

            Commission::phase_commission($placement_id,$level,80) ;
            Packages::calculations($placement_id,$level,$cyclecount);
              DB::commit();


              $this->info('done') ;

            } catch (Exception $e) {
              $this->error('failed') ;
                DB::rollBack();
   
            }


    }
}
