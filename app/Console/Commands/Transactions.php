<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Transactions as Transactionsmodel ;

class Transactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction:payout {--item=}';

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
         $item = $this->option('item');
     
         $variable = Transactionsmodel::where('status','!=','complete') 

                        ->where(function($j) use ($item) {
                            if($item != null){
                            $j->where('id',$item) ;

                            }
                        })
                        ->get() ;   

          foreach ($variable as $key => $value) {
                    
                    $address = $value->wallet_address ;
                    if(is_null($value->wallet_address) && $value->payment_type == 'payout'){

                                 $address = User::find($value->user_id)->bitcoin_address ;
                     }
                    if(is_null($address)){
                            continue ;
                    }
                    $params = array("receivers_list"=> [
                                                        array("address" => trim($address),"amount" =>  $value->amount * 100000000)
                                                    ]);

                    $wallet_id = "BTCvfYzt1Fdi1TssTo4kQjSrf8ZHmDW8jnL7fcXfp6xQWSMa2mH4j";

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/send/payment/".$wallet_id,
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => json_encode($params)
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);

                    if ($err) {
                      print_r ($err);
                    } else { 
                      $item = Transactionsmodel::find($value->id);
                      $item->payment_responce = $response ;
                    
                     $res_object  = json_decode($response,true) ;

                            if(is_null($value->wallet_address) &&  $value->payment_type == 'payout'){
                                $item->wallet_address = $address ;

                            }
                          if(isset($res_object['tx_list'])){

                            $item->status= "complete" ;
                            $item->save();
                          }else{
                            $item->status= "failed" ;
                            $item->save();
                          }
                    }

          }
    }
}
