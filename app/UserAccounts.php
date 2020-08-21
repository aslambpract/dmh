<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class UserAccounts extends Model
{
    protected $table = 'user_accounts';
    protected $fillable = ['user_id','account_type','account_no','status','approved'];


     public static function addAccount($username)
    {      

    	  DB::beginTransaction();

        try {

            $user = User::where('username',$username)->first()->id ;
            // $account_no = UserAccounts::where('user_id',$user)->count() +1 ;



            if($user !=2){
                $account_id = UserAccounts::where('user_id',$user)->first()->id ;
            }else{
                $account_id = 2 ;

                while(Tree_Table3::where('user_id',$account_id)->exists()){
                    $account_id = UserAccounts::where('user_id',$user)->where('id','>',$account_id)->first()->id ;
                }
            }
           

            // $useraccounts = UserAccounts::create([
	           //  'user_id'  => $user,
	           //  'account_type' => 'account',
	           //  'account_no'   => $account_no, 
	           //  'approved'   => "approved",            
	           
            // ]);  
 
 
            $tree          = Tree_Table3::where('type','=','vaccant')->first();//->id ;
            $tree->user_id = $account_id;
            
            $tree->sponsor = 1 ;
            
            $tree->type    = 'yes';
            $tree->save();
            $package_amount = Packages::find(3)->amount ;

            Commission::phase_commission($tree->placement_id,1,$account_id);
            SELF::createVaccant($tree->user_id,3);
            $package_amount = Packages::find(3)->amount ;
            EwalletSettings::where('id',1)->increment('balance',$package_amount) ;

            $vaccant_count=Tree_Table3::where('placement_id',$tree->placement_id)->where('type','vaccant')->count();
            
            if($vaccant_count == 0){
                Packages::calculations($tree->placement_id,3);
            }

               
            DB::commit();

            return $account_id ;
        } catch (Exception $e) {
            DB::rollback();

            return false;
        }


      }



      public static function createVaccant($placement,$next){
        
         DB::table('tree_table'.$next)->insert([
            'sponsor'      => 0,
            'user_id'      => '0',
            'placement_id' => $placement,
            'leg'          => '1',
            'type'         => 'vaccant',
        ]);
         DB::table('tree_table'.$next)->insert([
            'sponsor'      => 0,
            'user_id'      => '0',
            'placement_id' => $placement,
            'leg'          => '2',
            'type'         => 'vaccant',
        ]);
          DB::table('tree_table'.$next)->insert([
            'sponsor'      => 0,
            'user_id'      => '0',
            'placement_id' => $placement,
            'leg'          => '3',
            'type'         => 'vaccant',
        ]);
       
    }
}
