<?php

namespace App;

use DB;
use Html;
use Auth;
use Crypt;
use Storage;

use Illuminate\Database\Eloquent\Model;

class Tree_Table9 extends Model
{
    public static $downline_users = '';
    public static $downline_users_count = '';

    public static $upline_users   = array();
    public static $upline_id_list = array();
    public static $downline_id_list = array();
    public static $downline = array();

    public static $MODEL_NOT_FOUND = '-1';

    protected $table = 'tree_table9';

    protected $fillable = ['user_id', 'sponsor', 'placement_id', 'leg'];

    public static function getmaxid()
    {
        $users = DB::table('users')->max('user_id');
        return $users;
    }
    public static function getSponsorName($user_id)
    {
        return $sponsor_id = DB::table('tree_table3')->where('user_id', $user_id)->value('sponsor');
    }

    public static function getPlacementId($sponsor_id)
    {
        // $user_id = self::where('placement_id', $sponsor_id)->where("leg", $leg)->where("type", "<>", "vaccant")->value('user_id');
        $user_id = self::where('placement_id', $sponsor_id)->where("type", "<>", "vaccant")->value('user_id');

        if (!$user_id) {
            return $sponsor_id;
        }

        return self::getPlacementId($user_id);
    }
    public static function vaccantId($placement_id)
    {

        // $data = self::where('placement_id', $placement_id)->where("leg", $leg)->where("type", "=", "vaccant")->value('id');
        $data = self::where('placement_id', $placement_id)->where("type", "=", "vaccant")->value('id');


        return $data;
    }

    public static function createVaccant($placement_id)
    {
 
        Tree_Table3::create([
            'sponsor'      => 0,
            'user_id'      => '0',
            'placement_id' => $placement_id,
            'leg'          => '1',
            'type'         => 'vaccant',
        ]);

        Tree_Table3::create([
            'sponsor'      => 0,
            'user_id'      => '0',
            'placement_id' => $placement_id,
            'leg'          => '2',
            'type'         => 'vaccant',
        ]);
        Tree_Table3::create([
            'sponsor'      => 0,
            'user_id'      => '0',
            'placement_id' => $placement_id,
            'leg'          => '3',
            'type'         => 'vaccant',
        ]);
    }
    public static function takeUserId($user_name)
    {
        return DB::table('users')->where('username', $user_name)->value('id');
    }



    public static function getTree($root = true, $placement_id = "", $treedata = array(), $level = 0, $levellimit)
    {
        if ($level == $levellimit) {
            return false;
        }
        if ($root) {
                    $data = Tree_Table3::
                    with(array('user'=>function($q1){
                        $q1->with(array( 
                        'profile_info'=>function($q2){
                            $q2->select('user_id','image','package');
                        },
                        'point'=>function($q3){
                            $q3->select('user_id','left_carry','right_carry','total_left','total_right'); 
                        },
                        'rank'=>function($q4){
                            $q4->select('id','rank_name');
                        } 
                        ))
                        ->select('id','username','name','lastname','active','email','rank_id');
                    }))
                    ->where('user_id',$placement_id)
                    ->get();
        } else {

            $data = Tree_Table3::
            with(array('user'=>function($q1){
                $q1->with(array( 
                'profile_info'=>function($q2){
                    $q2->select('user_id','image','package');
                },
                'point'=>function($q3){
                    $q3->select('user_id','left_carry','right_carry','total_left','total_right'); 
                },
                'rank'=>function($q4){
                    $q4->select('id','rank_name');
                } 
                ))
                ->select('id','username','name','lastname','active','email','rank_id');
            }))
            ->where('placement_id',$placement_id)
            ->orderBy('leg', 'ASC')
            ->get();
        }

        $currentuserid = Auth::user()->id;
        $treearray = [];
        foreach ($data as $key => $value) {
            if ($value->type == "yes" || $value->type == "no") {
                if ($root) {
                    $push = self::getTree(false, $value->user_id, $treearray, $level + 1, $levellimit);
                    $class = 'up';
                    $user_type = 'root';
                    $user_active_class = 'active';
                } else {
                    $push = self::getTree(false, $value->user_id, $treearray, $level + 1, $levellimit);
                    $class='down';
                    $user_type = 'child';
                    if ($value->user->active =='yes') {
                        $user_active_class = 'active';
                    } elseif ($value->user->active =='no') {
                        $user_active_class = 'inactive';
                    }
                }
                              
                $class_name = $user_active_class;
                $treearray[$value->id]['class_name'] = $class_name;

                $treearray[$value->id]['id']      =  $value->user_id;
                $treearray[$value->id]['current_user_id'] = $currentuserid;
                $treearray[$value->id]['access_id']      = Crypt::encrypt($value->user_id);;

                $treearray[$value->id]['user_name']       =$value->user->username;
                $treearray[$value->id]['email']       =$value->user->email;
                
                $treearray[$value->id]['user_photo']       = route('imagecache', ['template' => 'profile', 'filename' => self::profilePhoto($value->user->username)]);
                $treearray[$value->id]['user_cover_photo']       = route('imagecache', ['template' => 'large', 'filename' => self::coverPhoto($value->user->username)]);

                $treearray[$value->id]['first_name']       = $value->user->name;
                $treearray[$value->id]['last_name']       = $value->user->lastname;
                $treearray[$value->id]['date_of_joining'] = date('Y-m-d', strtotime($value->created_at));

                
                $treearray[$value->id]['rank_name'] = $value->user->rank->rank_name;
                
                $id=PurchaseHistory::where('user_id',$value->user_id)->max('id');
                $package_id=PurchaseHistory::where('id',$id)->value('package_id');
                $treearray[$value->id]['package_name'] = Packages::where('id', '=', $package_id)->value('package');
                // $treearray[$value->id]['package_name'] = Packages::where('id', '=', $value->user->profile_info->package)->value('package');
                
                $treearray[$value->id]['balance'] = round(Balance::where('user_id', '=', $value->user_id)->value('balance'),4);

                $treearray[$value->id]['left_carry'] = $value->user->point->left_carry;
                $treearray[$value->id]['right_carry'] = $value->user->point->right_carry;
                $treearray[$value->id]['total_left'] = $value->user->point->total_left;
                $treearray[$value->id]['total_right'] = $value->user->point->total_right;
                
                $treearray[$value->id]['user_type'] = $user_type;

                if (Auth::user()->id == 1) {
                    $treearray[$value->id]['user_role'] ='admin';
                } else {
                    $treearray[$value->id]['user_role'] ='user';
                }
                // if (!empty(array_first($push)) || !empty(array_last($push))) {
                //     $treearray[$value->id]['children'] = [array_first($push), array_last($push)];
                // }
                 $treearray[$value->id]['children'] = array_values($push) ;


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
        
        $user  = User::where('username', $user_name)->with('profile_info')->first();
        // dd($user);
        $image = $user->profile_info->profile;
        //if (!Storage::disk('images')->exists($image)){
        //    $image = 'avatar-big.png';
        //}
        if (!$image) {
            $image = 'avatar-big.png';
        }

        return $image;
    }

    public static function coverPhoto($user_name)
    {
        $user  = User::where('username', $user_name)->with('profile_info')->first();
        $image = $user->profile_info->cover;
        if (!Storage::disk('images')->exists($image)) {
            $image = 'cover.jpg';
        }
        if (!$image) {
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
        $users      = DB::table('tree_table3')->where('sponsor', $sponsor_id)->get();
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

        $result = self::join('profile_infos', 'profile_infos.user_id', '=', 'tree_table3.placement_id')
            ->where('tree_table3.user_id', $user_id)
            ->select('tree_table3.leg', 'tree_table3.placement_id', 'tree_table3.type', 'profile_infos.package')
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
}
