<?php namespace App\Http\Controllers\Admin;

use App\Balance;
use App\Http\Controllers\Admin\AdminController;
use App\Mail;
use App\Payout;
 use App\ProfileInfo;
use App\Sponsortree;
use App\Settings;
use App\PurchaseHistory;
use App\Packages;
use App\User;
 use App\Emails;
use App\AppSettings;
use App\PendingTransactions;
use App\Commission;
use App\UserAccounts;
use App\Tree_Table2;
use App\Tree_Table3;
use App\Tree_Table4;
use App\Tree_Table5;
use App\Tree_Table6;
use App\Tree_Table;
use App\EwalletSettings;
use App\Transactions;
use Auth;
use DB;
use Carbon;
use Crypt;
 use App\Models\Helpdesk\Ticket\Ticket;

use Illuminate\Http\Request;

class DashboardController extends AdminController
{

    public function index()
    {
        $users=0;
 
        $title     = trans('dashboard.dashboard');
        $sub_title = trans('dashboard.your-dashboard');
        $base      = trans('dashboard.home');
        $method    = trans('dashboard.dashboard');

           
 
         $total_messages = Mail::where('to_id', '=', 1)->count();
         $system_btc  = round(EwalletSettings::find(1)->balance,8) ;
         $special_wallet  = round(EwalletSettings::find(7)->balance,8) ;
         // $positions_infinity  = round(EwalletSettings::find(6)->balance,8) ;
         $positions_infinity  = Transactions::where('created_at','>','2020-07-08 08:04:03')->where('payment_type','positions_infinity_btc')->sum('amount');   

          $total_amount=round(Commission::sum('total_amount'), 2);
         $weekly_users_count = User::where('id', '>', 1)->whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime('-7 days')))->count();
        $monthly_users_count = User::where('id', '>', 1)->whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 month')))->count();
        $yearly_users_count = User::where('id', '>', 1)->whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 year')))->count();
        
          

        $user_account_count= DB::table('tree_table')->where('type','yes')->count() ; 

        // UserAccounts::where('approved','=','approved')->count();
        $user_phase1=Tree_Table::where('user_id','>',0)->count('user_id');
         $user_phase2=Tree_Table2::where('user_id','>',0)->count('user_id');
         $user_phase3=Tree_Table3::where('user_id','>',0)->count('user_id'); 
         $user_phase4=Tree_Table4::where('user_id','>',0)->count('user_id'); 
         $user_phase5=Tree_Table5::where('user_id','>',0)->count('user_id'); 
         $user_phase6=Tree_Table6::where('user_id','>',0)->count('user_id'); 

         $approved_positions =UserAccounts::where('account_type','positions')->where('approved','approved')->count();
         $pending_positions =UserAccounts::where('account_type','positions')->where('approved','=','pending')->count();
        $total_payout =  Payout::where('user_id','>',2)->where('account_type','account')->sum('amount') ;
        $positions_wallet =  Payout::where('user_id','>',2)->where('account_type','positions')->sum('amount') ;
        $admin_wallet =  Payout::where('user_id',1)->where('account_type','account')->sum('amount') ;
        $system_wallet =  Payout::where('user_id',2)->where('account_type','account')->sum('amount') ;
          

        $wallet_id =  Settings::find(1)->wallet_id ;

          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.bitaps.com/btc/v1/wallet/state/".$wallet_id,
            CURLOPT_RETURNTRANSFER => true
          ));

          $response = curl_exec($curl);
          $err = curl_error($curl);
          curl_close($curl);

          if ($err) {
            $wallet_data = $err ;
          } else {
                $wallet_data = json_decode($response) ;  
          }
        
          // dd($wallet_data);
 
        $payout_wallet = Settings::find(1)->wallet_address ;

        $total_messages = Mail::where('to_id', '=', 1)->count();

        

       
        return view('app.admin.dashboard.index', compact('title', 'total_users', 'total_amount', 'sub_title', 'base', 'method', 'weekly_users_count', 'monthly_users_count', 'yearly_users_count','user_account_count','payout','user_phase1','user_phase2','user_phase3','wallet_data','payout_wallet','approved_positions','pending_positions','total_payout','system_btc','positions_wallet','admin_wallet','system_wallet','positions_infinity','user_phase4','user_phase5','special_wallet','user_phase6','total_messages'));
    }


       /**
     * Fetching dashboard graph data to implement graph.
     *
     * @return type Json
     */
    public function ChartData($date111 = '', $date122 = '')
    {
        $date11 = strtotime($date122);
        $date12 = strtotime($date111);
        if ($date11 && $date12) {
            $date2 = $date12;
            $date1 = $date11;
        } else {
            // generating current date
            $date2 = strtotime(date('Y-m-d'));
            $date3 = date('Y-m-d');
            $format = 'Y-m-d';
            // generating a date range of 1 month
            $date1 = strtotime(date($format, strtotime('-1 month'.$date3)));
        }
        $return = '';
        $last = '';
        for ($i = $date1; $i <= $date2; $i = $i + 86400) {
            $thisDate = date('Y-m-d', $i);

            $created = \DB::table('tickets')->select('created_at')->where('created_at', 'LIKE', '%'.$thisDate.'%')->count();
            $closed = \DB::table('tickets')->select('closed_at')->where('closed_at', 'LIKE', '%'.$thisDate.'%')->count();
            $reopened = \DB::table('tickets')->select('reopened_at')->where('reopened_at', 'LIKE', '%'.$thisDate.'%')->count();

            $value = ['date' => $thisDate, 'open' => $created, 'closed' => $closed, 'reopened' => $reopened];
            $array = array_map('htmlentities', $value);
            $json = html_entity_decode(json_encode($array));
            $return .= $json.',';
        }
        $last = rtrim($return, ',');

        return '['.$last.']';

        // $ticketlist = DB::table('tickets')
        //     ->select(DB::raw('MONTH(updated_at) as month'),DB::raw('SUM(CASE WHEN status = 3 THEN 1 ELSE 0 END) as closed'),DB::raw('SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as reopened'),DB::raw('SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as open'),DB::raw('SUM(CASE WHEN status = 5 THEN 1 ELSE 0 END) as deleted'),
        //         DB::raw('count(*) as totaltickets'))
        //     ->groupBy('month')
        //     ->orderBy('month', 'asc')
        //     ->get();
        // return $ticketlist;
    }


    public function getGenderJson()
    {

            $male_users_count  = ProfileInfo::where('user_id', '<>', 1)->where('gender', 'm')->count();
            $female_users_count  = ProfileInfo::where('user_id', '<>', 1)->where('gender', 'f')->count();
            return response()->json(
                [[
                'gender' => 'Male',
                "value"=> $male_users_count,
                "color"=> "#66BB6A"
                ],
                [
                'gender' => 'Female',
                "value" => $female_users_count,
                "color"=>"#EF5350"
                ]],
                200
            );
    }


    public function getUsersJoiningJson(Request $request)
    {

        $today = Carbon\Carbon::today();
      // $table->whereBetween('date', [$today->startOfMonth(), $today->endOfMonth])->count();


         // this week results
        $fromDate = Carbon\Carbon::now()->subDay()->startOfWeek()->toDateString(); // or ->format(..)
        $tillDate = Carbon\Carbon::now()->subDay()->toDateString();


        $duration = strtotime('-365 days');

        if (isset($request->period)) {
            if ($request->period === 'today') {
               // this week results
              // $fromDate = Carbon\Carbon::today(); // or ->format(..)
              // $tillDate = Carbon\Carbon::tomorrow();

                $users = DB::table('users')
                ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d-%H") as date'), DB::raw('count(*) as value'))
                // ->whereBetween( DB::raw('created_at'), [$fromDate, $tillDate] )
                ->whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 days')))
                ->where('id', '>', 1)
                ->orderBy('date', 'asc')
                ->where('id', '>', '1')
                ->groupBy('date')
                // ->take(15)
                ->get();
                return response()->json($users);
            } elseif ($request->period === 'week') {
               // this week results
              // $fromDate = Carbon\Carbon::now()->subDay()->startOfWeek()->toDateString(); // or ->format(..)
              // $tillDate = Carbon\Carbon::now()->subDay()->toDateString();
                $duration = strtotime('-7 days');
            } elseif ($request->period === 'month') {
              // this week results
              // $fromDate = Carbon\Carbon::now()->subDay()->startOfMonth()->toDateString(); // or ->format(..)
              // $tillDate = Carbon\Carbon::now()->subDay()->toDateString();
                $duration = strtotime('-1 months');
            } elseif ($request->period === 'year') {
              // this week results
              // $fromDate = Carbon\Carbon::now()->subDay()->startOfYear()->toDateString(); // or ->format(..)
              // $tillDate = Carbon\Carbon::now()->subDay()->toDateString();
                $duration = strtotime('-1 years');
            }
        }
      

        $users = DB::table('users')
          ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as value'))
          // ->whereBetween( DB::raw('DATE(created_at)'), [$fromDate, $tillDate] )
          ->whereDate('created_at', '>=', date('Y-m-d H:i:s', $duration))
          ->orderBy('date', 'asc')
          ->groupBy('date')
          ->where('id', '>', '1')
          // ->take(15)
          ->get();
          return response()->json($users);

        // $users = DB::table('users')
        //   ->select(DB::raw('DATE(created_at) as date'),DB::raw('count(*) as value'))
        //   ->orderBy('date', 'asc')
        //   ->groupBy('date')

        //   // ->take(30)
        //   ->whereDate('created_at', '<=', Carbon::today())
        //   ->whereDate('created_at', '<', $duration)
        //   ->get();
          // return response()->json($users);
    }

    public function getUsersWeeklyJoiningJson()
    {

        // this week results
        $fromDate = Carbon\Carbon::now()->subDay()->startOfWeek()->toDateString(); // or ->format(..)
        $tillDate = Carbon\Carbon::now()->subDay()->toDateString();


        $users = DB::table('users')
          ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as value'))
          ->whereBetween(DB::raw('DATE(created_at)'), [$fromDate, $tillDate])
          ->orderBy('date', 'asc')
          ->groupBy('date')
          // ->take(15)
          ->get();
          return response()->json($users);
    }

    public function getUsersMonthlyJoiningJson()
    {

        // this week results
        $fromDate = Carbon\Carbon::now()->subDay()->startOfMonth()->toDateString(); // or ->format(..)
        $tillDate = Carbon\Carbon::now()->subDay()->toDateString();


        $users = DB::table('users')
          ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as value'))
          ->whereBetween(DB::raw('DATE(created_at)'), [$fromDate, $tillDate])
          ->orderBy('date', 'asc')
          ->groupBy('date')
          // ->take(15)
          ->get();
          return response()->json($users);
    }

    public function getUsersYearlyJoiningJson()
    {

        // this week results
        $fromDate = Carbon\Carbon::now()->subDay()->startOfYear()->toDateString(); // or ->format(..)
        $tillDate = Carbon\Carbon::now()->subDay()->toDateString();


        $users = DB::table('users')
          ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as value'))
          ->whereBetween(DB::raw('DATE(created_at)'), [$fromDate, $tillDate])
          ->orderBy('date', 'asc')
          ->groupBy('date')
          // ->take(15)
          ->get();
          return response()->json($users);
    }




    public function getPackageSalesJson()
    {


        $graph=array();
        $pack=Packages::select('id', 'package')->get();
        $data=PurchaseHistory::distinct()->select(DB::raw('DATE(created_at) as date'))->orderBy('created_at', 'asc')->get();
        foreach ($data as $key => $date) {
            $graph['dates'][]=$date->date;

            foreach ($pack as $key => $value) {
                $graph[$value->id]['pack']=$value->package;
                $graph[$value->id]['purchase_count'][]=PurchaseHistory::where('created_at', 'LIKE', '%'.$date->date.'%')->where('package_id', $value->id)->count();
            }
        }
        return response()->json($graph);
    }

    


    /**
     * Fetching tickets
     *
     * @return type Json
     */
    public function TicketsStatusJson($date111, $date122)
    {
        
        // $date11 = date('Y-m-d', $date122);
        // $date12 =date('Y-m-d', $date111);

        // dd(date('m/d/Y', $date111));

        $date11 = strtotime($date111);
        $date12 = strtotime($date122);
        // dd($date111);

        // dd(strtotime(date('Y-m-d', strtotime('-1 month'.date('Y-m-d')))));

        if ($date11 && $date12) {
            $date2 = $date12;
            $date1 = $date11;
        } else {
            // generating current date
            $date2 = strtotime(date('Y-m-d'));
            $date3 = date('Y-m-d');
            $format = 'Y-m-d';
            // generating a date range of 1 month
            $date1 = strtotime(date($format, strtotime('-1 month'.$date3)));
        }
        $return = '';
        $last = '';
        for ($i = $date1; $i <= $date2; $i = $i + 86400) {
            $thisDate = date('Y-m-d', $i);

            $created = \DB::table('tickets')->select('created_at')->where('created_at', 'LIKE', '%'.$thisDate.'%')->count();
            $closed = \DB::table('tickets')->select('closed_at')->where('closed_at', 'LIKE', '%'.$thisDate.'%')->count();
            $reopened = \DB::table('tickets')->select('reopened_at')->where('reopened_at', 'LIKE', '%'.$thisDate.'%')->count();

            $value = ['date' => $thisDate, 'open' => $created, 'closed' => $closed, 'reopened' => $reopened];
            $array = array_map('htmlentities', $value);
            $json = html_entity_decode(json_encode($array));
            $return .= $json.',';
        }
        $last = rtrim($return, ',');

        return '['.$last.']';

        // $ticketlist = DB::table('tickets')
        //     ->select(DB::raw('MONTH(updated_at) as month'),DB::raw('SUM(CASE WHEN status = 3 THEN 1 ELSE 0 END) as closed'),DB::raw('SUM(CASE WHEN status = 2 THEN 1 ELSE 0 END) as reopened'),DB::raw('SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) as open'),DB::raw('SUM(CASE WHEN status = 5 THEN 1 ELSE 0 END) as deleted'),
        //         DB::raw('count(*) as totaltickets'))
        //     ->groupBy('month')
        //     ->orderBy('month', 'asc')
        //     ->get();
        // return $ticketlist;
    }


    public function getmonthusers()
    {

        for ($i = 1; $i <= 12; $i++) {
            echo $count = User::whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->count();
            echo ",";
        }
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
        $title  = trans('dashboard.bitaps_preview');
        $base=trans('dashboard.bitaps_preview');
        $method=trans('dashboard.bitaps_preview');
        $sub_title=trans('dashboard.bitaps_preview');

        return view('app.admin.dashboard.bitapspreview', compact('title', 'base', 'method', 'sub_title'));
    }
}
