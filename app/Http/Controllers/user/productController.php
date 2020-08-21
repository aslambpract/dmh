<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\MatchingBonus;
use App\Balance;
use App\User;
use App\Packages;
use App\Commission;
use App\Transactions;
use App\Sponsortree;
use App\SponsorCommission;
use App\PurchaseHistory;
use App\Ranksetting;
use App\Sales;
use App\PointTable;
use App\DirectSposnor;
use App\RsHistory;
use App\LeadershipBonus;
use App\Tree_Table;
use App\UserDebit;
use App\Currency;
use App\Voucher;
use App\PendingCommission1;
use App\VoucherHistory;
use Auth;
use Session;
use Validator;
use App\ProfileModel;
use App\ProfileInfo;
use App\Product;
use App\Productaddcart;
use App\ShoppingCountry;
use App\ShoppingZone;
use App\Order;
use App\PendingTransactions;
use App\PendingBinaryCommission;
use DB;
use Redirect;
use App\DeliveryTrackingDetails;
use App\Shippingaddress;
use App\Orderproduct;
use App\InvoiceTable;
use App\AppSettings;
use App\PaymentGatewayDetails;
use Crypt;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Account;
use Stripe\Token;
use Srmklive\PayPal\Services\ExpressCheckout;
use Rave;
use App\Http\Controllers\user\UserAdminController;

class productController extends UserAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      private $api_context;
    protected static $provider;

    public function __construct()
    {
         parent::__construct();
         self::$provider = new ExpressCheckout;
    }

    public function index()
    {
        

        $plan_id=ProfileModel::where('user_id', Auth::user()->id)->value('package');
          
        // $products = Packages::where('id', '>', $plan_id)->get();
        $products = Packages::where('id', '>', 1)->get();

     
        $title = trans('products.purchase_plan');
        $sub_title =  trans('products.purchase_plan');
        $rules = ['count' => 'required|min:1'];
        $base =  trans('products.purchase_plan');
        $method =  trans('products.purchase_plan');
        $balance =  Balance::where('user_id', Auth::user()->id)->value('balance');
        $min_amount =  Packages::min('amount');
        $payment_gateway=PaymentGatewayDetails::find(1);
        return view('app.user.product.index', compact('title', 'products', 'rules', 'base', 'method', 'sub_title', 'balance', 'min_amount', 'payment_gateway'));
    }


    public function purchasehistory()
    {
         $data = PurchaseHistory::join('packages', 'packages.id', '=', 'purchase_history.package_id')
                 ->where('user_id', Auth::user()->id)
                 //->where('purchase_user_id',Auth::user()->id)
                 ->select('packages.package', 'count', 'packages.amount', 'total_amount', 'purchase_history.created_at', 'purchase_history.pv', 'purchase_history.pay_by','purchase_history.next_purchase_date','packages.sv')
                  ->orderBy('purchase_history.id', 'DESC')
                  ->paginate(10);
        // dd($data);   
        $title = trans('products.purchase_history');
        $sub_title = trans('products.purchase_history');
        $base = trans('products.purchase_history');
        $method = trans('products.purchase_history');
        return view('app.user.product.purchase-history', compact('title', 'data', 'base', 'method', 'sub_title'));
    }


    public function purchase(Request $request)
    {

        

        $validator = Validator::make($request->all(), [
           
            'steps_plan_payment'=>'required|min:1' ,
            'plan'=>'required|exists:packages,id' ,
            ]);

        $package=Packages::where('id',$request->plan)->first();
         
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $balance=Balance::where('user_id', Auth::user()->id)->value('balance');
     
                if ($balance < $package->sv ) {
                    return redirect()->back()->withErrors([trans('register.insufficient_balance')]);
                }
        
        $today = date('Y-m-d H:i:s'); 
        $daystosum = 30; 
        $next_purchase_date = date('Y-m-d H:i:s', strtotime($today.' + '.$daystosum.' days'));

    $prev=PurchaseHistory::where('user_id',Auth::user()->id)->max('id');
$prev_pack=PurchaseHistory::where('id',$prev)->value('package_id');
$prev_pack_sv=Packages::where('id',$prev_pack)->value('sv');   
      
        if($request->steps_plan_payment == "cheque")
        {
              $plan_upgrade=PurchaseHistory::create([

                 'user_id' =>Auth::user()->id,
                 'purchase_user_id' =>Auth::user()->id,
                 'package_id' =>$request->plan,
                 'pv' => $package->sv,
                 'count' =>1,
                 'total_amount' =>$package->amount,
                 'pay_by' =>$request->steps_plan_payment,
                 'sales_status'=>$request->steps_plan_payment,
                 'rs_balance' =>$package->amount,
                 'purchase_type' => "products_purchased",
                 'next_purchase_date'=>$next_purchase_date,
                 // 'approved'=>"approved",
                ]);
               // $pendings=PendingCommission1::where('type','pending')->where('give_sp_cm','=',0)->pluck('user_id');
               //  foreach ($pendings as $key => $value) 
               //  {
               //    $sponsor=Sponsortree::where('user_id',$value)->value('sponsor');
               //    SponsorCommission::sponsorCommission($value,$package->id,$sponsor);
               //    PendingCommission1::where('user_id','=',$value)->update(['type'=>'receve','give_sp_cm'=>1]);
               //  }  


 // $pendings=PendingCommission1::where('type','pending')->where('give_sp_cm','=',0)->pluck('user_id');
 //               $pendings=$pendings->toArray();
 //               $test = in_array(Auth::user()->id, $pendings);
           
 //                if($test == true){
 //                foreach ($pendings as $key => $value) 
 //                { 
 //                  $sponsor=Sponsortree::where('user_id',Auth::user()->id)->value('sponsor');
 //                  $s_id=PurchaseHistory::where('user_id',$sponsor)->max('id');
 //                  $sponsor_pack_sv=PurchaseHistory::where('id',$s_id)->value('pv');
 //                  if($sponsor_pack_sv > 1){
 //                  if(Auth::user()->id == $value){
 //                  $sponsor=Sponsortree::where('user_id',Auth::user()->id)->value('sponsor');
 //                  SponsorCommission::sponsorCommission(Auth::user()->id,$package->id,$prev_pack_sv,$sponsor);
 //                  PendingCommission1::where('user_id','=',Auth::user()->id)->update(['type'=>'receve','give_sp_cm'=>1]);
 //                }
 //                } }}

                // else
                // {
                    // $total_sv=PurchaseHistory::where('user_id',Auth::user()->id)->sum('pv');       
                    //  if($total_sv <=816)
                    // {
                    //     $sv=$package->sv;
                    //     $sponsor=Sponsortree::where('user_id',Auth::user()->id)->value('sponsor');
                    //     SponsorCommission::sponsorCommission(Auth::user()->id,$sv,$prev_pack_sv,$sponsor);
                    // }
                    // else
                    // {                                    
                    //     $prev=PurchaseHistory::where('user_id',Auth::user()->id)->max('id');
                    //     $prev_sv=PurchaseHistory::where('id','!=',$prev)->where('user_id',Auth::user()->id)->sum('pv');
                    //     $sv=816-$prev_sv;
                    //     if($sv > 1)
                    //     {
                    //         $sponsor=Sponsortree::where('user_id',Auth::user()->id)->value('sponsor');
                    //         SponsorCommission::sponsorCommission(Auth::user()->id,$sv,$prev_pack_sv,$sponsor);
                    //     }
                    // }




                
                // }
// $binary_pending=PendingBinaryCommission::where('status','=',0)->where('sponsor_id',Auth::user()->id)->get();
// $binary_pendin=PendingBinaryCommission::where('status','=',0)->where('sponsor_id',Auth::user()->id)->max('id');
// $binary_pending=PendingBinaryCommission::where('id','=',$binary_pendin)->get();
// foreach ($binary_pending as $key => $value)
// { 
//   // $ac=PurchaseHistory::where('user_id',$value['left_user_id'])->where('purchase_type','=','registration')->value('pv');
//   // $bc=PurchaseHistory::where('user_id',$value['right_user_id'])->where('purchase_type','=','registration')->value('pv');
//   $a=PurchaseHistory::where('user_id',$value['left_user_id'])->max('id');
//   $b=PurchaseHistory::where('user_id',$value['right_user_id'])->max('id');
//   $a1=PurchaseHistory::where('id',$a)->value('pv');
//   $b2=PurchaseHistory::where('id',$b)->value('pv');
//   if($a1 >= 51 && $b2 >=51){
//     if($a < $b){
//       PointTable::binary($value['left_user_id'], Auth::user()->id);}
//     if($b < $a){
//       PointTable::binary($value['right_user_id'], Auth::user()->id);
//     }      
  
//   PendingBinaryCommission::where('sponsor_id','=',Auth::user()->id)->update(['status'=>1]);
// }
// }                













              Balance::where('id',Auth::user()->id)->decrement('balance',$package->sv);
              $sponsor_id=Sponsortree::where('user_id',Auth::user()->id)->value('sponsor');
              // Ranksetting::StockiestBonus($sponsor_id,Auth::user()->id,$package->sv);
              // PointTable::updatePoint($package->sv, Auth::user()->id); 
              $sum_pv=PurchaseHistory::where('user_id',Auth::user()->id)->sum('pv');
              $rank_id=User::where('id',Auth::user()->id)->value('rank_id');
              $next_rank_id=$rank_id+1;
               // Ranksetting::RankUpdate1(Auth::user()->id,$sum_pv,$next_rank_id,$rank_id);
              Session::flash('flash_notification', array('level' => 'success', 'message' => trans('Packages purchased')));
               return Redirect::back();
      
        }

    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if ($request->steps_plan_payment == "ewallet") {
                if ($request->ewalletusername == null ||$request->ewallet_password == null) {
                    return redirect()->back()->withErrors([trans('register.the_ewallet_username_and_password_required')]);
                }
            }
               
            $package = Packages::find($request->plan);
            $balance =  Balance::where('user_id', Auth::user()->id)->value('balance');
            $sponsor_id =Sponsortree::where('user_id', Auth::user()->id)->value('sponsor') ;
            $payment_gateway=PaymentGatewayDetails::find(1);
            $orderid = mt_rand();

            $request->amount=$package->amount;
           
             
            if ($request->steps_plan_payment == "rave") {
                if ($package->amount > 1000) {
                    return redirect()->back()->withErrors([trans('register.the_amount_should_be_between_1_and_100_for_rave_payment')]);
                }
            }


            if ($request->steps_plan_payment == "ewallet") {
                $ewallet_user=User::where('username', $request->ewalletusername)->first();
                if ($ewallet_user == null) {
                    return redirect()->back()->withErrors([trans('register.user_not_exist')]);
                }
                if ($request->ewallet_password <> $ewallet_user->transaction_pass) {
                    return redirect()->back()->withErrors([trans('register.transaction_passowrd_is_incorrect')]);
                }
                $balance=Balance::where('user_id', $ewallet_user->id)->value('balance');
                if ($balance < $package->amount && $ewallet_user->id > 1) {
                    return redirect()->back()->withErrors([trans('register.insufficient_balance')]);
                }
            }

     
            $flag=false;

            $plan_upgrade=PendingTransactions::create([

                 'order_id' =>$orderid,
                 'user_id' =>Auth::user()->id,
                 'username' =>Auth::user()->username,
                 'email' =>Auth::user()->email,
                 'sponsor' => $sponsor_id,
                 'package' =>$package->id,
                 'request_data' =>json_encode($request->all()),
                 'payment_method'=>$request->steps_plan_payment,
                 'payment_type' =>'plan_upgrade',
                 'amount' => $package->amount,
                ]);
      

            if ($request->steps_plan_payment == 'stripe') {
                Stripe::setApiKey($payment_gateway->stripe_secret_key);
                $customer=Customer::create([
                            'email' =>Auth::user()->email,
                            'source' =>request('stripeToken')
                            ]);

                $id = $customer->id;
                $Charge=Charge::create([
                            'customer' =>$id,
                            'amount' => $package->amount * 100,
                            'currency' => 'usd'
                            ]);
               
                if ($Charge->status == "succeeded") {
                    PendingTransactions::where('id', $plan_upgrade->id)->update(['payment_data' =>json_encode($customer),'payment_response_data' =>json_encode($Charge),'payment_status' => 'complete']) ;
                    $flag=true;
                }
            }
            if ($request->steps_plan_payment == 'cheque') {
                PendingTransactions::where('id', $plan_upgrade->id)->update(['payment_status' => 'complete']) ;
                $flag=true;
            }

            if ($request->steps_plan_payment == "ewallet") {
                $balance=Balance::where('user_id', $ewallet_user->id)->value('balance');
                if ($ewallet_user->id == 1) {
                    PendingTransactions::where('id', $plan_upgrade->id)->update(['payment_status' => 'complete']) ;
                    $flag=true;
                }
                if ($balance>=$package->amount && $ewallet_user->id > 1) {
                    Balance::where('user_id', $ewallet_user->id)->decrement('balance', $package->sv);

                    $prev=PurchaseHistory::where('user_id',Auth::user()->id)->max('id');
$prev_pack=PurchaseHistory::where('id',$prev)->value('package_id');
$prev_pack_sv=Packages::where('id',$prev_pack)->value('sv');
                    $plan_upgrade=PurchaseHistory::create([

                      'user_id' =>Auth::user()->id,
                      'purchase_user_id' =>Auth::user()->id,
                      'package_id' =>$request->plan,
                      'pv' => $package->sv,
                      'count' =>1,
                      'total_amount' =>$package->amount,
                      'pay_by' =>$request->steps_plan_payment,
                      'sales_status'=>$request->steps_plan_payment,
                      'rs_balance' =>$package->amount,
                      'purchase_type' => "products_purchased",
                      'next_purchase_date'=>$next_purchase_date,
                      // 'approved'=>"approved",
                    ]);

                    // Commission::create([
                    //   'user_id'=>$ewallet_user->id,
                    //   'from_id'=>1,
                    //   'total_amount'=>$package->amount*-1,
                    //   'payable_amount'=>$package->amount*-1,
                    //   'payment_type'=>'plan_upgrade',
                    //   'note'           => 'plan_upgrade',
                    //   ]);

                  //    $pendings=PendingCommission1::where('type','pending')->where('give_sp_cm','=',0)->pluck('user_id');
                  // foreach ($pendings as $key => $value) 
                  // {
                  //   $sponsor=Sponsortree::where('user_id',$value)->value('sponsor');
                  //   SponsorCommission::sponsorCommission($value,$package->id,$sponsor);
                  //   PendingCommission1::where('user_id','=',$value)->update(['type'=>'receve','give_sp_cm'=>1]);
                  // }   

 // $pendings=PendingCommission1::where('type','pending')->where('give_sp_cm','=',0)->pluck('user_id');
 //  // $test = in_array(Auth::user()->id, $pendings);
           
 //  //               if($test == true){
 //                $pendings=$pendings->toArray();
 //               $test = in_array(Auth::user()->id, $pendings);
           
 //                if($test == true){  
 //                foreach ($pendings as $key => $value) 
 //                { 
 //                  $sponsor=Sponsortree::where('user_id',Auth::user()->id)->value('sponsor');
 //                  $s_id=PurchaseHistory::where('user_id',$sponsor)->max('id');
 //                  $sponsor_pack_sv=PurchaseHistory::where('id',$s_id)->value('pv');
 //                  if($sponsor_pack_sv > 1){
 //                  if(Auth::user()->id == $value){
 //                  $sponsor=Sponsortree::where('user_id',Auth::user()->id)->value('sponsor');
 //                  SponsorCommission::sponsorCommission(Auth::user()->id,$request->plan,$prev_pack_sv,$sponsor);
 //                  PendingCommission1::where('user_id','=',Auth::user()->id)->update(['type'=>'receve','give_sp_cm'=>1]);
 //                }
 //                } }}
 //                // else
 //                // {
 //                  $total_sv=PurchaseHistory::where('user_id',Auth::user()->id)->sum('pv');       
 //                     if($total_sv <=816)
 //                    {
 //                        $sv=$package->sv;
 //                        $sponsor=Sponsortree::where('user_id',Auth::user()->id)->value('sponsor');
 //                        SponsorCommission::sponsorCommission(Auth::user()->id,$sv,$prev_pack_sv,$sponsor);
 //                    }
 //                    else
 //                    {                                    
 //                        $prev=PurchaseHistory::where('user_id',Auth::user()->id)->max('id');
 //                        $prev_sv=PurchaseHistory::where('id','!=',$prev)->where('user_id',Auth::user()->id)->sum('pv');
 //                        $sv=816-$prev_sv;
 //                        if($sv > 1)
 //                        {
 //                            $sponsor=Sponsortree::where('user_id',Auth::user()->id)->value('sponsor');
 //                            SponsorCommission::sponsorCommission(Auth::user()->id,$sv,$prev_pack_sv,$sponsor);
 //                        }
 //                    }

                
                // }
// $binary_pendin=PendingBinaryCommission::where('status','=',0)->where('sponsor_id',Auth::user()->id)->max('id');
// $binary_pending=PendingBinaryCommission::where('id','=',$binary_pendin)->get();                
// // $binary_pending=PendingBinaryCommission::where('status','=',0)->where('sponsor_id',Auth::user()->id)->get();
// foreach ($binary_pending as $key => $value)
// { 
//   // $ac=PurchaseHistory::where('user_id',$value['left_user_id'])->where('purchase_type','=','registration')->value('pv');
//   // $bc=PurchaseHistory::where('user_id',$value['right_user_id'])->where('purchase_type','=','registration')->value('pv');
//   $a=PurchaseHistory::where('user_id',$value['left_user_id'])->max('id');
//   $b=PurchaseHistory::where('user_id',$value['right_user_id'])->max('id');
//   $a1=PurchaseHistory::where('id',$a)->value('pv');
//   $b2=PurchaseHistory::where('id',$b)->value('pv');
//   if($a1 >= 51 && $b2 >=51){
//     if($a < $b){
//       PointTable::binary($value['left_user_id'], Auth::user()->id);
//     }
//     if($b < $a){

//   PointTable::binary($value['right_user_id'], Auth::user()->id);}
//   PendingBinaryCommission::where('sponsor_id','=',Auth::user()->id)->update(['status'=>1]);
// }
// }                
                    
                  
                   
                    PendingTransactions::where('id', $plan_upgrade->id)->update(['payment_status' => 'complete']) ;
                    // Ranksetting::StockiestBonus($sponsor_id,Auth::user()->id,$package->sv);

                    // PointTable::updatePoint($package->sv, Auth::user()->id); 
                    $sum_pv=PurchaseHistory::where('user_id',Auth::user()->id)->sum('pv');
                    $rank_id=User::where('id',Auth::user()->id)->value('rank_id');
                    $next_rank_id=$rank_id+1;
                    // Ranksetting::RankUpdate1(Auth::user()->id,$sum_pv,$next_rank_id,$rank_id);




                     $flag=true;
                }
            }
          

            /**
             * If request contains payment mode paypal, application will handle the payment process
             * @var [string]
             */
            if ($request->steps_plan_payment == 'paypal') {
                    Session::put('paypal_id', $plan_upgrade->id);

                    $data = [];
                    $data['items'] = [
                        [
                            'name' => Config('APP_NAME'),
                            'price' => $package->amount,
                            'qty' => 1
                        ]
                    ];

                    $data['invoice_id'] = time();
                    $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
                    $data['return_url'] = url('/user/paypal/planpurchase', $plan_upgrade->id);
                    $data['cancel_url'] = url('/user/purchase-plan');

                    $total = 0;
                    foreach ($data['items'] as $item) {
                        $total += $item['price']*$item['qty'];
                    }

                    $data['total'] = $total;

                    $response = self::$provider->setExpressCheckout($data);
                   
                     PendingTransactions::where('id', $plan_upgrade->id)
                                        ->update(['payment_data' => json_encode($response),'paypal_express_data' => json_encode($data)]);
                 
                    return redirect($response['paypal_link']);
            }

            if ($request->steps_plan_payment == 'bitaps') {
                $title=trans('register.bitaps_payment');
                $sub_title=trans('register.bitaps_payment');
                $base=trans('register.bitaps_payment');
                $method=trans('register.bitaps_payment');
                
            
                $url ='https://api.bitaps.com/btc/v1//create/payment/address' ;
                $payment_details = $this->url_get_contents($url, [
                                            'forwarding_address'=>$payment_gateway->btc_address,
                                            'callback_link'=>url('bitaps/paymentnotify'),
                                            'confirmations'=>3
                                        ]);

                $conversion = $this->url_get_contents('https://api.bitaps.com/market/v1/ticker/btcusd', false);

                $package_amount = $package->amount/$conversion->data->last;

                $trans_id=$plan_upgrade->id;


                



                PendingTransactions::where('id', $plan_upgrade->id)->update(['payment_code'=>$payment_details->payment_code,'invoice'=>$payment_details->invoice,'payment_address'=>$payment_details->address,'payment_data'=>json_encode($payment_details)]);

                return view('app.user.product.planbitaps', compact('title', 'sub_title', 'base', 'method', 'payment_details', 'data', 'package_amount', 'setting', 'trans_id'));
            }
            
            /**
             * If request has payment mode as voucher, will check against the vouchers for validation
             * @var [type]
             */

            if ($request->steps_plan_payment == 'rave') {
                $rave_call= Rave::initialize(url('user/raveplanpurchase'));
                $pay_data=json_decode($rave_call, true);

                  PendingTransactions::where('id', $plan_upgrade->id)->update(['rave_ref_id' =>$pay_data['txref'],'payment_data' => json_encode($rave_call)]);
                  die();
            }

          

            if ($request->steps_plan_payment == 'skrill') {
                echo '  <form id="skrill" action="https://pay.skrill.com" method="post" > 
                         <input type="hidden" name="pay_to_email" value="'.$payment_gateway->skrill_mer_email.'">
                        <input type="hidden" name="return_url" value="'.url('user/skrillplansuccess', $plan_upgrade->id).'" >
                        <input type="hidden" name="status_url" value="'.url('user/skrillplan-status', $plan_upgrade->id).'">
                        <input type="hidden" name="language" value="EN">
                        <input type="hidden" name="amount" value="'.$package->amount.'">
                        <input type="hidden" name="currency" value="USD">

                        <input type="hidden" name="pay_from_email" value="'.Auth::user()->email.'">
                        <input type="hidden" name="firstname" value="'.Auth::user()->name.'">
                        <input type="hidden" name="lastname" value="'.Auth::user()->lastname.'">

                        <input type="hidden" name="rec_amount" value="'.$package->amount.'">
                        <input type="hidden" name="rec_start_date" value="'.date('d/m/Y', strtotime('+30 days')).'">
                        <input type="hidden" name="rec_end_date" value="'.date('d/m/Y', strtotime('+20 years')).'">
                        <input type="hidden" name="rec_period" value="1">
                        <input type="hidden" name="rec_cycle" value="month">
                        <input type="hidden" name="rec_status_url" value="'.url('rec-skrill-status').'">
                        <input type="hidden" name="rec_status_url2" value="'.url('rec-skrill-status2').'">


                        <input type="hidden" name="detail1_description" value="Description:'.Config('APP_NAME').'">
                        <input type="hidden" name="detail1_text" value="'.Config('APP_NAME') .' : Subscription payment ">
                         ';
                echo '  </form>';

                echo '  <script type="text/javascript">';
                echo "   document.forms['skrill'].submit()";
                echo '  </script>';

                die();
            }

            if ($request->steps_plan_payment == 'ipaygh') {
                echo '<form id="ipaygh" method=POST action="https://community.ipaygh.com/gateway">
                        <input type=hidden name=merchant_key value="'.$payment_gateway->ipaygh_merchant_key.'" />
                        <input type=hidden name=invoice_id value="'.$orderid.'" />
                        <input type=hidden name=success_url value="'.url('user/ipayghplansuccess/'.$plan_upgrade->id, $orderid).'" />
                        <input type=hidden name=cancelled_url value="'.url('user/ipayghplancanceled/'.$plan_upgrade->id, $orderid).'" />
                        <input type=hidden name=deferred_url value="'.url('user/ipayghplansuccess/'.$plan_upgrade->id, $orderid).'" />
                        <input type=hidden name=ipn_url value="'.url('user/ipayghplanipn').'" />
                        <input type=hidden name=currency value="GHS" />
                        <input type=hidden name=total value="16" /> 
                    </form>';

                echo '  <script type="text/javascript">';
                    echo "  document.forms['ipaygh'].submit()  ";
                    echo '  </script>';

                    die();
            }

            if ($request->steps_plan_payment == 'authorize') {
                $expiry = date('Y-m', strtotime($request->year.'-'.$request->month));
                $amount = Packages::where('id', $request->package)->value('amount') ;
                $invoice = time() ;
                $responsechargecard = AuthorizePaymentModel::chargeCreditCard($expiry, $fee, $invoice, $request) ;
                if (!$responsechargecard) {
                    return redirect('register');
                }
                $item->paypal_recurring_responce = $responsechargecard->getSubscriptionId() ;
                $item->save();
            }
           

            if ($request->steps_plan_payment == 'voucher') {
                $voucher_total = $package->amount;
                foreach ($request->voucher as $key => $vouchervalue) {
 // echo "1<br>";
                   // echo "voucher".$vouchervalue."<br>";
                        
                     $voucher = Voucher::where('voucher_code', $vouchervalue)->first();
                     $voucher_total= $voucher_total-$voucher->balance_amount ;
                         
                    if ($voucher_total <=0) {
                        $flag = true;
                    }
                }
                // dd("Asd");

                if ($flag) {
                     Ranksetting::StockiestBonus($sponsor_id,Auth::user()->id,$request->plan);
                     $package_amount = $package->amount;
                    foreach ($request->voucher as $key => $vouchervalue) {
                         // echo "2<br>";
                         //  echo "voucher".$vouchervalue."<br>";
                         $voucher = Voucher::where('voucher_code', $vouchervalue)->first();
                        if ($package_amount > $voucher->balance_amount) {
                                 $package_amount = $package_amount -  $voucher->balance_amount ;
                                 $used_amount =  $voucher->balance_amount;
                                 $voucher->balance_amount = 0 ;
                                 $voucher->save();
                        } else {
                                   $used_amount =  $voucher->balance_amount - $package_amount;
                                   $voucher->balance_amount = $used_amount;
                                   $voucher->save();
                        }
                    }
                    // dd("asdf");
                }
            }


            if ($request->steps_plan_payment == 'voucher') {
                foreach ($request->voucher as $key => $vouchervalue) {
                    // echo "3<br>";
                               
                      // echo "voucher".$vouchervalue."<br>";
                       $used_total=VoucherHistory::where('voucher_id', '=', $vouchervalue)->value('used_amount');
                    if (isset($used_total)) {
                        // echo "1st";
                        $total = Voucher::where('voucher_code', $vouchervalue)->value('total_amount');
                        $amount = $total-$used_total;
                    } else {
                      // echo "2nd";
                        $balence = Voucher::where('voucher_code', $vouchervalue)->value('balance_amount');
                        $total = Voucher::where('voucher_code', $vouchervalue)->value('total_amount');
                        $amount=$total -$balence;
                    }
                         // echo "amount".$amount."<br>";
                         
                            VoucherHistory::create([
                            'voucher_id'=>$vouchervalue,
                            'user_id' =>Auth::user()->id,
                            'used_by'=>Auth::user()->id,
                            'used_for'=> "plan_purchase",
                            'used_amount'=>$amount,
                            ]) ;
                }

                PendingTransactions::where('id', $plan_upgrade->id)->update(['payment_status' => 'complete']);
                // dd("Ad");
            }

            if ($flag) {
                $title=trans('register.payment_complete');
                  $sub_title=trans('register.payment_complete');
                  $base=trans('register.payment_complete');
                  $method=trans('register.payment_complete');
                $purchase_id=$plan_upgrade->id;
                return view('app.user.product.purchasecomplete', compact('title', 'sub_title', 'base', 'method', 'purchase_id'));
            } else {
                Session::flash('flash_notification', array('message'=>trans('register.plan_purchase_failure'),'level'=>'error'));
                return redirect()->back();
            }
        }
    }
    public function onlinestore()
    {
        $title="Online Store";
        $sub_title="Online Store";
        $method="Online Store";
        $product=Product::select('id', 'name', 'price', 'image', 'quantity')
                    ->where('product.quantity', '>', 0)
                    ->get();
        $cart= productaddcart::join('product', 'product.id', '=', 'productaddcart.product_id')
                    ->where('product.quantity', '>', 0)
                    ->where('productaddcart.user_id', '=', Auth::user()->id)
                    ->select('product.*', 'productaddcart.*')
                    ->get();
        $cart_amount = productaddcart::join('product', 'product.id', '=', 'productaddcart.product_id')
                    ->select(DB::raw('sum(productaddcart.cart_quantity*product.price) AS total_price'))
                    ->where('productaddcart.order_status', '=', 'pending')
                    ->where('productaddcart.user_id', '=', Auth::user()->id)
                    ->get();

        $cart_amount = $cart_amount[0]->total_price;
        $products = productaddcart::join('product', 'product.id', '=', 'productaddcart.product_id')
                                ->select('product.name', 'productaddcart.cart_quantity', 'productaddcart.id')
                                ->where('productaddcart.order_status', '=', 'pending')
                                ->where('productaddcart.user_id', '=', Auth::user()->id)
                                ->get();

        return view('app.user.product.onlinestore', compact('title', 'sub_title', 'method', 'product', 'cart', 'cart_amount', 'products'));
    }
    public function add_to_cart(Request $request)
    {
        if ($request->cart_quantity < 1) {
            Session::flash('flash_notification', array('level' => 'danger', 'message' => 'Please select a count greater than 1'));
            return redirect()->back();
        }
        $product=product::where('id', $request->product_id)
                    ->whereNull('deleted_at')
                    ->select('id', 'name', 'image', 'price', 'quantity', 'description', 'status')
                    -> get();

        $productaddcart = productaddcart::firstOrNew(['product_id' => $request->product_id,'user_id'=>Auth::user()->id]);
        $productaddcart->cart_quantity =$request->cart_quantity ;
        $productaddcart->save();
        $reponse = productaddcart::join('product', 'product.id', '=', 'productaddcart.product_id')
                    ->select('product.name', 'product.image', 'product.status', 'product.price', 'productaddcart.*')
                    ->where('productaddcart.user_id', '=', Auth::user()->id)
                    ->get();
        Session::flash('flash_notification', array('level' => 'success', 'message' => 'Product added successfully'));
        return redirect()->back();
    }
    public function shipping(Request $request)
    {
     
        $title = "Shipping Address";
        $sub_title = "Shipping Address";
        $method = "Shipping Address";
        if (isset($request->option)) {
            $title = "Order Confirmation";
            $Country = ShoppingCountry::get();
            $state = ShoppingCountry::where('shopping_country.iso_code_2', "MY")
             ->join('shopping_zone', 'shopping_country.country_id', '=', 'shopping_zone.country_id')
             ->get();
            $amount = productaddcart::join('product', 'product.id', '=', 'productaddcart.product_id')
            ->select(DB::raw('sum(productaddcart.cart_quantity*product.price) AS total_price'), 'cart_quantity', 'product.name')
            ->where('productaddcart.order_status', '=', 'pending')
            ->where('productaddcart.user_id', '=', Auth::user()->id)
            ->get();
          // $current_package = ProfileInfo::where('user_id','=',Auth::user()->id)->value('package');
          // $package = Packages::find($current_package);
            $price = $amount[0]->total_price;
            $quantity = $amount[0]->cart_quantity;
            $balace_ewallet = Balance::where('user_id', '=', Auth::user()->id)->value('balance');
            $option = $request->option;
            $profile_info = ProfileInfo::where('user_id', '=', Auth::user()->id)->select('country', 'state', 'city', 'zip', 'address1', 'address2')->first();
            $default_details = User::where('id', '=', Auth::user()->id)->first();
            $country = $default_details->shipping_country;
            $user_state = $default_details->shipping_state;
            $street = $profile_info->city;
            $zip = $profile_info->zip;
            $address1 = $profile_info->address1;
            $address2 = $profile_info->address2;
            $full_name = $default_details->name;
            $def_email = $default_details->email;
            $def_mob = $default_details->mobile;
            if (is_numeric($country)) {
                $country = ShoppingCountry::where('country_id', $country)->value('name');
            } else {
                $country = $country;
            }

            if (is_numeric($user_state)) {
                $state = ShoppingZone::where('zone_id', '=', $user_state)->select('name', 'shipping_cost')->first();
            } else {
                $state = ShoppingZone::where('name', '=', $user_state)->select('name', 'shipping_cost')->first();
            }

            $countries = ShoppingCountry::all();
            $statess = ShoppingZone::where('country_id', '=', 129)->get();
            $shipping_state_cost =$state->shipping_cost;
            return view('app.user.product.shippingaddress', compact('title', 'sub_title', 'method', 'Country', 'state', 'quantity', 'balace_ewallet', 'option', 'country', 'user_state', 'street', 'zip', 'countries', 'address1', 'address2', 'statess', 'full_name', 'def_email', 'def_mob', 'shipping_state_cost', 'price'));
        } else {
            Session::flash('flash_notification', array('level'=>'danger','message'=>'Please Select an Option'));
            return Redirect::back();
        }
    }
    public function saveShippingRequest($id, $fname, $email, $contact, $country, $state, $city, $address, $pincode, $option, $ic_number, $payment, $my_feed_back, $total_amount, $shipping_amount)
    {

        $tracking = DeliveryTrackingDetails::create([
        'status' =>'shipped',
        ]);

        if ($payment == 'bank_transfer') {
            $shipping_status = 'pending';
            $invoice_status = 'Pending';
        } else {
            $shipping_status = 'shipped';
            $invoice_status = 'Paid';
        }
        $address_details=shippingaddress::create([
                      'user_id'=>$id,
                      'payment'=>$payment,
                      'tracking_id' => $tracking->id,
                      'option_type' => $option,
                      'fname'=>$fname,
                      // 'lname'=>$lname,
                      'email'=>$email,
                      'contact'=>$contact,
                      'ic_number'=>$ic_number,
                      'country'=>$country,
                      'state'=>$state,
                      'city'=>$city,
                      'address'=>$address,
                      'pincode'=>$pincode,
                      'status'=>$shipping_status,
                      'my_feed_back'=>$my_feed_back,
                    ]);
        $product = product::join('productaddcart', 'product.id', '=', 'productaddcart.product_id')
                  ->select('productaddcart.*', 'product.*')
                  ->where('productaddcart.order_status', '=', 'pending')
                  ->where('productaddcart.user_id', '=', Auth::user()->id)
                  ->whereNull('productaddcart.deleted_at')
                  ->get();
        $sum=0;
        $total_count=0;
        $total_pv=0;

        foreach ($product as $key => $value) {
            $sum =$sum +($value->price*$value->cart_quantity);
            $total_count=$total_count + ($value->cart_quantity);
            $total_pv=$total_pv + ($value->pvprice*$value->cart_quantity);
        }
        $sum=$sum+$shipping_amount;
        $order_table = order::create([
        'user_id'=>Auth::user()->id,
        'total_amount'=>$sum,
        'total_count'=>$total_count,
        'total_pv'=>$total_pv,
        'shipping_id'=>$address_details->id,
        ]);
        $order=$order_table->id;
        shippingaddress::where('id', $address_details->id)->update(['order_id'=>$order]);
        $per_shipping_amount = $shipping_amount/$total_count;
        foreach ($product as $key2 => $value) {
            orderproduct::create([
            'order_id'=>$order,
            'product_id'=>$value->product_id,
            'user_id'=>Auth::user()->id,
            'count'=>$value->cart_quantity,
            'amount'=>($value->cart_quantity)*($value->price)+($value->cart_quantity)*$per_shipping_amount,
            'pv'=>($value->cart_quantity)*($value->pvprice),
            ]);
        }
        $date = date('Ymd');
        $count = InvoiceTable::whereDate('created_at', '=', date('Y-m-d'))->count();
        $count = $count + 1;
        InvoiceTable::create([
        'user_id'=>Auth::user()->id,
        'order_id'=>$order,
        'invoice_id'=>'INV-'.$date.'-'.$count,
        'status'=>$invoice_status,
        ]);

        $list_orders = orderproduct::where('order_id', '=', $order)->get();
        foreach ($list_orders as $key => $list_order) {
            $total_product_count = product::where('id', '=', $list_order->product_id)->value('quantity');
            $pro_purchased_count = $list_order->count;
            if ($total_product_count >=  $pro_purchased_count) {
                $dec=$total_product_count - $pro_purchased_count;
                product::where('id', '=', $list_order->product_id)->update(['quantity'=>$dec]);
            } else {
                 product::where('id', '=', $list_order->product_id)->update(['quantity'=>0]);
            }
        }
  
     
        productaddcart::where('user_id', Auth::user()->id)->where('order_status', '=', "pending")->update(['order_status'=>'complete']);
        $current_date=date('Y-m-d H:i:s');

        productaddcart::where('user_id', '=', Auth::user()->id)->update(['deleted_at'=>$current_date]);

                
        $app_settings = AppSettings::find(1);

        $user_details = User::where('id', Auth::user()->id)->first();
        $shippingaddress = shippingaddress::where('id', $address_details->id)->first();

        $product_details = orderproduct::join('product', 'product.id', '=', 'orderproduct.product_id')->where('orderproduct.order_id', $order)->select('product.name', 'orderproduct.amount', 'orderproduct.count', 'product.price')->get();


        $order_details = order::where('id', $order)->select('total_amount', 'total_count')->get();
        $invoice_id = InvoiceTable::where('order_id', $order)->pluck('invoice_id');
       
        return $address_details;
    }

    public function shippingcreation(Request $request)
    {

        $product = product::join('productaddcart', 'product.id', '=', 'productaddcart.product_id')
                                    ->select('productaddcart.*', 'product.*')
                                    ->where('productaddcart.order_status', '=', 'pending')
                                    ->where('productaddcart.user_id', '=', Auth::user()->id)
                                    ->whereNull('productaddcart.deleted_at')
                                    ->get();

        foreach ($product as $key => $value) {
            if ($value->cart_quantity > $value->quantity) {
                return Redirect::action('user\productController@onlinestore')->withErrors('Insufficient Quantity');
            }
        }
        $product_quantity=$product[0]->cart_quantity;
        $product_price=$product[0]->price;
                         
        if ($request->option == 1) {
            if ($request->radio_address == 1) {
                $data = array();
                $data['fname']=$request->fname1;
                $data['phone'] = $request->contact1;
                $data['email'] = $request->email1;
                $data['country'] = $request->country1;
                $data['state'] = $request->state1;
                $data['city'] = $request->city1;
                $data['address'] = $request->address1;
                $data['zip'] = $request->pincode1;
            } elseif ($request->radio_address == 2) {
                $data = array();
                $data['fname']=$request->fname2;
                // $data['lname'] = $request->lname2;
                $data['phone'] = $request->contact2;
                $data['email'] = $request->email2;
                $data['country'] = $request->country2;
                $data['state'] = $request->state2;
                $data['city'] = $request->city2;
                $data['address'] = $request->address2;
                $data['zip'] = $request->pincode2;
            }

            if (is_numeric($data['country'])) {
                $scountry = ShoppingCountry::where('country_id', $data['country'])->value('name');
            } else {
                $scountry = $data['country'];
            }
            if (is_numeric($data['state'])) {
                $sstate = ShoppingZone::where('zone_id', '=', $data['state'])->select('name', 'shipping_cost')->first();
            } else {
                $sstate = ShoppingZone::where('name', '=', $data['state'])->select('name', 'shipping_cost')->first();
            }
            $data['shipping_country'] = $scountry ;
            $data['shipping_state'] = $sstate->name ;



            if (is_numeric($data['state'])) {
                $shipping_cost = ShoppingZone::where('zone_id', '=', $data['state'])->value('shipping_cost');
                $new_shipping_cost = $request->quantity*$shipping_cost;
            } else {
                $shipping_cost = ShoppingZone::where('name', '=', $data['state'])->value('shipping_cost');
                $new_shipping_cost = $request->quantity*$shipping_cost;
            }
            $request->total_amount = $request->PAYMENTREQUEST_0_ITEMAMT+$new_shipping_cost;


            $messages = [
            'unique'    => 'The :attribute already existis in the system',
            'exists'    => 'The :attribute not found in the system',
            ];
            $validator = Validator::make($data, [
            
            'fname' => 'required',
            // 'lname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'zip' => 'required',
            
            ]);

            if ($validator->fails()) {
                return Redirect::action('user\productController@onlinestore')->withErrors($validator);
            }
        }

        $total_price=productaddcart::join('product', 'product.id', '=', 'productaddcart.product_id')
                      ->select(DB::raw('sum(productaddcart.cart_quantity*product.price) AS total_price'))
                      ->where('productaddcart.order_status', '=', 'pending')
                      ->where('productaddcart.user_id', '=', Auth::user()->id)
                      ->get();
        $select_payment=$request->payment;
        $total_price = $request->total_amount;
        $request->ic_number = 1;

        if ($request->payment == 'ewallet') {
            $balance=Balance::where('user_id', Auth::user()->id)->value('balance');
            if ($balance>=$request->total_amount) {
                Balance::where('user_id', Auth::user()->id)->decrement('balance', $request->total_amount);
            } else {
                Session::flash('flash_notification', array('level' => 'danger', 'message' => "Insufficient fund !!!"));
                return Redirect::action('user\productController@onlinestore');
            }

            if ($request->option == 2) {
                $data = User::join('profile_infos', 'profile_infos.user_id', '=', 'users.id')
                    ->where('users.id', '=', Auth::user()->id)
                    ->select('users.name', 'users.lastname', 'users.email', 'profile_infos.*')->first();

                $country = ShoppingCountry::where('country_id', $scountry)->value('name');
                // dd($scountry);
                $state = ShoppingZone::where('zone_id', '=', $sstate)->value('name');

                if ($state == null) {
                    $state = ShoppingZone::where('name', '=', $sstate)->value('name');
                }
                if (is_numeric($data['state'])) {
                    $shipping_cost = ShoppingZone::where('zone_id', '=', $data['state'])->value('shipping_cost');
                    $new_shipping_cost = $request->quantity*$shipping_cost;
                } else {
                    $shipping_cost = ShoppingZone::where('name', '=', $data['state'])->value('shipping_cost');
                    $new_shipping_cost = $request->quantity*$shipping_cost;
                }
                self::saveShippingRequest(Auth::user()->id, $data['fname'], $data['email'], $$data['phone'], $data['shipping_country'], $data['shipping_state'], $data['city'], $data['address'], $data['zip'], $request->option, $data->passport, $request->payment, $request->my_feed_back1, $request->PAYMENTREQUEST_0_ITEMAMT, $new_shipping_cost);
            } else {
                self::saveShippingRequest(Auth::user()->id, $data['fname'], $data['email'], $data['phone'], $data['shipping_country'], $data['shipping_state'], $data['city'], $data['address'], $data['zip'], $request->option, $request->ic_number, $request->payment, $request->my_feed_back1, $request->PAYMENTREQUEST_0_ITEMAMT, $new_shipping_cost);
            }

            $package = ProfileInfo::where('user_id', Auth::user()->id)->value('package');
            $package = Packages::find($package);
            $id = shippingaddress::where('user_id', Auth::user()->id)->max('id');
            $sponsor_id = Sponsortree::where('user_id', Auth::user()->id)->value('sponsor');
            $sponsor_pack = ProfileInfo::where('user_id', $sponsor_id)->value('package');
            $my_pack = ProfileInfo::where('user_id', Auth::user()->id)->value('package');
            return  redirect("user/orderconfirm/".Crypt::encrypt($id).'/'.$select_payment);
        }
    }
    public function orderconfirm($idencrypt, $payment)
    {
      //dd(Crypt::decrypt($idencrypt));
        $title="Order Confirmation";
        $sub_title="Order Confirmation";
        $method="Order Confirmation";
        $user=shippingaddress::where('id', '=', Crypt::decrypt($idencrypt))->first();
        //dd($user);
        $country  = $user->country;
        $fname  = $user->fname;
        $lname  = $user->lname;
        $state  = $user->state;
        $contact  = $user->contact;
        $email  = $user->email;
        $address  = $user->address;
        $city  = $user->city;

        $max_id=order::where('user_id', Auth::user()->id)->max('id');
        $total = order::where('user_id', Auth::user()->id)
                      ->where('id', $max_id)->get();


        Session::flash('flash_notification', array('level' => 'success', 'message' =>"Your order has been placed successfully"));
        
        return view('app.user.product.orderconfirm', compact('title', 'sub_title', 'method', 'user', 'country', 'fname', 'total', 'lname', 'state', 'contact', 'email', 'address', 'city'));
    }


 



    public function sales()
    {

        $title="My Order";
        $sub_title="My Order";
        $method="My Order";
        $cart = order::where('order.user_id', Auth::user()->id)
        ->join('invoice_table', 'invoice_table.order_id', '=', 'order.id')
        ->select('invoice_table.id', 'invoice_table.invoice_id', 'invoice_table.created_at', 'order.total_amount', 'invoice_table.bank_slip', 'invoice_table.status', 'invoice_table.payment_details')
        ->get();

       
        return view('app.user.product.sales', compact('title', 'sub_title', 'method', 'cart', 'shipping_cost'));
    }


    public function viewmore($id)
    {
        $title="view order";
        $base="view order";
        $method="view order";
        $sub_title="view order";
       
        $product=InvoiceTable::where('order_id', '=', $id)->select('*')->paginate(5);
        $product_list=orderproduct::join('product', 'orderproduct.product_id', '=', 'product.id')
                                ->select('product.name', 'orderproduct.order_id', 'orderproduct.count')
                                ->where('orderproduct.order_id', '=', $id)
                                ->get();

       
        return view('app.user.product.viewmore', compact('title', 'product', 'category', 'product_list', 'base', 'method', 'sub_title'));
    }
    public function deletecart($id)
    {
        $product=productaddcart::where('id', $id)->delete();
       
        Session::flash('flash_notification', array('level'=>'danger','message'=>'Product Removed From Cart'));

        return  redirect()->back();
    }


    public function purcompletestatus(Request $request, $paymentid)
    {

        $item = PendingTransactions::where('id', $paymentid)->first();

        if (is_null($item)) {
            return response()->json(['valid' => false]);
        } elseif ($item->payment_status == 'finish') {
            return response()->json(['valid' => true,'status'=>$item->payment_status,'id'=>Crypt::encrypt($item->id)]);
        } else {
             return response()->json(['valid' => true,'status'=>$item->payment_status,'id'=>null]);
        }
        
        return response()->json(['valid' => false]);
    }

   

    public function purcompleteview($idencrypt)
    {
        $title=trans('products.purchase_success');
        $sub_title=trans('products.purchase_success');
        $base=trans('products.purchase_success');
        $method=trans('products.purchase_success');
      
        return view('app.user.product.purchasesuccess', compact('title', 'sub_title', 'base', 'method'));
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


    public function planpurchasepaypal(Request $request, $id)
    {

          $response = self::$provider->getExpressCheckoutDetails($request->token);
          $item = PendingTransactions::find($id);
          $item->payment_response_data = json_encode($response);
          $item->save();
          $express_data=json_decode($item->paypal_express_data, true);
          $response = self::$provider->doExpressCheckoutPayment($express_data, $request->token, $request->PayerID);

        if ($response['ACK'] == 'Success') {
            $item->payment_status='complete';
            $item->save();
            $purchase_id=$item->id;
            $title=trans('products.payment_complete');
            $sub_title=trans('products.payment_complete');
            $base=trans('products.payment_complete');
            $method=trans('products.payment_complete');
            return view('app.user.product.purchasecomplete', compact('title', 'sub_title', 'base', 'method', 'purchase_id'));
        } else {
            Session::flash('flash_notification', array('level' => 'danger', 'message' => trans('products.error_in_payment')));
            return Redirect::to('user/purchase-plan');
        }
    }

    public function raveplanpurchase(Request $request)
    {

        $resp = Rave::verifyTransaction(request()->txref);
 
        if ($resp <> null) {
            $ref_id=$resp->data->txref;
            $rave_det=PendingTransactions::where('rave_ref_id', $ref_id)
                                             ->first();
            $rave_det->payment_response_data = json_encode($resp);
            $rave_det->save();
            $message=$resp->data->status;
         
            if ($resp->status == "success" && $message == 'successful' && $rave_det->payment_status == 'pending') {
                PendingTransactions::where('rave_ref_id', $ref_id)->update(['payment_status' => 'complete']);
                $purchase_id=$rave_det->id;
                $title=trans('products.payment_complete');
                $sub_title=trans('products.payment_complete');
                $base=trans('products.payment_complete');
                $method=trans('products.payment_complete');
                return view('app.user.product.purchasecomplete', compact('title', 'sub_title', 'base', 'method', 'purchase_id'));
            } else {
                return redirect('user/purchase-plan')->withErrors([trans('products.error_in_payment')]);
            }
        } else {
            return redirect("user/purchase-plan")->withErrors([trans('products.error_in_payment')]);
        }
    }

    public function skrillplansuccess(Request $request, $id)
    {
          
        $item = PendingTransactions::find($id);
        $item->payment_response_data = json_encode($request->all());
        $item->payment_status  ='complete';
        $item->save();
        $purchase_id=$item->id;
        $title=trans('products.payment_complete');
        $sub_title=trans('products.payment_complete');
        $base=trans('products.payment_complete');
        $method=trans('products.payment_complete');
        return view('app.user.product.purchasecomplete', compact('title', 'sub_title', 'base', 'method', 'purchase_id'));
    }

     

    public function ipayghplansuccess(Request $request, $id)
    {

        $item = PendingTransactions::find($id);
        $item->payment_response_data = json_encode($request->all());
        $item->payment_status  ='complete';
        $item->save();
        $purchase_id=$item->id;
        $title=trans('products.payment_complete');
        $sub_title=trans('products.payment_complete');
        $base=trans('products.payment_complete');
        $method=trans('products.payment_complete');
        return view('app.user.product.purchasecomplete', compact('title', 'sub_title', 'base', 'method', 'purchase_id'));
    }

    public function ipayghplancanceled(Request $request)
    {

        return redirect('user/purchase-plan')->withErrors([trans('products.error_in_payment')]);
        return redirect("user/purchase-plan");
    }

    public function ipayghplanipn(Request $request)
    {

        dd($request->all());
    }


       public function repurchase()

    {   
        $title     = 'Product Repurchase';
        $sub_title ='Product Repurchase';
        $base      = 'Product Repurchase';
        $method    ='Product Repurchase';
        $packages=Packages::where('id','>',1)->pluck('package','id');
        // $packages=Packages::where('id','>',1)->get();
        return view('app.user.product.repurchase', compact('title', 'sub_title', 'base', 'method','packages'));

    }
    public function repurchaseuser(Request $request)

    {   
                   
                $user_id=User::where('username',$request->key_user_hidden)->value('id');
               
                // $cur_package=ProfileModel::where('user_id',$user_id)->value('package');
                $prev=PurchaseHistory::where('user_id',$user_id)->max('id');
$prev_pack=PurchaseHistory::where('id',$prev)->value('package_id');
$prev_pack_sv=Packages::where('id',$prev_pack)->value('sv');
                $package=Packages::find($request->package);
                $today = date('Y-m-d H:i:s'); 
                $daystosum = 30; 
                $next_purchase_date = date('Y-m-d H:i:s', strtotime($today.' + '.$daystosum.' days'));// dd($package);
                $previous=PurchaseHistory::where('user_id',$user_id)->max('id');
                $previous_pack=PurchaseHistory::where('id',$previous)->value('package_id');
                $previous_packge_sv=Packages::where('id',$previous_pack)->value('sv');
                $purchase_id= PurchaseHistory::create([
                                  'user_id' =>$user_id,
                                  'purchase_user_id' =>Auth::user()->id,
                                  'package_id' =>$package->id,
                                  'pv' => $package->sv,
                                  'count' =>1,
                                  'total_amount' =>$package->amount,
                                  'pay_by' =>"user",
                                  'sales_status'=>"yes",
                                  'rs_balance' =>$package->amount,
                                  'purchase_type' => "user_products_purchased",
                                  'next_purchase_date'=>$next_purchase_date,
                            ]);



///////////////
//binary pending
          $pendings=PendingCommission1::where('type','pending')->where('give_sp_cm','=',0)->pluck('user_id');
          $pendings=$pendings->toArray();
          $test = in_array($user_id, $pendings);
          if($test == true)
          {
            foreach ($pendings as $key => $value) 
            { 
              $sponsor=Sponsortree::where('user_id',$value)->value('sponsor');
              $s_id=PurchaseHistory::where('user_id',$sponsor)->max('id');
              $sponsor_pack_sv=PurchaseHistory::where('id',$s_id)->value('pv');
              if($sponsor_pack_sv >= 51)
              {
                if($user_id == $value)
                {
                  $sponsor=Sponsortree::where('user_id',$value)->value('sponsor');
                  SponsorCommission::sponsorCommission($value,$package->id,$prev_pack_sv,$sponsor);
                  PendingCommission1::where('user_id','=',$value)->update(['type'=>'receve','give_sp_cm'=>1]);
                }
              } 
            }
          }
          // else
          // {
                    $total_sv=PurchaseHistory::where('user_id',$user_id)->sum('pv');       
                     if($total_sv <=816)
                    {
                        $sv=$package->sv;
                        $sponsor=Sponsortree::where('user_id',$user_id)->value('sponsor');
                        SponsorCommission::sponsorCommission($user_id,$sv,$prev_pack_sv,$sponsor);
                    }
                    else
                    {                                    
                        $prev=PurchaseHistory::where('user_id',$user_id)->max('id');
                        $prev_sv=PurchaseHistory::where('id','!=',$prev)->where('user_id',$user_id)->sum('pv');
                        $sv=816-$prev_sv;
                        if($sv > 1)
                        {
                            $sponsor=Sponsortree::where('user_id',$user_id)->value('sponsor');
                            SponsorCommission::sponsorCommission($user_id,$sv,$prev_pack_sv,$sponsor);
                        }
                    }





            // $sponsor=Sponsortree::where('user_id',$user_id)->value('sponsor');
            // SponsorCommission::sponsorCommission($user_id,$package->id,$prev_pack_sv,$sponsor);
          // }
  

                  

// 
          $binary_pendin=PendingBinaryCommission::where('status','=',0)->where('sponsor_id',$user_id)->max('id');
          $binary_pending=PendingBinaryCommission::where('id','=',$binary_pendin)->get();
          foreach ($binary_pending as $key => $value)
          {
          $a=PurchaseHistory::where('user_id',$value['left_user_id'])->max('id');
          $b=PurchaseHistory::where('user_id',$value['right_user_id'])->max('id');
          $a1=PurchaseHistory::where('id',$a)->value('pv');
          $b2=PurchaseHistory::where('id',$b)->value('pv');
          if($a1 >= 51 && $b2 >=51){
            if($a < $b)
            {
              PointTable::binary($value['right_user_id'], $user_id);
            }
            if($b < $a)
            {
              PointTable::binary($value['left_user_id'], $user_id);
            }
            PendingBinaryCommission::where('sponsor_id','=',$user_id)->update(['status'=>1]);
            }
          }


            
           PointTable::updatePoint($package->sv,$user_id); 

            $sum_pv=PurchaseHistory::where('user_id',$user_id)->sum('pv');

            $rank_id=User::where('id',$user_id)->value('rank_id');

            $next_rank_id=$rank_id+1;

            Ranksetting::RankUpdate1($user_id,$sum_pv,$next_rank_id,$rank_id);

            $sponsor_id=Sponsortree::where('user_id',$user_id)->value('sponsor');

            Ranksetting::StockiestBonus($sponsor_id,$user_id,$package->sv);

            Session::flash('flash_notification', array('level' => 'success', 'message' => trans('Packages purchased'))); 
             return Redirect::back();  

      // }    

  }  


}
