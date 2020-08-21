<?php



namespace App\Http\Controllers\user;



use Illuminate\Http\Request;

use DB;

use Auth;

use Validator;

use App\EwalletModel;

use App\User;

use App\Mail;

use App\Commission;

use App\Sponsortree;

use App\Payout;

use App\Balance;

use App\SalaryCommission;

use App\RewardCommission;

use App\RedemptionCommission;







use DataTables;

use Session;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Http\Controllers\user\UserAdminController;



class Ewallet extends UserAdminController

{

    /**

     * Display a listing of the resource.

     *

     * @return Response

     */

    public function index(Request $request)

    {

        

         $title     = trans('ewallet.ewallet');

        $sub_title = trans('ewallet.ewallet');

        $base      = trans('ewallet.ewallet');

        $method    = trans('ewallet.ewallet');



        if (!session('wallet_type')) {

            Session::put('wallet_type', 'All');

        }

        return view('app.user.ewallet.wallet', compact('title', 'sub_title', 'base', 'method'));

    }



    

    public function data(Request $request)

    {



        $amount = 0;

        $users1 = array();

        $users2 = array();

 
         $users1 = Commission::select('commission.id', 'user.username', 'fromuser.username as fromuser', 'commission.payment_type', 'commission.payable_amount', 'commission.created_at')
            ->join('user_accounts', 'user_accounts.id', '=', 'commission.from_id')
            ->join('users as fromuser', 'fromuser.id', '=', 'user_accounts.user_id')
            ->join('users as user', 'user.id', '=', 'commission.user_id')
            ->where('commission.user_id',Auth::user()->id)
            ->orderBy('commission.id', 'desc');

        $users2 = Payout::select('payout_request.id', 'users.username', 'users.username as fromuser', 'payout_request.status as payment_type', 'payout_request.amount as payable_amount', 'payout_request.created_at')
            ->join('users', 'users.id', '=', 'payout_request.user_id')
            ->where('payout_request.user_id',Auth::user()->id)
            ->orderBy('payout_request.id', 'desc');



        $ewallet_count = $users1->union($users2)->orderBy('created_at', 'DESC')->get()->count();
 
        $users = $users1->union($users2)->orderBy('created_at', 'DESC') ;

 


         return DataTables::of($users)

            ->editColumn('fromuser', '@if ($payment_type =="released" || $payment_type =="pending") Adminuser @else {{$fromuser}} @endif')

         

            ->editColumn('payment_type', ' @if ($payment_type =="released" || $payment_type =="pending") Payout released @else <?php  echo str_replace("_", " ", "$payment_type") ;  ?> @endif')



               ->editColumn('payable_amount', 'BTC @if($payable_amount>=0)  <span> {{(round($payable_amount,8))}} </span> @else  <span  style="color: red;" >{{(round($payable_amount,8))}}</span> @endif')



         

            // ->removeColumn('id') 

            ->setTotalRecords($ewallet_count)

            ->escapeColumns([])

            ->make();

    }



    public function fund()

    {

        $title = trans('wallet.fund_transfer');

        $sub_title =  trans('wallet.fund_transfer');

        $base =  trans('wallet.fund_transfer');

        $method =  trans('wallet.fund_transfer');



        $user_balance = Balance::where('user_id', Auth::user()->id)->value('balance') ;

        $total_debit  = Commission::where('user_id', '=', Auth::user()->id)->where('payment_type', 'fund_debit')->sum('payable_amount');

        $total_credit = Commission::where('user_id', '=', Auth::user()->id)->where('payment_type', 'fund_credit')->sum('payable_amount');

        return view('app.user.ewallet.fund', compact('title', 'sub_title', 'base', 'method', 'user_balance', 'total_debit', 'total_credit'));

    }



    public function fundtransfer(Request $request)

    {

        // dd($request->all());

     // dd($request->username);

          $validator=Validator::make($request->all(), [

                'username'=>'required|exists:users',

                'amount'=>'required',

                 'note'=>'required'

                ]);

        if ($validator->fails()) {

            return  redirect()->back()->withErrors(trans("ewallet.username_or_amount_is_not_valid"));

        } else {

            if ($request->username==Auth::user()->username) {

                return  redirect()->back()->withErrors(trans("ewallet.self_credit_is_not_possible"));

            }

            if (User::find(Auth::user()->id)->transaction_pass <> $request->trans_pass) {

                return  redirect()->back()->withErrors(trans("ewallet.invalid_transaction_password"));

            }





            if (Balance::where('user_id', Auth::user()->id)->value('balance') >= $request->amount) {

                $user_id = User::where('username', '=', $request->username)->value('id');

                Commission::create([

                    'user_id'=>$user_id,

                    'from_id'=>Auth::user()->id,

                    'total_amount'=>$request->amount,

                    'payable_amount'=>$request->amount,

                    'payment_type'=>'fund_credit',

                    'note' =>$request->note,

                    ]);

                Commission::create([

                    'user_id'=>Auth::user()->id,

                    'from_id'=>$user_id,

                    'total_amount'=>$request->amount*-1,

                    'payable_amount'=>$request->amount*-1,

                    'payment_type'=>'fund_debit',

                    'note' =>$request->note,

                    ]);

                Balance::where('user_id', $user_id)->increment('balance', $request->amount);

                Balance::where('user_id', Auth::user()->id)->decrement('balance', $request->amount);

                Session::flash('flash_notification', array('message'=>trans('wallet.amount_credited'),'level'=>'success'));

                return redirect()->back();

            } else {

                 Session::flash('flash_notification', array('message'=>trans('wallet.not_enough_balance'),'level'=>'error'));

                return redirect()->back();

            }

        }

    }







    public function mytransfer()

    {



        $title =  trans('wallet.my_transfer');

        $sub_title =  trans('wallet.my_transfer');

        $base =  trans('wallet.my_transfer');

        $method =   trans('wallet.my_transfer');

        $data1 = Commission::join('users', 'users.id', '=', 'commission.user_id')

                           ->join('users as authuser', 'authuser.id', '=', 'commission.from_id')

                           ->where('commission.user_id', Auth::user()->id)

                           ->where('commission.payment_type', 'fund_debit')

                           ->select('authuser.username as fromuser', 'commission.total_amount', 'commission.payment_type', 'commission.created_at', 'commission.note');

        $data2 = Commission::join('users', 'users.id', '=', 'commission.user_id')

                           ->join('users as authuser', 'authuser.id', '=', 'commission.from_id')

                           ->where('commission.user_id', Auth::user()->id)

                           ->where('commission.payment_type', 'fund_credit')

                           ->select('authuser.username as fromuser', 'commission.total_amount', 'commission.payment_type', 'commission.created_at', 'commission.note');

        $data = $data1->union($data2)->get();



        return view('app.user.ewallet.mytransfer', compact('title', 'sub_title', 'base', 'method', 'data'));

    }

     public function cash_wallet()

    {



        $title     = "Cash Wallet";

        $sub_title = "Cash Wallet";

        $base      = "Cash Wallet";

        $method    = "Cash Wallet";

        $users1 = Commission::select('commission.id', 'user.username', 'fromuser.username as fromuser', 'commission.payment_type', 'commission.payable_amount', 'commission.created_at')

            ->join('users as fromuser', 'fromuser.id', '=', 'commission.from_id')

            ->join('users as user', 'user.id', '=', 'commission.user_id')
            ->where('commission.payable_amount','>',0)
            ->where('commission.user_id',Auth::user()->id) ->get();


           

        return view('app.user.ewallet.cash', compact('title', 'sub_title', 'base', 'method', 'data','users1'));



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

             ->where('salary_commission.user_id',Auth::user()->id)

            // ->orderBy('redemption_commission', 'desc')

            ->get();

           

        return view('app.user.ewallet.salary', compact('title', 'sub_title', 'base', 'method', 'data','users1'));



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

            ->where('reward_commission.user_id',Auth::user()->id)

            // ->orderBy('redemption_commission', 'desc')

            ->get();

           

           

            



        return view('app.user.ewallet.reward_wallet', compact('title', 'users', 'user', 'sub_title', 'base', 'method','users1'));

    }

      public function redemption_wallet()

    {



        $title     ="Redemption Wallet";

        $sub_title ="Redemption Wallet";

        $base      ="Redemption Wallet";

        $method    ="Redemption Wallet";



        $users1 = RedemptionCommission::select('redemption_commission.id', 'user.username', 'fromuser.username as fromuser', 'redemption_commission.payment_type', 'redemption_commission.payable_amount', 'redemption_commission.created_at')

            ->join('users as fromuser', 'fromuser.id', '=', 'redemption_commission.from_id')

            ->join('users as user', 'user.id', '=', 'redemption_commission.user_id')

             ->where('redemption_commission.user_id',Auth::user()->id)

            // ->orderBy('redemption_commission', 'desc')

            ->get();

            

            



        return view('app.user.ewallet.redemption', compact('title', 'users', 'user', 'sub_title', 'base', 'method','users1'));





    }

}

