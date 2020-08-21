<?php



namespace App;



use DB;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\softDeletes;



class PointTable extends Model

{




 
    // use softDeletes;

    protected $table = 'point_table';



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = ['user_id','pv','redeem_pv','right_carry','left_carry','total_left','total_right'];





    public function userR()

    {

        return $this->hasOne('App\User', 'id', 'user_id');

    }







    public static function addPointTable($user_id)

    {



        self::create([

            'user_id'=>$user_id,

            'redeem_pv'=>0,

            'pv'=>0,

            ]);

    }



   



    public static function getUserPoint($user_id)

    {



        return self::where('user_id', $user_id)->get();

    }





    public static function updatePoint($bv_update, $from_id)
    {   
         Tree_Table::$upline_users = [];
         Tree_Table::getAllUpline($from_id);
         $variable = Tree_Table::$upline_users;
         foreach ($variable as $key => $value) {
            if ($value['leg'] == 'L') {
                self::where('user_id', $value['user_id'])->increment('left_carry', $bv_update);
                self::where('user_id', $value['user_id'])->increment('total_left', $bv_update);
                self::where('user_id', $value['user_id'])->update(['l'=>$from_id]);
            } else {
                self::where('user_id', $value['user_id'])->increment('right_carry', $bv_update);
                self::where('user_id', $value['user_id'])->increment('total_right', $bv_update);
                self::where('user_id', $value['user_id'])->update(['r'=>$from_id]);
            }
                self::where('user_id', $value['user_id'])->increment('pv', $bv_update);
                PointHistory::addPointHistoryTable($value['user_id'], $from_id, $bv_update, $value['leg'], 'monthly_sv');
                $binary_commission=BinaryCommissionSettings::value('period');
                if($binary_commission == 'instant')
                {
                  self::binary($from_id,$value['user_id']);
                }
            }
    }
           public static function binary($from_id, $sponsor)

    {
         #to qualify binary ,LEFT and RIGHT user should be sponsored by that user
        $users=Tree_Table::where('placement_id',$sponsor)->where('type','=','yes')->pluck('user_id')->toArray();  
       $referel_count=Sponsortree::whereIn('user_id',$users)->where('sponsor','=',$sponsor)->count(); 
//anitta edited for binary nonus
        $left=User::where('id',$sponsor)->value('left_user_id');
        $right=User::where('id',$sponsor)->value('right_user_id');
        $a=PurchaseHistory::where('user_id',$left)->max('id');
        $b=PurchaseHistory::where('user_id',$right)->max('id');
        $a1=PurchaseHistory::where('id',$a)->value('pv');
        $b1=PurchaseHistory::where('id',$b)->value('pv');
        if($a1 >= 50 && $b1 >= 51){
        // if($left > 0 && $right > 0){ 
        $sponsor=Sponsortree::where('user_id',$from_id)->value('sponsor');
        $point_left=PointTable::where('user_id', $sponsor)->value('left_carry');
        $point_right=PointTable::where('user_id', $sponsor)->value('right_carry');     
        $pv_pair=min($point_left, $point_right);         
        $sponsor_package=PurchaseHistory::where('user_id',$sponsor)->max('id');
        $packages=PurchaseHistory::where('id',$sponsor_package)->value('package_id');
        $package=Packages::where('id',$packages)->first();
        if($package->sv > 1){
        $total_commission=$package->binary * $pv_pair /100 *100;

//checking binary limit'
        $balance = Commission::binaryLimit($sponsor, $package->id);
        // dd($total_commission,$balance);
        if ($total_commission >= $balance) 
        {
            $total_amount = $balance;
        }
         elseif ($total_commission < $balance) 
        {
             $total_amount = $total_commission;
        }

        $cash_amount=EwalletSettings::where('id',1)->value('percentage');
        $red_amount=EwalletSettings::where('id',2)->value('percentage');
        $cash_wallet=$total_amount * $cash_amount / 100;
        $cash_wallet_amount=$cash_wallet;
        // $cash_wallet_amount=$cash_wallet * 100;
        $redemtion_wallet=$total_amount * $red_amount / 100;
        // $redemtion_wallet_amount=$redemtion_wallet * 100;
        $redemtion_wallet_amount=$redemtion_wallet;
        $tds=$service_charge=0;
        if($total_amount > 0){
                Commission::create([
                        'user_id'=>$sponsor,
                        'from_id'=>$from_id,
                        // 'total_amount'=>$total_commission ,
                        'total_amount'=>$cash_wallet_amount ,
                        'tds'            => $tds,
                        'service_charge' => $service_charge,
                        'payable_amount'=>$cash_wallet_amount ,
                        // 'payment_type'=>'binary_bonus',
                        'payment_type'=>'sales_development_bonus',
                        ]);
                Balance::where('user_id', $sponsor)->increment('balance', $cash_wallet_amount);
                RedemptionCommission::create([
                        'user_id'=>$sponsor,
                        'from_id'=>$from_id,
                        'total_amount'=>$redemtion_wallet_amount,
                        'tds'            => $tds,
                        'service_charge' => $service_charge,
                        'payable_amount'=>$redemtion_wallet_amount ,
                        // 'payment_type'=>'binary_bonus',
                        'payment_type'=>'sales_development_bonus',
                        ]);
                Balance::where('user_id', $sponsor)->increment('redemption_balance', $redemtion_wallet_amount);        
            $left_carry = $point_left -$pv_pair;
            $right_carry =$point_right-$pv_pair;
            PointTable::where('user_id', $sponsor)->update(['left_carry'=>$left_carry,
            'right_carry'=>$right_carry]);
        }
            }            
        }
    }

    public static function pairing()

    {

      

        $users_list = self::where('point_table.left_carry', '>', 0)

                     ->where('point_table.right_carry', '>', 0)

                     ->select('point_table.*')

                     ->get();



        foreach ($users_list as $key => $value) {

            echo " ------------ " ;

            $pv_pair = min($value->left_carry, $value->right_carry);

            $total_amount =   $pv_pair * 10 /100 ;

            Commission::create([

               'user_id'=>$value->user_id,

               'from_id'=>$value->user_id,

               'total_amount'=>$total_amount,

               'tds'=>0,

               'service_charge'=>0,

               'payable_amount'=>$total_amount,

               'payment_type'=>'binary_bonus',

               ]);

            Balance::where('user_id', $value->user_id)->increment('balance', $total_amount);

                   

            self::where('user_id', '=', $value->user_id)->decrement('left_carry', $pv_pair);

            self::where('user_id', '=', $value->user_id)->decrement('right_carry', $pv_pair);



            self::matchingbonus($value->user_id, $value->user_id, $total_amount);

        }

    }





    public static function matchingbonus($from_id, $user_id, $amount, $level = 0)

    {



        $level_bonus = [5,3,2] ;

        $bonus_percent = $level_bonus[$level] ;//self::where('package_id',$package_id)->value("$column");

         $sponsor_id = Sponsortree::where('user_id', $user_id)->value('sponsor');

        if ($bonus_percent) {

              $total_amount = $amount * $bonus_percent / 100 ;



               $settings = Settings::getSettings();

               // $sponsor_commisions =7;// $settings[0]->sponsor_Commisions;

               $tds = $total_amount * $settings[0]->tds / 100;

               $service_charge = $total_amount * $settings[0]->service_charge / 100;

               $payable_amount = $total_amount - $tds - $service_charge;



              Commission::create([

                      'user_id'=>$sponsor_id,

                      'from_id'=>$from_id,

                      'total_amount'=>$total_amount ,

                      'tds'            => $tds,

                      'service_charge' => $service_charge,

                      'payable_amount'=>$payable_amount ,

                      'payment_type'=>'matching_bonus',

                      ]);

              Balance::where('user_id', $user_id)->increment('balance', $payable_amount);

               



            if ($level <= 1 && $sponsor_id > 0) {

                return self::matchingbonus($from_id, $sponsor_id, $amount, ++$level);

            }

        }

            return ;

    }



    public static function binaryQualification($user_id)

    {

        $left_count = Sponsortree::where('user_id', $user_id)->value('sponsor');

        if ($left_count > 0|| $user_id==1) {

            return "yes";

        } else {

            return "no";

        }

    }



    // public static function binary($from_id, $sponsor)

    // {



    //     $point_left=PointTable::where('user_id', $sponsor)->value('left_carry');

    //     $point_right=PointTable::where('user_id', $sponsor)->value('right_carry');

        

    //     if ($point_left>0 && $point_right>0) {

          

    //         $rank_id=User::where('id','=',$sponsor)->value('rank_id');

    //         $rank_bonus=Ranksetting::where('id','=',$rank_id)->value('sales_development_bonus');



    //         // $sponsor_package = ProfileInfo::where('user_id', '=', $from_id)->value('package');           

    //         // $pairing_bonus=Packages::where('id', '=', $sponsor_package)->value('binary');

    //         $pv_pair=min($point_left, $point_right);

    //         // $total_commission=$pairing_bonus*$pv_pair*0.01;

    //         $total_commission=$rank_bonus*$pv_pair*0.01;

            

    //             $tds=$service_charge=0;

    //             Commission::create([

    //                     'user_id'=>$sponsor,

    //                     'from_id'=>$from_id,

    //                     'total_amount'=>$total_commission ,

    //                     'tds'            => $tds,

    //                     'service_charge' => $service_charge,

    //                     'payable_amount'=>$total_commission ,

    //                     'payment_type'=>'binary_bonus',

    //                     ]);

    //             Balance::where('user_id', $sponsor)->increment('balance', $total_commission);

          



    //         $left_carry = $point_left -$pv_pair;

    //         $right_carry =$point_right-$pv_pair;

    //         PointTable::where('user_id', $sponsor)->update(['left_carry'=>$left_carry,

    //         'right_carry'=>$right_carry]);

    //     }

    // }



 

    



    //    public static function binary($from_id, $sponsor)

    // {

    //      #to qualify binary ,LEFT and RIGHT user should be sponsored by that user



    //     $users=Tree_Table::where('placement_id',$sponsor)->where('type','=','yes')->pluck('user_id')->toArray();



    //     $referel_count=Sponsortree::whereIn('user_id',$users)->where('sponsor','=',$sponsor)->count();       

    //     if($referel_count =2)

    //     {   

       

    //     $point_left=PointTable::where('user_id', $sponsor)->value('left_carry');

    //     $point_right=PointTable::where('user_id', $sponsor)->value('right_carry');        

    //     // if ($point_left >= 51 && $point_right >= 51) {

    //         $rank_id=User::where('id','=',$sponsor)->value('rank_id');

    //         $rank_bonus=Ranksetting::where('id','=',$rank_id)->value('sales_development_bonus');

    //         $pv_pair=min($point_left, $point_right);

    //         $total_commission=$rank_bonus*$pv_pair*0.01;



    //         //90% to commission table 10 % to redemtion table

    //         $cash_amount=EwalletSettings::where('id',1)->value('percentage');

    //         $red_amount=EwalletSettings::where('id',2)->value('percentage');



    //         $cash_wallet=$total_commission * $cash_amount / 100;

    //         $redemtion_wallet=$total_commission * $red_amount / 100;

            

    //             $tds=$service_charge=0;

    //             Commission::create([

    //                     'user_id'=>$sponsor,

    //                     'from_id'=>$from_id,

    //                     // 'total_amount'=>$total_commission ,

    //                     'total_amount'=>$cash_wallet ,

    //                     'tds'            => $tds,

    //                     'service_charge' => $service_charge,

    //                     'payable_amount'=>$cash_wallet ,

    //                     // 'payment_type'=>'binary_bonus',

    //                     'payment_type'=>'sales_development_bonus',

    //                     ]);

    //             Balance::where('user_id', $sponsor)->increment('balance', $cash_wallet);





    //             RedemptionCommission::create([

    //                     'user_id'=>$sponsor,

    //                     'from_id'=>$from_id,

    //                     'total_amount'=>$redemtion_wallet ,

    //                     'tds'            => $tds,

    //                     'service_charge' => $service_charge,

    //                     'payable_amount'=>$redemtion_wallet ,

    //                     // 'payment_type'=>'binary_bonus',

    //                     'payment_type'=>'sales_development_bonus',

    //                     ]);

    //             Balance::where('user_id', $sponsor)->increment('redemption_balance', $redemtion_wallet);          



    //         $left_carry = $point_left -$pv_pair;

    //         $right_carry =$point_right-$pv_pair;

    //         PointTable::where('user_id', $sponsor)->update(['left_carry'=>$left_carry,

    //         'right_carry'=>$right_carry]);

    //         // }

    

    //     }

    // }





    

    public static function updaterank($user_id)

    {

        Tree_Table::$upline_users = [];

        Tree_Table::getAllUpline($user_id);

        $user_uplines=Tree_Table::$upline_users;

        foreach ($user_uplines as $key => $value) {

            $downline = array();

            Tree_Table::$downline = [];

            Tree_Table::getDownlineuser(true, $value['user_id']);

            $downline_count = count(Tree_Table::$downline);

            $userrank = User::where('id', $value['user_id'])->value('rank_id');

            $new_rank = Ranksetting::where('top_up', '<=', $downline_count)->max('id');

            if ($userrank < $new_rank) {

                $today = date('Y-m-d H:i:s');

                User::where('id', $value['user_id'])->update(['rank_id'=>$new_rank , 'rank_update_date'=>$today]);

                $remark = Ranksetting::where('id', $new_rank)->value('rank_bonus');

                Rankhistory::create([

                        'user_id'=>$value['user_id'],

                        'rank_id'=>$userrank,

                        'rank_updated'=>$new_rank ,

                        'remarks'      => $remark,

                        ]);

            }

        }

    }

    public static function salaryRatio($user_id)

    {

        $pv=PointHistory::where('user_id',$user_id)->sum('pv');

        $total_left=PointTable::where('user_id',$user_id)->value('total_left');

        $total_right=PointTable::where('user_id',$user_id)->value('total_right');

        $salary_value=SalarySetting::where('id',1)->first();

        $ratio=$pv * $salary_value->ratio / 100;

        $post_id=User::where('id',$user_id)->value('post_id');

        if($pv >= $salary_value->sales_volume)

        {

            if($total_left >= $ratio || $total_right >=$ratio)

            {

                PostName::create([

                        'user_id'=>$user_id,

                        'post_id'=>$post_id,

                        'updated_post_id'=>$salary_value->id,

                        ]);

                User::where('id','=',$user_id)->update(['post_id'=>$salary_value->id]);



            }

        }

        $salary_value2=SalarySetting::where('id',2)->first();

        $ratio=$pv * $salary_value2->ratio / 100;

         if($pv >= $salary_value2->sales_volume)

        {

            if($total_left >= $ratio || $total_right >=$ratio)

            {

                PostName::create([

                        'user_id'=>$user_id,

                        'post_id'=>$post_id,

                        'updated_post_id'=>$salary_value2->id,

                        ]);

                User::where('id','=',$user_id)->update(['post_id'=>$salary_value2->id]);



            }

        }

        $salary_value3=SalarySetting::where('id',3)->first();

        $ratio=$pv * $salary_value3->ratio / 100;

        if($pv >= $salary_value3->sales_volume)

        {

            if($total_left >= $ratio ||  $total_right >=$ratio)

            {

                PostName::create([

                        'user_id'=>$user_id,

                        'post_id'=>$post_id,

                        'updated_post_id'=>$salary_value3->id,

                        ]);

                User::where('id','=',$user_id)->update(['post_id'=>$salary_value3->id]);



            }

        }          



    }



}

