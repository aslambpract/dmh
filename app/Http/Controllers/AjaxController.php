<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ProfileModel;
use App\Sponsortree;
use App\Balance;
use App\User;

use Validator;
use Response;
use DB;
use Auth;

class AjaxController extends Controller
{
    //

    public function validateSponsor(Request $request)
    {
   
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'sponsor' => 'exists:users,username|required',
        ]);
        // dd($request->all());
        
        if ($validator->fails()) {
            return response()->json(['valid' => false]);
        } else {
            return response()->json(['valid' => true]);
        }
        
        return response()->json(['valid' => false]);
    }

    public function validateEmail(Request $request)
    {
   
       
        $validator = Validator::make($request->all(), [
           'email' => 'required|unique:pending_transactions,email|email|max:255',
        ]);
        // dd($request->all());
        
        if ($validator->fails()) {
            return response()->json(['valid' => false]);
        } else {
            return response()->json(['valid' => true]);
        }
        
        return response()->json(['valid' => false]);
    }

    public function validateUsername(Request $request)
    {
   
       
        $validator = Validator::make($request->all(), [
           'username' => 'required|unique:pending_transactions,username|alpha_num|max:255',
        ]);
        // dd($request->all());
        
        if ($validator->fails()) {
            return response()->json(['valid' => false]);
        } else {
            return response()->json(['valid' => true]);
        }
        
        return response()->json(['valid' => false]);
    }

    public function globalmap(Request $request)
    {
        $user_info = ProfileModel::groupBy('country')->where('user_id', '>', 1)->select('country', DB::raw('count("country") as total'))->get();
        $keyed = $user_info->mapWithKeys(function ($item) {
            return [$item['country'] => $item['total']];
        });
        $list = $keyed->all();
        return Response::json($list);
    }

    public function globalmapUser(Request $request)
    {

        $users = Sponsortree::where('sponsor', '=', Auth::user()->id)
                            ->where('type', '=', 'yes')
                            ->pluck('user_id')
                            ->toArray();
   
        $user_info = ProfileModel::whereIn('user_id', $users)->groupBy('country')->select('country', DB::raw('count("country") as total'))->get();
        $keyed = $user_info->mapWithKeys(function ($item) {
            return [$item['country'] => $item['total']];
        });
        $list = $keyed->all();
        return Response::json($list);
    }


    
    public function validateewalletpassword(Request $request)
    {

        $user_det=User::where('username', $request->username)->first();
        if ($user_det <> null) {
            if ($user_det->transaction_pass == $request->password) {
                $balance=Balance::where('user_id', $user_det->id)->value('balance');
                if ($balance >= $request->amount || $user_det->id == 1) {
                     return response()->json(['valid' => true]);
                } else {
                    return response()->json(['valid' => false,'message' => 'No enough balance']);
                }
            } else {
                return response()->json(['valid' => false,'message' => 'Transaction Password Is Incorrect']);
            }
        } else {
            return response()->json(['valid' => false,'message' => 'User Not Exist']);
        }
    }
}
