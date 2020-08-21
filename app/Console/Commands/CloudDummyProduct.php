<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Artisan;

class CloudDummyProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cloud:dummyproduct {--productlimit=10 : The limit of dummy category to be created,default is 5 }  ';

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

         $productlimit = $this->option('productlimit');

         $this->info("You choose to generate dummy product .");
        if ($this->confirm('Do you want to generate bulk product? [y|N]')) {
            self::dummyproduct($productlimit);
        } else {
            $this->info("Products not generated". "\n");
        }
    }


    public function dummyproduct($productlimit)
    {
            $start = microtime(true);
            $controller = app()->make('App\Http\Controllers\Factory\DemoUtils\DemoUtilsController');
            app()->call([$controller, 'dummyproduct'], [$productlimit]);
            $this->info("  Dummy Product creation complete..." . "\n");
            self::duration($start, 'Dummy product creation');
    }


    public function duration($start, $title)
    {
        $time = round((microtime(true) - $start) * 1000, 3);
        //$this->info('' . "\n");
        $this->info($title.' took '.$time.' micro seconds to execute' . "\n");
    }
}
