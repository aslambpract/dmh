<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\ProfileInfo;
use App\Sponsortree;
use DB;
use Session;
use Validator;
use App\UserDocs;
use App\UserAccounts;
use Redirect;
use Input;

use App\Http\Controllers\user\UserAdminController;

class UserController extends UserAdminController
{
    
    public function suggestlist(Request $request)
    {
        if ($request->input != '/'  &&  $request->input != '.') {
                  $users['results'] = User::join('sponsortree', 'sponsortree.user_id', '=', 'users.id')->where('sponsortree.sponsor', '=', Auth::user()->id)->where('username', 'like', "%".trim($request->input)."%")->select('users.id', 'username as value', 'email as info')->get();
        } else {
            $users['results'] = User::join('sponsortree', 'sponsortree.user_id', '=', 'users.id')->where('sponsortree.sponsor', '=', Auth::user()->id)->select('users.id', 'username as value', 'email as info')->get();
        }

         echo json_encode($users);
    }
    public function leads()
    {



        $title     = "Leads";
        $sub_title = "Leads";
        $base      = "Leads";
        $method    = "Leads";
        $top_recruiters = SponsorTree::where('sponsor', '=', Auth::user()->id)
        ->select(DB::raw('COUNT(sponsor) as count'))
        ->get();
        dd($top_recruiters);
        $top_recruiters = ProfileInfo::select(array('users.id', 'users.name', 'users.username', 'country','image','profile','cover', 'users.email', 'users.created_at',
                  DB::raw('COUNT(sponsortree.sponsor) as count')))
           ->join('users', 'users.id', '=', 'profile_infos.user_id')
           ->join('sponsortree', 'sponsortree.sponsor', '=', 'profile_infos.user_id')
           ->where('sponsortree.type', '<>', 'vaccant')
           ->where('sponsortree.sponsor', '<>', 0)
           ->where('sponsortree.sponsor', '=', Auth::user()->id)
           ->where('sponsortree.created_at', '>=', date('2018-12-01 00:00:00'))
           ->groupBy('sponsortree.sponsor')
           ->orderBy('count', 'desc')
           ->limit('10')
           ->get();

        // $top_recruiters =Sponsortree::where('sponsortree.sponsor','=',Auth::user()->id)->get();

           dd($top_recruiters);


           dd($top_recruiters);
         return view('app.user.users.leads', compact('title', 'sub_title', 'base', 'method', 'top_recruiters'));
    }
    public function impersonate()
    {
        
        Session::forget('impersonate');
        Auth::loginUsingId(1);
        return redirect('admin/users');
    }

     public function upload_file()
    {
        $title = trans('users.upload_address');
        $sub_title =  trans('users.upload_address');
        $method  =  trans('users.upload_address');
           
        return view('app.user.users.upload_file',compact('title','sub_title','method'));   
        
    }

     public function user_upload_file(Request $request)
    {
      // dd($request->all());
     $validator = Validator::make($request->all(), [
            'doc'  => 'required|mimes:doc,pdf,docx,jpeg,png,jpg|max:5120',
          
            
        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors('The File That You Are Trying To Use Is Too Large');
        }
        else
        {                   
           
            UserDocs::create([
            'user_id' => Auth::user()->id,
            'doc'=>$doc,
           
            'status'       =>'pending'
            ]);                   


            Session::flash('flash_notification', array('level' => 'success', 'message' => trans('ticket_config.uploaded_successfully')));
            return Redirect::back();

        }
    }

      public function file_upload(Request $request)
     {
        $validator = Validator::make($request->all(), [
            'file'   => 'mimes:doc,pdf,docx'
        ]);

        if ($validator->fails()) {
            Session::flash('flash_notification', array('level' => 'error', 'message' => trans('ticket_config.uploaded_failed')));
            return Redirect::back();
        }
        else{ 
            if (Input::hasFile('file')) {
            $destinationPath = public_path() . '/assets/uploads';
            $extension       = Input::file('file')->getClientOriginalExtension();
            $fileName        = rand(000011111, 99999999999) . '.' . $extension;         

            Input::file('file')->move($destinationPath, $fileName);
             User::where('id','=',Auth::user()->id)->update(['file_upload'=>$fileName,'status'=>"pending"]);
            // User::create([
            //     'file_upload' => $fileName,
            //     'status'       => "pending",
            // ]);

            Session::flash('flash_notification', array('level' => 'success', 'message' => trans('ticket_config.uploaded_success')));
            return redirect::back();
        }

        }     

    }

     public function myaccount()
    {
        $title = 'Accounts';
        $sub_title =  '';
        $method  =  '';

        $users = UserAccounts::select( 'users.username','user_accounts.id','user_accounts.account_no','user_accounts.account_type','user_accounts.created_at')
                            ->join('users', 'users.id', '=', 'user_accounts.user_id')
                            ->where('user_accounts.approved','=','approved')
                            ->where('user_accounts.user_id',Auth::user()->id)
                            ->get();
           
        return view('app.user.users.myaccount',compact('title','sub_title','method','users'));   
        
    }
}
