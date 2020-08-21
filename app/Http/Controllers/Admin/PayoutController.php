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

         $vocherrquest = Transactions::select('transactions.*', 'users.username','user_accounts.account_type','user_accounts.account_no')
                                ->join('users', 'users.id', '=', 'transactions.user_id')
                                ->join('user_accounts', 'user_accounts.id', '=', 'transactions.account_id')
                                // ->where('transactions.status', '=', 'pending')
                                ->orderBy('id', 'DESC')
                                // ->paginate(100);
                                ->get();
            
 
        return view('app.admin.payout.index', compact('title', 'vocherrquest', 'sub_title', 'base', 'method'));
    }

    public function getpayout()
    {
        $payout = Payout::sum('amount');

        $balance = Balance::sum('balance');
        echo isset($payout) ? $payout : 0;
        echo ',';
        echo isset($balance) ? $balance : 0;
    }
    public function confirm(Request $request,$id)
    {
         
 
         Artisan::call('transaction:payout', [ '--item' => $id ]);

         sleep(1);


         $item = Transactions::find($id);
         $data = json_decode($item->payment_responce) ;

         if(isset($data->tx_list)){
                Session::flash('flash_notification', array('level' => 'success', 'message' => 'Payout processed transactions hash : '.$data->tx_list[0]->tx_hash));

         }else{
            // dd($data);
                Session::flash('flash_notification', array('level' => 'error', 'message' => 'Payout failed  : '.$data->message));

         }
       
        return redirect()->back();
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
