<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Artisan;

class CloudDummyTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cloud:dummytickets {--ticketslimit=10 : The limit of dummy tickets to be created,default is 10 }  ';

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

         $ticketslimit = $this->option('ticketslimit');

         $this->info("You choose to generate dummy tickets.");
        if ($this->confirm('Do you want to generate bulk tickets? [y|N]')) {
            self::dummytickets($ticketslimit);
        } else {
            $this->info("Tickets not generated". "\n");
        }
    }


    public function dummytickets($ticketslimit)
    {
            $start = microtime(true);
            $controller = app()->make('App\Http\Controllers\Factory\DemoUtils\DemoUtilsController');
            app()->call([$controller, 'dummytickets'], [$ticketslimit]);
            $this->info("  Dummy ticket creation complete..." . "\n");
            self::duration($start, 'Dummy ticket creation');
    }


    public function duration($start, $title)
    {
        $time = round((microtime(true) - $start) * 1000, 3);
        //$this->info('' . "\n");
        $this->info($title.' took '.$time.' micro seconds to execute' . "\n");
    }
}
