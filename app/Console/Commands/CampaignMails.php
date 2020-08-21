<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Marketing\EmailCampaign;
use App\Jobs\campaignResponderEmail;

class CampaignMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'campaign:mails';

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
        $mails=EmailCampaign::all();
        foreach ($mails as $key => $mail) {
            campaignResponderEmail::dispatch($mail)
                        ->delay(Carbon::now()->addSeconds(10));
        }
    }
}
