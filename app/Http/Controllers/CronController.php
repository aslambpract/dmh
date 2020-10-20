<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;



use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\AppSettings;
use App\PendingTransactions;

use DB;

use Auth;

use Mail;

use Assets;

use Crypt;

use Session;

use Validator;

use App\LeadershipBonus;

use App\PointTable;

use App\Commission;

use App\Sponsortree;

use App\MatchingBonus;

use App\LoyaltyUsers;

use App\LoyaltyBonus;

use App\PurchaseHistory;

use App\Tree_Table;

use App\PairingHistory;

use App\Balance;

use App\Payout;

use App\CarryForwardHistory;

use App\Models\Marketing\EmailCampaign;

use App\User;

use App\AutoResponse;

use App\Emails;

use App\Jobs\campaignResponderEmail;

use App\Jobs\autoRespondermail;

use App\Models\Marketing\Contact;

use App\LevelCommissionSettings;

use App\SponsorCommission;

use App\Packages;

use App\PointHistory;

use App\RiwardSetting;

use App\BinaryCommissionSettings;

use App\ProfileInfo;

use App\SalaryCommission;

use App\RewardCommission;





use Artisan;

use Carbon;



class CronController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

    }



    public function matchingbonus($user_id, $amount)

   {

   }





/**



Cron will run at the first day of every month with the details of last month



*/



    public function makelist()

    {
 

    }



    public function loyaltybonus()

    { 

    }



  /* Every month starting minute ..*/

    public function checklastpurchase($id)

    {

        return PurchaseHistory::where('purchase_history.created_at', '>', date('Y-m-d H:i:00', strtotime('-10 minutes')))

                                // ->select('purchase_history.user_id',DB::raw('SUM(BV) as BV'))

        ->where('purchase_history.user_id', '=', $id)

        ->sum('BV');

    }

    public function monthly_maintenance()

    {

        $users = User::where('id', '>', 1)->get();

        foreach ($users as $key => $value) {

            Sponsortree::where('user_id', '=', $value->id)->update(['type'=>'no']);

            Tree_Table::where('user_id', '=', $value->id)->update(['type'=>'no']);

            User::where('id', '=', $value->id)->update(['monthly_maintenance'=>0]);

        }

        echo "monthly_maintenance completed <br>"  .date('Y-m-d H:i:00', strtotime('-10 minutes'));

    }



    public function trace_back()

    {

        $users = User::where('id', '>', 1)->get();

        foreach ($users as $key => $value) {

            Commission::traceBack($value->id);

        }

        echo "trace back completed <br>"  ;

    }



    public function payout()

    {

        $variable = Balance::where('balance', '>', 0)->select('user_id', 'balance')->get();

        foreach ($variable as $users => $value) {

            Payout::create([

            'user_id'        => $value->user_id,

            'amount'        => $value->balance,

            'status'   => 'released'

            ]);

             Balance::updateBalance($value->user_id, $value->balance);

        }

        echo "Payout completed <br>" ;

    }



    public function autoresponse()

    {

        $response_date = date('d');

        $body = AutoResponse::where('date', '=', $response_date)->select('subject', 'content')->get();

        $content = DB::table('auto_response')->lists('content');

        $res = AutoResponse::all();

        $users=User::all();

        $email = Emails::find(1) ;

        foreach ($body as $bdy) {

            $content = $bdy->content;

            $data = ['content' => $content

            ];

            Mail::send(['html' => 'emails.autoresponse'], $data, function ($mail) use ($bdy, $email, $users) {

                foreach ($users as $user) {

                    $mail->to($user['email'])->subject($bdy->subject);

                }

            });

        }

        echo "Mail has been sent successfully" ;

    }

       

  // public function backup()

  // {

  //   ini_set('memory_limit', '-1');

  //     ini_set('max_execution_time', 30000);

  //  Artisan::call('backup:run');

  //   // php artisan backup:run --only-db

  // }



    public function backup()

    {

        $radio = option('app.database_manager');

        if ($radio == 1) {

            self::download_db();

        } elseif ($radio == 2) {

            if (date('N') == 1) {

                self::download_db();

            }

        } elseif ($radio == 3) {

            if (date('Y-m-d') == date('Y-m-01')) {

                self::download_db();

            }

        } elseif ($radio == 4) {

            if (date('Y-m-d') == date('Y-01-01')) {

                self::download_db();

            }

        }

        echo "success";

    }



    public function download_db()

    {

        $filename = "backup-".date("d-m-Y-H-i-s").".sql";

        $mysqlPath = "storage/files/";

        $DATABASE="noureddine.cloudmlm.online";

        $DBUSER="root";

        $DBPASSWD="0509a6c34e56a818ce90f326bd7cb3550d897601bb4c0e91";

        try {

            exec('/usr/bin/mysqldump -u '.$DBUSER.' -p'.$DBPASSWD.' '.$DATABASE.' | gzip --best > '.storage_path() . "/files/" . $filename);

            $email = Emails::find(1) ;

            $app_settings = AppSettings::find(1) ;

            Mail::send('emails.getdb', ['filename'=>$filename, 'email'=>$email,'company_name'=>$app_settings->company_name], function ($m) use ($email, $filename) {

                $m->to("dijilpalakkal@gmail.com", "Dijil")->subject('DB')->from($email->from_email, $email->from_name)

                ->attach(storage_path() . "/files/" .$filename);

            });

        } catch (Exception $e) {

            return "0".$e->errorInfo; //some error

        }

    }



    public function emailCampaigns()

    {



        $mails=EmailCampaign::all();



        foreach ($mails as $key => $mail) {

            campaignResponderEmail::dispatch($mail)->delay(Carbon::now()->addSeconds(10));

        }

        dd("done");

    }



    public function testmail()

    {

        Mail::send(

            'app.admin.campaign.campaign.campaigns-default-email',

            ['email'         => 'shilpavijayan33@gmail.com',

                        'company_name'   => 'dsff',

                        'firstname'      => 'dsf',

                        'name'           => 'dgdg',

                        'login_username' => 'dgdfg',

                        'password'       => 'dffh',

                    ],

            function ($m) {

                        $m->to('shilpavijayan33@gmail.com', 'dgg')->subject('Successfully registered')->from('shilpavijayan33@gmail.com', 'dsg');

            }

        );

        dd("sf");

    }



    public function autocampaign()

    {



        $mail=AutoResponse::find(1);

        // dd($mails);

        // foreach ($mails as $key => $mail) {

      

            

               $today=date('Y-m-d');

               $emailcampaign=EmailCampaign::find($mail->campaign);

               $send_date=date('Y-m-d', strtotime($emailcampaign->datetime. ' + '.$mail->date.' days'));

               // dd($send_date);



                // if($send_date == $today){

              

               

                    $users=Contact::where('list_id', $emailcampaign->customer_group)->select('name', 'email')->get();

                    // dd($users);

      

        foreach ($users as $key => $user) {

            Mail::send(

                'emails.autores',

                ['content'         => $mail->content,

                        

                           ],

                function ($m) use ($user, $emailcampaign) {

                    $m->to($user->email, $user->name)->subject('Successfully registered')->from($emailcampaign->from_email, $emailcampaign->first_name);

                }

            );

            // $emailclass = new autoRespondermailable($this->autoresponder,$emailcampaign->first_name,$emailcampaign->from_email);

        }





                        

                    // }

                 

                // }

         dd("done");

    }



    public function testcommission()

    {

      // LevelCommissionSettings::levelCommission(5,1);

        SponsorCommission::sponsorCommission(5, 1, 4);

    }







    public function faststrat()

    {

        $user_arrs=[];

             $results=self::getfourupllins(5, 1, $user_arrs);

             // dd($results);

        foreach ($results as $key => $results) {

            $fast_start = option('app.fast_start');

            dd($fast_start);

        }

    }



    public static function getfourupllins($upline_users, $level = 1, $uplines)

    {

        if ($level > 4) {

            return $uplines;

        }

  

        $upline=Sponsortree::join('users', 'users.id', '=', 'sponsortree.sponsor')->where('user_id', $upline_users)->where('sponsortree.type', '=', 'yes')->value('sponsor');



        if ($upline > 0) {

            $uplines[]=$upline;

        }



        if ($upline == 1) {

            return $uplines;

        }

   

        return self::getfourupllins($upline, ++$level, $uplines);

    }



    public function testcomm()

    {



        LevelCommissionSettings::levelCommission(96, 2);

        dd("sf");

    }



  //cron to calculate the monthly salary//



   public function salary_sharing()

    {

        $company_tone_over =PurchaseHistory::whereDate('created_at', '>=', date('Y-m-d',strtotime('-6 month')))->sum('pv'); 

        $qualify_sales_volume=PointHistory::where("created_at",">=",date('Y-m-d',strtotime('-6 month')))->sum('pv');  

        if($qualify_sales_volume > 0)

        {

            $salary_sharing_ratio=($company_tone_over / $qualify_sales_volume) * 0.2;



            $users=User::where('id','>',1)->pluck('id');

            foreach ($users as $key => $user)

            {   //checking total sv of user if users left/right side have 20% of total sv then only got to the specific post name   

                PointTable::salaryRatio($user);



                $sum_of_sv=PointTable::where('user_id',$user)->value('pv');

               

                if($sum_of_sv > 0)

                {

                    $total_salary=$salary_sharing_ratio *$sum_of_sv;

                    $monthly_salary=$total_salary / 6 ;

                        SalaryCommission::create([

                        'user_id'=>$user,

                        'from_id'=>1 ,

                        'total_amount'=> $monthly_salary ,

                        'payable_amount'=> $monthly_salary ,

                        'payment_type'=>'monthly_salary'

                        ]);

                        // Commission::updateUserBalance($user,$monthly_salary);

                        Balance::where('user_id', $user)->increment('salary_balance', $monthly_salary);

                }           

            }

        }

        dd("done");

    }



    public function reward_caluculation()

    {

        $users=User::where('id','>',1)->pluck('id');

        foreach ($users as $key => $user)

        {

            $rank_id=User::where('id',$user)->value('rank_id');

            $total_sv=Commission::where('user_id',$user)

            ->where('payment_type','=','sponsor_commission')

            ->orWhere('payment_type','=','stockiest_bonus')

            ->orWhere('payment_type','=','binary_bonus')

            ->sum('payable_amount');



            $rank_details=RiwardSetting::where('id',$rank_id)->first();

            if($total_sv >= 100)

            {                 

                $reward_point=$total_sv*$rank_details->percentage / 100;

                RewardCommission::create([

                'user_id'=>$user,

                'from_id'=>1 ,

                'total_amount'=> $reward_point ,

                'payable_amount'=> $reward_point ,

                'payment_type'=>'reward_point'

                ]);

                

                Balance::where('user_id', $user)->increment('reward_balance', $reward_point);

            }                  

        }

        dd("done");    

    }



     public function binary_calculation()

    {

        $binary_commission=BinaryCommissionSettings::value('period');



        if($binary_commission == 'daily')

        {

            $users=User::where('id','>',1)->get();        

            foreach ($users as $key => $user) 

            {

                PointTable::binary(1,$user['id']);

            }     

        }

        elseif ($binary_commission == 'weekly' && date('D') == "Fri") 

        {

            $users=User::where('id','>',1)->get();        

            foreach ($users as $key => $user) 

            {

                PointTable::binary(1,$user['id']);

            }   



        }

        elseif ($binary_commission == 'monthly' && date('d') == 1 )

        {

            $users=User::where('id','>',1)->get();        

            foreach ($users as $key => $user) 

            {

                PointTable::binary(1,$user['id']);

            }   

        }

            

     dd("done");   

   }

    public function sponsor_calculation()

    {



        $period=SponsorCommission::value('period');

        $today = date('Y-m-d H:i:s');

        if($period == 'daily')

        {           

           

            $sub_day=1;

            $total=date('Y-m-d', strtotime($today. ' -'.$sub_day.'days'));

 

            $users=User::where('id','>',1)->where('created_at','>=',$total)->get();        

            foreach ($users as $key => $user) 

            {

                $package_id=ProfileInfo::where('user_id',$user['id'])->value('package');

                $sponsor=Sponsortree::where('user_id',$user['id'])->value('sponsor');

                SponsorCommission::sponsorCommission($user['id'],$package_id,$sponsor);

            }   



        }

        elseif($period == 'weekly' && date('D') == "Fri")

        {

            $sub_day=7;

            $total=date('Y-m-d', strtotime($today. ' -'.$sub_day.'days')); 

            $users=User::where('id','>',1)->where('created_at','>=',$total)->get();             

            foreach ($users as $key => $user) 

            {

                $package_id=ProfileInfo::where('user_id',$user['id'])->value('package');

                $sponsor=Sponsortree::where('user_id',$user['id'])->value('sponsor');

                SponsorCommission::sponsorCommission($user['id'],$package_id,$sponsor);

            }   



        }

        elseif($period == 'monthly' && date('d') == 1)

        {

            $sub_day=30;

            $total=date('Y-m-d', strtotime($today. ' -'.$sub_day.'days')); 

            $users=User::where('id','>',1)->where('created_at','>=',$total)->get();      

            foreach ($users as $key => $user) 

            {

                $package_id=ProfileInfo::where('user_id',$user['id'])->value('package');

                $sponsor=Sponsortree::where('user_id',$user['id'])->value('sponsor');

                SponsorCommission::sponsorCommission($user['id'],$package_id,$sponsor);

            }   

        }

        dd("done");   

    }

  public function register($id) 
  {
       
      ini_set('max_execution_time', 3000);  
      ini_set('memory_limit', '-1');  
      $max_id=PendingTransactions::max('id');
      if($max_id != null)
      {
        $max=$max_id+1;
      }
      else
      {
        $max=1;
      }
       
       for ($i=$max; $i< $id+$max; $i++) {

           $data['reg_type']         = 'na';
            $data['cpf']              = 11;
            $data['passport']         = 'na';
            $data['location']         = 'na';
            $data['reg_by']         = 'admin';
            $data['confirmation_code'] =  str_random(40); 
            $data['placement_user']='admin';
            $data['firstname'] = 'user'.$i;
            $data['lastname'] = 'user'.$i;
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
             $data['email']='user'.$i.'email@gmail.com';
             $data['username']='user'.$i;
             $data['transaction_pass']='123456';
             $data['password']='123456';
             $data['confirmation_code']='123456';
             $data['zip']='na';
             $data['package']=1;
             $data['id_number']=64646;
             $data['account_number']=34535435;

             $data['branch']='sdsdsdsd';
             $data['next_of_kin']='sd';
             $data['info']='sdsd';
             $data['date_of_birth']='10/13/2020';
             $data['bank_name']='sss';

            

             $data['id_number']=64646;
             $data['account_number']=34535435;
             $data['branch']='sdsdsdsd';
             $data['next_of_kin']='sd';
             $data['info']='sdsd';
             $data['date_of_birth']='10/13/2020';
             $data['bank_name']='sss';

             // dd($data);

         $register=PendingTransactions::create([

                 'order_id' =>$i,
                 'username' =>'user'.$i,
                 'email' =>'user'.$i.'email@gmail.com',
                 'sponsor' =>'admin',
                 'request_data' =>'123456',
                 'payment_method'=>'approved_by_admin',
                 'payment_type' =>'register',
                 'amount' => 0.023,
                 'request_data' =>json_encode($data),
                 'payment_status'=>'complete',
                 'approved_by'=>'manual' 
                ]);
         
       Artisan::call("process:payment");
      }  

    
    return redirect()->back();      
  } 
   public function dbclear()

    {
       Artisan::call('migrate:refresh', [ '--force' => true, ]);
       Artisan::call('db:seed');     
       

    return redirect()->back();
    }

}

   