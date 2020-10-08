<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\user\UserAdminController;
use App\Http\Controllers;
use Auth;
use App\User;
use App\Mail;
use App\Payout;
use App\AppSettings;
use App\Tree_Table;
use App\Balance;
use App\Commission;
use App\Packages;
use App\PointTable;
use App\PurchaseHistory;
use App\RsHistory;
use App\Currency;
use App\PendingTransactions;
use App\Shippingaddress;
use Crypt;
use App\EwalletSettings;
use App\Ranksetting;
use App\Tree_Table2;
use App\Tree_Table3;
use App\Tree_Table4;
use App\Tree_Table5;


class dashboard extends UserAdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = trans('dashboard.method');
        
    

        $base = trans('dashboard.base');
        $method = trans('dashboard.method');
        $sub_title = trans('dashboard.sub_title');

         $user_phase1=Tree_Table::where('user_id','>',0)->count('user_id');
         $user_phase2=Tree_Table2::where('user_id','>',0)->count('user_id');
         $user_phase3=Tree_Table3::where('user_id','>',0)->count('user_id'); 
         $user_phase4=Tree_Table4::where('user_id','>',0)->count('user_id'); 
         $user_phase5=Tree_Table5::where('user_id','>',0)->count('user_id'); 

         $total_credit = Commission::where('user_id', Auth::user()->id)->where('payment_type', 'like', 'fund_credit')->sum('payable_amount');
         $total_messages = Mail::where('to_id', '=',Auth::user()->id)->count();
        
           return view('app.user.dashboard.index', compact( 'title', 'sub_title', 'base', 'method','user_phase1','user_phase2','user_phase3','user_phase4','user_phase5','total_credit','total_messages'));
    }

    public function getmonthusers()
    {
        $downline_users = array();
        Tree_Table::getDownlines(1, true, Auth::user()->id, $downline_users);
        $users = Tree_Table::getDown();
        print_r($users);
    }

    public function bitaps(Request $request, $paymentid)
    {
        $item = PendingTransactions::where('id', $paymentid)->first();

        
        if (is_null($item)) {
            return response()->json(['valid' => false]);
        } elseif ($item->payment_status == 'finish') {
            $user_id=User::where('username', $item->username)->value('id');
            if ($user_id <> null) {
                return response()->json(['valid' => true,'status'=>$item->payment_status,'id'=>Crypt::encrypt($user_id)]);
            }
        } else {
            return response()->json(['valid' => true,'status'=>$item->payment_status,'id'=>null]);
        }
        
        return response()->json(['valid' => false]);
    }


    public function storebitaps(Request $request, $paymentid)
    {
        $item = PendingTransactions::where('id', $paymentid)->first();

        
        if (is_null($item)) {
            return response()->json(['valid' => false]);
        } elseif ($item->payment_status == 'finish') {
            $id = shippingaddress::where('user_id', $item->user_id)->max('id');
            return response()->json(['valid' => true,'status'=>$item->payment_status,'id'=>Crypt::encrypt($id)]);
        } else {
            return response()->json(['valid' => true,'status'=>$item->payment_status,'id'=>null]);
        }
        
        return response()->json(['valid' => false]);
    }

    public function joinphase(Request $request)
    {

        $title="Payment Preview";
        $base="Payment Preview";
        $method="Payment Preview";
        $sub_title="Payment Preview";

        $package_amount = Packages::find(3)->amount ;

        $payment_item = PendingTransactions::where('username',Auth::user()->username)->where('payment_status','pending')->where('payment_type','account')->exists() ;

       
       if($payment_item && Auth::user()->id > 2 ){

        $payment_item = PendingTransactions::where('username',Auth::user()->username)->where('payment_type','account')->first() ;

        $payment_details = json_decode($payment_item->payment_data);
       
       }else{
           # code... 

         $register=PendingTransactions::create([

                 'order_id' =>uniqid(),
                 'username' =>Auth::user()->username,
                  'email' =>Auth::user()->email,
                 'sponsor' => 'admin',
                 'request_data' =>json_encode([]),
                 'payment_method'=>'bitaps',
                 'payment_type' =>'account',
                 'amount' => $package_amount,
                ]);

           $title=trans('register.bitaps_payment');
            $sub_title=trans('register.bitaps_payment');
            $base=trans('register.bitaps_payment');
            $method=trans('register.bitaps_payment');

            
            $system_btc_wallet = EwalletSettings::find(1)->bitcoin_address ;
            $url ='https://api.bitaps.com/btc/v1/create/payment/address' ;
            $payment_details = $this->url_get_contents($url, [
                                            'forwarding_address'=>$system_btc_wallet,
                                            'callback_link'=>url('bitaps/paymentnotify'),
                                            'confirmations'=>3
                                        ]);

                $package_amount=round($package_amount, 8);



             PendingTransactions::where('id', $register->id)->update(['payment_code'=>$payment_details->payment_code,'invoice'=>$payment_details->invoice,'payment_address'=>$payment_details->address,'payment_data'=>json_encode($payment_details)]);
       }

       


        return view('app.user.dashboard.upgrade', compact('title', 'base', 'method', 'sub_title','package_amount','payment_details'));
    }

     function url_get_contents($Url, $params)
    {
        if (!function_exists('curl_init')) {
            die('CURL is not installed!');
        }
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $Url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($params) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        }

          

        $output = curl_exec($ch);

        curl_close($ch);
        return  json_decode($output);
    }
}
