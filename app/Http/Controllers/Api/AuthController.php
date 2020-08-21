<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Response;
use Session;
use Auth;
use App\User;
use App\PointTable;
use App\Balance;
use App\Payout;
use App\Ranksetting;
use App\PurchaseHistory;
use App\RsHistory;

class AuthController extends Controller
{
    public function index(Request $request)
    {
         
        $login  = urldecode($request->email) ;
        $confirmation_code   = urldecode($request->code)  ;
        $webpenter_token   = urldecode($request->token)  ;
        Session::put('webpenter_token', $webpenter_token);
        $user = User::where('email', '=', urldecode($login))
                ->where('confirmation_code', $confirmation_code)
                ->first();

        if ($user) {
            Auth::login($user);
            return redirect('user/genealogy');
        } else {
            return redirect()->back();
        }
    }
 
    public function store(Request $request)
    {
        $login  = $request->email ;
         $confirmation_code   = $request->code  ;
        $webpenter_token   = $request->token  ;
        Session::put('webpenter_token', $webpenter_token);
        $user = User::where('email', '=', urldecode($login))->where('confirmation_code', $confirmation_code)->first();

        if ($user) {
            Auth::login($user);
            return Response::json([1000=>'OK'])->header('Content-Type', 'application/json');
        } else {
            return Response::json([1000=>'not ok'])->header('Content-Type', 'application/json');
        }
    }

    public function login(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
               
            'username' => 'required|alpha_num|max:255',
            'password' => 'required|min:6',
             
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>false,'message'=>$validator->errors()], 200);
        } else {
            if (Auth::attempt(['username' => request('username'), 'password' => request('password')])) {
                $user = Auth::user();
                $user_id =User::where('username', $request->username)->value('id');
                $userresult = User::select('users.*')
                        ->where('username', $request->username)
                        ->get();
           
                $GLOBAL_RANK = Ranksetting::where('id', $userresult[0]->rank_id)->value('rank_name');
                ;
                $left_bv  =  PointTable::where('user_id', $user_id)->value('left_carry');
                $right_bv = PointTable::where('user_id', $user_id)->value('right_carry');
                $balance  = Balance::getTotalBalance($user_id);
                $total_rs = RsHistory::where('user_id', $user_id)->sum('rs_credit');
                $payout   = payout::where('user_id', $user_id)
                               ->where('status', '=', 'released')->sum('amount');
                $total_invest = PurchaseHistory::where('user_id', $user_id)->sum('total_amount');
                $total_top_up = PurchaseHistory::where('user_id', $user_id)->sum('count');
                $new_users = User::join('profile_infos', 'profile_infos.user_id', '=', 'users.id')
                              ->join('tree_table', 'tree_table.user_id', '=', 'users.id')
                              ->where('tree_table.sponsor', '=', $user_id)
                              ->limit(8)
                              ->get();
                $count_new    = count($new_users);

                $dashboard_data['GLOBAL_RANK']=$GLOBAL_RANK;
                $dashboard_data['left_bv']=$left_bv;
                $dashboard_data['right_bv']=$right_bv;
                $dashboard_data['balance']=$balance;
                $dashboard_data['total_rs']=$total_rs;
                $dashboard_data['payout']=$payout;
                $dashboard_data['total_invest']=$total_invest;
                $dashboard_data['total_top_up']=$total_top_up;
                $dashboard_data['new_users']=$new_users;
                $dashboard_data['count_new']=$count_new;
               
                


                $access_token = $user->createToken('login')->accessToken;
                return response()->json(['status'=>true,'message'=>"success",'dashboard_data'=>$dashboard_data,'access_token'=>$access_token], 200);
            } else {
                 return response()->json(['status'=>false,'message'=>"failed"], 200);
            }
        }
    }
}
