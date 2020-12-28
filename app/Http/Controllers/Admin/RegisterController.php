<?php

namespace App\Http\Controllers\Admin;



use App\AppSettings;

use App\Balance;

use App\Commission;

use App\Country;

use App\Emails;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\RegistersUsers;

use App\LeadershipBonus;

use App\MenuSettings;

use App\Packages;

use App\Transactions;

use App\PaymentType;

use App\PointTable;

use App\ProfileInfo;

use App\PurchaseHistory;

use App\Settings;

use App\Sponsortree;

use App\TempDetails;

use App\Tree_Table;

use App\RsHistory;

use App\ProfileModel;

use App\PaymentGatewayDetails;

use App\User;

use App\Voucher;

use App\PendingTransactions;

use App\SubadminRole;

use App\MyRole;

use Auth;

use CountryState;

use App\Welcome;

use Crypt;

use DB;

use Faker\Factory as Faker;

use Illuminate\Http\Request;

use Mail;

use Redirect;

use Session;

use Validator;

use App\Activity;

use Illuminate\Support\Facades\Hash;

use App\ShoppingCountry;

use App\ShoppingZone;

use App\VoucherHistory;

use Response;

use Stripe\Stripe;

use Stripe\Charge;

use Stripe\Customer;

use Stripe\Account;

use Stripe\Token;

use Srmklive\PayPal\Services\ExpressCheckout;

use App\Models\ControlPanel\Options;

use Rave;

use Artisan;




use App\Jobs\SendEmail;



class RegisterController extends AdminController

{

    /*

    |--------------------------------------------------------------------------

    | Register Controller - Admin

    |--------------------------------------------------------------------------

    |

    | This controller handles registering users for the application and

    | redirecting them to preview screen.

    |

     */

      

    protected static $provider;

   

    /**

     * View registration page.

     *

     * @var placement_id (Encrypted Placement Id) : if placement id is set, registration will be done under the-

     * specified placement id rather than authenticated user.

     * returns view page

     *

     */



    public function __construct()

    {

       

        self::$provider = new ExpressCheckout;

    }



    public function index($placement_id = "")

    {



        $title     = trans('register.register_new_member');

        $sub_title = trans('registration.register');

        $base      = trans('registration.register');

        $method    = trans('registration.register');

        $user_registration = option('app.user_registration');

        /**

         * Checking if the current user permitted for accessing the registration page.

         *

         * @var id : Checks against the specified userid-

         * if status set to no will redirect to dashboard with warning message

         * if status set to yes, will proceed

         */



        $status = MenuSettings::find(1);

        if ($user_registration == 3 || $user_registration == 6) {

            Session::flash('flash_notification', array('level' => 'danger', 'message' => trans('register.permission_denied')));

             return redirect()->back();

        } else {

            if ($placement_id) {



              

                /**

                 * if placement id set ,will decrypt and check in tree_table to find it has vacant positions

                 */



                $placement_id  = urldecode(Crypt::decrypt($placement_id));



                

                

                $place_details = Tree_Table::find($placement_id);

                /**

                 * if no vacant positions available under specified placement id,

                 * redirect back without placement id param

                 */



                if ($place_details->type != 'vaccant') {

                    return redirect()->back();

                }

                $placement_user = User::where('id', $place_details->placement_id)->value('username');

                $leg            = $place_details->leg;

                // dd($leg);

            } else {

                $leg            = null;

                $placement_user = null;

            }



            $user_details = array();

            $user_details = User::where('username', Auth::user()->username)->get();

            

            



            /**

             * Get Countries from mmdb

             * @var [collection]

             */

            $countries = CountryState::getCountries();

            /**

             * [Get States from mmdb]

             * @var [collection]

             */

            $states = CountryState::getStates('US');

            /**

             * Get all packages from database

             * @var [collection]

             */

            $package = Packages::all();

            /**

             * Get joining fee from settings table

             * @var int

             */

            $joiningfee = Settings::value('joinfee');

            /**

             * Get Voucher code from Voucher table

             * @var [type]

             */

            $voucher_code = Voucher::value('voucher_code');

            /**

             * Get all active payment methods from database [payment_type]

             * @var [collection]

             */

            $payment_type = PaymentType::where('status', 'yes')->get();



            $payment_gateway=PaymentGatewayDetails::find(1);

$joiningfee = Packages::value('amount');

            $package_amount=Packages::find(1)->amount;

            /**

             * Generate a random string for the transation password for user

             * to keep in database for future use,

             * @var string

             */

            $transaction_pass = self::RandomString();

            /**

             * returns registration view with provided variables

             */

             $shipping_countries = ShoppingCountry::all();

             $shipping_states = ShoppingZone::where('country_id', '=', 129)->get();

            return view('app.admin.register.index', compact('title', 'sub_title', 'base', 'method', 'requests', 'package', 'countries', 'states', 'user_details', 'placement_user', 'leg', 'joiningfee', 'voucher_code', 'payment_type', 'count', 'transaction_pass', 'shipping_countries', 'shipping_states', 'payment_gateway','package_amount'));

        }

    }



    /**

     * Once the registration form filled, and on submit, this function will handle the process/

     * @param  Request $request , We do not use laravel specific request file to -

     * validate but in controller itself for easy access

     * @return [array]           [this array will contain all values passed from the registration form]

     */

    public function register(Request $request)

    {

      

        /**

         * [$data array to hold specified incming request values]

         * @var array

         */

       



        $data                     = array();

        $data['reg_by']           = $request->payment;

        $data['firstname']        = $request->firstname;

        $data['lastname']         = $request->lastname;

        $data['phone']            = $request->phone;

        $data['email']            = $request->email;

        $data['reg_type']         = $request->reg_type;

        $data['cpf']              = $request->cpf;

        $data['passport']         = $request->passport;

        $data['username']         = $request->username;

        $data['gender']           = $request->gender;

        $data['country']          = $request->country;

        $data['state']            = $request->state;

        $data['city']             = $request->city;

        $data['address']          = $request->address;

        $data['zip']              = $request->zip;

        $data['location']         = $request->location;

        $data['password']         = $request->password;

        $data['transaction_pass'] = $request->transaction_pass;

        $data['sponsor']          = $request->sponsor;

        $data['package']          = $request->package;

        $data['leg']              = $request->leg;

        $data['confirmation_code']              = str_random(40);

        /**

         * if placement user passed from form

         * (Which will be set as hidden input if placement_id specified and if it has vacant positions ),

         * it will set as placement_user, else the placement will be under sponsor

         *

         */

    

        if ($request->placement_user) {

            $data['placement_user'] = $request->placement_user;

        } else {

            $data['placement_user'] = $request->sponsor;

        }



        /**

         * Validation custom messages

         * @var [array]

         */

        $messages = [

            'unique' => 'The :attribute already existis in the system',

            'exists' => 'The :attribute not found in the system',



        ];

        /**

         * Validating the incoming data we stored the $data variable

         * @var [boolean]

         */

        $validator = Validator::make($data, [

            'sponsor'          => 'required|exists:users,username|max:255',

            'placement_user'   => 'sometimes|exists:users,username|max:255',

            'email'            => 'required|unique:pending_transactions,email|email|max:255',

           

            'username'         => 'required|unique:pending_transactions,username|alpha_num|max:255',

            'password'         => 'required|min:6',

            'transaction_pass' => 'required|alpha_num|min:6',

            'package'          => 'required|exists:packages,id',

            'leg'              => 'required',

            'country'          => 'required|country',

        ]);

        /**

         * On fail, redirect back with error messages

         */

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();

        } else {





             /**

             * Checking if sponsor_id exist in users table

             * @var [boolean]

             */

            $sponsor_id = User::checkUserAvailable($data['sponsor']);

            /**

             * Checking if placement_user exist in users table

             * @var [type]

             */

            $placement_id = User::checkUserAvailable($data['placement_user']);

            

            if (!$sponsor_id) {

                /**

                 * If sponsor_id validates as false, redirect back without registering , with errors

                 */

                return redirect()->back()->withErrors([trans('register.username_not_exist')])->withInput();

            }

            if (!$placement_id) {

                /**

                 * If placement_id validates as false, redirect back without registering , with errors

                 */

                return redirect()->back()->withErrors([trans('register.username_not_exist')])->withInput();

            }



            $payment_gateway=PaymentGatewayDetails::find(1);

            $joiningfee = Settings::value('joinfee');

            $orderid = mt_rand();



            if ($request->payment == "rave") {

                if ($joiningfee > 1000) {

                    return redirect()->back()->withErrors([trans('register.the_amount_should_be_between_1_and_100_for_rave_payment')]);

                }

            }





           // if($request->payment == "ewallet"){

           //  $ewallet_user=User::where('username',$request->ewalletusername)->first();

           //  if($ewallet_user == null){

           //    return redirect()->back()->withErrors(['The User doesnt exist']);

           //  }

            

           //  if($request->ewallet_password <> $ewallet_user->transaction_pass){

                

           //      return redirect()->back()->withErrors(['Transaction password is incorrect']);

           //    }





           //  $balance=Balance::where('user_id',$ewallet_user->id)->value('balance');

                 

           //      if($balance < $joiningfee && $ewallet_user->id > 1){

            

           //      return redirect()->back()->withErrors(['Insufficient Balance']);

           //    }

           // }

             $flag=false;



            $register=PendingTransactions::create([

                     'order_id' =>$orderid,

                     'username' =>$request->username,

                     'email' =>$request->email,

                     'sponsor' => $request->sponsor,

                     'request_data' =>json_encode($data),

                     'payment_method'=>$request->payment,

                     'payment_type' =>'register',

                     'amount' => $joiningfee,

                    ]);

      



            if ($request->payment == 'stripe') {

                Stripe::setApiKey($payment_gateway->stripe_secret_key);

                $customer=Customer::create([

                            'email' =>$request->email,

                            'source' =>request('stripeToken')

                            ]);



                $id = $customer->id;

                $Charge=Charge::create([

                            'customer' =>$id,

                            'amount' => $joiningfee * 100,

                            'currency' => 'usd'

                            ]);

               

                if ($Charge->status == "succeeded") {

                    PendingTransactions::where('id', $register->id)->update(['payment_data' =>json_encode($customer),'payment_response_data' =>json_encode($Charge),'payment_status' => 'complete']) ;

                    $flag=true;

                } else {

                    Session::flash('flash_notification', array('level' => 'danger', 'message' => trans('register.error_in_payment')));

                    return Redirect::to('admin/register');

                }

            }

          

     if ($request->payment == 'cheque') {



            $reg_id=$register->id;



            // return view('auth.adminapprove',compact('reg_id'));



            $pending_payments=PendingTransactions::where('id',$reg_id)->get();                                            

          foreach ($pending_payments as $key => $payment) {

            $data=json_decode($payment->request_data, true);

            if ($payment->payment_type == 'register') {

                $sponsor_id = User::checkUserAvailable($payment->sponsor);

                $placement_id = User::checkUserAvailable($data['placement_user']);

                $user_id=User::where('username', $payment->username)->value('id');

                $user_email=User::where('email', $payment->email)->value('id');

                if ($sponsor_id <> null && $placement_id <> null && $user_id == null && $user_email == null) {



                    $userresult = User::add($data, $sponsor_id, $placement_id);

                    if ($userresult) { 

                        $userPackage = Packages::find($data['package']);

                        $sponsorname = $payment->sponsor;

                        $placement_username = $data['placement_user'];

                        $legname = $data['leg'] == "L" ? "Left" : "right";

                        Activity::add("Added user $userresult->username", "Added $userresult->username sponsor as $sponsorname and placement user as $placement_username in $legname Leg", $sponsor_id);

                        Activity::add("Joined as $userresult->username", "Joined in system as $userresult->username sponsor as $sponsorname and placement user as $placement_username in $legname Leg", $userresult->id);

                        Activity::add("Package purchased", "Purchased package - $userPackage->package ", $userresult->id);

                        // $email = Emails::find(1);

                        // $app_settings = AppSettings::find(1);

                        

                        // $data['company_name'] =$app_settings->company_name;

                        // SendEmail::dispatch($data, $data['email'], $data['firstname'], 'register')->delay(now()->addSeconds(5));

                        PendingTransactions::where('id', $payment->id)->update(['payment_status' => 'finish']);

                    }

                }

            }

        }

        return redirect("register/preview/" . Crypt::encrypt($userresult->id));



             // return view('auth.bitaps', compact('title', 'sub_title', 'base', 'method', 'payment_details', 'data', 'package_amount', 'setting', 'trans_id'));

          



            // if ($user_registration <> 6) {

            //      PendingTransactions::where('id', $register->id)->update(['payment_status' => 'complete']) ;

            //      $flag=true;

            // } else {

            //        $flag=true;

            // }

        }



            if ($request->payment == "ewallet") {

                $ewallet_user=User::where('username', $request->ewalletusername)->first();

                $balance=Balance::where('user_id', $ewallet_user->id)->value('balance');

                if ($ewallet_user->id == 1) {

                    PendingTransactions::where('id', $register->id)->update(['payment_status' => 'complete']) ;

                    $flag=true;

                }

                if ($balance>=$joiningfee && $ewallet_user->id > 1) {

                    Balance::where('user_id', $ewallet_user->id)->decrement('balance', $joiningfee);

                    Commission::create([

                      'user_id'=>$ewallet_user->id,

                      'from_id'=>1,

                      'total_amount'=>$joiningfee*-1,

                      'payable_amount'=>$joiningfee*-1,

                      'payment_type'=>'register',

                      'note'           => 'register',

                      ]);

              

                    PendingTransactions::where('id', $register->id)->update(['payment_status' => 'complete']) ;

                    $flag=true;

                }

            }

            /**

             * If request contains payment mode paypal, application will handle the payment process

             * @var [string]

             */

            if ($request->payment == 'paypal') {

                    Session::put('paypal_id', $register->id);



                    $data = [];

                    $data['items'] = [

                        [

                            'name' => Config('APP_NAME'),

                            'price' => $joiningfee,

                            'qty' => 1

                        ]

                    ];



                    $data['invoice_id'] = time();

                    $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";

                    $data['return_url'] = url('/admin/paypal/success', $register->id);

                    $data['cancel_url'] = url('register');



                    $total = 0;

                    foreach ($data['items'] as $item) {

                        $total += $item['price']*$item['qty'];

                    }



                    $data['total'] = $total;



                    $response = self::$provider->setExpressCheckout($data);

                    PendingTransactions::where('id', $register->id)->update(['payment_data' => json_encode($response),'paypal_express_data' => json_encode($data)]);

                 

                    return redirect($response['paypal_link']);

            }



            if ($request->payment == 'bitaps') {

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

                $package_amount = $joiningfee/$conversion->data->last;

                $package_amount=round($package_amount, 8);

                PendingTransactions::where('id', $register->id)->update(['payment_code'=>$payment_details->payment_code,'invoice'=>$payment_details->invoice,'payment_address'=>$payment_details->address,'payment_data'=>json_encode($payment_details)]);

                $trans_id=$register->id;



                return view('app.admin.register.bitaps', compact('title', 'sub_title', 'base', 'method', 'payment_details', 'data', 'package_amount', 'setting', 'trans_id'));

            }

            

            /**

             * If request has payment mode as voucher, will check against the vouchers for validation

             * @var [type]

             */





            if ($request->payment == 'rave') {

                $rave_call= Rave::initialize(url('admin/ravecallback'));

                $pay_data=json_decode($rave_call, true);

                PendingTransactions::where('id', $register->id)->update(['rave_ref_id' =>$pay_data['txref'],'payment_data' => json_encode($rave_call)]);

                die();

            }



       





            if ($request->payment == 'skrill') {

                echo '<form id="skrill" action="https://pay.skrill.com" method="post" > 

                     <input type="hidden" name="pay_to_email" value="'.$payment_gateway->skrill_mer_email.'">

                    <input type="hidden" name="return_url" value="'.url('admin/skrill/success', $register->id).'" >

                    <input type="hidden" name="status_url" value="'.url('admin/skrill-status', $register->id).'">

                    <input type="hidden" name="language" value="EN">

                    <input type="hidden" name="amount" value="'.$joiningfee.'">

                    <input type="hidden" name="currency" value="USD">

                    <input type="hidden" name="pay_from_email" value="'.$request->email.'">

                    <input type="hidden" name="firstname" value="'.$request->firstname.'">

                    <input type="hidden" name="lastname" value="'.$request->lastname.'">



                    <input type="hidden" name="rec_amount" value="'.$joiningfee.'">

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



            if ($request->payment == 'ipaygh') {

                echo '<form id="ipaygh" method=POST action="https://community.ipaygh.com/gateway">

                        <input type=hidden name=merchant_key value="'.$payment_gateway->ipaygh_merchant_key.'" />

                        <input type=hidden name=invoice_id value="'.$orderid.'" />

                        <input type=hidden name=success_url value="'.url('admin/paymentnotify/success/'.$register->id, $orderid).'" />

                        <input type=hidden name=cancelled_url value="'.url('admin/paymentnotify/canceled/'.$register->id, $orderid).'" />

                        <input type=hidden name=deferred_url value="'.url('admin/paymentnotify/success/'.$register->id, $orderid).'" />

                        <input type=hidden name=ipn_url value="'.url('admin/paymentnotify/ipn').'" />

                        <input type=hidden name=currency value="GHS" />

                        <input type=hidden name=total value="16" /> 

                        </form>';



                echo '  <script type="text/javascript">';

                echo "  document.forms['ipaygh'].submit()  ";

                echo '  </script>';



                die();

            }



            if ($request->payment == 'authorize') {

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

            

        

            if ($request->payment == 'voucher') {

                    $voucher_total = $joiningfee;

                    $flag = false ;

                foreach ($request->voucher as $key => $vouchervalue) {

                    if($vouchervalue !== null){

                     $voucher = Voucher::where('voucher_code', $vouchervalue)->first();

                     $voucher_total= $voucher_total-$voucher->balance_amount ;



                    }

                    if ($voucher_total <=0) {

                        $flag = true;

                    }

                }

                    // dd("Asd");



                if ($flag) {

                     $package_amount = $joiningfee;

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





            if ($request->payment == 'voucher' && $flag ==true ) {

                foreach ($request->voucher as $key => $vouchervalue) {

                    $used_total=VoucherHistory::where('voucher_id', '=', $vouchervalue)->value('used_amount');

                    if (isset($used_total)) {

                        $total = Voucher::where('voucher_code', $vouchervalue)->value('total_amount');

                        $amount = $total-$used_total;

                    } else {

                        $balence = Voucher::where('voucher_code', $vouchervalue)->value('balance_amount');

                        $total = Voucher::where('voucher_code', $vouchervalue)->value('total_amount');

                        $amount=$total -$balence;

                    }

                         

                        VoucherHistory::create([

                        'voucher_id'=>$vouchervalue,

                        'used_by'=>Auth::user()->id,

                        'used_for'=> "Registration",

                        'used_amount'=>$amount,

                         ]) ;

                }



                    PendingTransactions::where('id', $register->id)->update(['payment_status' => 'complete']);

                    // dd("Ad");

            }



            if ($flag) {

                $title=trans('register.payment_complete');

                  $sub_title=trans('register.payment_complete');

                  $base=trans('register.payment_complete');

                  $method=trans('register.payment_complete');

                $purchase_id=$register->id;

                return view('app.admin.register.regcomplete', compact('title', 'sub_title', 'base', 'method', 'purchase_id'));

            } else {

                Session::flash('flash_notification', array('message'=>trans('register.payment_failure'),'level'=>'error'));

                return redirect()->back();

            }

        }

    }



    public function preview($idencrypt)

    {

        $title     = trans('register.registration');

        $sub_title = trans('register.preview');

        $method    = trans('register.preview');

        $base      = trans('register.preview');

// echo Crypt::decrypt($idencrypt) ;

// die();

        $userresult      = User::with(['profile_info', 'profile_info.package_detail', 'sponsor_tree', 'tree_table', 'purchase_history.package'])->find(Crypt::decrypt($idencrypt));





        $userCountry = $userresult->profile_info->country;

        if ($userCountry) {

            $countries = CountryState::getCountries();

            $country   = array_get($countries, $userCountry);

        } else {

            $country = "A downline";

        }

        $userState = $userresult->profile_info->state;

        if ($userState) {

            $states = CountryState::getStates($userCountry);

            $state  = array_get($states, $userState);

        } else {

            $state = "unknown";

        }



        $sponsorId       = $userresult->sponsor_tree->sponsor;

        $sponsorUserName = \App\User::find($sponsorId)->username;





        if ($userresult) {

            // dd($user);

            return view('app.admin.register.preview', compact('title', 'sub_title', 'method', 'base', 'userresult', 'sponsorUserName', 'country', 'state', 'sub_title'));

        } else {

            return redirect()->back();

        }

    }



    public function xpress()

    {

        require_once "paypal_functions.php";

        $url = "";

        foreach ($_GET as $key => $value) {

            $url .= $key . '=' . $value . '&';

        }

        $tok      = "&" . $url;

        $resArray = hash_call("GetExpressCheckoutDetails", $tok);

        $ack      = strtoupper($resArray["ACK"]);

        if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {

            $myresult = ConfirmPayment($resArray['L_PAYMENTREQUEST_0_AMT0'], $resArray);

        }

        if ($myresult['PAYMENTINFO_0_PAYMENTSTATUS'] == "Completed") {

            DB::table('temp_details')->where('token', $myresult['TOKEN'])->update(['paystatus' => 1]);

            $temp_details = TempDetails::all()->where('token', $myresult['TOKEN'])->pluck('regdetails');

            $str1         = $temp_details->first();

            $str          = json_decode($str1, true);

            $settings     = Settings::getSettings();

            DB::beginTransaction();

            $userresult = User::create([

                'name'        => $str['L_PAYMENTREQUEST_0_NAME0'],

                'lastname'    => $str['lastname'],

                'email'       => $str['email'],

                'username'    => $str['username'],

                'rank_id'     => '1',

                'register_by' => 'PaypalExpress',

                'password'    => Hash::make($str['password']),

            ]);

            $user_profile = ProfileInfo::create([

                'mobile'   => $str['phone'],

                'passport' => $str['L_PAYMENTREQUEST_0_PASSPORT0'],

                'gender'   => $str['gender'],

                'country'  => $str['country'],

                'state'    => $str['state'],

                'city'     => $str['city'],

                'address1' => $str['address'],

                'zip'      => $str['zip'],

                'package'  => $str['package'],

            ]);

            $sponsor_id   = User::checkUserAvailable($str['sponsor']);

            $placement_id = User::checkUserAvailable($str['placement_user']);



            if (!$sponsor_id) {

                return redirect()->back()->withErrors(['The username not exist'])->withInput();

            }



            $sponsortreeid        = Sponsortree::where('sponsor', $sponsor_id)->orderBy('id', 'desc')->take(1)->value('id');

            $sponsortree          = Sponsortree::find($sponsortreeid);

            $sponsortree->user_id = $userresult->id;

            $sponsortree->sponsor = $sponsor_id;

            $sponsortree->type    = "yes";

            $sponsortree->save();

            $sponsorvaccant = Sponsortree::createVaccant($sponsor_id, $sponsortree->position);

            $uservaccant    = Sponsortree::createVaccant($userresult->id, 0);

            $placement_id   = Tree_Table::getPlacementId($placement_id, $str['leg']);

            $tree_id        = Tree_Table::vaccantId($placement_id, $str['leg']);

            $tree           = Tree_Table::find($tree_id);

            $tree->user_id  = $userresult->id;

            $tree->sponsor  = $sponsor_id;

            $tree->type     = 'yes';

            $tree->save();

            Tree_Table::getAllUpline($userresult->id);

            $key = array_search($sponsor_id, Tree_Table::$upline_id_list);

            if ($key >= 0 && $sponsor_id != 1) {

                if (Tree_Table::$upline_users[$key]['leg'] == 'L') {

                    User::where('id', $sponsor_id)->increment('left_count');

                } elseif (Tree_Table::$upline_users[$key]['leg'] == 'R') {

                    User::where('id', $sponsor_id)->increment('right_count');

                }

            }

            Tree_Table::createVaccant($tree->user_id);

            PointTable::addPointTable($userresult->id);

            User::insertToBalance($userresult->id);

            // $email        = Emails::find(1);

            // $app_settings = AppSettings::find(1);

            // Mail::send('emails.register', ['email' => $email, 'company_name' => $app_settings->company_name, 'firstname' => $str['L_PAYMENTREQUEST_0_NAME0'], 'name' => $str['lastname'], 'login_username' => $str['username'], 'password' => $str['password']], function ($m) use ($str, $email) {

            //     $m->to($str['email'], $str['L_PAYMENTREQUEST_0_NAME0'])->subject('Successfully registered')->from($email->from_email, $email->from_name);

            // });

            DB::commit();

            return redirect("admin/register/preview/" . Crypt::encrypt($userresult->id));

        }

    }



    public function cancelreg()

    {

        dd("cancelreg-RegisterController");

    }



    public function RandomString()

    {

        $characters       = "23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";

        $charactersLength = strlen($characters);

        $randstring       = '';

        for ($i = 0; $i < 11; $i++) {

            $randstring .= $characters[rand(0, $charactersLength - 1)];

        }

        return $randstring;

    }

    public function data(Request $request)

    {

        $key = $request->key;

        if (isset($key)) {

            $voucher = $request->voucher ;

            $vocher=Voucher::where('voucher_code', $key)->get();

            return Response::json($vocher);

        }

    }





    public function paypalsuccess(Request $request, $id)

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

            $title=trans('register.payment_complete');

            $sub_title=trans('register.payment_complete');

            $base=trans('register.payment_complete');

            $method=trans('register.payment_complete');

            $purchase_id=$item->id;

            return view('app.admin.register.regcomplete', compact('title', 'sub_title', 'base', 'method', 'purchase_id'));

        } else {

            Session::flash('flash_notification', array('level' => 'danger', 'message' => trans('register.error_in_payment')));

            return Redirect::to('admin/register');

        }

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







    public function ravecallback(Request $request)

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

                $title=trans('register.payment_complete');

                $sub_title=trans('register.payment_complete');

                $base=trans('register.payment_complete');

                $method=trans('register.payment_complete');

                $purchase_id=$rave_det->id;

                return view('app.admin.register.regcomplete', compact('title', 'sub_title', 'base', 'method', 'purchase_id'));

            } else {

                return redirect('register')->withErrors([trans('register.error_in_payment')]);

                 return redirect("admin/register");

            }

        } else {

            return redirect('register')->withErrors([trans('register.error_in_payment')]);

             return redirect("admin/register");

        }

    }





    public function skrillsuccess(Request $request, $id)

    {



        $item = PendingTransactions::find($id);

        $item->payment_response_data = json_encode($request->all());

        $item->payment_status  ='complete';

        $item->save();

        $title=trans('register.payment_complete');

        $sub_title=trans('register.payment_complete');

        $base=trans('register.payment_complete');

        $method=trans('register.payment_complete');

        $purchase_id=$item->id;

        return view('app.admin.register.regcomplete', compact('title', 'sub_title', 'base', 'method', 'purchase_id'));

    }



    public function ipaysuccess(Request $request, $id)

    {



        $item = PendingTransactions::find($id);

        $item->payment_response_data = json_encode($request->all());

        $item->payment_status  ='complete';

        $item->save();

        $title=trans('register.payment_complete');

        $sub_title=trans('register.payment_complete');

        $base=trans('register.payment_complete');

        $method=trans('register.payment_complete');

        $purchase_id=$item->id;

        return view('app.admin.register.regcomplete', compact('title', 'sub_title', 'base', 'method', 'purchase_id'));

    }



    public function ipaycanceled(Request $request)

    {

        return redirect('admin/register')->withErrors([trans('register.error_in_payment')]);

            return redirect("admin/register");

    }

      public function adminregister()
    {
       

        $title     = "SubAdmin";
        $sub_title = "Create New SubAdmin";
        $base      = "Create New SubAdmin";
        $method    = "Create New SubAdmin";
            
        return view('app.admin.register.adminregister', compact('title', 'sub_title', 'base', 'method'));
    }
     public function admin_register(Request $request){
                // dd($request->all());
                $data = array();
                $data['firstname'] = $request->firstname;        
                $data['phone']     = $request->phone;
                $data['email']     = $request->email;
                $data['username']  = $request->username;
                $data['password']  = $request->password;
                $data['reg_type']  = 'adminregister';


                    
                $messages = [
                    'unique'   => 'The :attribute already existis in the system',
                    'exists'   => 'The :attribute not found in the system',   
                ];
                $validator = Validator::make($data, [
                    'email'    => 'required|unique:users,email|email|max:255',
                    'username' => 'required|unique:users,username|alpha_num|max:255',
                    'password' => 'required|min:6',
                ]);

                if ($validator->fails()) {
                        return redirect()->back()->withErrors($validator)->withInput();
                } else {

                        DB::beginTransaction();
                            $usercode = self::RandomString();
                           
                            $userresult=User::create([
                                'name'             => $data['firstname'],
                                'email'            => $data['email'],           
                                'username'         => $data['username'],
                                'phone'            => $data['phone'],  
                                'register_by'      => $data['reg_type'],
                                'password'         => bcrypt($data['password']), 
                               
                              
                            ]);
                              
                          $update_admin=User::where('username','=', $userresult->username)->update(['admin'=>'1']);
                         
                          $userProfile=ProfileInfo::create([
                                'user_id'   => $userresult->id,
                                'mobile'    => $data['phone'],
                                'country'   =>'US',        //can be change from profile edit option
                            ]);

                            #add existing roles to subadmin
                            $not_ids = [4,5,23,24,25,33,34,35,36,37,38,39,40];//default off
                            $sub_roles   = SubadminRole::where('is_root','no')
                                                        ->whereNotIn('id', $not_ids)
                                                        ->pluck('id');
                            MyRole::create([
                            'user_id' => $userresult->id,
                            'role_id' => json_encode($sub_roles)
                            ]);
   
                        // activity('new admin register')->log($data['username'].' '.'Joined in system as Sub Admin'); 
                        Activity::add("Joined as $userresult->username","Joined in system as Sub Admin");
           
                        DB::commit();

                        Artisan::call('lead:AddtoBulder') ;
       
                        Session::flash('flash_notification', array('level' => 'success', 'message' =>'Your registration completed successfully'));
                        return redirect('admin/assign-role/'.$userresult->id);
                }
    }


    public function ipayipn(Request $request)

    {



        dd($request->all());

    }

}

