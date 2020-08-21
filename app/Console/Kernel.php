<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Artisan;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\CloudReset',
        'App\Console\Commands\Hyperwallet',
        'App\Console\Commands\ProcessPayment',
        'App\Console\Commands\emailSend',
        'App\Console\Commands\AutoMails',
        'App\Console\Commands\ProcessBackup',
        'App\Console\Commands\BinaryBonus',
        'App\Console\Commands\Transactions',
        'App\Console\Commands\Fixupdate',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    // protected function schedule(Schedule $schedule)
    // {
    //     // $schedule->command('inspire')
    //     //          ->hourly();
    // }
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->command('process:payment')->everyMinute(); 
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
