<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\PendingTransactions;
use App\Packages;
use App\User;
use App\Activity;
use App\Package;
use App\PurchaseHistory;
use App\RsHistory;
use App\Balance;
use App\Tree_Table;
use App\Commission;
use App\PointTable;
use App\LeadershipBonus;
use App\ProfileModel;
use App\Sponsortree;
use App\Jobs\SendEmail;
use App\Emails;
use App\AppSettings;
use App\Welcome;
use App\LevelCommissionSettings;
use App\UserAccounts;
use Session;

class ProcessPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:payment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'pending requests';

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
     * @return mixed$
     */
    public function handle()
    {
        // dd(User::find(6)->email);
        

        $pending_payments=PendingTransactions::where('payment_type', '<>', 'store_purchase')
                                             ->where('payment_status', 'complete')
                                             ->where('approved_by', 'manual')
                                             //->where('id', '>',5830)
                                             ->get();
        foreach ($pending_payments as $key => $payment) {

            // dd($payment->id);
            $data=json_decode($payment->request_data, true);
            if ($payment->payment_type == 'register') {
            
                 $user_id=User::where('username', $payment->username)->value('id');
                 $user_email=User::where('email', $payment->email)->value('id');
                if (  $user_id == null && $user_email == null) {
                    $userresult = User::add($data, $payment->username, $payment->email);
                    if ($userresult) {
                        PendingTransactions::where('id', $payment->id)->update(['payment_status' => 'finish']);
                     //   SendEmail::dispatch($data, $data['email'], $data['firstname'])->delay(now()->addSeconds(0));

                    }
                }
            }elseif ($payment->payment_type == 'account') {

                        $user_id=User::where('username', $payment->username)->value('id');

                        if($user_id){

                            $item = UserAccounts::addAccount($payment->username);
                            if($item){
                                    PendingTransactions::where('id', $payment->id)->update(['payment_status' => 'finish']);

                            }     
                        }else{
                                    PendingTransactions::where('id', $payment->id)->update(['payment_status' => 'failed']);

                        }
            }
        
 
        $this->callsilent('tree:upgrade');
        }
            

     }
}
