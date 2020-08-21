<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class ProcessBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:backup';

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
       
    
        Artisan::call('backup:run', ['--filename'=>'cloudmlm','--only-to-disk' => 'google','--disable-notifications' =>true]);
    }
}
