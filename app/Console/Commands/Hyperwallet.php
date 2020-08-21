<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Hyperwallet\Hyperwallet as Hyperwalletpackage ;

use DB;
use App\UserAccounts;
use App\PendingTransactions;
use App\Transactions;
use App\Payout;
use App\User;

class Hyperwallet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cloud:hyperwallet  {--option=create} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create users in hyperwallet';

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


        
          $variable =User::whereIn('username',['Luisasensifly','Thelordsbiz1'])->get();

          foreach ($variable as $key => $value) {
 
            $account =UserAccounts::where('user_id',$value->id)->first();
            

               Transactions::create([
                      'user_id'=>$value->id,
                      'account_id'=>$account->id,
                      'payment_type'=>'payout',
                      'wallet_address'=>'',
                      'status'=>'complete',
                      'amount'=>'0.0206'
                    ]);

               $payout=Payout::create([
                    'user_id'=>$value->id,
                    'account_id'=>$account->id,
                    'account_type'=>$account->account_type,
                    'amount'=>'0.0206',
                    'payment_mode'=>'payout',
                    'status'=>'complete',
                    'tx_hash'=>0,
                    ]);


          }

         // $users = ['RajeshESjun3'];

         // $list = DB::table('import')->pluck('username')->toArray() ;


         // $this->addtopending($users);
         // $this->addtopositions(225);
         // $this->addtopending($list);
         // $this->addtopositions(396);
 
         
    }


    public function addtopositions($limit){

                    $user_id = 1 ;
                    
                    $account_count = UserAccounts::where('user_id',$user_id)->count()  ;

                    
                    for ($i=0; $i < $limit ; $i++) {   

                        $account_count =  UserAccounts::where('user_id',1)->count()  ;

                        $account = UserAccounts::create([
                                                'user_id'=>$user_id,
                                                'account_type'=>'positions',
                                                'approved'=>'approved',
                                                'account_no'=>'00'.$account_count,
                                                
                                        ]);
                        DB::table('pending_table')->insert([
                                            'account_id'=>$account->id,
                                            'next'=>1,
                                            'status'=>'pending',
                                        ]) ;
                        



                    }

                                             $this->call('process:payment') ;
                                                     $this->call('tree:upgrade');



    }

    public function addtopending($variable){



 foreach ($variable as $key => $value) {


            
            $data['reg_type']         = 'na';
            $data['cpf']              = 11;
            $data['passport']         = 'na';
            $data['location']         = 'na';
            $data['reg_by']         = 'admin';
            $data['confirmation_code'] =  str_random(40); 
            $data['placement_user']='admin';
            $data['firstname'] = $value;
            $data['lastname'] = 'last name';
            $data['gender'] = 'm';
            $data['tax_id' ]= null; //TAX ID //VAT// National Identification Number //OPTIONAL
     

            //Contact Information
             $data['country'] = 'US';
             $data['state'] = 'NY';
             $data['city'] = 'na';
             $data['post_code'] = '1234';
             $data[ 'address'] = 'na';
             // $data['email'] => 'required|email|max:255|unique:pending_transactions',
             $data['phone'] = 'na';//OPTIONAL
             $data['bitcoin_address'] ='na';
             $data['email']='user'.$key.'email@gmail.com';
             $data['username']=$value.'June4';
             $data['transaction_pass']='123456';
             $data['password']='123456';
             $data['confirmation_code']='123456';
             $data['zip']='na';
             $data['package']=1;

         $register=PendingTransactions::create([

                 'order_id' =>uniqid(),
                 'username' =>$value.'June4',
                 'email' =>$value.'email@gmail.com',
                 'sponsor' =>'admin',
                 'request_data' =>'123456',
                 'payment_method'=>'approved_by_admin',
                 'payment_type' =>'register',
                 'amount' => 0.023,
                 'request_data' =>json_encode($data),
                 'payment_status'=>'complete'
                ]);

                         $this->call('process:payment') ;

        
      }  
    }
}
