<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\treeRequest;
use App\Mail;
use App\Sponsortree;
use App\Tree_Table;
use App\Tree_Table2;
use App\UserAccounts;
use App\User;
use Auth;
use Crypt;
use Input;
use DB;
use Response;

use Illuminate\Http\Request;

class GenealogyTreeController extends AdminController
{
    /**
     * Display the page with tree holder.
     *
     * @return Response
     */

    public function index($treeid="",$accountid=null)
    {
        
        if(is_null($accountid)){
            $accountid = 1;
        }else{
            $accountid = Crypt::decrypt($accountid);
        }

        $title     = "Phase $treeid Genealogy";
        $sub_title = "Phase $treeid Genealogy";
        $base      = "Phase $treeid Genealogy";
        $method    = "Phase $treeid Genealogy";
       
        return view('app.admin.tree.index', compact('title', 'sub_title', 'base', 'method','treeid','accountid'));
    }

      public function phase1_index()
    {
        

        $title     = "Phase2 Genealogy";
        $sub_title = "Phase2 Genealogy";
        $base      = "Phase2 Genealogy";
        $method    = "Phase2 Genealogy";
       
        return view('app.admin.tree.phase1_index', compact('title', 'sub_title', 'base', 'method'));
    }
      public function phase2_index()
    {
        

        $title     = "Phase3 Genealogy";
        $sub_title = "Phase3 Genealogy";
        $base      = "Phase3 Genealogy";
        $method    = "Phase3 Genealogy";
       
        return view('app.admin.tree.phase2_index', compact('title', 'sub_title', 'base', 'method'));
    }


    public function getTree(treeRequest $request, $levellimit,$treeid,$accountid=null)
    {

        $user_id = $request->data;
         $levellimit = 10 ;//isset($request->levellimit) ? $request->levellimit : 5;
        
        if(is_null($accountid)){

            if ($user_id == null) {
                $user_id = UserAccounts::where('user_id',Auth::user()->id)->first()->id;
            }
        }else{
            $user_id = $accountid ;
        }


        //Added $levellimit to pass level limit to function. default is null, must pass the argument.
        $tree = Tree_Table::getTree($treeid,true, $user_id, array(), 0, $levellimit);
        return $tree = Tree_Table::generateTree($tree);
    }

        
    /**
     * getChildrenGenealogy
     * @param  [var] $id [id of user]
     * @return [json]     [returns json data with children wrapper]
     */
    public function getChildrenGenealogyByUserName($username, $levellimit,$treeid)
    {
       

        $user_id = $username;

        if($username >1 ){
            $next =$treeid ;

            if($next ==1){
                $next =null ; 
            }
            $user_id = DB::table('tree_table'.$next)->where('user_id',$user_id)->value('placement_id') ; 
        }


         $levellimit = 3 ;//isset($request->levellimit) ? $request->levellimit : 5;
        
        if(is_null($user_id)){

            if ($user_id == null) {
                $user_id = UserAccounts::where('user_id',Auth::user()->id)->first()->id;
            }
        }else{
            $user_id = $user_id ;
        }

        // dd($user_id);

        //Added $levellimit to pass level limit to function. default is null, must pass the argument.
        $tree = Tree_Table::getTree($treeid,true, $user_id, array(), 0, $levellimit);
        return $tree = Tree_Table::generateTree($tree);




        // $user_id = User::where('username', $username)->value('id');
        // $tree = Tree_Table::getTree($treeid,true, $user_id, array(), 0, $levellimit);
        // return $tree = Tree_Table::generateTree($tree);
    }

    /**
     * getChildrenGenealogy
     * @param  [var] $id [id of user]
     * @return [json]     [returns json data with children wrapper]
     */
    public function getChildrenGenealogy($id, $levellimit,$treeid)
    {
        $user_id = urldecode(Crypt::decrypt($id));
        if ($levellimit > 10) {
            $levellimit = 10;
        }
        $tree = Tree_Table::getTree($treeid,true, $user_id, array(), 0, $levellimit);
        return $tree = Tree_Table::generateTree($tree);
    }
    
    /**
     * getParentGenealogy
     * @param  [var] $id [id of user]
     * @return [json]     [returns json data with children wrapper]
     */
    public function getParentGenealogy($id, $levellimit,$treeid)
    {
        $user_id = Crypt::decrypt($id);
        if (Auth::user()->id != $user_id) {
            $user_id = Tree_Table::getFatherID($user_id);
        }
        $tree = Tree_Table::getTree($treeid,true, $user_id, array(), 0, $levellimit);
        return $tree = Tree_Table::generateTree($tree);
    }
    

    public static function autocomplete(Request $request)
    {
    
        $term = $request->get('term');
    // dd($term);
        $results = array();
    
        $queries = DB::table('users')
        ->where('username', 'LIKE', '%'.$term.'%')
        ->orWhere('name', 'LIKE', '%'.$term.'%')
        ->orWhere('lastname', 'LIKE', '%'.$term.'%')
        // ->select('id')
        ->take(5)->get();
    
        foreach ($queries as $query) {
            $results[] = [ 'id' => $query->id, 'value' => $query->username. ' : '.$query->name.' '.$query->lastname,'user_id' => Crypt::encrypt($query->id),'username' => $query->username ];
        }
        return Response::json($results);
    }

    
    public static function autocompleteNew(Request $request,$treeid)
    {
    
    $term = $request->get('term');
    // dd($term);
    $results = array();

    if($treeid==1){
        $treeid = null ;
    }
    
    $queries = DB::table('tree_table'.$treeid)
        ->join('user_accounts','tree_table'.$treeid.'.user_id','=','user_accounts.id')
        ->join('users','user_accounts.user_id','=','users.id')
        ->where('username', 'LIKE', '%'.$term.'%')
        ->orWhere('name', 'LIKE', '%'.$term.'%')
        ->orWhere('lastname', 'LIKE', '%'.$term.'%')
        ->select('users.username','user_accounts.id','user_accounts.account_type','user_accounts.account_no','users.lastname','users.name')
         // ->take(50)
         ->orderby('user_accounts.id','DESC')
         ->get();
    
    foreach ($queries as $query)
    {

        $value = $query->username .' -' ;

        if( $query->account_type =="positions"){

                $value .= ' POS -' ;
        }
                $value .= $query->account_no ;

        $results[] =   [
                         'id' => $query->id, 
                         // 'value' => $query->username. ' : '.$query->name.' '.$query->lastname,
                         'value' => $value,
                         'user_id' => Crypt::encrypt($query->id),
                         'username' => $query->username 
                     ];
    }
    return Response::json($results);

    }
}
