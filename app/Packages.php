<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB ;
class Packages extends Model
{
    //

    use SoftDeletes;

    protected $table = 'packages' ;

    protected $fillable = ['package','positions_in_fly','accounts_in_infinity','amount','positions_in_infinity','payout','special_wallet','stage','fee','upgrade_fee_old','charge','member_benefit','downline_bonus','insurace_reg_fee','insurace_completing_fee','longrich_reg_fee','insurance_reg_fee','upline_fee','upgrade_fee'];

    public static function TopUPAutomatic($user_id)
    {
        $user_detils = User::find($user_id);
        $balance = Balance::where('user_id', $user_id)->pluck('balance');
        $package = self::find($user_detils->package);

        if ($package->amount <= $balance) {
            Balance::where('user_id', $user_id)->decrement('balance', $package->amount);
            PurchaseHistory::create([
                'user_id'=>$user_id,
                'package_id'=>$user_detils->package,
                'count'=>$package->top_count,
                'total_amount'=>$package->amount,
                ]);
             User::where('id', $user_id)->increment('revenue_share', $package->rs);

             RsHistory::create([
                    'user_id'=> $user_id ,
                    'from_id'=> $user_id ,
                    'rs_credit'=> $package->rs ,
                    ]);


             /* Check for rank upgrade */

             Ranksetting::checkRankupdate($user_id, $user_detils->rank_id);

            return true;
        } else {
            return flase ;
        }
    }

 
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function profileinfo()
    {
        return $this->belongsTo('App\Profileinfo');
    }

    public function PurchaseHistoryR()
    {
        return $this->hasMany('App\PurchaseHistory', 'package_id', 'id');
    }
    public static function calculations($account_id,$phase=1,$cyclecount=1){

            $user_id = UserAccounts::find($account_id)->user_id ;
            $account_type = UserAccounts::find($account_id)->account_type ;

            if($phase ==18){
                $next = 1 ;
            }else{
                $next = $phase +1 ;
            }

            $phase_settings = Packages::find($phase) ;
            // $next_phase_settings = Packages::find($next) ;
  // <!-- changed from next phase settings to current phase settings on saturday -->
            $next_phase_settings = Packages::find($phase) ;

            if($phase == 18){
                // Reactivation::create([
                //     'account_id'=>$account_id,
                //     'status'=>'approved',                                                            
                //   ]) ;
                //  PendingTable::create([                   
                //     'account_id' => $account_id,
                //     'next'       => 3,
                //     'status'     => "pending",  
                //     'from_id'    => 0,                                       
                // ]);
                
            }else{

                PendingTable::create([                   
                      'account_id' => $account_id,
                      'next'       => $next,
                      'status'     => "pending",  
                      'from_id'    => 0,                                       
                  ]);
              
                /* upgrade fee*/
                $phase=$phase+1;

                $commision = Commission::create([
                        'user_id'        => $user_id,
                        'account_id'     => $account_id,
                        'from_id'        => $account_id,
                        'total_amount'   => -$next_phase_settings->upgrade_fee,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => -$next_phase_settings->upgrade_fee,
                        'payment_type'   => 'stage'.$phase.'_upgrade',
                        'payment_status' => 'Yes',
                  ]) ;

                $upline_user= DB::table('tree_table')->where('user_id',$user_id)->value('placement_id');
                // add this entry on staurday night--

                $commision = Commission::create([
                        'user_id'        => $upline_user,
                        'account_id'     => $upline_user,
                        'from_id'        => $user_id,
                        'total_amount'   => +$next_phase_settings->upgrade_fee,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => +$next_phase_settings->upgrade_fee,
                        'payment_type'   => 'stage'.$phase.'_upgrade',
                        'payment_status' => 'Yes',
                  ]) ;
                 // add this entry on staurday night--
                User::upadteUserBalance($upline_user, $next_phase_settings->upgrade_fee);

                DB::table('user_balance')->where('user_id', $user_id)->decrement('balance', $next_phase_settings->upgrade_fee);
                
                /* charge */

                 

                // condition $next_phase_settings->id > 1 is for if current phase is package_id 1 there is no need of dedecut the charge amount 20

                // if($next_phase_settings->charge > 0){

                 if($next_phase_settings->charge > 0 && $next_phase_settings->id > 1){ 


                $commision = Commission::create([
                        'user_id'        => $user_id,
                        'account_id'     => $account_id,
                        'from_id'        => $account_id,
                        'total_amount'   => -$next_phase_settings->charge,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => -$next_phase_settings->charge,
                        'payment_type'   => 'charge',
                        'payment_status' => 'Yes',
                  ]) ;

                DB::table('user_balance')->where('user_id', $user_id)->decrement('balance', $next_phase_settings->charge);
                
                // $upline_user= DB::table('tree_table')->where('user_id',$user_id)->value('placement_id');
                // User::upadteUserBalance($upline_user, $next_phase_settings->charge);
              }

                  /* memeber benift */

                 if($next_phase_settings->member_benefit > 0){  

                $commision = Commission::create([
                        'user_id'        => $user_id,
                        'account_id'     => $account_id,
                        'from_id'        => $account_id,
                        'total_amount'   => +$next_phase_settings->member_benefit,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => +$next_phase_settings->member_benefit,
                        'payment_type'   => 'member_benefit',
                        'payment_status' => 'Yes',
                  ]) ;

                // User::upadteUserBalance($user_id, $next_phase_settings->member_benefit);
              }

               /* insurace_completing_fee */

                 if($next_phase_settings->insurace_completing_fee > 0){  

                $commision = Commission::create([
                        'user_id'        => $user_id,
                        'account_id'     => $account_id,
                        'from_id'        => $account_id,
                        'total_amount'   => -$next_phase_settings->insurace_completing_fee,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => -$next_phase_settings->insurace_completing_fee,
                        'payment_type'   => 'insurace_completing_fee',
                        'payment_status' => 'Yes',
                  ]) ;
              }

              /*  longrich_reg_fee */

                 if($next_phase_settings->longrich_reg_fee > 0){  

                $commision = Commission::create([
                        'user_id'        => $user_id,
                        'account_id'     => $account_id,
                        'from_id'        => $account_id,
                        'total_amount'   => -$next_phase_settings->longrich_reg_fee,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => -$next_phase_settings->longrich_reg_fee,
                        'payment_type'   => 'logrich_registration_fee',
                        'payment_status' => 'Yes',
                  ]) ;
              }

              /*  insurance_reg_fee */

                 if($next_phase_settings->insurance_reg_fee > 0){  

                $commision = Commission::create([
                        'user_id'        => $user_id,
                        'account_id'     => $account_id,
                        'from_id'        => $account_id,
                        'total_amount'   => -$next_phase_settings->insurance_reg_fee,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => -$next_phase_settings->insurance_reg_fee,
                        'payment_type'   => 'insurance_registration_fee',
                        'payment_status' => 'Yes',
                  ]) ;
              }

               /*  downline_bonus */

                 if($next_phase_settings->downline_bonus > 0){  

               $dowmline_user=DB::table('tree_table')->where('placement_id',$user_id)->get();
               foreach ($dowmline_user as $key => $value) {

                   $commision = Commission::create([
                        'user_id'        => $value->user_id,
                        'account_id'     => $value->user_id,
                        'from_id'        => $user_id,
                        'total_amount'   => +$next_phase_settings->downline_bonus,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => +$next_phase_settings->downline_bonus,
                        'payment_type'   => 'downline_bonus',
                        'payment_status' => 'Yes',
                  ]) ;

                   User::upadteUserBalance($value->user_id, $next_phase_settings->downline_bonus);
                  }
                 
              }             

          }         

    }
}
