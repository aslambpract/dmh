<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use App\Packages;
use App\Country;
use App\Settings;
use App\Voucher;
use App\PaymentType;
use App\Activity;
use App\AppSettings;
use App\Emails;
use App\Commission;
use App\EwalletSettings;
//use App\TempUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use GeoIP;
use Mail;
use Crypt;
use CountryState;
use Illuminate\Http\Request;
use Session;
use App\Balance;
use App\Welcome;
use App\ShoppingCountry;
use App\ShoppingZone;
use App\TempDetails;
use DB;
use App\ProfileInfo;
use App\Sponsortree;
use App\Tree_Table;
use App\PointTable;
use App\LeadCapture;
use App\Shippingaddress;
use App\PendingTransactions;
use App\PaymentGatewayDetails;
use App\VoucherHistory;
use App\SlydeDetails;
use App\Pending_Temp;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Account;
use Stripe\Token;
use Srmklive\PayPal\Services\ExpressCheckout;
use Rave;
use Redirect;
use App\Models\Marketing\Contact;
use App\Models\ControlPanel\Options;
//use Qodehub\SlydePay\Slydepay;
use Qodehub\Slydepay\Laravel\Facades\Slydepay;
use App\Jobs\SendEmail;
use Artisan ;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected static $provider;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
         self::$provider = new ExpressCheckout;
    }

    
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm($sponsorname = null)
    {
        $user_registration = option('app.user_registration');
         
        // if ($user_registration == 1 || $user_registration == 2) {
        if (false) {
            Session::flash('flash_notification', array('level' => 'danger', 'message' => trans('register.permission_denied')));
            return Redirect::to('login');
        } else {
             

            
            $countries = CountryState::getCountries();
            $states = CountryState::getStates('US');   
            $package = Packages::where('id',1)->get();
            $joiningfee = Packages::value('fee');
            $package_amount=Packages::find(1)->fee; 

            return view('auth.register', compact( 'countries','states', 'package','joiningfee', 'package' ,'package_amount'));
        // }
          
        // else {
        //   return view('auth.login');
        // }
        }
    }
 

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {


        return Validator::make($data, [

           
            'username' => 'required|max:255|unique:pending_transactions',
            'password' => 'required|min:6',
            'firstname' => 'required|max:255',
            'lastname' => 'max:255',//OPTIONAL
  

            //Contact Information
            'country' => 'required|max:255',
            // 'security_answer' => 'required|max:255',
            // 'security_question' => 'required|max:255',
             'post_code' => 'max:255',//OPTIONAL
             'email' => 'required|email|max:255|unique:pending_transactions',
            'phone' => 'max:255',//OPTIONAL
            'bitcoin_address' => 'max:255',//OPTIONAL
            'twitter_username' => 'max:255', //OPTIONAL
            'facebook_username' => 'max:255', //OPTIONAL
            'youtube_username' => 'max:255', //OPTIONAL
            'linkedin_username' => 'max:255', //OPTIONAL
            'pinterest_username' => 'max:255', //OPTIONAL
            'instagram_username' => 'max:255', //OPTIONAL
            'google_username' => 'max:255', //OPTIONAL
            'skype_username' => 'max:255', //OPTIONAL
            'whatsapp_number' => 'max:255', //OPTIONAL
            'bio' => 'max:600', //OPTIONAL


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        
        return User::create([

            //Login information
            'username' => $data['username'],
            'password' => Hash::make($data['password']),

            //Network Information
            'role_id' => '2',
            'sponsor_id' => User::findByUsernameOrFail($data['sponsor_name'])->id,
          
            //Identification
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'job_title' => $data['job_title'],
            'tax_id' => $data['tax_id'],
            // 'passport' => $data['passport'],

            //Contact information
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'post_code' => $data['post_code'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'address' => $data['address'],
            'email' => $data['email'],
            'bitcoin_address' => $data['bitcoin_address'],
            'phone' => $data['phone'],
            

            //Media
            // 'profile_photo' => $data['profile_photo'],
            // 'profile_coverphoto' => $data['profile_coverphoto'],

            //Social links
            'twitter_username' => $data['twitter_username'],
            'facebook_username' => $data['facebook_username'],
            'youtube_username' => $data['youtube_username'],
            'linkedin_username' => $data['linkedin_username'],
            'pinterest_username' => $data['pinterest_username'],
            'instagram_username' => $data['instagram_username'],
            'google_username' => $data['google_username'],

            //Instant Messaging Ids (IM)
            'skype_username' => $data['skype_username'],
            'whatsapp_number' => $data['whatsapp_number'],

            //Profile
            'bio' => $data['bio'],



            //App Specific



        ]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

         // dd($request->all());
        $validator = $this->validator($request->all())->validate();

        

            $data= $request->all();
            // /dd($data);
            $data['reg_type']         = null;
            $data['cpf']              = $request->cpf;
            $data['passport']         = null;
            $data['location']         = null;
            $data['reg_by']           = $request->payment;
            $data['confirmation_code'] =  str_random(40);
        

             /**
             * Checking if sponsor_id exist in users table
             * @var [boolean]
             */
            $sponsor_id = 1;  //User::checkUserAvailable($data['sponsor']);
            $user_registration = option('app.user_registration');
            /**
             * Checking if placement_user exist in users table
             * @var [type]
             */
            $placement_id =  1;//$sponsor_id ;// User::checkUserAvailable($data['placement_user']);
        if (!$sponsor_id) {
            /**
             * If sponsor_id validates as false, redirect back without registering , with errors
             */
            return redirect()->back()->withErrors([trans('register.sponsor_not_exist')])->withInput();
        }
        if (!$placement_id) {
            /**
             * If placement_id validates as false, redirect back without registering , with errors
             */
            return redirect()->back()->withErrors([trans('register.sponsor_not_exist')])->withInput();
        }

            $payment_gateway=PaymentGatewayDetails::find(1);
            $joiningfee = Packages::where('id','=',$request->package)->value('fee');
            $orderid = mt_rand();

          

            $bitaps_det = PendingTransactions::where('username', $request->username)
                                                      ->where('payment_status', 'pending')
                                                      ->where('payment_method', $request->payment)
                                                      ->first();


            // $register=PendingTransactions::create([

            //      'order_id' =>$orderid,
            //      'username' =>$request->username,
            //       'email' =>$request->email,
            //      'sponsor' => 'admin',
            //      'request_data' =>json_encode($data),
            //      'payment_method'=>$request->payment,
            //      'payment_type' =>'register',
            //      'amount' => $joiningfee,
            //     ]);

      

         

            $title=trans('register.bitaps_payment');
            $sub_title=trans('register.bitaps_payment');
            $base=trans('register.bitaps_payment');
            $method=trans('register.bitaps_payment');

            
            $system_btc_wallet = EwalletSettings::find(1)->bitcoin_address ;
            //$url ='https://api.bitaps.com/btc/v1/create/payment/address' ;
            $url ='https://api.bitaps.com/btc/testnet/v1//create/payment/address';
            $payment_details = $this->url_get_contents($url, [
                                            'forwarding_address'=>$system_btc_wallet,
                                            'callback_link'=>url('bitaps/paymentnotify'),
                                            'confirmations'=>3
                                        ]);

 
             $package_amount=round($joiningfee, 8);

             $random = Str::random(45);
             $payment_gateway=PaymentGatewayDetails::find(1);
            $joiningfee = Packages::where('id','=',$request->package)->value('fee');
          //  $orderid = mt_rand();
        if ($request->payment=='slydepay') { 

            $slydepay = new Slydepay('baffour@thedreammakershome.com','1597297635004'); 
                 $send=Slydepay::createAndSendInvoice()
                       ->amount($joiningfee) 
                       ->orderCode($random) 
                       ->description('Registration_Fee') 
                       ->orderItems([]) 
                       ->payoption('SLYDEPAY') 
                       ->sendInvoice(true) 
                       ->customerName($request->username) 
                       ->customerEmail($request->email) 
                       ->from($request->phone)
                       ->run();
              
        if ($send->success==false) {
          
    Session::flash('flash_notification', array( 'message' =>$send->errorMessage));
                  
                  return redirect()->back();
                 
            } else {


                $result     =$send->result;
                $ordercode  =$result->orderCode;
                $paymentcode=$result->paymentCode;
                $paytoken   =$result->payToken;
                $qrcodeurl  =$result->qrCodeUrl;
           
               
                $invoicesend=Slydepay::sendInvoice()
                             ->payoption('SLYDEPAY') 
                             ->payToken($paytoken) 
                             ->customerName($request->username) 
                             ->customerEmail($request->email)
                             ->from($request->phone) 
                             ->run();

                $register=PendingTransactions::create([

                 'order_id'      =>$ordercode,
                 'username'      =>$request->username,
                  'email'        =>$request->email,
                 'sponsor'       => 'admin',
                 'request_data'  =>json_encode($data),
                 'payment_method'=>$request->payment,
                 'payment_type'  =>'register',
                 'amount'        => $joiningfee,
                 'paytoken'      => $paytoken,
                 'ordercode'     => $ordercode ,
                ]);             



         $redirect = "https://app.slydepay.com.gh/paylive/detailsnew.aspx?pay_token=".$paytoken;


              return redirect($redirect);
        }

      } 
   
    }
    public function slyde(Request $request)
    {   
         $input = $request->all();
         $payment_response  = json_encode($input);
        
         $update=PendingTransactions::where('paytoken','=',$request->pay_token)
                                     ->update(array('payment_response_data' => $payment_response)); 

         $test= PendingTransactions::where('paytoken','=',$request->pay_token)->get();
    
         $pay= PendingTransactions::where('paytoken','=',$request->pay_token)->value('paytoken');

         $order=PendingTransactions::where('paytoken','=',$request->pay_token)->value('ordercode');

         $status=Slydepay::checkPaymentStatus()
                         ->confirmTransaction(true) 
                         ->payToken($pay) 
                         ->run();
         $confirm=SlydePay::confirmTransaction()
                         ->payToken($pay) 
                         ->orderCode($order)
                         ->run();
        
         $result=$status->result;

         $update=PendingTransactions::where('paytoken','=',$request->pay_token)
                                     ->update(array('slyde_status' => $result)); 
    
         if ($result =="PENDING") {

    Session::flash('flash_notification', array( 'message' =>' When the order is payed for but you have not confirmed it')); 

            return redirect()->back();
         }
        
    //      elseif ($result =="NEW") {

  // Session::flash('flash_notification', array( 'message' =>'When there is a an order but no transaction. Happens when in integration mode or customer abandoned payment'));       
          
    //      } 
      
         if ($result =="NEW") {

             $cust= PendingTransactions::where('paytoken','=',$request->pay_token)->value('username');
           
             $item = PendingTransactions::where('username','=',$cust)->first();  
         
             
         if ($item->payment_status == 'pending') {

                 $item->payment_status='complete';
                 $item->approved_by='manual';
                 $item->save();
            
            Artisan::call("process:payment"); 
            
             $userresult = User::where('username','=',$cust)->first(); 
             
         }
          
            return redirect("register/preview/" . Crypt::encrypt($userresult->id)); 

         }
         elseif ($result =="DISPUTED") {

    Session::flash('flash_notification', array( 'message' =>'When you or Slydepay cancelled the payment'));

           return redirect()->back();
          
         } 
          else {
          
          $update=PendingTransactions::where('paytoken','=',$request->pay_token)
                                     ->update(array('payment_status' =>'cancelled'));

    Session::flash('flash_notification', array( 'message' =>'Payment Cancelled')); 

           return redirect()->back();
         }
    }
      

    public function preview($idencrypt)
    {
        $title     = trans('register.registration');
        $sub_title = trans('register.preview');
        $method    = trans('register.preview');
        $base      = trans('register.preview');

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
            return view('auth.preview', compact('title', 'sub_title', 'method', 'base', 'userresult', 'sponsorUserName', 'country', 'state', 'sub_title'));
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
            if (is_numeric($str['shipping_country'])) {
                $shipping_country = ShoppingCountry::where('country_id', $str['shipping_country'])->value('name');
            } else {
                $shipping_country = $str['shipping_country'];
            }
            if (is_numeric($str['shipping_state'])) {
                $shipping_state = ShoppingZone::where('zone_id', '=', $str['shipping_state'])->select('name', 'shipping_cost')->first();
            } else {
                $shipping_state = ShoppingZone::where('name', '=', $str['shipping_state'])->select('name', 'shipping_cost')->first();
            }
            $ship_country= $shipping_country ;
            $ship_state= $shipping_state->name ;
            $rank_update_date = date('Y-m-d H:i:s');


            $data=array();
            $data['firstname']=$str['L_PAYMENTREQUEST_0_NAME0'];
            $data['lastname']=$str['lastname'];
            $data['email']=$str['email'];
            $data['username']=$str['username'];
            $data['register_by']='PaypalExpress';
            $data['password']=Hash::make($str['password']);
            $data['shipping_country']=$ship_country;
            $data['shipping_state']= $ship_state;
            $data['reg_by']='PaypalExpress';
            $data['transaction_pass']=$str['transaction_pass'];
            $data['confirmation_code']=str_random(40);
            $data['phone']=$str['phone'];
            $data['passport']=$str['L_PAYMENTREQUEST_0_PASSPORT0'];
            $data['gender']=$str['gender'];
            $data['country']=$str['country'];
            $data['state']=$str['state'];
            $data['city']=$str['city'];
            $data['address']=$str['address'];
            $data['zip']=$str['zip'];
            $data['package']=$str['package'];
            $data['cpf']=null;
            $data['location']=null;
            $data['leg']=$str['leg'];
            $data['rank_update_date']=$rank_update_date = date('Y-m-d H:i:s');


            $sponsor_id   = User::checkUserAvailable($str['sponsor']);
            $placement_id = User::checkUserAvailable($str['placement_user']);

            $userresult = User::add($data, $sponsor_id, $placement_id);
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
            // $setting=Welcome::first();
            // Mail::send('emails.register', ['email' => $email, 'company_name' => $app_settings->company_name,'content' => $setting->body,'firstname' => $str['L_PAYMENTREQUEST_0_NAME0'], 'name' => $str['lastname'], 'login_username' => $str['username'], 'password' => $str['password']], function ($m) use ($str, $email, $setting) {
            //     $m->to($str['email'], $str['L_PAYMENTREQUEST_0_NAME0'])->subject($setting->subject)->from($email->from_email, $email->from_name);
            // });
            //dd(543896);
            DB::commit();
            return redirect("register/preview/" . Crypt::encrypt($userresult->id));
        }
    }



    public function verifyUser($confirmation_code)
    {
        $user = User::where('confirmation_code', $confirmation_code)->first();


        if (isset($user)) {
            if (!$user->confirmed) {
                $user->confirmed = 1;
                $user->save();

                $email = Emails::find(1);
                $app_settings = AppSettings::find(1);

                 Mail::send(
                     'emails.register',
                     [   'email'          => $email,
                     'company_name'   => $app_settings->company_name,
                     'firstname'      => $user->firstname,
                     'name'           => $user->firstname.$user->lastname,
                     'login_username' => $user->username,
                     ],
                     function ($m) use ($email, $user) {
                        $m->to($user->email, $user->name)->subject('Successfully registered')->from($email->from_email, $email->from_name);
                     }
                 );


                 $level = 'success';
                $status = "Your e-mail is verified. You can now login.";
            } else {
        // dd($user);
                $level = 'info';
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
        // dd($user);
            Session::flash('flash_notification', array('level' => 'warning', 'message' => trans('register.sorry_your_email_cannot_be_identified')));
            return redirect('/login')->with('warning', trans('register.sorry_your_email_cannot_be_identified'));
        }
 
        Session::flash('flash_notification', array('level' => $level, 'message' => $status));
        return redirect('/login')->with('status', $status);
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

    public function leadView($username)
    {

        $title     = trans('register.leadcapture');
        $sub_title = trans('register.leadcapture');
        $base      = trans('register.leadcapture');
        $method    = trans('register.leadcapture');

        $app = $app = AppSettings::find(1);
        $user_id = User::where('username', '=', $username)->value('id');
        $profile_photo = ProfileInfo::where('user_id', '=', $user_id)->value('profile');

        return view('auth.leadcapture', compact('title', 'username', 'sub_title', 'base', 'method', 'app', 'profile_photo'));
    }

    public function leadPost(Request $request)
    {

        $validator = Validator::make($request->all(), [
          'username'   => 'required',
          'name'     => 'required',
          'email' => 'required',
          'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }


        LeadCapture::create(['username'=>$request->username,
                           'name'=>$request->name,
                           'email'=>$request->email,
                           'mobile'=>$request->phone]);
        Session::flash('flash_notification', array('level' =>"success", 'message' =>trans('register.lead_capture_added_successfully')));
       
        return redirect()->back();
    }

    public function bitapssuccess(Request $request)
    {
       
        $item = PendingTransactions::where('payment_code', $request->code)->first();
        $item->payment_response_data = json_encode($request->all());
        $item->save();
        if ($request->amount >= ($item->amount * 100000000) && $item->payment_status == 'pending') {
                 $item->payment_status='complete';
                $item->save();
                 // Artisan::call("process:payment");
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
            $user_registration = option('app.user_registration');
            if ($user_registration <> 6) {
                $item->payment_status='complete';
                $item->save();
            }
            
            $purchase_id=$item->id;
            $reg_type=$user_registration;
            return view('auth.regcomplete', compact('purchase_id', 'reg_type'));
        } else {
            Session::flash('flash_notification', array('level' => 'danger', 'message' => trans('register.error_in_payment')));
            return Redirect::to('register');
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
                $user_registration = option('app.user_registration');
                if ($user_registration <> 6) {
                    PendingTransactions::where('rave_ref_id', $ref_id)->update(['payment_status' => 'complete']);
                }
                $reg_type=$user_registration;
                return view('auth.regcomplete', compact('purchase_id', 'reg_type'));
            } else {
                return redirect('register')->withErrors([trans('register.error_in_payment')]);
                 return redirect("register");
            }
        } else {
            return redirect('register')->withErrors([trans('register.error_in_payment')]);
             return redirect("register");
        }
    }
    public function skrillsuccess(Request $request, $id)
    {
        // dd($request->all());

        $item = PendingTransactions::find($id);
        $item->payment_response_data = json_encode($request->all());
       
        $item->save();
        $user_registration = option('app.user_registration');
        if ($user_registration <> 6) {
             $item->payment_status  ='complete';
             $item->save();
        }
            $purchase_id=$item->id;
            $reg_type=$user_registration;
            return view('auth.regcomplete', compact('purchase_id', 'reg_type'));
    }


    public function ipaysuccess(Request $request, $id)
    {

        $item = PendingTransactions::find($id);
        $item->payment_response_data = json_encode($request->all());
        $item->save();
        $user_registration = option('app.user_registration');
        if ($user_registration <> 6) {
             $item->payment_status  ='complete';
             $item->save();
        }
          $purchase_id=$item->id;
          $reg_type=$user_registration;
          return view('auth.regcomplete', compact('purchase_id', 'reg_type'));
    }

    public function ipaycanceled(Request $request)
    {

         return redirect('register')->withErrors([trans('register.error_in_payment')]);
            return redirect("register");
    }

    public function ipayipn(Request $request)
    {

        dd($request->all());
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

    public function bitapspreview(Request $request, $transid)
    {

        $title=trans('register.bitaps_preview');
        $base=trans('register.bitaps_preview');
        $method=trans('register.bitaps_preview');
        $sub_title=trans('register.bitaps_preview');

        return view('auth.bitapspreview');
    }

    public function bitapstorepurchase(Request $request)
    {
      
        $item = PendingTransactions::where('payment_code', $request->code)->first();
        $item->payment_response_data = json_encode($request->all());
        $item->save();
        if ($request->confirmations >=3) {
            $data=json_decode($item->request_data, true);
       
            $order_data= Shippingaddress::saveShippingRequest($item->user_id, $data['fname'], $data['email'], $data['phone'], $data['shipping_country'], $data['shipping_state'], $data['city'], $data['address'], $data['zip'], 1, 1, $data['payment'], 'order placed', 0, $data['new_shipping_cost']);
          
            if ($order_data <> 0) {
                PendingTransactions::where('id', $item->id)->update(['payment_status' => 'finish']) ;
            }
        }

        dd("done");
    }


    public function terms_and_conditions()
    {

        $title     = trans('controlpanel.terms_and_conditions');
        $sub_title = trans('controlpanel.terms_and_conditions');
        $base      = trans('controlpanel.terms_and_conditions');
        $method    = trans('controlpanel.terms_and_conditions');
         $t_and_c =Settings::value('content');
        
         return view('auth.terms_and_conditions', compact('title', 'sub_title', 'base', 'method', 't_and_c'));
    }
    public function cookie()
    {

        $title     = trans('controlpanel.cookie');
        $sub_title = trans('controlpanel.cookie');
        $base      = trans('controlpanel.cookie');
        $method    = trans('controlpanel.cookie');
        $cookie =Settings::value('cookie');
             
       

         return view('auth.cookies', compact('title', 'sub_title', 'base', 'method', 'cookie'));
    }

    // public function approve(Request $request)
    // {
    //    // dd($request->all());
    //   $pending_payments=PendingTransactions::where('payment_type', '<>', 'store_purchase')
    //                                          ->where('payment_status', 'pending')
    //                                          ->get();
    //   $pending_payments=PendingTransactions::where('id',$request->reg_id)
                                             
    //                                          ->get();
                                                                         

    //  foreach ($pending_payments as $key => $payment) {
    //         $data=json_decode($payment->request_data, true);
    //         if ($payment->payment_type == 'register') {
    //             $sponsor_id = User::checkUserAvailable($payment->sponsor);
    //             $placement_id = User::checkUserAvailable($data['placement_user']);dd($payment->username);
    //             $user_id=User::where('username', $payment->username)->value('id');
    //             $user_email=User::where('email', $payment->email)->value('id');
    //             if ($sponsor_id <> null && $placement_id <> null && $user_id == null && $user_email == null) {
    //                 $userresult = User::add($data, $sponsor_id, $placement_id);
    //                 if ($userresult) { 
    //                     $userPackage = Packages::find($data['package']);
    //                     $sponsorname = $payment->sponsor;
    //                     $placement_username = $data['placement_user'];
    //                     $legname = $data['leg'] == "L" ? "Left" : "right";
    //                     Activity::add("Added user $userresult->username", "Added $userresult->username sponsor as $sponsorname and placement user as $placement_username in $legname Leg", $sponsor_id);
    //                     Activity::add("Joined as $userresult->username", "Joined in system as $userresult->username sponsor as $sponsorname and placement user as $placement_username in $legname Leg", $userresult->id);
    //                     Activity::add("Package purchased", "Purchased package - $userPackage->package ", $userresult->id);
    //                     $email = Emails::find(1);
    //                     $app_settings = AppSettings::find(1);
                        
    //                     $data['company_name'] =$app_settings->company_name;
    //                     SendEmail::dispatch($data, $data['email'], $data['firstname'], 'register')->delay(now()->addSeconds(5));
    //                     PendingTransactions::where('id', $payment->id)->update(['payment_status' => 'finish']);
    //                 }
    //             }
    //         }}
    //     // Session::flash('flash_notification', array('level' => 'success', 'message' => trans('User Approved By The Admin')));
    //     //     return Redirect::back();
    // }
}
