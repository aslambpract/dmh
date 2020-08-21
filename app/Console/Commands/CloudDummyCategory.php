<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Artisan;

class CloudDummyCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cloud:dummycategory {--categorylimit=10 : The limit of dummy category to be created,default is 5 }  ';

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

         $categorylimit = $this->option('categorylimit');

         $this->info("You choose to generate dummy product category.");
        if ($this->confirm('Do you want to generate bulk category? [y|N]')) {
            self::dummycategory($categorylimit);
        } else {
            $this->info("Category not generated". "\n");
        }
    }


    public function dummycategory($categorylimit)
    {
            $start = microtime(true);
            $controller = app()->make('App\Http\Controllers\Factory\DemoUtils\DemoUtilsController');
            app()->call([$controller, 'dummycategory'], [$categorylimit]);
            $this->info("  Dummy Category creation complete..." . "\n");
            self::duration($start, 'Dummy Category creation');
    }


    public function duration($start, $title)
    {
        $time = round((microtime(true) - $start) * 1000, 3);
        //$this->info('' . "\n");
        $this->info($title.' took '.$time.' micro seconds to execute' . "\n");
    }
}
