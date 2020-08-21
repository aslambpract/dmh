<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Artisan;

class CloudDummyNetwork extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cloud:dummynetwork  {--userslimit=10 : The limit of dummy users to be registered,default is 10 } ';

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
        

         $userslimit = $this->option('userslimit');

        if ($this->confirm('Do you want to generate bulk users? [y|N]')) {
            self::dummynetwork($userslimit);
        } else {
             $this->info("Network not generated". "\n");
        }
    }


    public function dummynetwork($userslimit)
    {
        $start = microtime(true);
        $controller = app()->make('App\Http\Controllers\Factory\DemoUtils\DemoUtilsController');
        app()->call([$controller, 'dummynetwork'], [$userslimit]);
           
        $this->info("  Dummy network creation complete..." . "\n");
           
        self::duration($start, 'Dummy network creation');
    }

    public function duration($start, $title)
    {
        $time = round((microtime(true) - $start) * 1000, 3);
        //$this->info('' . "\n");
        $this->info($title.' took '.$time.' micro seconds to execute' . "\n");
    }
}
