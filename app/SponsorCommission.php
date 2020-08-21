<?php



namespace App;



use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;



class SponsorCommission extends Model

{

    use SoftDeletes;



    protected $table = 'sponsor_commission';



    protected $fillable = ['type','criteria','sponsor_commission'];



    // public static function sponsorCommissiond($user_id, $sponsor)

    // {



         



        // $sponpackage=ProfileInfo::where('user_id', $sponsor)->value('package');

        // $sponsorpack=Packages::find($sponpackage)->amount;

        // $userpack=Packages::find($package)->amount;

        // $sponsor_settings=self::find(1);

        // if ($sponsor_settings->type == 'fixed' &&

        //         $sponsor_settings->criteria == 'yes') {

        //      echo "1\n";

        //     $amount=LevelSettingsTable::where('package', $package)->value('sponsor_comm');

        // }

        // if ($sponsor_settings->type == 'fixed' &&

        //         $sponsor_settings->criteria == 'no') {

        //      echo "2\n";

        //      $amount=$sponsor_settings->sponsor_commission;

        // }

        // if ($sponsor_settings->type == 'percent' && $sponsor_settings->criteria == 'yes') {

        //      echo "3\n";

        //      $am=LevelSettingsTable::where('package', $package)->value('sponsor_comm');

        //      $amount=$am*$userpack*0.01;

        // }

        // if ($sponsor_settings->type == 'percent' && $sponsor_settings->criteria == 'no') {

        //      echo "4\n";

        //     $amount=$sponsor_settings->sponsor_commission*$sponsorpack*0.01;

        // }

        //      echo "comm=".$amount."\n";

        

        //     $commision = Commission::create([

        //         'user_id'        => $sponsor,

        //         'from_id'        => $user_id,

        //         'total_amount'   z=> $amount,

        //         'tds'            => 0,

        //         'service_charge' => 0,

        //         'payabsle_amount' => $amount,

        //         'payment_type'   => 'sponsor_commission',

        //         'payment_status' => 'Yes',

        //     ]);

        //     User::upadteUserBalance($sponsor, $amount);

    // }



    // public static function sponsorCommission($user_id,$package,$sponsor)

    // {

    //     $rank_id= User::where('id','=',$sponsor)->value('rank_id');

    //     $sponsor_bonus= Ranksetting::find($rank_id)->consultant_bonus;

    //     // dd($sponsor_bonus);

    //     $package_amount= Packages::find($package)->amount;

    //     $amount= $package_amount*$sponsor_bonus / 100;

    //     //90 % to commision table 10% to redemtioncommission table

    //     $cash_amount=EwalletSettings::where('id',1)->value('percentage');

    //     $red_amount=EwalletSettings::where('id',2)->value('percentage');

    //     $commision_amount=$amount * $cash_amount / 100;

    //     $redemption_amount=$amount * $red_amount / 100;

    //   // dd($amount,$commision_amount,$redemption_amount);

    //     $commision= Commission::create([

    //             'user_id'        => $sponsor,

    //             'from_id'        => $user_id,

    //             'total_amount'   => $commision_amount,

    //             'tds'            => 0,

    //             'service_charge' => 0,

    //             'payable_amount' => $commision_amount,

    //             'payment_type'   => 'consultant_bonus',

    //             'payment_status' => 'Yes',

    //         ]);

    //     User::upadteUserBalance($sponsor,$commision_amount);

    //    //redemtioncommision 10 %



    //    $red_commision= RedemptionCommission::create([

    //             'user_id'        => $sponsor,

    //             'from_id'        => $user_id,

    //             'total_amount'   => $redemption_amount,

    //             'tds'            => 0,

    //             'service_charge' => 0,

    //             'payable_amount' => $redemption_amount,

    //             'payment_type'   => 'consultant_bonus',

    //             'payment_status' => 'Yes',

    //         ]);

    //     Balance::where('user_id',$sponsor)->increment('redemption_balance',$redemption_amount);

        

       



    // }





    



    //  public static function sponsorCommission($user_id,$package,$prev_sv,$sponsor)
    // { 
        
    //     $month = date('m'); 
    //     $sponsor_count=PurchaseHistory::where('user_id',$sponsor)
    //                                    ->whereMonth('created_at',$month)
    //                                    ->count();                                     
    //     if($sponsor_count >= 1)
    //     {         
    //        $monthly_sv=PurchaseHistory::where('user_id',$sponsor)->whereMonth('created_at',$month)->sum('pv');         
    //        if($monthly_sv >= 17)
    //         {
    //             // $userpackage=Packages::where('id',$package)->first();
    //             $userpackage=Packages::where('id',$package)->first();
    //             // $prepackage=Packages::where('id',$prev)->first();
    //             $user_pack=$userpackage->sv - $prev_sv;
    //             $p_id = Packages::where('sv','<=',$user_pack)->max('id');
    //             $user_pack_sv=Packages::where('id',$p_id)->value('sv');

    //            // dd($user_pack);
    //             $sponsorpack=PurchaseHistory::where('user_id',$sponsor)->max('id');
    //             $packages=PurchaseHistory::where('id',$sponsorpack)->value('package_id');
    //             $sponpackages=Packages::where('id',$packages)->first();
    //             // if($userpackage->sv >= 51){
    //             if($user_pack >= 51){    
    //             $sponsor_bonus=$user_pack * $sponpackages->sponsor / 100 ;
    //             $sponsorbonus=$sponsor_bonus * 100;
    //             $cash_amount=EwalletSettings::where('id',1)->value('percentage');
    //             $red_amount=EwalletSettings::where('id',2)->value('percentage');
    //             $commission_amount=$sponsorbonus * $cash_amount / 100;
    //             $redemption_amount=$sponsorbonus * $red_amount / 100;
    //             // $leg_user=User::where('id',$user_id)->first();
    //             // if($leg_user->sc ==0){
    //              $commision= Commission::create([
    //                 'user_id'        => $sponsor,
    //                 'from_id'        => $user_id,
    //                 'total_amount'   => $commission_amount,
    //                 'tds'            => 0,
    //                 'service_charge' => 0,
    //                 'payable_amount' => $commission_amount,
    //                 'payment_type'   => 'consultant_bonus',
    //                 'payment_status' => 'Yes',
    //                      ]);
    //             User::upadteUserBalance($sponsor,$commission_amount);
    //             $red_commision= RedemptionCommission::create([
    //                 'user_id'        => $sponsor,
    //                 'from_id'        => $user_id,
    //                 'total_amount'   => $redemption_amount,
    //                 'tds'            => 0,
    //                 'service_charge' => 0,
    //                 'payable_amount' => $redemption_amount,
    //                 'payment_type'   => 'consultant_bonus',
    //                 'payment_status' => 'Yes',
    //             ]);
    //            Balance::where('user_id',$sponsor)->increment('redemption_balance',$redemption_amount);  
    //            }                                    

    //         }
    //     }
    // }
     public static function sponsorCommission($user_id,$user_package_sv,$prev_sv,$sponsor)
    { 
        // dd($package);
        $month = date('m'); 
        $sponsor_count=PurchaseHistory::where('user_id',$sponsor)
                                       ->whereMonth('created_at',$month)
                                       ->count();                                     
        if($sponsor_count >= 1)
        {         
           $monthly_sv=PurchaseHistory::where('user_id',$sponsor)->whereMonth('created_at',$month)->sum('pv');         
           if($monthly_sv >= 17)
            {
                // $userpackage=Packages::where('id',$package)->first();
                // $user_pack=$userpackage->sv - $prev_sv;
                // $p_id = Packages::where('sv','<=',$user_pack)->max('id');
                // $user_pack_sv=Packages::where('id',$p_id)->value('sv');
                $sponsorpack=PurchaseHistory::where('user_id',$sponsor)->max('id');
                $packages=PurchaseHistory::where('id',$sponsorpack)->value('package_id');
                $sponpackages=Packages::where('id',$packages)->first();                
                if($user_package_sv >= 51){    
                // $sponsor_bonus=$user_pack * $sponpackages->sponsor / 100 ;
                    // dd($userpackage->sv,$sponpackages->sponsor);
                $sponsor_bonus=$user_package_sv * $sponpackages->sponsor / 100 ;
                $sponsorbonus=$sponsor_bonus * 100;
                $cash_amount=EwalletSettings::where('id',1)->value('percentage');
                $red_amount=EwalletSettings::where('id',2)->value('percentage');
                $commission_amount=$sponsorbonus * $cash_amount / 100;
                $redemption_amount=$sponsorbonus * $red_amount / 100;
               
                 $commision= Commission::create([
                    'user_id'        => $sponsor,
                    'from_id'        => $user_id,
                    'total_amount'   => $commission_amount,
                    'tds'            => 0,
                    'service_charge' => 0,
                    'payable_amount' => $commission_amount,
                    'payment_type'   => 'consultant_bonus',
                    'payment_status' => 'Yes',
                         ]);
                User::upadteUserBalance($sponsor,$commission_amount);
                $red_commision= RedemptionCommission::create([
                    'user_id'        => $sponsor,
                    'from_id'        => $user_id,
                    'total_amount'   => $redemption_amount,
                    'tds'            => 0,
                    'service_charge' => 0,
                    'payable_amount' => $redemption_amount,
                    'payment_type'   => 'consultant_bonus',
                    'payment_status' => 'Yes',
                ]);
               Balance::where('user_id',$sponsor)->increment('redemption_balance',$redemption_amount);  
               }                                    

            }
        }
    }
}
