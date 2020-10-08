<?php



namespace App\Http\Controllers\admin;



use App\Balance;

use App\Commission;

use App\Http\Controllers\Admin\AdminController;

use App\Payout;

use App\RsHistory;

use App\User;

use App\Currency;



use Auth;

use DataTables;

use Illuminate\Http\Request;

use Session;

use Validator;

use Crypt;

use Redirect;



use App\RedemptionCommission;

use App\SalaryCommission;

use App\RewardCommission;



class EwalletController extends AdminController

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

   public function index()

    {



        $title     = "Wallet";

        $sub_title = "Wallet";

        $base      = "Wallet";

        $method    = "Wallet";

 
         
        



        return view('app.admin.ewallet.wallet', compact('title', 'sub_title', 'base', 'method'));

    }



    public function data(Request $request)

    {

        $amount = 0;

        $users1 = array();

        $users2 = array();

        //echo $user_id;die();

        $users1 = Commission::select('commission.id', 'user.username', 'fromuser.username as fromuser', 'commission.payment_type', 'commission.payable_amount', 'commission.created_at')
            ->join('user_accounts', 'user_accounts.id', '=', 'commission.from_id')
            ->join('users as fromuser', 'fromuser.id', '=', 'user_accounts.user_id')
            ->join('users as user', 'user.id', '=', 'commission.user_id')
            ->orderBy('commission.id', 'desc');

        // $users2 = Payout::select('payout_request.id', 'users.username', 'users.username as fromuser', 'payout_request.status as payment_type', 'payout_request.amount as payable_amount', 'payout_request.created_at')
        //     ->join('users', 'users.id', '=', 'payout_request.user_id')

        //     ->orderBy('payout_request.id', 'desc');



        $ewallet_count = $users1->orderBy('created_at', 'DESC')->get()->count();
        // $ewallet_count = $users1->union($users2)->orderBy('created_at', 'DESC')->get()->count();

        $users = $users1->orderBy('created_at', 'DESC')
        // $users = $users1->union($users2)->orderBy('created_at', 'DESC')
        // $users = $users2->orderBy('created_at', 'DESC')



            // ->offset($request->start)

            // ->limit($request->length)

            ->get();





      // die();



        return DataTables::of($users)

            ->editColumn('fromuser', '@if ($payment_type =="released" || $payment_type =="pending") Adminuser @else {{$fromuser}} @endif')

         

            ->editColumn('payment_type', ' @if ($payment_type =="released" || $payment_type =="pending") Payout released @else <?php  echo str_replace("_", " ", "$payment_type") ;  ?> @endif')



               ->editColumn('payable_amount', 'GHS @if($payable_amount>=0)  <span> {{(round($payable_amount,8))}} </span> @else  <span  style="color: red;" >{{(round($payable_amount,8))}}</span> @endif')



         

            // ->removeColumn('id') 

            ->setTotalRecords($ewallet_count)

            ->escapeColumns([])

            ->make();

    }

    public function userwallet(Request $request)

    {

        $amount     = 0;

        $users1     = array();

        $users2     = array();

        $users      = array();

        $user_id    = Auth::id();

        $bonus_type = trans('ewallet.bonus_type');

        if (session('user') != 'none') {

            $user_id = $request->user;

        }

        if (session('wallet_type') != 'All') {

            $bonus_type = $request->bonus_type;

        }

        $title = trans('ewallet.ewallet');

        $users = User::lists('users.username', 'users.id');

        Session::put('user', $request->user);

        Session::put('bonus_type', $request->bonus_type);

        return redirect('admin/wallet');

    }



    public function search(Request $request)

    {

        $keywords    = $request->get('username');

        $suggestions = User::where('username', 'LIKE', '%' . $keywords . '%')->get();

        return $suggestions;

    }



    public function fund()

    {



        $title     = trans('ewallet.credit_fund');

        $sub_title = trans('ewallet.credit_fund');

        $base      = trans('ewallet.credit_fund');

        $method    = trans('ewallet.credit_fund');

        $data      = Commission::where('payment_type', 'LIKE', 'fund_%')
                                ->join('users', 'users.id', 'commission.user_id')
                                ->where('commission.from_id', 1)                              
                                ->select('commission.*', 'users.username')
                                ->orderBy('created_at', 'DESC')
                                ->paginate(10);

         $users1 = Commission::select('commission.payable_amount', 'users.username')
                 ->where('commission.from_id', 1)                            
                 ->join('users', 'users.id', 'commission.user_id')
                 ->orderBy('commission.created_at', 'DESC');
         $users2 = RedemptionCommission::select('redemption_commission.payable_amount', 'users.username')
                 ->where('redemption_commission.from_id', 1)                            
                 ->join('users', 'users.id', 'redemption_commission.user_id')
                 ->orderBy('redemption_commission.created_at', 'DESC');  
         $users3 = RewardCommission::select('reward_commission.payable_amount', 'users.username')
                 ->where('reward_commission.from_id', 1)                          
                 ->join('users', 'users.id', 'reward_commission.user_id')
                 ->orderBy('reward_commission.created_at', 'DESC');  
         $users4 = SalaryCommission::select('salary_commission.payable_amount', 'users.username')
                 ->where('salary_commission.from_id', 1)                            
                 ->join('users', 'users.id', 'salary_commission.user_id')
                 ->orderBy('salary_commission.created_at', 'DESC');                          

        $data = $users1->union($users2)->union($users3)->union($users4)


            ->get();
                        

        return view('app.admin.ewallet.fund', compact('title', 'sub_title', 'base', 'method', 'data'));

    }



    public function creditfund(Request $request)

    {
         // dd($request->all());

        $input = $request->all();
        $input['username'] = $request->username;
        $request->merge($input); 
        $validator = Validator::make($request->all(), [
            'username' => 'required|exists:users',
            'amount'   => 'required|numeric',
            'note'   => 'required',
        ]);
        if($request->amount <= 0)
        {
         Session::flash('flash_notification', array('level' => 'error', 'message' => trans('Invalid Amount'))); 
          return Redirect::back();
        }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $user_id = User::where('username', $request->username)->value('id');
            if (isset($request->debit_amount)) {
                $use_bal=Balance::where('user_id', $user_id)->value('balance');
                if ($request->category =="cash_wallet" && $use_bal >= $request->amount ) {        
                    Commission::create([
                    'user_id'        => $user_id,
                    'from_id'        => Auth::user()->id,
                    'total_amount'   => -$request->amount,
                    'payable_amount' => -$request->amount,
                    'payment_type'   => 'fund_debit',
                    'note'           => $request->note,
                    ]);
                    Balance::where('user_id', $user_id)->decrement('balance', $request->amount);
                    Session::flash('flash_notification', array('message' => trans('users.amount_debited_from_user_ewallet'), 'level' => 'success'));
                    return redirect()->back();
                }
                    if ($request->category =="red_wallet" && $use_bal >= $request->amount )
                     {        
                    RedemptionCommission::create([
                    'user_id'        => $user_id,
                    'from_id'        => Auth::user()->id,
                    'total_amount'   => -$request->amount,
                    'payable_amount' => -$request->amount,
                    'payment_type'   => 'fund_debit',
                    // 'note'           => $request->note,
                    ]);
                    Balance::where('user_id', $user_id)->decrement('redemption_balance', $request->amount);
                    Session::flash('flash_notification', array('message' => trans('users.amount_debited_from_user_redemption_balance'), 'level' => 'success'));
                    return redirect()->back();
                }
                    if ($request->category =="reward_wallet" && $use_bal >= $request->amount )
                     {        
                    RewardCommission::create([
                    'user_id'        => $user_id,
                    'from_id'        => Auth::user()->id,
                    'total_amount'   => -$request->amount,
                    'payable_amount' => -$request->amount,
                    'payment_type'   => 'fund_debit',
                    // 'note'           => $request->note,
                    ]);
                    Balance::where('user_id', $user_id)->decrement('reward_balance', $request->amount);
                    Session::flash('flash_notification', array('message' => trans('users.amount_debited_from_user_reward_balance'), 'level' => 'success'));
                    return redirect()->back();
                } 
                 if ($request->category =="salary_wallet" && $use_bal >= $request->amount )
                     {        
                    SalaryCommission::create([
                    'user_id'        => $user_id,
                    'from_id'        => Auth::user()->id,
                    'total_amount'   => -$request->amount,
                    'payable_amount' => -$request->amount,
                    'payment_type'   => 'fund_debit',
                    // 'note'           => $request->note,
                    ]);
                    Balance::where('user_id', $user_id)->decrement('salary_balance', $request->amount);
                    Session::flash('flash_notification', array('message' => trans('users.amount_debited_from_user_reward_balance'), 'level' => 'success'));
                    return redirect()->back();
                    }
                else {
                    Session::flash('flash_notification', array('message' => trans("users.sorry_there_is_no_enough_balance_in_user_account!!"), 'level' => 'danger'));
                    return redirect()->back();
                }
            } else {
                if ($request->category =="cash_wallet")
                { 
                Commission::create([
                'user_id'        => $user_id,
                'from_id'        => Auth::user()->id,
                'total_amount'   => $request->amount,
                'payable_amount' => $request->amount,
                'payment_type'   => 'fund_credit',
                'note'           => $request->note,
                ]);
                Balance::where('user_id', $user_id)->increment('balance', $request->amount);
                Session::flash('flash_notification', array('message' => trans('users.amount_credited_to_cash_ewallet'), 'level' => 'success'));
                   return redirect()->back();
                return redirect()->back();
            }
            if ($request->category =="red_wallet")
                { 
                RedemptionCommission::create([
                'user_id'        => $user_id,
                'from_id'        => Auth::user()->id,
                'total_amount'   => $request->amount,
                'payable_amount' => $request->amount,
                'payment_type'   => 'fund_credit',
                // 'note'           => $request->note,
                ]);
                Balance::where('user_id', $user_id)->increment('redemption_balance', $request->amount);
                Session::flash('flash_notification', array('message' => trans('users.amount_credited_to_redemption_ewallet'), 'level' => 'success'));
                   return redirect()->back();
                return redirect()->back();
            }
            if ($request->category =="reward_wallet")
                { 
                RewardCommission::create([
                'user_id'        => $user_id,
                'from_id'        => Auth::user()->id,
                'total_amount'   => $request->amount,
                'payable_amount' => $request->amount,
                'payment_type'   => 'fund_credit',
                // 'note'           => $request->note,
                ]);
                Balance::where('user_id', $user_id)->increment('reward_balance', $request->amount);
                Session::flash('flash_notification', array('message' => trans('users.amount_credited_to_reward_wallet'), 'level' => 'success'));
                   return redirect()->back();
                return redirect()->back();
            }
             if ($request->category =="salary_wallet")
                { 
                SalaryCommission::create([
                'user_id'        => $user_id,
                'from_id'        => Auth::user()->id,
                'total_amount'   => $request->amount,
                'payable_amount' => $request->amount,
                'payment_type'   => 'fund_credit',
                // 'note'           => $request->note,
                ]);
                Balance::where('user_id', $user_id)->increment('salary_balance', $request->amount);
                Session::flash('flash_notification', array('message' => trans('users.amount_credited_to_salary_wallet'), 'level' => 'success'));
                   return redirect()->back();
                return redirect()->back();
            }


            }

        }

    }



    public function rs_wallet()

    {



        $title     = trans('ewallet.rs_wallet');

        $sub_title = trans('ewallet.rs_wallet');

        $base      = trans('ewallet.rs_wallet');

        $method    = trans('ewallet.rs_wallet');



/*data_table*/

        $rstable = RsHistory::select('rs_history.id', 'user.username', 'fromuser.username as fromuser', 'rs_history.rs_debit', 'rs_history.rs_credit', 'rs_history.created_at')

            ->join('users as fromuser', 'fromuser.id', '=', 'rs_history.from_id')

            ->join('users as user', 'user.id', '=', 'rs_history.user_id')

            ->orderBy('rs_history.id', 'desc')

            ->get();



            // dd($rstable);



        return view('app.admin.ewallet.rs_wallet', compact('title', 'sub_title', 'base', 'method','rstable'));

    }



    public function rs_data(Request $request)

    {



        $rs_count = RsHistory::count();

        $rstable = RsHistory::select('rs_history.id', 'user.username', 'fromuser.username as fromuser', 'rs_history.rs_debit', 'rs_history.rs_credit', 'rs_history.created_at')

            ->join('users as fromuser', 'fromuser.id', '=', 'rs_history.from_id')

            ->join('users as user', 'user.id', '=', 'rs_history.user_id')

            ->orderBy('rs_history.id', 'desc')

            ->get();



        return Datatables::of($rstable)

            ->removeColumn('id')

            ->setTotalRecords($rs_count)

            ->make();

    }

    public function redemption_wallet()

    {

        $title     = trans('ewallet.title');

        $sub_title = trans('ewallet.sub_title');

        $base      = trans('ewallet.title');

        $method    = trans('ewallet.method');



        $users1 = RedemptionCommission::select('redemption_commission.id', 'user.username', 'fromuser.username as fromuser', 'redemption_commission.payment_type', 'redemption_commission.payable_amount', 'redemption_commission.created_at')

            ->join('users as fromuser', 'fromuser.id', '=', 'redemption_commission.from_id')

            ->join('users as user', 'user.id', '=', 'redemption_commission.user_id')

             ->where('redemption_commission.payable_amount', '>', 0)

            // ->orderBy('redemption_commission', 'desc')

            ->get();

            



        return view('app.admin.ewallet.redemption_wallet', compact('title', 'users', 'user', 'sub_title', 'base', 'method','users1'));





    }

        public function salary_wallet()

    {

        $title     = trans('ewallet.title');

        $sub_title = trans('ewallet.sub_title');

        $base      = trans('ewallet.title');

        $method    = trans('ewallet.method');



        $users1 = SalaryCommission::select('salary_commission.id', 'user.username', 'fromuser.username as fromuser', 'salary_commission.payment_type', 'salary_commission.payable_amount', 'salary_commission.created_at')

            ->join('users as fromuser', 'fromuser.id', '=', 'salary_commission.from_id')

            ->join('users as user', 'user.id', '=', 'salary_commission.user_id')

            // ->where('commission.payable_amount', '>', 0)

            // ->orderBy('redemption_commission', 'desc')

            ->get();

           

            



        return view('app.admin.ewallet.salary_wallet', compact('title', 'users', 'user', 'sub_title', 'base', 'method','users1'));





    }

          public function reward_wallet()

    {

        $title     = trans('ewallet.title');

        $sub_title = trans('ewallet.sub_title');

        $base      = trans('ewallet.title');

        $method    = trans('ewallet.method');



        $users1 = RewardCommission::select('reward_commission.id', 'user.username', 'fromuser.username as fromuser', 'reward_commission.payment_type', 'reward_commission.payable_amount', 'reward_commission.created_at')

            ->join('users as fromuser', 'fromuser.id', '=', 'reward_commission.from_id')

            ->join('users as user', 'user.id', '=', 'reward_commission.user_id')

            // ->where('commission.payable_amount', '>', 0)

            // ->orderBy('redemption_commission', 'desc')

            ->get();

            // dd($users1);

           

            



        return view('app.admin.ewallet.reward_wallet', compact('title', 'users', 'user', 'sub_title', 'base', 'method','users1'));





    }



}

