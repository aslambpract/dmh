<?php

namespace App;

use DB;
use Html;
use Auth;
use Crypt;
use Storage;

use Illuminate\Database\Eloquent\Model;

class Tree_Table extends Model
{
    public static $downline_users = '';
    public static $downline_users_count = '';

    public static $upline_users   = array();
    public static $upline_id_list = array();
    public static $downline_id_list = array();
    public static $downline = array();

    public static $MODEL_NOT_FOUND = '-1';

    protected $table = 'tree_table';

    protected $fillable = ['user_id', 'sponsor', 'placement_id', 'leg'];

    public static function getmaxid()
    {
        $users = DB::table('users')->max('user_id');
        return $users;
    }
    public static function getSponsorName($user_id)
    {
        return $sponsor_id = DB::table('tree_table')->where('user_id', $user_id)->value('sponsor');
    }

    // public static function getPlacementId($sponsor_id)
    // {
        
    //     $user_id = self::where('placement_id', $sponsor_id)->where("type", "<>", "vaccant")->value('user_id');

    //     if (!$user_id) {
    //         return $sponsor_id;
    //     }

    //     return self::getPlacementId($user_id);

    // }
    // public static function getPlacementId($sponsor_id)
    // {  
       
    //     $id= self::where('type','vaccant')->orderBy('id')->first() ;         
    //     return $id->placement_id;

    // }
    // public static function vaccantId($placement_id)
    // {       
    //     $data = self::where('placement_id', $placement_id)->where("type", "=", "vaccant")->value('id');
    //     return $data;
    // }

    //  public static function getPlacementId($sponsor_id)
    // {
    //    $user_id = self::where('placement_id', $sponsor_id)->where("type", "vaccant")->value('id');

    //     if (!$user_id) {
    //         return $sponsor_id;
    //     }
    
    //     return self::getPlacementId($user_id);




    //   //   $id = self::where('placement_id', $sponsor_id)->where("type","vaccant")->orderBy('id')->first() ; 

    //   //   if (!$id) {
    //   //       return $sponsor_id;
    //   //   } 

    //   //  else{
    //   // return $id->id;
    //   //   }
    // }



    // public static function vaccantId($placement_id, $leg)
    // {

    //     $data = self::where('placement_id', $placement_id)->where("leg", $leg)->where("type", "=", "vaccant")->value('id');

    //     return $data;
    // }


    //     public static function getPlacementId($sponsor_id)
    // {
    //     $id = self::where('placement_id', $sponsor_id)->where("type","vaccant")->orderBy('id')->first() ; 

    //      if (!$id) {
    //       dd(999);
    //     } 

    //     else{
    //        return $id->id; 
    //     }
    
        
    // }


   //  public static function gettreePlacementId($sponsor_id)
   // {
   
   //    $id =Tree_Table::where("type","=","vaccant")->whereIn('placement_id',$sponsor_id)->where('user_id','=',0)->value('placement_id');
   //    if(!isset($id)){  
   //        // $sponsor_list = Tree_Table::whereIn('placement_id',$sponsor_id)->where("type","<>","vaccant")->value('user_id');
   //         $sponsor_list = Tree_Table::whereIn('placement_id',$sponsor_id)->where('user_id','!=',0)->pluck('user_id');
   //    return self::gettreePlacementId($sponsor_list);
         
   //   }

   //    return $id;        

   // }


    public static function getPlacementId($sponsor_id)
   {
      $id = self::whereIn('placement_id', $sponsor_id)->where("type","vaccant")->orderBy('id')->first() ; 
     
            if(!isset($id)){  
       
           $sponsor_list = Tree_Table::whereIn('placement_id',$sponsor_id)->pluck('user_id');
      return self::getPlacementId($sponsor_list);
         
     }

      return $id;        

   }
    public static function vaccantId($placement_id)
    {

        $data = self::where('placement_id', $placement_id)->where("type", "=", "vaccant")->value('id');

        return $data;
    }  

    public static function createVaccant($placement_id)
    {
 
        Tree_Table::create([
            'sponsor'      => 0,
            'user_id'      => '0',
            'placement_id' => $placement_id,
            'leg'          => '1',
            'type'         => 'vaccant',
        ]);

        Tree_Table::create([
            'sponsor'      => 0,
            'user_id'      => '0',
            'placement_id' => $placement_id,
            'leg'          => '2',
            'type'         => 'vaccant',
        ]);
        // Tree_Table::create([
        //     'sponsor'      => 0,
        //     'user_id'      => '0',
        //     'placement_id' => $placement_id,
        //     'leg'          => '3',
        //     'type'         => 'vaccant',
        // ]);
    }
    public static function takeUserId($user_name)
    {
        return DB::table('users')->where('username', $user_name)->value('id');
    }


    

    public static function getTree($treeid,$root = true, $placement_id = "", $treedata = array(), $level = 0, $levellimit)
    {
        if ($level == $levellimit) {
            return false;
        }
        if($treeid == 1)
        {
            $treeid="";
        }
        if ($root) {

             $data = DB::table('tree_table'.$treeid)
                       ->where('tree_table'.$treeid.'.user_id', $placement_id)
                       ->leftJoin('user_accounts','tree_table'.$treeid.'.user_id','=','user_accounts.id')
                      ->leftJoin('users','user_accounts.user_id','=','users.id')
                      ->leftJoin('profile_infos','profile_infos.user_id','=','users.id')                  
                        ->select('tree_table'.$treeid.'.*','users.username','users.active','profile_infos.image','users.email','users.name','users.lastname','user_accounts.account_no','user_accounts.account_type')
                        ->get();    

                     
        } else {

             $data= DB::table('tree_table'.$treeid)

                        ->where('placement_id',$placement_id)->orderBy('leg','ASC')
                        ->leftJoin('user_accounts','tree_table'.$treeid.'.user_id','=','user_accounts.id')
                          ->leftJoin('users','user_accounts.user_id','=','users.id')
                         ->leftJoin('profile_infos','profile_infos.user_id','=','users.id')
                         ->select('tree_table'.$treeid.'.*','users.username','profile_infos.image','users.active','users.email','users.name','users.lastname','user_accounts.account_no','user_accounts.account_type')
                        ->get();
            
 
        }

        $currentuserid = Auth::user()->id;
        $treearray = [];
        foreach ($data as $key => $value) {
            if ($value->type == "yes" || $value->type == "no") {
                if ($root) {
                    $push = self::getTree($treeid,false, $value->user_id, $treearray, $level + 1, $levellimit);
                    $class = 'up';
                    $user_type = 'root';
                    $user_active_class = 'active';
                } else {
                    $push = self::getTree($treeid,false, $value->user_id, $treearray, $level + 1, $levellimit);
                    $class='down';
                    $user_type = 'child';
                    if ($value->active =='yes') {
                        $user_active_class = 'active';
                    } elseif ($value->active =='no') {
                        $user_active_class = 'inactive';
                    }
                }

                $treearray[$value->id]['cycle'] = $treeid == "" ? 1 : $treeid ;
                $treearray[$value->id]['cyclecount'] = $value->cyclecount ;
                   
                // $class_name = $user_active_class;
                // $treearray[$value->id]['class_name'] = $class_name;

                $treearray[$value->id]['id']      =  $value->user_id;
                $treearray[$value->id]['current_user_id'] = $currentuserid;
                $treearray[$value->id]['access_id']      = Crypt::encrypt($value->user_id);;

                // $treearray[$value->id]['user_name']       =($value->account_type =='account') ? $value->username.'-'.$value->account_no :$value->username.'-POST-'.$value->account_no ;

                $treearray[$value->id]['user_name'] =$value->username;

                $treearray[$value->id]['email']           =$value->username;
                
                $treearray[$value->id]['user_photo']       = route('imagecache', ['template' => 'profile', 'filename' => self::profilePhoto($value->username)]);
                $treearray[$value->id]['user_cover_photo']       = route('imagecache', ['template' => 'large', 'filename' => self::coverPhoto($value->username)]);

                $treearray[$value->id]['first_name']       = $value->name;
                $treearray[$value->id]['last_name']       = $value->lastname;
                $treearray[$value->id]['date_of_joining'] = date('Y-m-d', strtotime($value->created_at));

                 
                $treearray[$value->id]['user_type'] = $user_type;

                if (Auth::user()->id == 1) {
                    $treearray[$value->id]['user_role'] ='admin';
                } else {
                    $treearray[$value->id]['user_role'] ='user';
                }
                // if (!empty(array_first($push)) || !empty(array_last($push))) {
                //     $treearray[$value->id]['children'] = [array_first($push), array_last($push)];
                // }
                if($push){
                 $treearray[$value->id]['children'] = array_values($push) ;
                }else{
                 $treearray[$value->id]['children'] =  [];
                }


            } else {
                $treearray[$value->id]['class_name'] =  "vacant";
                $treearray[$value->id]['current_user_id'] = $currentuserid;
                $treearray[$value->id]['placement_accessid']      = Crypt::encrypt($value->id);
            }
        }
        $treedata = $treearray;
        return $treedata;
    }


    public static function profilePhoto($user_name)
    {
        
        // $user  = User::where('username', $user_name)->with('profile_info')->first();
        
        // $image = $user->profile_info->profile;
        
        // if (!$image) {
        //     $image = 'avatar-big.png';
        // }

        // return $image;
         $user  = User::where('username', $user_name)->with('profile_info')->first();
         if(isset($user->profile_info->profile))
        {
            $image = $user->profile_info->profile;
        }
        else{
             $image = 'avatar-big.png';
        }

        return $image;
    }

    public static function coverPhoto($user_name)
    {
        // $user  = User::where('username', $user_name)->with('profile_info')->first();
        // $image = $user->profile_info->cover;
        // if (!Storage::disk('images')->exists($image)) {
        //     $image = 'cover.jpg';
        // }
        // if (!$image) {
        //     $image = 'cover.jpg';
        // }
        // return $image;
         $user  = User::where('username', $user_name)->with('profile_info')->first();
        if(isset($user->profile_info->cover))
        {
            $image = $user->profile_info->cover;
            if (!Storage::disk('images')->exists($image)) {
            $image = 'cover.jpg';}

        }
        
        else  {
            $image = 'cover.jpg';
        }
        return $image;
    }


    public static function generateTree($users, $level = 0, $tree_structure = "")
    {
        $x = collect(collect($users)->first());
        return $x->toJson();
    }

    public static function getMyReferals($sponsor_id)
    {
        $users      = DB::table('tree_table')->where('sponsor', $sponsor_id)->get();
        $index      = 0;
        $user_array = array();
        foreach ($users as $user) {
            $user_array[$index] = self::getUserDetails($user->user_id);
            $index++;
        }
        return $user_array;
    }

    public static function getUserDetails($user_id)
    {
        return DB::table('users')->where('id', $user_id)->get();
    }
    public static function getDownlines($index, $root = true, $placement_id = "", $downline_user, $level = 0, $count = 0)
    {
        $data  = self::where('placement_id', $placement_id)->where('type', 'yes')->get();
        $count = $count + count($data);

        foreach ($data as $value) {
            if ($value->type == "yes") {
                $downline_user[$index]['user_id']             = $value->id;
                static::$downline_users[$index]['user_id']    = $value->user_id;
                static::$downline_users[$index]['join_month'] = date("m", strtotime($value->created_at));
                $index++;
                self::getDownlines($index, false, $value->id, $downline_user, $level + 1, $count);
            }
        }
    }
    public static function getDownlineCount($user_id, $index = 0, $downline_users = array())
    {
        $users = self::where('placement_id', $user_id)->where('type', 'yes')->get();

        for ($i = 0; $i < count($users); $i++) {
            $index                  = $index + ($i + 1);
            $downline_users_count[$index] = $users[$i]->user_id;
            self::getDownlineCount($users[$i]->user_id, $index, $downline_users);
        }
    }
    public static function getDown()
    {
        $count_users = count(static::$downline_users);
        $month_count;
        for ($k = 1; $k < 13; $k++) {
            $month_count[$k] = 0;
        }
        for ($j = 1; $j <= $count_users; $j++) {
            if (!empty(static::$downline_users)) {
                if (static::$downline_users[$j]['join_month'] == 1) {
                    $month_count[1] += 1;
                } elseif (static::$downline_users[$j]['join_month'] == 2) {
                    $month_count[2] += 1;
                } elseif (static::$downline_users[$j]['join_month'] == 3) {
                    $month_count[3] += 1;
                } elseif (static::$downline_users[$j]['join_month'] == 4) {
                    $month_count[4] += 1;
                } elseif (static::$downline_users[$j]['join_month'] == 5) {
                    $month_count[5] += 1;
                } elseif (static::$downline_users[$j]['join_month'] == 6) {
                    $month_count[6] += 1;
                } elseif (static::$downline_users[$j]['join_month'] == 7) {
                    $month_count[7] += 1;
                } elseif (static::$downline_users[$j]['join_month'] == 8) {
                    $month_count[8] += 1;
                } elseif (static::$downline_users[$j]['join_month'] == 9) {
                    $month_count[9] += 1;
                } elseif (static::$downline_users[$j]['join_month'] == 10) {
                    $month_count[10] += 1;
                } elseif (static::$downline_users[$j]['join_month'] == 11) {
                    $month_count[11] += 1;
                } else {
                    $month_count[$j] += 1;
                }
            }
        }
        $month = $month_count[1] . "," . $month_count[2] . "," . $month_count[3] . "," . $month_count[4] . "," . $month_count[5] . "," . $month_count[6]
            . "," . $month_count[7] . "," . $month_count[8] . "," . $month_count[9] . "," . $month_count[10] . "," . $month_count[11] . "," . $month_count[12];
        // print_r($month);
    }

    public static function getAllUpline($user_id)
    {

        $result = self::join('profile_infos', 'profile_infos.user_id', '=', 'tree_table.placement_id')
            ->where('tree_table.user_id', $user_id)
            ->select('tree_table.leg', 'tree_table.placement_id', 'tree_table.type', 'profile_infos.package')
            ->get();

        foreach ($result as $key => $value) {
            if ($value->type != 'vaccant' && $value->placement_id > 1) {
            // if ($value->type != 'vaccant') {    
                self::$upline_users[]   = ['user_id' => $value->placement_id, 'leg' => $value->leg, 'package' => $value->package];
                self::$upline_id_list[] = $value->placement_id;
            }

            if ($value->placement_id > 1) {
            // if ($value->placement_id >= 1) {    
                self::getAllUpline($value->placement_id);
            }
        }

        return $result;
    }

    public static function getUserLeg($user_id)
    {

        return self::where('user_id', $user_id)->value('leg');
    }

    public static function getFatherID($user_id)
    {

        return self::where('user_id', $user_id)->value('placement_id');
    }

    //RELATIONSHIPS - Added By Aslam
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public static function getDownlineuser($root = true, $placement_id = "", $level = 0)
    {

             $data= self::where('placement_id', $placement_id)->get();
        foreach ($data as $value) {
            if ($value->type=="yes" || $value->type=="no") {
                 self::$downline_id_list[] = $value->user_id;
                 self::$downline[$value->id]['user_id'] =$value->user_id;
                 self::$downline[$value->id]['id'] =$value->user_id;
                 self::$downline[$value->id]['rank'] =$value->rank_id;
                 self::$downline[$value->id]['placement'] =$value->placement_id;
                 self::getDownlineuser(false, $value->user_id, $level+1);
            }
        }
    }

     //binarydownlines

    public static function getAllDownlinesAutocomplete($placement_id)
    {

        
        $data= self::whereIn('placement_id', $placement_id)->get();
           
        $placement_id =[];
        foreach ($data as $value) {
            if ($value->type=="yes" || $value->type=="no") {
                self::$downline_id_list[] = $value->user_id;

                array_push($placement_id, $value->user_id);
            }
        }

        if (count($placement_id)) {
              self::getAllDownlinesAutocomplete($placement_id);
        }
            return 1 ;
    }

      public static function maximum_level($user_id,$max)
   {

     if($max==1)
     {
        $max="";
     }

      $id=DB::table('tree_table'.$max)->where('user_id',$user_id)->count();
     
     
            if($id == 0){  
            
           $maxa=$max-1;
          return self::maximum_level($user_id,$maxa);
         
     }



      return $max;        

   }
}
