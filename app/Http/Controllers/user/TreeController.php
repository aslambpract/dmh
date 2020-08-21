<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use Auth;
use DB;
use Crypt;
use App\Tree_Table;
use App\Mail;
use App\User;
use App\Sponsortree;
use App\UserAccounts;
use App\Http\Requests;
use App\Http\Requests\user\treeRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\user\UserAdminController;

class TreeController extends UserAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($treeid="",$accountid =null)
    {
        
        $title =  "Phase$treeid Genealogy";
         $base =  "Phase$treeid Genealogy";
        $method =  "Phase$treeid Genealogy";
        $sub_title = "Phase$treeid Genealogy";

         if(is_null($accountid)){


            // $accountid = UserAccounts::where('user_id',Auth::user()->id)->first()->id; 

         $next = $treeid ;

         if($treeid ==1){
         	$next = null;
         }
           $accountid = DB::table('tree_table'.$next)->join('user_accounts','user_accounts.id','tree_table'.$next.'.user_id')
            								->join('users','users.id','=','user_accounts.user_id')
            								->where('users.id',Auth::user()->id)
            								->value('user_accounts.id');

            	// dd($accountid) ;
            								
        }else{
            $accountid = Crypt::decrypt($accountid);
        }

        return view('app.user.tree.index', compact('tree', 'title', 'user', 'method', 'base', 'sub_title','treeid','accountid'));
    }
    public function indexPost(treeRequest $request, $levellimit,$treeid,$accountid=null)
    {

        
        if (is_null($accountid)) {
            $user_id = UserAccounts::where('user_id',Auth::user()->id)->value('id');
        }else{
            $user_id = $accountid;

        }
        $tree = Tree_Table::getTree($treeid,true, $user_id, array(), 0, 2);
        return $tree = Tree_Table::generateTree($tree);

     }

    public function treeUp(treeRequest $request, $levellimit)
    {
        $user_id = $request->data ;
        if (Auth::user()->id != $request->data) {
            $user_id =Tree_Table::getFatherID($request->data);
        }
        $tree=Tree_Table::getTree(true, $user_id, array(), 0, $levellimit);
        return $tree=Tree_Table::generateTree($tree);
    }

    public function sponsortree()
    {
        $tree=Sponsortree::getTree(true, Auth::user()->id);
       
        $tree=Sponsortree::generateTree($tree);
        $title =trans('tree.sponsor_tree');
        $userss = User::getUserDetails(Auth::id());
        $user = $userss[0];
        $base = trans('tree.sponsor_tree');
        $method = trans('tree.sponsor_tree');
        $sub_title = trans('tree.sponsor_tree');

        return view('app.user.tree.sponsortree', compact('tree', 'title', 'user', 'base', 'method', 'sub_title'));
    }
    public function postSponsortree(treeRequest $request)
    {

        $user_id=($request->data == 1)?Auth::user()->id:0;

        $tree=Sponsortree::getTree(true, $user_id);
       
        return $tree=Sponsortree::generateTree($tree);
    }
    public function getsponsortreeurl(treeRequest $request)
    {


        $user_id = $request->data;

        $tree = Sponsortree::getTree(true, $user_id);

        return $tree = Sponsortree::generateTree($tree);
    }


    public function getsponsorchildrenByUserName(treeRequest $request, $username, $levellimit)
    {


        $user_id = User::where('username', $username)->value('id');


        if (Sponsortree::checkUserinTeam($user_id, [Auth::user()->id]) || $user_id == Auth::user()->id) {
            $tree = Sponsortree::getTree(true, $user_id);
        } else {
            $tree = Sponsortree::getTree(true, Auth::user()->id);
        }

        return $tree = Sponsortree::generateTree($tree);
    }


    public function sponsortreeUp(treeRequest $request, $base64)
    {
          $user_id = Crypt::decrypt($base64) ;
        if (Auth::user()->id != $user_id) {
            $user_id =Sponsortree::getSponsorID($user_id);
        }

        
        $tree=Sponsortree::getTree(true, $user_id);
       
        return $tree=Sponsortree::generateTree($tree);
    }

    public function sponsortreechild(treeRequest $request, $base64)
    {
         $user_id = Crypt::decrypt($base64) ;
        // if(Auth::user()->id != $request->data)
        //     $user_id =Sponsortree::getSponsorID($request->data);

        
        $tree=Sponsortree::getTree(true, $user_id);
       
        return $tree=Sponsortree::generateTree($tree);
    }
    
    public function tree()
    {
        $title =trans('tree.tree');
        $sub_title = trans('tree.tree');
        $root = Crypt::encrypt('root');
        $userss = User::getUserDetails(Auth::id());
        $user = $userss[0];
        $base = trans('tree.tree');
        $method = trans('tree.tree');
        return view('app.user.tree.tree', compact('title', 'root', 'user', 'base', 'method', 'sub_title'));
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
    public function treedata(Request $request)
    {

        $icon="icon-user text-success  fa-lg";
        $decrypted = Crypt::decrypt($request->id);
        if ($decrypted == "root") {
                return '[{ 
                        "id": "'.Crypt::encrypt(Auth::user()->id).'", 
                        "text": "'.Auth::user()->username.'", 
                        "children": true, 
                        "type": "root",
                        "file": "treedata",
                        "icon":"'.$icon.'",                   
                        "state": {
                            "opened": true
                        }
                    }]';
        }
       
        return json_encode(Sponsortree::getTreeJson($decrypted));
    }
}
