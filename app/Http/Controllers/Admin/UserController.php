<?php

namespace App\Http\Controllers\admin;



use App\Balance;

use App\Commission;

use App\Country;

use App\DirectSposnor;
use App\LoadPosition;
use App\UserAccounts;


use App\Helpers\Thumbnail;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Requests\Admin\DeleteRequest;

use App\Http\Requests\Admin\UserEditRequest;

use App\Http\Requests\Admin\UserRequest;

use App\LeadershipBonus;
use App\Reactivation;

use App\Settings;
use Artisan;
 
use App\Packages;

use App\PointTable;
use App\PendingBinaryCommission;

use App\SponsorCommission;
use App\PendingCommission1;

use App\ProfileInfo;

use App\PurchaseHistory;

use App\RsHistory;

use App\Sponsortree;

use App\Tree_Table;

use App\Emails;

use App\AppSettings;

use App\Mail;

use App\User;

use App\Voucher;

use App\News;

use App\EventVideos;
use App\PendingTable;

use Auth;

use Datatables;

use DB;

use Illuminate\Http\Request;

use Input;

use Redirect;

use Response;

use Session;

use Validator;

use App\Activity;

use App\Payout;

use Crypt;

use CountryState;

use App\Ranksetting;

use App\Transactions;

use App\PendingTransactions;

use Storage;

use App\VoucherRequest;

use App\Payoutmanagemt;

use App\payout_gateway_details;

use App\Hyperwallet;

use App\PaymentGatewayDetails;

use App\ProfileModel;




class UserController extends AdminController

{



    /*

     * Display a listing of the resource.

     *

     * @return Response

     */

    public function index(){
 
        $title     = trans('users.users');

        $sub_title = trans('users.users');

        $base      = trans('users.users');

        $method    = trans('users.view_all');

    

    

        return view('app.admin.users.index',  compact('title','user','sub_title','base','method'));

      
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return Response

     */

    public function getCreate()

    {

        return view('app.admin.users.create_edit');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @return Response

     */

    public function postCreate(UserRequest $request)

    {



        $user                    = new User();

        $user->name              = $request->name;

        $user->username          = $request->username;

        $user->email             = $request->email;

        $user->password          = bcrypt($request->password);

        $user->confirmation_code = str_random(32);

        $user->confirmed         = $request->confirmed;

        $user->save();

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param $user

     * @return Response

     */

    public function getEdit()

    {



        $title     = trans('users.change_password');

        $sub_title = trans('users.change_password');

        $base      = trans('users.change_password');

        $method    = trans('users.change_password');



        $userss   = User::getUserDetails(Auth::id());

        $user     = $userss[0];

        $users    = User::where('id', '>', 1)->get();

        $packages = Packages::all();



        return view('app.admin.users.create_edit', compact('title', 'base', 'method', 'sub_title', 'users'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param $user

     * @return Response

     */

    public function postEdit(UserEditRequest $request)

    {

        $user                 = User::find(User::userNameToId($request->username));

        $password             = $request->password;

        $passwordConfirmation = $request->password_confirmation;



        if (!empty($password) ) {

            if ($password === $passwordConfirmation) {

                $user->password = bcrypt($password);

            }

        }

        $user->save();



        Session::flash('flash_notification', array('message' => trans('users.password_has_been_changed'), 'level' => 'success'));



        return redirect()->back();

    }

    /**

     * Remove the specified resource from storage.

     *

     * @param $user

     * @return Response

     */



    public function change_transaction_password(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'username1' => 'required',

            'transaction_password'   => 'required|alpha_num|min:6',

            

        ], ['username1.required' => 'username is required']);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);

        } else {

            $user=$request->username1;

            $user_id = User::where('username', $user)->value('id');

            $users = User::find($user_id);

            $password=$request->transaction_password;

            $confirm_password =$request->tpassword_confirmation ;

           

            if ($password == $confirm_password) {

                $users->transaction_pass = $password;

                $users->save();

                Session::flash('flash_notification', array('message' => trans('users.transaction_password_has_been_changed'), 'level' => 'success'));

            } else {

                Session::flash('flash_notification', array('message' => trans('users.password_doesnt_match'), 'level' => 'error'));

            }

            return redirect()->back();

        }

    }



    public function getDelete($id)

    {

        $user = User::find($id);

        // Show the page

        return view('app.admin.users.delete', compact('user'));

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param $user

     * @return Response

     */

    public function postDelete(DeleteRequest $request, $id)

    {

        $user = User::find($id);

        $user->delete();

    }



    /**

     * Show a list of all the languages posts formatted for Datatables.

     *

     * @return Datatables JSON

     */

    public function data(Request $request)

    {

        

        DB::statement(DB::raw('set @rownum=0'));

        $user_count = User::where('id', '>', 1)->count();

        // $users = User::select(array('users.id','users.name','users.username','packages.package','users.email', 'users.created_at'))

        // ->join('packages','packages.id','=','users.package')->where('admin','<>',1)

        // $users = ProfileInfo::select(array(DB::raw('@rownum  := @rownum  + 1 AS rownum'),'users.id','users.lastname', 'users.name', 'users.username', 'packages.package', 'users.email', 'users.created_at','users.active','users.confirmed'))

        //                     ->join('users', 'users.id', '=', 'profile_infos.user_id')

        //                     ->join('packages', 'packages.id', '=', 'profile_infos.package')

        //                     ->where('admin', '<>', 1)

        //                     ->get();
         $users = ProfileInfo::select(array(DB::raw('@rownum  := @rownum  + 1 AS rownum'),'users.id','users.lastname', 'users.name', 'users.username', 'packages.package', 'users.email', 'users.created_at','users.active','users.confirmed'))

                            ->join('users', 'users.id', '=', 'profile_infos.user_id')

                            ->join('packages', 'packages.id', '=', 'profile_infos.package')

                            ->where('admin', '<>', 1)

                            ->get();                    



        return DataTables::of($users)

            ->editColumn('created_at', '{{ date("d-m-Y",strtotime($created_at)) }}')

            ->addColumn('actions', '<div class="list-icons">

                      <div class="list-icons-item dropdown">

                        <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>

                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform;top: 0px;left: 0px;transform: translate3d(-164px, 16px, 0px);">

                           @if ($id!="1")

                          <a href="{{{ URL::to(\'admin/userprofiles/\' . $username . \'#update\' ) }}}" class="dropdown-item"><i class="fa fa-eye"></i>{{trans("users.view")}}</a><div class="dropdown-divider"></div><br>@endif

                          <a href="{{{ URL::to(\'admin/users/\' . $id . \'/userlogin\' ) }}}" class="dropdown-item"><i class="fa fa-sign-in" aria-hidden="true"></i>{{trans("users.impersonate")}}</a>

                        

                      </div>

                    </div>')



             ->setTotalRecords($user_count)

             ->escapeColumns([])

             ->make();

    }

    public function useraccountsdata(Request $request){

        

 
        $user_count = UserAccounts::where('id', '>', 1)->where('approved','approved')->count();

        // dd($user_count);
 
        $users = UserAccounts::select( 'users.username','user_accounts.id','user_accounts.account_no','user_accounts.account_type','user_accounts.created_at')
                            ->join('users', 'users.id', '=', 'user_accounts.user_id')
                            ->where('user_accounts.approved','=','approved')
                            ->get();



        return DataTables::of($users)

            ->editColumn('created_at', '{{ date("d-m-Y",strtotime($created_at)) }}')
            ->editColumn('account_no', '{{$username}} -@if($account_type=="positions") POS  @endif {{ $account_no}}')

            ->addColumn('actions', '<div class="list-icons">

                                    <div class="list-icons-item dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>

                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform;top: 0px;left:0px;transform: translate3d(-164px, 16px, 0px);">

                                    <a target="blank" href="{{{ URL::to(\'admin/genealogy/1/\' . Crypt::encrypt($id) ) }}}"  class="dropdown-item " >Phase 1</a>
                                    <div class="dropdown-divider"></div>

                                    <a  target="blank"  href="{{{ URL::to(\'admin/genealogy/2/\' . Crypt::encrypt($id)) }}}"  class="dropdown-item " >Phase 2  </a>
                                    
                                    <div class="dropdown-divider"></div>
                                    <a  target="blank"  href="{{{ URL::to(\'admin/genealogy/3/\' . Crypt::encrypt($id)) }}}"  class="dropdown-item " >Phase 3  </a>

                                    <div class="dropdown-divider"></div>
                                    <a  target="blank"  href="{{{ URL::to(\'admin/genealogy/4/\' . Crypt::encrypt($id)) }}}"  class="dropdown-item " >Phase 4  </a>

                                    <div class="dropdown-divider"></div>
                                    <a  target="blank"  href="{{{ URL::to(\'admin/genealogy/5/\' . Crypt::encrypt($id)) }}}"  class="dropdown-item " >Phase 5  </a>
                        </div>

                      </div>

                    </div>')


             ->addColumn('toaccount',function($j){

                 $url = url('admin/useraccounts/changetoaccount',Crypt::encrypt($j->id)) ;
                if($j->account_type=="positions"){  
                    return ' <a target="_blank" href="'.$url.'" class="btn btn-info" > Change to account  </a>' ;
                }else{
                  return '  ' ;
                }
            })



             ->setTotalRecords($user_count)

             ->escapeColumns([])

             ->make();

    }

     public function updatetoaccount(Request $request ,$id){
       


 
         $validator = Validator::make($request->all(), [
                        "name" => 'required',
                        "last_name" => 'required',
                        "email" => 'required|unique:users,email' ,
                        "username" => 'required|unique:users,username',
                        "password" => 'required|confirmed'

                    ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);

        }

        
         DB::beginTransaction();

        try {
            
             $today= date('Y-m-d H:i:s') ;              
             
             $userresult = User::create([
                'name'             => $request->name,
                'lastname'         => $request->last_name,
                'email'            => $request->email,
                'username'         => $request->username,
                'rank_id'          => '1',
                'rank_update_date'  => $today,
                'register_by'      => 'NA',
                'cpf'              => 'NA',
                'transaction_pass' => 123456,
                'password'         => bcrypt($request->password),
                'confirmation_code' => uniqid(),
                'bitcoin_address' =>$request->bitcoinaddress,
           ]);


            $item =  UserAccounts::findorfail($id);
            $item->account_type = 'account' ;
            $item->user_id = $userresult->id ;
            $item->account_no   = "001" ;
            $item->save() ;

             ProfileModel::create([
            'user_id'  => $userresult->id,
            'passport' => "NA",
            'mobile'   => "9876543210",
            'security_question'   => isset($data['security_question'])?$data['security_question'] :'NA',
            'security_answer'   => isset($data['security_answer']) ? $data['security_answer'] : 'NA',
            'gender'   => isset($data['gender']) ?$data['gender'] : 'm',
            'country'  => 'US',
            'state'    => isset($data['state']) ? $data['state'] : '0',
            'city'     => isset($data['city']) ?$data['city'] :'NA',
            'address1' => isset($data['address'])?$data['address']: 'NA',
            'zip'      => isset($data['zip'])?$data['zip']:'NA',
            'location' => 'NA',
            'package'  => 1,
            ]);

            
            DB::commit();
            
            return redirect('admin/useraccounts'); 

        } catch (Exception $e) {
            DB::rollback() ;
            return redirect()->back();

        }



       



    }
    public function changetoaccount($crypt){
        
       $item =  UserAccounts::findorfail(Crypt::decrypt($crypt));
       $username =  User::find($item->user_id)->username;

       $title = 'Change to account' ;
       $sub_title ='' ;
       $base = 'Home' ;
       $method = '' ;
        return view('app.admin.users.changetoaccount', compact('title', 'sub_title', 'base', 'method', 'users','item','username'));

    }



    public function approvePaymentsData()

    {



        DB::statement(DB::raw('set @rownum=0'));

        $payment_data_count = PendingTransactions::where('payment_status', 'pending')->count();

        $payment_data = PendingTransactions::select(array(DB::raw('@rownum  := @rownum  + 1 AS rownum'),'pending_transactions.id','order_id', 'pending_transactions.username', 'sp.username as sponsor', 'payment_method', 'payment_type', 'amount','pending_transactions.created_at'))

                                         ->join('users as sp', 'sp.id', '=', 'pending_transactions.sponsor')

                                         ->where('payment_status', 'pending')

                                          ->get();

       // dd($payment_data);

        return DataTables::of($payment_data)

          ->addColumn('actions', '<div class="list-icons">

                      <div class="list-icons-item dropdown">

                      <a href="#" class="list-icons-item" data-toggle="dropdown"><i 

                      class="icon-menu7"></i></a>

                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"

                      style="position: absolute; will-change: transform;top: 0px;left:

                      0px;transform: translate3d(-164px, 16px, 0px);">

                        

                      <a href="{{{ URL::to(\'admin/approve/\' . $id ) }}}" class="dropdown-item"><i 

                      class="fa fa-check" aria-hidden="true" style="color:green"></i>

                      {{trans("users.approve")}}</a><div class="dropdown-divider"></div><br>

                   

                       <a  data-id="{{$id}}" href="{{{ URL::to(\'admin/delete_approve/\' . $id) }}}"  class="dropdown-item approvepayment" > <i class="fa fa-trash "></i> {{trans("users.delete")}}  </a>

                        

                      

                        </div>

                      </div>

                    </div>')





        ->setTotalRecords($payment_data_count)

        ->escapeColumns([])

        ->make();

    }



    public function deactivateUser(Request $request)

    {

      // dd($request->all());

 

         User::where('username', '=', $request->username)->update(['active'=>'no']);

         Session::flash('flash_notification', array('message' => "User deactivated Successfully", 'level' => 'success'));

         return redirect()->back();

    }







    public function activateUser($user)

    {

   

        User::where('username', '=', $user)->update(['active'=>'yes']);

        Session::flash('flash_notification', array('message' => "User activated Successfully", 'level' => 'success'));

        return redirect()->back();

    }

    public function email_confirm($id)

    {

   

        User::where('id', '=', $id)->update(['confirmed'=>1]);

        Session::flash('flash_notification', array('message' => "Email Confirmed Successfully", 'level' => 'success'));

        return redirect()->back();

    }



    

    public function viewprofile($user = null)

    {



        

        $title     = trans('users.member_profile');

        $sub_title = trans('users.view_all');

        $base = trans('users.view_all');

        $method = trans('users.view_all');







        if ($user) {

            $user_id = User::where('username', $user)->value('id');

            if ($user_id != null) {

                Session::put('prof_username', $user);

            }

         } else {
 
            $user_id = Auth::id();

            Session::put('prof_username', Auth::user()->username);

        }





        $user_id = $user_id;







        $selecteduser = User::with('profile_info')->find($user_id);

        // dd($selecteduser);

      

 
        $profile_infos = ProfileInfo::with('images')->where('user_id', $user_id)->first();

         $profile_photo = $profile_infos->profile;

        

        //if (!Storage::disk('images')->exists($profile_photo)){

        //    $profile_photo = 'avatar-big.png';

        //}



        if (!$profile_photo) {

            $profile_photo = 'avatar-big.png';

        }



        $cover_photo = $profile_infos->cover;



        if (!Storage::disk('images')->exists($cover_photo)) {

            $cover_photo = 'cover.jpg';

        }



        if (!$cover_photo) {

            $cover_photo = 'cover.jpg';

        }

       



        $referals = User::select('users.*')->join('tree_table', 'tree_table.user_id', '=', 'users.id')->where('tree_table.sponsor', $user_id)->get();

        $Hyperwallet=Payoutmanagemt::where('payment_mode', 'Hyperwallet')->value('status');

        $paypal=Payoutmanagemt::where('payment_mode', 'Paypal')->value('status');

        $Bitaps=Payoutmanagemt::where('payment_mode', 'Bitaps')->value('status');

        $Manual_Bank=Payoutmanagemt::where('payment_mode', 'Manual/Bank')->value('status');



      

        $total_referals = count($referals);

        $base           = trans('users.profile');

        $method         = trans('users.profile_view');



        $referrals      = Sponsortree::getMyReferals($user_id);



        $balance         = Balance::getTotalBalance($user_id);

        //$vouchers        = Voucher::getAllVouchers();

        $vouchers        = Voucher::where('user_id', 0)->get();

        $voucher_count   = count($vouchers);

        $mails           = Mail::getMyMail($user_id);

        $mail_count      = count($mails);

        $referrals_count = $total_referals;

        $sponsor_id      = Sponsortree::getSponsorID($user_id);

        $sponsor      = User::with('profile_info')->where('id', $sponsor_id)->first();

         //$voucher_count  = //VoucherRequest::where('user_id',$user_id)

        //                                 ->where('status','complete')

        //                                 ->sum('count');





        $left_bv         = PointTable::where('user_id', '=', $user_id)->value('left_carry');

        $right_bv = PointTable::where('user_id', '=', $user_id)->value('right_carry');

        $total_payout = Payout::where('user_id', '=', $user_id)->sum('amount');

        



        $user_package    = Packages::where('id', $selecteduser->profile_info->package)->value('package');

        $user_rank = Ranksetting::getUserRank($user_id);

        $user_rank_name = Ranksetting::idToRankname($user_rank);

    



        $countries = Country::all();





        $userCountry = $selecteduser->profile_info->country;

        if ($userCountry) {

            $countries = CountryState::getCountries();

            $country   = array_get($countries, $userCountry);

        } else {

            $country = "Unknown";

        }





        $userState = $selecteduser->profile_info->state;

        if ($userState) {

            $states = CountryState::getStates($userCountry);

            $state  = array_get($states, $userState);

        } else {

            $state = "unknown";

        }

// dd($states);





        /**

         * Get Countries from mmdb

         * @var [collection]

         */

        // $countries = CountryState::getCountries();

        /**

         * [Get States from mmdb]

         * @var [collection]

         */

        // $states = CountryState::getStates('US');

        /**

         * Get all packages from database

         * @var [collection]

         */



 



        return view('app.admin.users.profile', compact('title', 'sub_title', 'base', 'method', 'mail_count', 'voucher_count', 'balance', 'referrals', 'countries', 'selecteduser', 'sponsor', 'referals', 'left_bv', 'right_bv', 'user_package', 'profile_infos', 'countries', 'country', 'states', 'state', 'referrals_count', 'user_rank_name', 'profile_photo', 'cover_photo', 'total_payout', 'Manual_Bank', 'Hyperwallet', 'Bitaps', 'paypal'));

    }

    public function profile(Request $request)

    {



        $validator = Validator::make($request->all(), ["user" => 'required|exists:users,username']);

        if ($validator->fails()) {

            return redirect()->back()->withErrors(['The username not exist']);

        } else {

            Session::put('prof_username', $request->user);

            return redirect()->back();

        }

    }

    public function suggestlist(Request $request)

    {

        if ($request->input != '/' && $request->input != '.') {

            $users['results'] = User::where('username', 'like', "%" . trim($request->input) . "%")->select('id', 'username as value', 'email as info')->get();

        } else {

            $users['results'] = User::select('id', 'username as value', 'email as info')->get();

        }



        echo json_encode($users);

    }

    public function saveprofile(Request $request)

    {
dd($request->all());
        dd("as");



        // die(Session::get('prof_username'));



        if (!Session::has('prof_username')) {

            return redirect()->back();

        }



        $id = User::where('username', Session::get('prof_username'))->value('id');



        $user = User::find($id);



        $user->name = $request->name;

        $user->lastname = $request->lastname;

        $user->email = $request->email;
         $user->bitcoin_address = $request->bitcoin_address;









        $user->save();

        // dd($user);

// Role::with('users')->whereName($name)->first();

        $related_profile_info = ProfileInfo::where('user_id', $id)->first();

// dd($related_profile_info);

        $related_profile_info->location    = $request->location;

        $related_profile_info->occuption   = $request->occuption;

        $related_profile_info->gender      = $request->gender;

        $related_profile_info->dateofbirth = date('d/m/Y', strtotime($request->day . "-" . $request->month . "-" . $request->year));

        $related_profile_info->address1    = $request->address1;

        $related_profile_info->address2    = $request->address2;

        $related_profile_info->gender      = $request->gender;

        $related_profile_info->city        = $request->city;

        $related_profile_info->country     = $request->country;

        $related_profile_info->state       = $request->state;

        $related_profile_info->zip         = $request->zip;

        $related_profile_info->mobile      = 11111111111111111111111111111;



        $related_profile_info->skype       = $request->skype;

        $related_profile_info->facebook    = $request->fb;

        $related_profile_info->twitter     = $request->twitter;



        $related_profile_info->account_number      = $request->account_number;

        $related_profile_info->bitcoin_address      = $request->bitcoin_address;

        $related_profile_info->account_holder_name = $request->account_holder_name;

        $related_profile_info->swift               = $request->swift;

        $related_profile_info->sort_code           = $request->sort_code;

        $related_profile_info->bank_code           = $request->bank_code;

        $related_profile_info->paypal              = $request->paypal;

        $related_profile_info->about               = $request->about_me;



        // if ($request->hasFile('profile_pic')) {

        //     $destinationPath = base_path() . "\public\appfiles\images\profileimages";

        //     $extension       = Input::file('profile_pic')->getClientOriginalExtension();

        //     $fileName        = rand(11111, 99999) . '.' . $extension;

        //     Input::file('profile_pic')->move($destinationPath, $fileName);

        //     $new_user->image = $fileName;



        //     $path2 = public_path() . '/appfiles/images/profileimages/thumbs/';

        //     Thumbnail::generate_profile_thumbnail($destinationPath . '/' . $fileName, $path2 . $fileName);

        //     $path3 = public_path() . '/appfiles/images/profileimages/small_thumbs/';

        //     Thumbnail::generate_profile_small_thumbnail($destinationPath . '/' . $fileName, $path3 . $fileName);



        // }



        if ($related_profile_info->save()) {

            Session::flash('flash_notification', array('message' => "Profile updated succesfully", 'level' => 'success'));

            return redirect()->back();

        } else {

            return redirect()->back()->withErrors(['Whoops, looks like something went wrong']);

        }

    }

    public function allusers()

    {

        $users       = User::select('users.username')->get();

        $loop_end    = count($users);

        $user_string = '';

        for ($i = 0; $i < $loop_end; $i++) {

            $user_string = $user_string . $users[$i]->username;

            if ($i < ($loop_end - 1)) {

                $user_string = $user_string . ",";

            }

        }

        print_r($user_string);

    }



    public function validateuser(Request $request)

    {

        return User::takeUserId($request->sponsor);

    }



    public function activate()

    {



        $title     = trans('users.activate_user');

        $sub_title = trans('users.activate_user');

        $base      = trans('users.activate_user');

        $method    = trans('users.activate_user');









     



        $users = User::join('profile_infos', 'profile_infos.user_id', '=', 'users.id')

            ->join('packages', 'packages.id', '=', 'profile_infos.package')

            ->join('tree_table', 'tree_table.user_id', '=', 'users.id')

            ->join('sponsortree', 'sponsortree.user_id', '=', 'users.id')

            ->join('users as sponsors', 'sponsors.id', '=', 'sponsortree.sponsor')

            ->select('sponsors.username as sponsors', 'users.username', 'users.id', 'users.email', 'users.created_at', 'users.name', 'users.lastname', 'packages.package')

            ->where('tree_table.type', '=', 'yes')

            ->where('users.confirmed', '<>', 1)

            ->paginate(10);

            // dd($users);



        return view('app.admin.users.activate', compact('title', 'sub_title', 'base', 'method', 'users'));

    }



    public function confirme_active(Request $request, $id)

    {



        $user_detail = User::find($request->user);



        if ($user_detail) {

            $sponsor_id = Sponsortree::where('user_id', $user_detail->id)->pluck('sponsor');

            $package_id = ProfileInfo::where('user_id', $user_detail->id)->value('package');

            $package = Packages::find($package_id);



            /* Sponsor Commission */

            Transactions::sponsorcommission($sponsor_id, $user_detail->id);



            /* Leadership Bonus */

            LeadershipBonus::allocateCommission($sponsor_id, Sponsortree::where('user_id', $sponsor_id)->value('sponsor'), $package->pv / 10);



            /* Ponit Update */

            Tree_Table::getAllUpline($user_detail->id);

            PointTable::updatePoint($package->pv, $user_detail->id);



            User::where('id', $user_detail->id)->update(['confirmed' => 1]);

        } else {

            return redirect()->back()->withErrors(['Whoops, User not found ']);

        }



        Session::flash('flash_notification', array('message' => "Member activated succesfully", 'level' => 'success'));



        return redirect()->back();

    }

    public function search(Request $request)

    {

        $keywords    = $request->get('username');

        $suggestions = User::where('username', 'LIKE', '%' . $keywords . '%')->get();

        return $suggestions;

    }

    public function changeusername()

    {

        $title     = trans('adminuser.change_username');

        $sub_title     = trans('adminuser.change_username');

        $base     = trans('adminuser.change_username');

        $method     = trans('adminuser.change_username');





        return view('app.admin.users.changeusername', compact('title', 'sub_title', 'base', 'method'));

    }

    public function updatename(Request $request)

    {

        if (strtolower($request->username) == 'adminuser') {

            Session::flash('flash_notification', array('message' => trans('users.username_cannot_change'), 'level' => 'success'));

            return redirect()->back();

        }

        $username         = $request->username;

        $new_username     = $request->new_username;

        $data             = array();

        $user['username'] = $request->username;

        $validator        = Validator::make(

            $user,

            ['username' => 'required|exists:users']

        );

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);

        } else {

            $data['username'] = $request->new_username;

            $validator        = Validator::make(

                $data,

                ['username' => 'required|unique:users,username|alpha_num|max:255']

            );

            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator);

            } else {

                $update = DB::table('users')->where('username', $username)->update(['username' => $new_username]);

                Session::flash('flash_notification', array('message' => trans('users.username_changed_successfully'), 'level' => 'success'));



                return redirect()->back();

            }

        }

    }



    public function userlogin(Request $request, $id)

    {

        Session::put('impersonate', 'yes');

        Auth::loginUsingId($id);

        return redirect('user/dashboard');

    }



    public function useraccounts(Request $request)

    {



         

        $title     = trans("users.user_account");

        $sub_title = trans("users.user_account");

        $base      = trans("users.user_account");

        $method    = trans("users.user_account");


        return view('app.admin.users.useraccounts', compact('title', 'sub_title', 'base', 'method', 'data', 'request'));

    }



    public function incomedetails($id)
    {

        

        $title     = trans("users.income_details");

        $sub_title = trans("users.income_details");

        $base      = trans("users.income_details");

        $method    = trans("users.income_details");



        $data = User::with('profile_info')->find($id);

        $settings = Settings::getSettings();

       

        //dd($data);join('payout_request','payout_request.user_id','commission.user_id')->where('payout_request.status','released')

                            

        $income= Commission::join('users', 'commission.from_id', '=', 'users.id')

                            ->where('commission.user_id', $id)

                            ->where('commission.from_id', '!=', $id)

                            ->where('commission.payment_type', '!=', 'fund_debit')

                  ->where('commission.payment_type', '!=', 'fund_credit')

                            ->select('users.username', 'commission.*')

                            ->paginate(100);

       



        // $income = Commission::where('commission.user_id',$accounts)

        //                     ->where('commission.from_id','!=',$accounts)

        //                     ->join('users','commission.from_id','=','users.id')

                        /*->join('users','user_accounts.user_id','=','users.id')*/

                            // ->select('users.username','commission.*')

                            // ->paginate(100);

       

        return view('app.admin.users.incomedetails', compact('title', 'sub_title', 'base', 'method', 'income', 'data'));

    }



    public function referraldetails($id)

    {



        $title     = trans("users.referral_details");

        $sub_title = trans("users.referral_details");

        $base      = trans("users.referral_details");

        $method    = trans("users.referral_details");



        $referrals      = Sponsortree::getMyReferals($id);

        $data = User::with('profile_info')->find($id);







        return view('app.admin.users.referralsdetails', compact('title', 'sub_title', 'base', 'method', 'referrals', 'data'));

    }



    public function ewalletdetails($id)

    {

        //dd($id);



        $title     = trans("users.ewallet_details");

        $sub_title = trans("users.ewallet_details");

        $base      = trans("users.ewallet_details");

        $method    = trans("users.ewallet_details");



        $data = User::with('profile_info')->find($id);

        //dd($data);

        $accounts = User::where('id', $id)->pluck('id') ;

        //dd($accounts);

        // $ewallet =Commission::wherein('commission.user_id',$accounts)

        //                     ->join('users','commission.from_id','=','users.id')

        //                    /* ->join('users','user_accounts.user_id','=','users.id')*/

        //                     ->select('users.username','commission.*')

        //                     ->where(function($j){

        //                         $j->where('payment_type','=','fund_credit');

        //                     })

        //                     ->paginate(100);



        $users1 = Commission::select('commission.id', 'user.username', 'fromuser.username as fromuser', 'commission.payment_type', 'commission.payable_amount', 'commission.created_at')

            ->join('users as fromuser', 'fromuser.id', '=', 'commission.from_id')

            ->join('users as user', 'user.id', '=', 'commission.user_id')

            ->where('commission.user_id', $id)

            ->orderBy('commission.id', 'desc');

        $users2 = Payout::select('payout_request.id', 'users.username', 'users.username as fromuser', 'payout_request.status as payment_type', 'payout_request.amount as payable_amount', 'payout_request.created_at')

            ->join('users', 'users.id', '=', 'payout_request.user_id')

            ->where('payout_request.user_id', $id)

            ->orderBy('payout_request.id', 'desc');



    

        $ewallet = $users1->union($users2)->orderBy('created_at', 'DESC')



            // ->offset($request->start)

            // ->limit($request->length)

           ->get();



     

      



        return view('app.admin.users.ewalletdetails', compact('title', 'sub_title', 'base', 'method', 'ewallet', 'data'));

    }



    public function payoutdetails($id)

    {



        $title     = trans("users.payout_details");

        $sub_title = trans("users.payout_details");

        $base      = trans("users.payout_details");

        $method    = trans("users.payout_details");



        $accounts = User::where('id', $id)->pluck('id') ;



        $data = User::with('profile_info')->find($id);



        $payout = Payout::wherein('payout_request.user_id', $accounts)

                            ->join('users', 'payout_request.user_id', '=', 'users.id')

                           ->where('payout_request.status', 'released')

                            ->select('users.username', 'payout_request.*')

                            ->paginate(100);



      //dd($payout);



        return view('app.admin.users.payoutdetails', compact('title', 'sub_title', 'base', 'method', 'data', 'payout'));

    }



    public function approve_payments()

    {

        // Show the page

        $title     =  "Pay status";

        $sub_title =  'Pay status' ;

        $base      =  'Pay status' ;

        $method    =  'Pay status' ;

        

        $payment_data_count = PendingTransactions::count();

         

        $payment_data = PendingTransactions::select('id', 'order_id', 'username', 'email', 'payment_address', 'payment_type', 'amount', 'created_at')

            // ->where('payment_type', 'register')

            //->where('id', '>','5831')
            ->where('payment_status', '!=','finish')  
            ->whereNull('approved_by')  
            // ->where('payment_status','complete')
 
            ->get();

           
 // dd($payment_data);


        return view('app.admin.users.approve_payments', compact('title', 'sub_title', 'base', 'method', 'payment_data', 'payment_data_count','payment_data'));

    }



   











    public function approve(Request $request)

    {

        // dd($request->id);

        $update= PendingTransactions::where('id', $request->id)->update(['payment_status' => 'complete','approved_by' => 'manual']);  
        Artisan::call("process:payment");
          
        Session::flash('flash_notification', array('message' => "Successfully Approved", 'level' => 'success'));
           return redirect()->back();

    }

    public function delete_approve(Request $request)

    {

  

        $delete_approve = PendingTransactions::find($request->id);



        $delete_approve->delete();

        Session::flash('flash_notification', array('message' => "Successfully Deleted !!", 'level' => 'success'));

            return redirect()->back();

    }



  public function payout_update(Request $request, $id)

    {

        $new_user=ProfileInfo::find(ProfileInfo::where('user_id', $id)->value('id'));

        $new_user->account_holder_name=$request->account_holder_name;

        $new_user->account_number=$request->account_number;

        $new_user->swift=$request->swift;

        $new_user->sort_code=$request->sort_code;

        $new_user->bank_code=$request->bank_code;

        $new_user->paypal=$request->paypal;

        $new_user->btc_wallet=$request->btc_wallet;

        $new_user->save();



        $user=User::find($id);

        $user->hypperwalletid=$request->hypperwalletid;

        $user->hypperwallet_token=$request->hyperwallet_token;
        $user->bitcoin_address=$request->bitcoin_address;

        $user->save();

        Session::flash('flash_notification', array('level'=>'success','message'=>trans('profile.details_updated')));

        return redirect()->back();

    }



    public function createhypperwalletid($id)

    {

        $users             =User::find($id);

        $prof_info         =ProfileInfo::find(ProfileInfo::where('user_id', $id)->value('id'));

        $wallet_id=uniqid();

        $hypperwalletid    = 'hypperwallet_'.$wallet_id;

        $admin_hyperwallet              = payout_gateway_details::find(1);

        $admin_hyperwallet_username     =$admin_hyperwallet->username;

        $admin_hyperwallet_programtoken =$admin_hyperwallet->program_token;

        $admin_hyperwallet_password     =$admin_hyperwallet->password;

    

        $client = new \Hyperwallet\Hyperwallet($admin_hyperwallet_username, $admin_hyperwallet_password, $admin_hyperwallet_programtoken);

        $user = new \Hyperwallet\Model\User();

        $user

        ->setClientUserId($hypperwalletid)

        ->setProfileType(\Hyperwallet\Model\User::PROFILE_TYPE_INDIVIDUAL)

        ->setFirstName($users->name)

        ->setLastName($users->lastname)

        ->setEmail($users->email)

        ->setAddressLine1($prof_info->address1)

        ->setCity($prof_info->city)

        ->setStateProvince('CA')

        ->setCountry($prof_info->country)

        ->setPostalCode($prof_info->zip);

         

        try {

            $createdUser = $client->createUser($user);

            $crd=User::where('id', $id)->update([

                'hypperwallet_token' => $createdUser->token,

                'hypperwalletid'     => $hypperwalletid,

              ]);

        

            Session::flash('flash_notification', array('message'=>'Successfully Created','level'=>'success'));

        } catch (\Hyperwallet\Exception\HyperwalletException $e) {

            echo 'Caught exception: ',  $e->getMessage(), "\n";

            $error = $e->getMessage();

          //dd($e);

            Session::flash('flash_notification', array('message'=>$error,'level'=>'error'));

        }

        return redirect()->back();

    }



    public function loginPassword_settings(Request $request)

    {  
        $validator = Validator::make($request->all(), [

          'new_loginPassword'        => 'required|min:6',

          'confirm__loginPassword'   => 'required|min:6',

          'confirm__loginPassword'   => 'required_with:new_loginPassword|same:new_loginPassword|min:6',

           

        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);

        } else {

            $password=bcrypt($request->new_loginPassword);

            $id=$request->id;

               User::where('id', '=', $id)

               ->update(['password'=>$password]);

            Session::flash('flash_notification', array('level'=>'success','message'=>trans('profile.details_updated')));

            return redirect()->back();

        }

    }



    public function security_settings(Request $request)

    {  
        $validator = Validator::make($request->all(), [

          'security_question'        => 'required|min:6',

          'security_answer'   => 'required|min:6', 

           

        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);

        } else {

 
            $id=$request->id;

               ProfileModel::where('user_id', '=', $id)

               ->update(['security_question'=>$request->security_question,'security_answer'=>$request->security_answer]);

            Session::flash('flash_notification', array('level'=>'success','message'=>trans('profile.details_updated')));

            return redirect()->back();

        }

    }



    public function transactionPassword_settings(Request $request)

    {

        

        $validator = Validator::make($request->all(), [

            'new_transactionPassword'        => 'required|min:6',

            'confirm_transactionPassword'    => 'required|min:6',

            'confirm_transactionPassword'    => 'required_with:new_transactionPassword|same:new_transactionPassword|min:6',

           

        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);

        } else {

            User::where('id', $request->id)->update(['transaction_pass'=>$request->new_transactionPassword]);

            Session::flash('flash_notification', array('level'=>'success','message'=>trans('profile.details_updated')));

            return redirect()->back();

        }

    }



    public function enable_2fa_authentication(Request $request, $id)

    {

      

        $user=User::find($id);

        $user->enable_2fa = $request->input('enable_2fa');

        $user->save();

        Session::flash('flash_notification', array('level'=>'success','message'=>trans('profile.details_updated')));

        return redirect()->back();

    }



    public function getNews()

    {

        $title     =  trans('users.news');

        $sub_title =  trans('users.news');

        $base      =  trans('users.news');

        $method    =  trans('users.news');

        $news=News::orderBy('created_at', 'DESC')->paginate(5);

        return view('app.admin.users.createnews', compact('title', 'sub_title', 'base', 'method', 'news'));

    }



    public function postNews(Request $request)

    {



        if ($request->summernoteInput == null) {

            Session::flash('flash_notification', array('level'=>'error','message'=>'Target Media and content fields are Required'));

            return redirect()->back();

        } else {

             $post=News::create([

                 'title'           =>$request->post_name,

                 'content'        => $request->summernoteInput,

               

             ]);



            Session::flash('flash_notification', array('level'=>'success','message'=>'Post Added successfully'));

            return redirect()->back();

        }

    }



    public function viewnews($id)

    {

        $title     =  trans('users.view_news');

        $sub_title =  trans('users.view_news');

        $base      =  trans('users.view_news');

        $method    =  trans('users.view_news');

        $post=News::find($id);

        return view('app.admin.users.viewnews', compact('title', 'sub_title', 'base', 'method', 'post'));

    }

    public function allnews()

    {

        $title     =  trans('users.view_news');

        $sub_title =  trans('users.view_news');

        $base      =  trans('users.view_news');

        $method    =  trans('users.view_news');

        $news=News::orderBy('created_at', 'DESC')->paginate(5);

        return view('app.admin.users.allnews', compact('title', 'sub_title', 'base', 'method', 'news'));

    }



    public function editnews($id)

    {



        $title     =  trans('users.edit_news');

        $sub_title =  trans('users.edit_news');

        $base      =  trans('users.edit_news');

        $method    =  trans('users.edit_news');

        $news=News::find($id);

        return view('app.admin.users.editnews', compact('title', 'sub_title', 'base', 'method', 'news'));

    }

    public function posteditnews(Request $request)

    {

        // dd($request->all());

        $news=News::find($request->post_id);

        $news->title = $request->post_name;

        $news->content =$request->summernoteInput;

        $news->save();

        Session::flash('flash_notification', array('level'=>'success','message'=>trans('users.post_edited_successfully')));

        return redirect('admin/getnews');

    }



    public function deletenews(Request $request)

    {

        $news=News::find($request->id);

        $news->delete();

        Session::flash('flash_notification', array('level'=>'success','message'=>trans('users.post_edited_successfully')));

        return redirect('admin/getnews');

    }



    public function getVideos()

    {



        $title     =  trans('users.videos');

        $sub_title =  trans('users.videos');

        $base      =  trans('users.videos');

        $method    =  trans('users.videos');

        $videos=EventVideos::all();

        $result=array();

        foreach ($videos as $key => $video) {

            $video_html=EventVideos::getVideoHtmlAttribute($video->url);

            $result[$video->id]['id']=$video->id;

            $result[$video->id]['title']=$video->title;

            $result[$video->id]['url']=$video_html;

            $result[$video->id]['created']=$video->created_at;

          # code...

        }

        // dd($result);

        // dd($result);

        return view('app.admin.users.videos', compact('title', 'sub_title', 'base', 'method', 'result'));

    }



    public function postVideos(Request $request)

    {

       



          

             $url=$this::isValidURL(trim($request->videos));



        if ($url<>0) {

            EventVideos::create([

            'title'       =>$request->title,

            'url'=>$request->videos,

            'type'      =>'video',

            ]);



            Session::flash('flash_notification', array('level' => 'success', 'message' => 'Videos Added Successfully'));

        } else {

            Session::flash('flash_notification', array('level' => 'error', 'message' => 'Please check the url'));

        }

    

      

        

         return redirect()->back();

    }



    public static function isValidURL($url)

    {

        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);

    }

    public function editvideo($id)

    {

        $title     =  trans('users.edit_video');

        $sub_title =  trans('users.edit_video');

        $base      =  trans('users.edit_video');

        $method    =  trans('users.edit_video');

        $editvideo=EventVideos::find($id);

        return view('app.admin.users.editvideo', compact('title', 'sub_title', 'base', 'method', 'editvideo'));

    }



    public function posteditvideo(Request $request)

    {



        $video=EventVideos::find($request->id);

        $url=$this::isValidURL(trim($request->videos));



        if ($url<>0) {

            $video->title = $request->title;

            $video->url=$request->videos;

            $video->save();





            Session::flash('flash_notification', array('level' => 'success', 'message' => 'Videos edited Successfully'));

        } else {

            Session::flash('flash_notification', array('level' => 'error', 'message' => 'Please check the url'));

        }

        

        return redirect()->back();

    }



    public function deletevideo(Request $request)

    {

        $delete_video=EventVideos::find($request->id);

        $delete_video->delete();

    }



    public function users_file()

    {

        $title     = "Users File";

        $sub_title = "Users File";

        $base      = "Users File";

        $method    = "Users File";

        $uploads = User::where('status','=',"pending")->

        get();       

        return view('app.admin.users.users_file', compact('title', 'sub_title', 'base', 'method', 'uploads'));

    }



     public function approve_file(Request $request ,$id)

    {        

        User::where('id','=',$id)->update(['status'=>"approve",'approved'=>2]);

        Session::flash('flash_notification', array('level' => 'success', 'message' => trans('User Approved Sucessfully')));

        return Redirect::back();

    }    

    public function delete_file(Request $request,$id)

    {

        // User::where('id',$id)->delete();

         User::where('id',$id)->update(['status'=>"rejected"]);

        Session::flash('flash_notification', array('level' => 'success', 'message' => 'Deleted successfully'));

        return Redirect::back();

    }

     public function getDownloadfile(Request $request)

    {

              

        $file    = public_path() . "/assets/uploads/" . $request->name;

        // dd($file);

        $headers = array(

            'Content-Type: application/pdf',

        );





        return Response::download($file, $request->name, $headers);

    }



       public function repurchase()

    {

        

        $title     = 'Product Repurchase';

        $sub_title ='Product Repurchase';

        $base      = 'Product Repurchase';

        $method    ='Product Repurchase';

         $packages=Packages::where('id','>',1)->pluck('package','id');
        // $packages=Packages::where('id','>',1)->get();





        return view('app.admin.users.repurchase', compact('title', 'sub_title', 'base', 'method','packages'));

    }

    public function repurchaseuser(Request $request)

    {

        

       $validator = Validator::make($request->all(), [

            'username' => 'required|exists:users',

           ]);



            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator);

            } else {



                $user_id=User::where('username',$request->username)->value('id');

                $cur_package=ProfileModel::where('user_id',$user_id)->value('package');

$prev=PurchaseHistory::where('user_id',$user_id)->max('id');
$prev_pack=PurchaseHistory::where('id',$prev)->value('package_id');
$prev_pack_sv=Packages::where('id',$prev_pack)->value('sv');

                    // $package=Packages::where('sv',$request->package)

                    $package=Packages::find($request->package);

                    $today = date('Y-m-d H:i:s'); 

                    $daystosum = 30; 

                    $next_purchase_date = date('Y-m-d H:i:s', strtotime($today.' + '.$daystosum.' days'));

// dd($package);
                    
                 $purchase_id= PurchaseHistory::create([

                  'user_id' =>$user_id,

                 'purchase_user_id' =>$user_id,

                 'package_id' =>$package->id,

                 'pv' => $package->sv,

                 'count' =>1,

                 'total_amount' =>$package->amount,

                 'pay_by' =>"admin",

                 'sales_status'=>"yes",
                 // 'approved'=>"approved",

                 'rs_balance' =>$package->amount,

                 'purchase_type' => "admin_products_purchased",

                 'next_purchase_date'=>$next_purchase_date,

                ]);



                 
           // $pendings=PendingCommission1::where('type','pending')->where('give_sp_cm','=',0)->pluck('user_id');
           // $pendings=$pendings->toArray();
           // $test = in_array($user_id, $pendings);
           
           //      if($test == true){
           //      foreach ($pendings as $key => $value) 
           //      { 
           //        $sponsor=Sponsortree::where('user_id',$value)->value('sponsor');
           //        $s_id=PurchaseHistory::where('user_id',$sponsor)->max('id');
           //        $sponsor_pack_sv=PurchaseHistory::where('id',$s_id)->value('pv');
           //        if($sponsor_pack_sv >= 51){
           //        if($user_id == $value){
           //        $sponsor=Sponsortree::where('user_id',$value)->value('sponsor');


           //        SponsorCommission::sponsorCommission($value,$package->id,$prev_pack_sv,$sponsor);
           //        PendingCommission1::where('user_id','=',$value)->update(['type'=>'receve','give_sp_cm'=>1]);
           //      }
           //      } 
           //    }}
              // else{
//edited on today               
                      
                            // $total_sv=PurchaseHistory::where('user_id',$user_id)->sum('pv');        if($total_sv <=816)
                            //     {
                            //         $sv=$package->sv;
                            //         $sponsor=Sponsortree::where('user_id',$user_id)->value('sponsor');
                            //         SponsorCommission::sponsorCommission($user_id,$sv,$prev_pack_sv,$sponsor);
                            //     }
                            //     else
                            //     {                                    
                            //         $prev=PurchaseHistory::where('user_id',$user_id)->max('id');                              
                            //         $prev_sv=PurchaseHistory::where('id','!=',$prev)->where('user_id',$user_id)->sum('pv');
                            //         $sv=816-$prev_sv;
                            //         if($sv > 1)
                            //         {
                            //         $sponsor=Sponsortree::where('user_id',$user_id)->value('sponsor');
                            //         SponsorCommission::sponsorCommission($user_id,$sv,$prev_pack_sv,$sponsor);
                            //          }
                            //       }
                                   
                                
                        

                
              // }
///////////////
//binary pending
// $binary_pendin=PendingBinaryCommission::where('status','=',0)->where('sponsor_id',$user_id)->max('id');
// $binary_pending=PendingBinaryCommission::where('id','=',$binary_pendin)->get();
// foreach ($binary_pending as $key => $value)
// {
//  // dd($value); 

//   $a=PurchaseHistory::where('user_id',$value['left_user_id'])->max('id');
//   $b=PurchaseHistory::where('user_id',$value['right_user_id'])->max('id');
//   $a1=PurchaseHistory::where('id',$a)->value('pv');
//   $b2=PurchaseHistory::where('id',$b)->value('pv');
//   if($a1 >= 51 && $b2 >=51){
//     if($a < $b)
//     {
//       // dd($value['left_user_id'],$value['right_user_id']);

// PointTable::binary($value['right_user_id'], $user_id);
//     }
//     if($b < $a)
//     {
// PointTable::binary($value['left_user_id'], $user_id);

//     }

//   // PointTable::binary($value['right_user_id'], $user_id);
//   PendingBinaryCommission::where('sponsor_id','=',$user_id)->update(['status'=>1]);
// }
// }
  

                  

//         
           
              
            
            // PointTable::updatePoint($package->sv,$user_id); 

            $sum_pv=PurchaseHistory::where('user_id',$user_id)->sum('pv');

            $rank_id=User::where('id',$user_id)->value('rank_id');

            $next_rank_id=$rank_id+1;

            // Ranksetting::RankUpdate1($user_id,$sum_pv,$next_rank_id,$rank_id);

            $sponsor_id=Sponsortree::where('user_id',$user_id)->value('sponsor');

            // Ranksetting::StockiestBonus($sponsor_id,$user_id,$package->sv);

            Session::flash('flash_notification', array('level' => 'success', 'message' => trans('Packages purchased')));

               return Redirect::back();          



      







}



     

     }  

 public function change_email(Request $request, $id)

    {

        $title     = trans('adminuser.change_email');

        $sub_title     = trans('adminuser.change_email');

        $base     = trans('adminuser.change_email');

        $method     = trans('adminuser.change_email');
        $item = PendingTransactions::find($id) ;

        return view('app.admin.users.mail', compact('title', 'sub_title', 'base', 'method','id','item'));

    }

     public function change_emails(Request $request)

    {

        $validator = Validator::make($request->all(), [

            // 'email' => 'required',

            'email'   => 'required|unique:pending_transactions,email|email|max:255',

            

        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);

        }
        else{
       

        PendingTransactions::where('id', '=', $request->id)->update(['email'=>$request->email]);
         Session::flash('flash_notification', array('level' => 'success', 'message' => trans('Email Updated')));

         return redirect('admin/approve_payments') ;

               }   
        }

   public function change_username(Request $request, $id)

    {

        $title     = trans('adminuser.change_email');

        $sub_title     = trans('adminuser.change_email');

        $base     = trans('adminuser.change_email');

        $method     = trans('adminuser.change_email');
                $item = PendingTransactions::find($id) ;


        return view('app.admin.users.username_change', compact('title', 'sub_title', 'base', 'method','id','item'));

    }

     public function change_usernames(Request $request)

    {

        $validator = Validator::make($request->all(), [

            // 'email' => 'required',

            'username'   => 'required|unique:pending_transactions',

            

        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);

        }
        else{
       

        PendingTransactions::where('id', '=', $request->id)->update(['username'=>$request->username]);
         Session::flash('flash_notification', array('level' => 'success', 'message' => trans('Usename Changed')));

         return redirect('admin/approve_payments') ;
               }   
        }

   

       public function load_positions()

    {

        $title     = trans('adminuser.add_number_of_positions');

        $sub_title     = trans('adminuser.add_number_of_positions');

        $base     = trans('adminuser.add_number_of_positions');

        $method     = trans('adminuser.add_number_of_positions');





        return view('app.admin.users.load_positions', compact('title', 'sub_title', 'base', 'method'));

    }
    
    public function updatload_positions(Request $request){

      
          
          $validator        = Validator::make($request->all(),[
                // 'username' => 'required|exists:users'
          ]
              );

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);

        } else {



          $user_id= 1 ;//User::where('username',$request->username)->value('id');      
      
 
          LoadPosition::create([
                  'user_id'        => $user_id,
                  'no_of_positions'   => $request->load_position,                
          ]);

          $count = UserAccounts::where('user_id',$user_id)->count() ;
          for ($i=0; $i< $request->load_position; $i++)
          {
              $count = $count +1 ;
              $useraccounts= UserAccounts::create([
                'user_id'  => $user_id,
                'account_type' => 'positions',
                'account_no'   => '001'.$count ,           
                'approved'   => 'approved' ,           
              ]);  
              PendingTable::create([
                'account_id'=>$useraccounts->id,
                'next'=>1,
                'status'=>'pending',
                'from_id'=>$user_id,

              ]) ;
          }   
          Artisan::call("tree:upgrade");
          Session::flash('flash_notification', array('message' => trans('users.successfully_added'), 'level' => 'success'));
          return redirect()->back();

            }

        

    }

   

   public function positions()

    {

        $title     = "Position";

        $sub_title     ="Position";

        $base     = "Position";

        $method     = "Position";
 

        $reportdata = UserAccounts::where('user_accounts.approved', 'pending')
            ->where('user_accounts.account_type','=','positions')
            ->join('users', 'users.id', '=', 'user_accounts.user_id')
            ->select('user_accounts.id','user_accounts.created_at', 'users.username','user_accounts.account_type','user_accounts.account_no','user_accounts.approved')->get();
           // dd($reportdata);
        return view('app.admin.users.position', compact('title', 'sub_title', 'base', 'method','reportdata'));

    }

     public function approve_position(Request $request ,$id,$type)

    {        

        $item =UserAccounts::find($id);
        $item->approved= $type;
        $item->save();


        if($type == 'approved'){

        DB::table('pending_table')->insert([
                                            'account_id'=>$item->id,
                                            'next'=>1,
                                            'status'=>'pending',
                                        ]) ;
        Artisan::call('tree:upgrade');
        Session::flash('flash_notification', array('level' => 'success', 'message' => trans('Position Approved Sucessfully')));
        }else{

        Session::flash('flash_notification', array('level' => 'success', 'message' => trans('Position deleted  Sucessfully')));
        }
        return Redirect::back();

    } 

     public function reavtivation(){

        $title     = "Reactivation";

        $sub_title     ="Reactivation";

        $base     = "Reactivation";

        $method     = "Reactivation";

 

        $reportdata = Reactivation::where('reactivation.status', 'pending')
                                    ->join('user_accounts', 'user_accounts.id', '=', 'reactivation.account_id')
                                    ->join('users', 'users.id', '=', 'user_accounts.user_id')
                                   ->select('reactivation.id','reactivation.created_at', 'users.username','reactivation.status','user_accounts.account_no','user_accounts.account_type')
                                   ->get();
         
        return view('app.admin.users.reactivation', compact('title', 'sub_title', 'base', 'method','reportdata'));

    }





     

    public function approvereavtivation($id){


 
      $item= Reactivation::find($id);

      // dd($item) ;
      if($item->status == 'pending'){
        $item->status ='approved' ;
        $item->save() ;

        PendingTable::create([                   
                    'account_id' => $item->account_id,
                    'next'       => 1,
                    'status'     => "pending",  
                    'from_id'    => 0,                                       
                ]);

      }

      Artisan::call('tree:upgrade');


      Session::flash('flash_notification', array('level' => 'success', 'message' => trans('Account re activated Sucessfully')));
        return Redirect::back();


          
    }


     public function phaseusers($id=1){

        $title     = "Circle user";
        $sub_title     ="Circle user";
        $base     = "User";
        $method     = "Circle user";

        $next =$id  ;
        if($id == 1 ){
            $next = null ;
        }

        $data = DB::table('tree_table'.$next)->where('type','yes')
                ->join('user_accounts','user_accounts.id','=','tree_table'.$next.'.user_id')
                ->join('users','users.id','=','user_accounts.user_id')
                ->select('users.username','user_accounts.*')
                ->get();

     

 

         
        return view('app.admin.users.phaseusers', compact('title', 'sub_title', 'base', 'method','data'));

    }


}

