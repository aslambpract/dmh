<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\BinaryCommissionSettings;

class Commission extends Model
{
     

    use SoftDeletes;

    protected $table = 'commission';

    protected $fillable = ['user_id', 'from_id','total_amount','tds','service_charge','payable_amount','payment_type','payment_status','note','account_id'];


    public function sponsorcommission($sponsor_id, $from_id)
    {

         $settings = Settings::getSettings();

         $sponsor_commisions = $settings[0]->sponsor_Commisions;

         $tds = $sponsor_commisions * $settings[0]->tds / 100;
         /**
         * calcuate service charge
         * @var [type]
         */
         $service_charge = $sponsor_commisions * $settings[0]->service_charge / 100;
         /**
         * Calculates payable amount
         * @var [type]
         */
         $payable_amount = $sponsor_commisions - $tds - $service_charge;
         /**
         * Creates entry for user in commission table and set payment status to yes
         * @var [type]
         */
         $commision = self::create([
                'user_id'        => $sponsor_id,
                'from_id'        => $from_id,
                'total_amount'   => $sponsor_commisions,
                'tds'            => $tds,
                'service_charge' => $service_charge,
                'payable_amount' => $payable_amount,
                'payment_type'   => 'sponsor_commission',
                'payment_status' => 'Yes',
                
          ]);
          /**
          * updates the userbalance
          */
          User::upadteUserBalance($sponsor_id, $payable_amount);
    }
    public static function binaryCommission($from_id, $placement_id, $total_amount, $amount_payable, $tds, $service_charge)
    {
        
         $res = self::create([
                'user_id'=>$placement_id,
                'from_id'=>$from_id,
                'total_amount'=>$total_amount,
                'tds'=>$tds,
                'service_charge'=>$service_charge,
                'payable_amount'=>$amount_payable,
                'payment_type'=>'binary',
                ]);
        
         $user_type = self::checkUserType($placement_id);
        if ($user_type == "user") {
            self::updateUserBalance($placement_id, $amount_payable);
            $placement_id = self::getUplineId($placement_id);
            self::binaryCommission($from_id, $placement_id, $total_amount, $amount_payable, $tds, $service_charge);
        }
    }

    public static function getUplineId($user_id)
    {
         return DB::table('tree_table')->where('user_id', $user_id)->pluck('placement_id');
    }

   
    public static function updateUserBalance($user_id, $amount)
    {

        return    Balance::where('user_id', $user_id)->increment('balance', $amount);
    }

    public static function binaryLimit($user_id, $package_id)
    {
        $dailylimit = Packages::where('id', '=', $package_id)->value('capping');
        $binary=Packages::where('id', '=', $package_id)->value('binary');
        $daily_limit = $dailylimit * $binary;
        $today = date('Y-m-d 00:00:00');
        $end_date=date('Y-m-d 24:59:59');
        $totalbinary = Commission::where('user_id', $user_id)->where('created_at', '>=', $today)->where('created_at', '<=', $end_date)->Where('payment_type', 'sales_development_bonus')->sum('payable_amount');
        $total_binary1 = RedemptionCommission::where('user_id', $user_id)->where('created_at', '>=', $today)->where('created_at', '<=', $end_date)->Where('payment_type', 'sales_development_bonus')->sum('payable_amount');
        $total_binary=$totalbinary+$total_binary1;
        if ($total_binary <= $daily_limit) {
            $balance = $daily_limit - $total_binary;
            return $balance;
        } else {
            return 0;
        }
    }
    public static function sponsor_commission($sponsor, $user, $pv)
    {
        $sponsor_amount = option('app.sponsor_commission');
        $total_amount =$pv*$sponsor_amount*.01;
        if ($total_amount > 0) {
            $commision = self::create([
                  'user_id'        => $sponsor,
                  'from_id'        => $user,
                  'total_amount'   => $total_amount,
                  'tds'            => '0',
                  'service_charge' => '0',
                  'payable_amount' => $total_amount,
                  'payment_type'   => 'sponsor_commission',
                  'payment_status' => 'Yes',
            ]);
        }
    }


     public static function phase_commission($account_id,$package_id,$from_id)
    {
       
        $user_id=UserAccounts::where('id',$account_id)->value('user_id');
        $package_amount=Packages::find($package_id)->upgrade_fee;
        if($package_id ==1)
        { 
          $package_amount=Packages::find($package_id)->upline_fee;        
        
       
            $commision = self::create([
                  'user_id'        => $user_id,
                  'account_id'     => $user_id,
                  'from_id'        => $from_id,
                  'total_amount'   => $package_amount,
                  'tds'            => '0',
                  'service_charge' => '0',
                  'payable_amount' => $package_amount,
                  'payment_type'   => 'stage'.$package_id.'_upgrade',
                  'payment_status' => 'Yes',
            ]);

            // cmnted because this amount some times used for payout request save this amount for next level upgarade

            // User::upadteUserBalance($user_id, $package_amount);
     }

        
    }

     public static function registerFee($from_id,$package_id,$user_id="")
    {
       
       
        $package_amount=Packages::find($package_id)->fee;
        $account_id=UserAccounts::where('user_id',$from_id)->value('id');
        $refferal_bonus=BinaryCommissionSettings::where('id','1')->value('refferal');
        
            $commision = self::create([
                  'user_id'        => $user_id,
                  'account_id'     => $user_id,
                  'from_id'        => $from_id,
                  'total_amount'   => $refferal_bonus,
                  'tds'            => '0',
                  'service_charge' => '0',
                  'payable_amount' => $refferal_bonus,
                  'payment_type'   => 'refferal_bonus',
                  'payment_status' => 'Yes',
            ]);

            User::upadteUserBalance($user_id,$refferal_bonus);
             /* charge */

                $charge=Packages::find($package_id)->charge;
                if($charge > 0){

                $commision = Commission::create([
                        'user_id'        => $from_id,
                        'account_id'     => $from_id,
                        'from_id'        => $from_id,
                        'total_amount'   => -$charge,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => -$charge,
                        'payment_type'   => 'charge',
                        'payment_status' => 'Yes',
                  ]) ;


                $commision = Commission::create([
                        'user_id'        => 1,
                        'account_id'     => 1,
                        'from_id'        => $from_id,
                        'total_amount'   => +$charge,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => +$charge,
                        'payment_type'   => 'charge',
                        'payment_status' => 'Yes',
                  ]) ;

                // $upline_user= DB::table('tree_table')->where('user_id',$from_id)->value('placement_id');
                // User::upadteUserBalance($upline_user, $charge);
              }

               /* memeber benift */

                $member_benefit=Packages::find($package_id)->member_benefit;
                if($member_benefit > 0){ 
                $commision = Commission::create([
                        'user_id'        => $from_id,
                        'account_id'     => $from_id,
                        'from_id'        => $from_id,
                        'total_amount'   => +$member_benefit,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => +$member_benefit,
                        'payment_type'   => 'benifit',
                        'payment_status' => 'Yes',
                  ]) ;

                // User::upadteUserBalance($from_id,$member_benefit);
              }
        
    }
}
