<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Emails;
use Mail;
use App\AppSettings;

class emailSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eamil:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sending test mails';

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
        $email = Emails::find(1);
        $app_settings = AppSettings::find(1);
        $receiver_email='farshana@bpract.com';
        $receiver_username="farshana";
        Mail::send(
            'emails.testmail',
            [

                    'company_name'   => $app_settings->company_name,
                    'Username'       => 'testuser',
                    'email'          => $email,
                    'password'       => 'testpassword',
        
                ],
            function ($m) use ($email, $receiver_username, $receiver_email) {
                    $m->to($receiver_email, $receiver_username)->subject('mail from cron')->from('demo@cloudmlmsoftware.com', 'Cloud MLM Software Demo');
            }
        );

        dd("done");
    }
}
