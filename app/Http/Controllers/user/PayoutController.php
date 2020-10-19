<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use Auth;
use DB;
use Input;
use Redirect;
use Session;
use Validator;
use App\Balance;
use App\Payout;
use App\User;
use App\Mail;
use App\Activity;
use App\Settings;
use App\Transactions;
use App\Payoutmanagemt;
use App\payout_gateway_details;
use App\Http\Requests;
use App\Http\Requests\user\getPayoutRquestingRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\user\UserAdminController;
use App\Emails;
use App\Jobs\SendEmail;

class PayoutController extends UserAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $se=Settings::value('payout_notification');

      
        $payment_type=Payoutmanagemt::where('status', 1)->get();
        $payment_mode=array();
        foreach ($payment_type as $key => $value) {
            $payment_mode[$key]['id']=$value->id;
            $payment_mode[$key]['payment_mode']=$value->payment_mode;
        }
        $user_balance = Balance::where('user_id', '=', Auth::user()->id)->value('balance');
        $title        = trans('payout.payout_request');
        $sub_title    = trans('payout.my_requests');
        $total_payout = Payout::where('user_id', '=', Auth::user()->id)
                                ->where('status', '=', 'released')
                                ->sum('amount');
        $total_pending = Payout::where('user_id', '=', Auth::user()->id)
                                ->where('status', '=', 'pending')
                                ->sum('amount');
        $rules = ['req_amount' => 'required'];
        
        $base = trans('payout.payout');
        $method = trans('payout.payout_request');

        $min=payout_gateway_details::value('min_payout_amount');
        if($min == 0)
        {
            $min='NA';

        }

       
        return view('app.user.payout.payout_request', compact( 'title', 'user_balance', 'rules', 'base', 'method', 'sub_title', 'total_pending', 'total_payout', 'payment_type', 'payment_mode','min'));
    }
   


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function request(Request $request)
    {

        $validator = Validator::make(Input::all(), array(
            'req_amount' => 'required|numeric',
            'payment_mode' =>'required',

        ));
    

        if ($validator->fails()) {
        // get the error messages from the validator
            $messages = "Request amount is required";

        // redirect our user back to the form with the errors from the validator
            return Redirect::to('payoutrequest')
            ->withErrors($validator);
        }

        $payout_details=payout_gateway_details::find(1);
        if ($request->req_amount < $payout_details->min_payout_amount) {
            Session::flash('flash_notification', array('level'=>'error','message'=>trans('payout.amount_is_less_than_minimum_request_amount')));
             return redirect()->back();
        }

        
        $req_amount = round($request->req_amount, 2);
        $user_balance = Balance::getTotalBalance(Auth::user()->id);
        if ($req_amount <= $user_balance and $req_amount > 0 and is_numeric($request->req_amount) and $payout_details->payout_setup_admin == 'no') {

            $payout=Payout::create([
                'user_id'        => Auth::user()->id,
                'amount'         => $req_amount,
                'payment_mode'   => $request->payment_mode,
                'status'         => 'pending',
            ]);
          
            $email = Emails::find(1);
            
            Balance::updateBalance(Auth::user()->id, $req_amount);
            Activity::add("payout requested by ".Auth::user()->username, Auth::user()->username ." requested payout  an amount of $req_amount ");

            SendEmail::dispatch($payout, $email->from_email ,$email->from_name, 'request')->delay(now()->addSeconds(1)); 

            Session::flash('flash_notification', array('level'=>'success','message'=>trans('payout.request_completed')));
        } else {
            Session::flash('flash_notification', array('level'=>'error','message'=>trans('payout.payout_is_not_possible')));
        }
        return Redirect::action('user\PayoutController@index');
    }
    public function viewall()
    {
        $title = trans('payout.view_all_requests');
        $sub_title = trans('payout.my_requests');
        $requests =  Transactions::select('transactions.*', 'users.username','user_accounts.account_type','user_accounts.account_no')
                                ->join('users', 'users.id', '=', 'transactions.user_id')
                                ->join('user_accounts', 'user_accounts.id', '=', 'transactions.account_id')
                                 ->where('transactions.payment_type','payout')
                                 ->where('transactions.user_id',Auth::user()->id)
                                 ->orderBy('id', 'DESC')
                                 ->get(); 

        $base = trans('payout.payout');
        $method = trans('payout.my_requests');
        return view('app.user.payout.view_all_requests', compact('title', 'requests', 'base', 'method', 'sub_title'));
    }
    public function reg()
    {
        $title = trans('payout.view_all_requests');
        return view('app.user.payout.reg', compact('title', 'requests'));
    }
    public function getpayout()
    {
        $details = Payout::getUserPayoutDetails();
        print_r($details);
    }
}
