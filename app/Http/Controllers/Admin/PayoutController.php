<?php

namespace App\Http\Controllers\Admin;

use App\Balance;
use App\Http\Controllers\Admin\AdminController;
use App\Payout;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use App\Emails;
use App\EmailTemplates;
use App\AppSettings;
use App\PaymentNotification;
use App\Payoutmanagemt;
use App\Hyperwallet;
use App\PayoutcronHistory;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use App\PaypalPayout;
use App\payout_gateway_details;
use App\ProfileInfo;
use App\Transactions;
use App\PaymentGatewayDetails;
use Mail;
use Artisan ;
class PayoutController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $_api_context;
    public function __construct()
    {
        parent::__construct();
        
        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function failedpayout()
    {

        $title     = 'Failed payout ';
        $sub_title = '';
        $base      = 'payout';
        $method    = '';

         $vocherrquest = Transactions::select('transactions.*', 'users.username','user_accounts.account_type','user_accounts.account_no')
                                ->join('users', 'users.id', '=', 'transactions.user_id')
                                ->join('user_accounts', 'user_accounts.id', '=', 'transactions.account_id')
                                ->where('transactions.status', '=', 'failed')
                                ->orderBy('id', 'DESC')
                                // ->paginate(100);
                                ->get();
    
        // $itt= $vocherrquest[0] ;
                // dd();
              
 
        return view('app.admin.payout.failedpayout', compact('title', 'vocherrquest', 'sub_title', 'base', 'method'));
    }

     public function index()
    {

        $title     = trans('payout.payout');
        $sub_title = trans('payout.view_payout');
        $base      = trans('payout.payout');
        $method    = trans('payout.payout_request');

         // $vocherrquest = Transactions::select('transactions.*', 'users.username','user_accounts.account_type','user_accounts.account_no')
         //                        ->join('users', 'users.id', '=', 'transactions.user_id')
         //                        ->join('user_accounts', 'user_accounts.id', '=', 'transactions.account_id')
         //                        // ->where('transactions.status', '=', 'pending')
         //                        ->orderBy('id', 'DESC')
         //                        // ->paginate(100);
         //                        ->get();
        $userss = User::getUserDetails(Auth::id());
         $user   = $userss[0];
         $vocherrquest = Payout::select('payout_request.*', 'users.username', 'user_balance.balance', 'payout_request.id as payout_id', 'payout_types.payment_mode as payment_mode')
                                ->join('user_balance', 'user_balance.user_id', '=', 'payout_request.user_id')
                                ->join('users', 'users.id', '=', 'payout_request.user_id')
                                ->join('payout_types', 'payout_types.id', '=', 'payout_request.payment_mode')
                                ->where('payout_request.status', '=', 'pending')
                                //->orderBy('status', 'ASC')
                                
                                ->paginate(10);

        

             $count_requests = count($vocherrquest);
        $payment_gateway=PaymentGatewayDetails::find(1);                              
            
 
       return view('app.admin.payout.index', compact('title', 'vocherrquest', 'user', 'count_requests', 'sub_title', 'base', 'method','payment_gateway'));
    }

    public function getpayout()
    {
        $payout = Payout::sum('amount');

        $balance = Balance::sum('balance');
        echo isset($payout) ? $payout : 0;
        echo ',';
        echo isset($balance) ? $balance : 0;
    }
    // public function confirm(Request $request,$id)
    // {
         
 
    //      Artisan::call('transaction:payout', [ '--item' => $id ]);

    //      sleep(1);


    //      $item = Transactions::find($id);
    //      $data = json_decode($item->payment_responce) ;

    //      if(isset($data->tx_list)){
    //             Session::flash('flash_notification', array('level' => 'success', 'message' => 'Payout processed transactions hash : '.$data->tx_list[0]->tx_hash));

    //      }else{
    //         // dd($data);
    //             Session::flash('flash_notification', array('level' => 'error', 'message' => 'Payout failed  : '.$data->message));

    //      }
       
    //     return redirect()->back();
    // }

    public function confirm(Request $request)
    {   
        $user=User::join('profile_infos', 'profile_infos.user_id', '=', 'users.id')
                       ->where('users.id', $request->user_id)
                       ->select('users.*', 'profile_infos.*')
                       ->first();
        $amount         =$request->amount;
        $email          =$user->email;
        $pay_reqid      =$request->requestid;
        $payout_request = Payout::find($pay_reqid);
        $currency       =currency()->getUserCurrency();
      
        if ($request->payment_mode=='Manual/Bank') {
      
        $res = Payout::confirmPayoutRequest($pay_reqid, $amount);
                PayoutcronHistory::create([
                  'user_id'          => $user->id,
                  'receiver_address' => $user->name,
                  'amount'           => $amount,
                  'response'         => "",
                  'payment_mode'    =>'manual/bank',
                ]);
        $email_admin = Emails::find(1);
        $subject=EmailTemplates::where('id','=','9')->value('subject');
        $content=EmailTemplates::where('id','=','9')->value('body');
        $username=User::where('id','=',$user->user_id)->value('username');
     
            if ($res) {
                
                   \Mail::send('emails.payout',
                [ 
                   
                    'message_subject' => $subject,
                    'to_id'           => 'new',
                    'user'            =>$user,
                     'content'  =>$content,
                    
                ], function ($m) use($user,$subject,$email,$email_admin,$username,$content) {
                    $m->to( $email , $username)->subject($subject)->from($email_admin->from_email);

            } ); 
                Session::flash('flash_notification', array('level' => 'success', 'message' => trans('payout.successful_payout')));
            } else {
                Session::flash('flash_notification', array('level' => 'error', 'message' => trans('payout.unsuccessful_payout')));
            }
              return redirect()->back();  
        }            
    }     

    public function reject($id, $amount)
    {
   
        echo "test";
        $payout_request = Payout::find($id);
        $payout_request->amount;
        $res         = Balance::where('user_id', $payout_request->user_id)->increment('balance', $amount);
        Payout::where('id', '=', $id)
               ->update(['status'=>'rejected']);

        Session::flash('flash_notification', array('level' => 'success', 'message' => trans('payout.payout_rejected')));
       
        return redirect()->back();
    }

    public function payoutdelete(Request $request,$id)
    {
        $res = Transactions::where('id',$id)->delete();
        if ($res) {
            Session::flash('flash_notification', array('level' => 'success', 'message' => trans('payout.payout_deleted')));
        } else {
            Session::flash('flash_notification', array('level' => 'error', 'message' => trans('payout.details_updated')));
        }
        return redirect()->back();
    }
}
