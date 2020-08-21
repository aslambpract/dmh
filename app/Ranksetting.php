<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Ranksetting extends Model

{

    protected $table="rank_setting";



    protected $fillable=['rank_name','top_up','quali_rank_id','quali_rank_count','rank_bonus','personal_pv','consultant_bonus','sales_development_bonus','monthly_repurchase','daily_capping_binary','reward_points','rank_bonus','monthly_salary','franchise_bonus','life_insurance','total_sales_volume'];





    public static function idToRankname($id)

    {

        return  self::where('id', $id)->value('rank_name');

    }

    public static function getUserRank($id)

    {

        $rank_id=User::where('id', $id)->value('rank_id');

        return $rank_id;

    }

    public static function maxRankId()

    {

        return  self::max('id');

    }

    public static function updateRankSettings($cloumn_name, $rank_id, $value)

    {

        if ($cloumn_name == 'rank_name') {

            self::where('id', '=', $rank_id)->update(['rank_name' => $value]);

        } elseif ($cloumn_name == 'personal_pv') {

            self::where('id', '=', $rank_id)->update(['personal_pv' => $value]);

        } elseif ($cloumn_name == 'consultant_bonus') {

            self::where('id', '=', $rank_id)->update(['consultant_bonus' => $value]);

        } elseif ($cloumn_name == 'sales_development_bonus') {

            self::where('id', '=', $rank_id)->update(['sales_development_bonus' => $value]);

        } elseif ($cloumn_name == 'monthly_repurchase') {

            self::where('id', '=', $rank_id)->update(['monthly_repurchase' => $value]);

        } elseif ($cloumn_name == 'daily_capping_binary') {

            self::where('id', '=', $rank_id)->update(['daily_capping_binary' => $value]);

        }

        elseif ($cloumn_name == 'reward_points') {

            self::where('id', '=', $rank_id)->update(['reward_points' => $value]);

        }

         elseif ($cloumn_name == 'rank_bonus') {

            self::where('id', '=', $rank_id)->update(['rank_bonus' => $value]);

        }

         elseif ($cloumn_name == 'monthly_salary') {

            self::where('id', '=', $rank_id)->update(['monthly_salary' => $value]);

        }

         elseif ($cloumn_name == 'franchise_bonus') {

            self::where('id', '=', $rank_id)->update(['franchise_bonus' => $value]);

        }

          elseif ($cloumn_name == 'life_insurance') {

            self::where('id', '=', $rank_id)->update(['life_insurance' => $value]);

        }

         elseif ($cloumn_name == 'total_sales_volume') {

            self::where('id', '=', $rank_id)->update(['total_sales_volume' => $value]);

        }

    }

    public static function checkRankupdate($user_id, $current_rank, $level = 1)

    {

        

        if ($current_rank == self::maxRankId()) {

            return true;

        }





        

        $next_rank_details=self::find($current_rank+1);

        $quali_rank_count =0;

        

        /* Total top up*/

        $total_top_up =PurchaseHistory::where('user_id', '=', $user_id)->count();

        

        /* direct enrolls rank and count*/

        if ($next_rank_details->quali_rank_id and  $next_rank_details->quali_rank_count) {

            $quali_rank_count=Tree_Table::where('sponsor', $user_id)

                                    ->join('users', 'tree_table.user_id', '=', 'users.id')

                                    ->where('users.rank_id', '>=', $next_rank_details->quali_rank_id)

                                    ->count();

        }



        ;

      

        

        /* check for rank upgrade */



        if (($total_top_up >= $next_rank_details->top_up )  && ($quali_rank_count >= $next_rank_details->quali_rank_count)) {

            $user=User::find($user_id);

            $user->rank_id=$next_rank_details->id;

            $user->save();



            $sponsor = User::find(Tree_Table::where('user_id', '=', $user_id)->value('sponsor'));



            if ($sponsor->id > 1 && $level == 1) {

                return self::checkRankupdate($sponsor->id, $sponsor->rank_id, 2);

            }

        }

        

        

        return true;

    }



    public static function updateUserRank($rank_id, $last_rank, $user_id, $remarks)

    {

       

         return self::insertRankHistory($user_id, $rank_id, $last_rank, $remarks);

    }

    public static function insertRankHistory($user_id, $rank_id, $last_rank, $remarks)

    {

        return Rankhistory::create([

                "user_id"=>$user_id,

                "rank_id"=>$last_rank,

                "rank_updated"=>$rank_id,

                "remarks"=>$remarks,

                    ]);

    }







    public function users()

    {

        return $this->belongsToMany('App\User');

    }



//    public static function RankUpdate($user_id)

//     {



//         Tree_Table::$upline_users = [];

//         Tree_Table::getAllUpline($user_id);

//         $variable = Tree_Table::$upline_users;



//    dd($variable);     

//         foreach ($variable as $key => $value) 

//         {

// //dd($value['user_id']);



//             $rank_id=User::where('id','=',$value['user_id'])->value('rank_id');

//             if($rank_id < 7)

//             {

//                 $next_rank_id=$rank_id+1;            

//                 $quali_pv=Ranksetting::where('id','=',$next_rank_id)->value('personal_pv');

                

//                 $pv=PointTable::where('user_id',$value['user_id'])->first();

//                 // echo "PV".$pv."<br>";

//                 $total_pv=$pv->total_left+$pv->total_right;

             

//                 if($total_pv >= $quali_pv )

//                 {



//                    //if left/ right user have min 30% ratio of users($value['user_id']) total sales volume.



//                     /* salary*/

//                     $total_sv=PurchaseHistory::where('user_id',$value['user_id'])->sum('pv');

//                     $min_ratio=Ranksetting::where('id','=',$next_rank_id)->value('min_ratio');

//                     $quali_sv=Ranksetting::where('id','=',$next_rank_id)->value('total_sales_volume');

//                     $ratio=$total_sv * $min_ratio / 100;

//                     if($total_sv >= $quali_sv)

//                     {

//                         if($pv->total_left >= $ratio || $pv->total_right >=$ratio)

//                         {       /*salary*/   



//                             User::where('id','=',$value['user_id'])->update(['rank_id'=>$next_rank_id]);

//                             Rankhistory::create([

//                             'user_id'=>$value['user_id'],

//                             'rank_id'=>$rank_id,

//                             'rank_updated'=>$next_rank_id,

//                             'remarks'=>"rank_updated",

//                             ]);

//                         }

//                     }

//                 }  

//             }        

//         }

//     }



 // public static function RankUpdate($user_id)

 //    {



 //        //Tree_Table::$upline_users = [];

 //        Tree_Table::$upline_id_list=[];

 //        Tree_Table::getAllUpline($user_id);

 //       // $variable = Tree_Table::$upline_users;

 //        $variable = Tree_Table::$upline_id_list ;

 //        array_push($variable, $user_id);

 //        // $b=array_push($variable,$user_id);

      

 //  // print_r($w);



 //   // dd($variable);     

 //        foreach ($variable as $key => $value) 

 //        {





 //            $rank_id=User::where('id','=',$value)->value('rank_id');

 //            if($rank_id < 7)

 //            {

 //                $next_rank_id=$rank_id+1;            

 //                $quali_pv=Ranksetting::where('id','=',$next_rank_id)->value('personal_pv');

                

 //                $pv=PointTable::where('user_id',$value)->first();

             

 //                $total_pv=$pv->total_left+$pv->total_right;

           

 //                // if($total_pv >= $quali_pv )

 //                // {



 //                   //if left/ right user have min 30% ratio of users($value['user_id']) total sales volume.



 //                    /* salary*/

 //                    $total_sv=PurchaseHistory::where('user_id',$value['user_id'])->sum('pv');

 //                    $min_ratio=Ranksetting::where('id','=',$next_rank_id)->value('min_ratio');

 //                    $quali_sv=Ranksetting::where('id','=',$next_rank_id)->value('total_sales_volume');

 //                    $ratio=$total_sv * $min_ratio / 100;

 //                    if($total_sv >= $quali_sv)

 //                    {

 //                        if($pv->total_left >= $ratio || $pv->total_right >=$ratio)

 //                        {       /*salary*/   



 //                            User::where('id','=',$value)->update(['rank_id'=>$next_rank_id]);

 //                            Rankhistory::create([

 //                            'user_id'=>$value,

 //                            'rank_id'=>$rank_id,

 //                            'rank_updated'=>$next_rank_id,

 //                            'remarks'=>"rank_updated",

 //                            ]);

 //                        }

 //                    // }

 //                }  

 //            }        

 //        }

 //    }



    public static function RankUpdate($user_id,$sv)

    {   

        $rank_id=Ranksetting::where('personal_pv',$sv)->value('id');

        User::where('id','=',$user_id)->update(['rank_id'=>$rank_id]);

                                Rankhistory::create([

                                'user_id'=>$user_id,

                                'rank_id'=>$rank_id,

                                'rank_updated'=>$rank_id,

                                'remarks'=>"rank_updated",

                                ]);



    }



      public static function RankUpdate1($user_id,$sv,$next_rank_id,$rank_id)

    {  
        $current_rank=User::where('id',$user_id)->value('rank_id');
        $ranks=Ranksetting::where('id','>',$current_rank)->get();         
        foreach ($ranks as $key => $value)
        {      
           if($sv >=$value['personal_pv'] )
            {
                if($sv >= $value['total_sales_volume'])
                {      
                   $user_pv=PointTable::where('user_id',$user_id)->first();
                   $ratio=$sv * $value['min_ratio'] / 100;
                   if($user_pv->total_left >= $ratio || $user_pv->total_right >=$ratio)
                   { 
                        User::where('id','=',$user_id)->update(['rank_id'=>$value['id']]);
                        Rankhistory::create([
                                    'user_id'=>$user_id,
                                    'rank_id'=>$rank_id,
                                    'rank_updated'=>$value['id'],
                                    'remarks'=>"rank_updated",
                                    ]);
                   }
               }
            }
        }
         // }
    

         // $sv=PurchaseHistory::where('user_id',$user_id)->sum('pv');
         // $current_rank=User::where('id',$user_id)->value('rank_id');
         // $c_rank=Ranksetting::where('id',$rank_id)->first();


         // if($sv > $c_rank->personal_pv && $sv > $c_rank->total_sales_volume)
         // { 
         //    $ranks=Ranksetting::where('id','>',$current_rank)->where('personal_pv','<=',$sv)->pluck('personal_pv');
         //    foreach ($ranks as $key => $value)
         //     {
         //        if($sv >=$value)
         //        {
         //            $r=Ranksetting::where('id','>',$c_rank)->value('total_sales_volume');
         //            if($sv >= $r)
         //            {                          
         //                $pv=PointTable::where('user_id',$user_id)->first();
         //                $min_ratio=Ranksetting::where('id','=',$next_rank_id)->value('min_ratio');
         //                $ratio=$sv * $min_ratio / 100;
         //                if($pv->total_left >= $ratio || $pv->total_right >=$ratio)
         //                {
         //                    $p=Ranksetting::where('personal_pv',$value)->where('total_sales_volume',$r)->where('min_ratio',$min_ratio)->value('id');
         //                    // dd($p);
         //                    User::where('id','=',$user_id)->update(['rank_id'=>$p]);
         //                    Rankhistory::create([
         //                            'user_id'=>$user_id,
         //                            'rank_id'=>$rank_id,
         //                            'rank_updated'=>$p,
         //                            'remarks'=>"rank_updated",
         //                            ]);
         //                }

         //            }

         //        }

         //    }

         // }



           



    }

   

    //     public static function RankUpdate1($user_id,$sv,$next_rank_id,$rank_id)

    // { 



    //      if($next_rank_id < 7)

    //         {

        

    //             $quali_pv=Ranksetting::where('id','=',$next_rank_id)->value('personal_pv');

    //             $total_sv=Ranksetting::where('id','=',$next_rank_id)->value('total_sales_volume');

    //             $pv=PointTable::where('user_id',$user_id)->first();

    //             $min_ratio=Ranksetting::where('id','=',$next_rank_id)->value('min_ratio');

    //             $ratio=$sv * $min_ratio / 100;



    //             if($sv >=$quali_pv && $total_sv <=$sv)

    //             {

    //                 if($pv->total_left >= $ratio || $pv->total_right >=$ratio)

    //                 { 



    //                      User::where('id','=',$user_id)->update(['rank_id'=>$next_rank_id]);

    //                             Rankhistory::create([

    //                             'user_id'=>$user_id,

    //                             'rank_id'=>$rank_id,

    //                             'rank_updated'=>$next_rank_id,

    //                             'remarks'=>"rank_updated",

    //                             ]);



    //                 }

    //             }

    //         }    



    // }





           

                

                // $pv=PointTable::where('user_id',$value)->first();

             

                // $total_pv=$pv->total_left+$pv->total_right;

           

                // if($total_pv >= $quali_pv )

                // {



                   //if left/ right user have min 30% ratio of users($value['user_id']) total sales volume.



                    /* salary*/

                    // $total_sv=PurchaseHistory::where('user_id',$value['user_id'])->sum('pv');

                    // $min_ratio=Ranksetting::where('id','=',$next_rank_id)->value('min_ratio');

                    // $quali_sv=Ranksetting::where('id','=',$next_rank_id)->value('total_sales_volume');

                    // $ratio=$total_sv * $min_ratio / 100;

                    // if($total_sv >= $quali_sv)

                    // {

                    //     if($pv->total_left >= $ratio || $pv->total_right >=$ratio)

                    //     {       /*salary*/   



                    //         User::where('id','=',$value)->update(['rank_id'=>$next_rank_id]);

                    //         Rankhistory::create([

                    //         'user_id'=>$value,

                    //         'rank_id'=>$rank_id,

                    //         'rank_updated'=>$next_rank_id,

                    //         'remarks'=>"rank_updated",

                    //         ]);

                    //     }

                    // }

        //         }  

        //     }        

        // }

    // }

    // public static function StockiestBonus($sponsor_id,$user_id,$package_id)

    // {

    //    $rank_id =User::where('id',$sponsor_id)->value('rank_id');

    //    if($rank_id == 4)

    //    {

    //         $package_amount=packages::where('id',$package_id)->value('amount');

    //         $stockiest_bonus=$package_amount * 5 / 100;

    //         Commission::create([

    //                 'user_id'=>$sponsor_id,

    //                 'from_id'=>$user_id ,

    //                 'total_amount'=> $stockiest_bonus,

    //                 'payable_amount'=> $stockiest_bonus,

    //                 'payment_type'=>'stockiest_bonus'

    //                 ]);

    //         Commission::updateUserBalance($sponsor_id,$stockiest_bonus);

    //    }    

    // }

    public static function StockiestBonus($sponsor_id,$user_id,$sv)

    {  
       $period=SignupBonusSettings::value('period');
       if($period == 'instant')
       {
            $rank_id =User::where('id',$sponsor_id)->value('rank_id');
            if($rank_id == 4)
            {
                // $package_amount=Packages::where('id',$package_id)->value('sv');
                $income=SignupBonus::value('income');
                $stockiest_bonus=$sv * $income / 100;
                $cash_amount=EwalletSettings::where('id',1)->value('percentage');
                $red_amount=EwalletSettings::where('id',2)->value('percentage');
                $cash_wallet=$stockiest_bonus * $cash_amount / 100;
                $cash_wallet_amount=$cash_wallet * 100;
                $redemtion_wallet=$stockiest_bonus * $red_amount / 100;
                $redemtion_wallet_amount=$redemtion_wallet * 100;
                Commission::create([
                'user_id'=>$sponsor_id,
                'from_id'=>$user_id ,
                'total_amount'=> $cash_wallet_amount,
                'payable_amount'=> $cash_wallet_amount,
                'payment_type'=>'stockiest_bonus',
                ]);
                Balance::where('user_id', $sponsor_id)->increment('balance', $cash_wallet_amount);
                RedemptionCommission::create([
                'user_id'=>$sponsor_id,
                'from_id'=>$user_id ,
                'total_amount'=> $redemtion_wallet_amount,
                'payable_amount'=> $redemtion_wallet_amount,
                'payment_type'=>'stockiest_bonus',                    ]);
                Balance::where('user_id', $sponsor_id)->increment('redemption_balance', $redemtion_wallet_amount);  

            }    

        }
    }

   

}

