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

    protected $fillable = ['package','positions_in_fly','accounts_in_infinity','amount','positions_in_infinity','payout','special_wallet','stage','fee','upgrade_fee','charge','member_benefit','downline_bonus','insurace_reg_fee','insurace_completing_fee','longrich_reg_fee','insurance_reg_fee'];

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
            $next_phase_settings = Packages::find($next) ;

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
                $commision = Commission::create([
                        'user_id'        => $user_id,
                        'account_id'     => $account_id,
                        'from_id'        => $account_id,
                        'total_amount'   => -$next_phase_settings->upgrade_fee,
                        'tds'            => '0',
                        'service_charge' => '0',
                        'payable_amount' => -$next_phase_settings->upgrade_fee,
                        'payment_type'   => 'stage_upgrade',
                        'payment_status' => 'Yes',
                  ]) ;
                /* charge */

                 if($next_phase_settings->charge > 0){

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
                        'payment_type'   => 'benift',
                        'payment_status' => 'Yes',
                  ]) ;
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
                        'payment_type'   => 'benift',
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
                        'payment_type'   => 'benift',
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
                        'payment_type'   => 'benift',
                        'payment_status' => 'Yes',
                  ]) ;
              }

               /*  downline_bonus */

              //    if($next_phase_settings->downline_bonus > 0){  

               // $dowmline_user=DB::table('tree_table'.$next)->where('placement_id',$user_id)->get();
               // foreach ($dowmline_user as $key => $value) {

                 //   $commision = Commission::create([
              //           'user_id'        => $value[user_id],
              //           'account_id'     => $account_id,
              //           'from_id'        => $account_id,
              //           'total_amount'   => -$next_phase_settings->downline_bonus,
              //           'tds'            => '0',
              //           'service_charge' => '0',
              //           'payable_amount' => -$next_phase_settings->downline_bonus,
              //           'payment_type'   => 'benift',
              //           'payment_status' => 'Yes',
              //     ]) ;
              // }
                 
               // }


             

            }

            $first_phase_settings = Packages::find(1) ;

            //1  positions_in_fly

            $account_count = UserAccounts::where('user_id',$user_id)->count()  ;
           
           if($phase_settings->positions_in_infinity){
                for ($i=0; $i < $phase_settings->positions_in_infinity ; $i++) {   

                        $account_count = $account_count +1 ;
                        $account = UserAccounts::create([
                                                'user_id'=>$user_id,
                                                'account_type'=>'positions',
                                                'approved'=>'pending',
                                                'account_no'=>'00'.$account_count,
                                                
                                        ]);
                        // DB::table('pending_table')->insert([
                        //                     'account_id'=>$account->id,
                        //                     'next'=>1,
                        //                     'status'=>'pending',
                        //                 ]) ;   


                        Transactions::create([
                          'user_id'=>$user_id,
                          'account_id'=>$account_id,
                          'payment_type'=>'payout',
                          'wallet_address'=>EwalletSettings::find(1)->bitcoin_address,
                          'amount'=>$first_phase_settings->amount
                      ]);
                          



                }
                $deduct_amount = $first_phase_settings->amount * $phase_settings->positions_in_fly ;
                        // deduct amount from user balance and commissions table
                     $commision = Commission::create([
                      'user_id'        => $user_id,
                      'account_id'     => $account_id,
                      'from_id'        => $account_id,
                      'total_amount'   => -$deduct_amount,
                      'tds'            => '0',
                      'service_charge' => '0',
                      'payable_amount' => -$deduct_amount,
                      'payment_type'   => 'positions_generated',
                      'payment_status' => 'Yes',
                ]) ;

                Balance::where('user_id',$user_id)->decrement('balance',$deduct_amount) ;

                EwalletSettings::where('id',1)->increment('balance',$deduct_amount) ;


            }


            if($phase_settings->accounts_in_infinity){
                for ($i=0; $i < $phase_settings->accounts_in_infinity ; $i++) {   

                        $account_count = $account_count +1 ;
                        $account = UserAccounts::create([
                                                'user_id'=>$user_id,
                                                'account_type'=>'account',
                                                'approved'=>'pending',
                                                'account_no'=>'00'.$account_count,
                                                
                                        ]);
                        // DB::table('pending_table')->insert([
                        //                     'account_id'=>$account->id,
                        //                     'next'=>1,
                        //                     'status'=>'pending',
                        //                 ]) ;
                        



                }
                $deduct_amount = $first_phase_settings->amount * $phase_settings->accounts_in_infinity ;
                        // deduct amount from user balance and commissions table
                     $commision = Commission::create([
                      'user_id'        => $user_id,
                      'account_id'     => $account_id,
                      'from_id'        => $account_id,
                      'total_amount'   => -$deduct_amount,
                      'tds'            => '0',
                      'service_charge' => '0',
                      'payable_amount' => -$deduct_amount,
                      'payment_type'   => 'accounts_generated',
                      'payment_status' => 'Yes',
                ]);

                Balance::where('user_id',$user_id)->decrement('balance',$deduct_amount) ;
                EwalletSettings::where('id',1)->increment('balance',$deduct_amount) ;


            }


            // payout 

            if($phase_settings->payout){

                $user_balance = Balance::where('user_id', $user_id)->decrement('balance',$phase_settings->payout);
                $payout=Payout::create([
                    'user_id'=>$user_id,
                    'account_id'=>$account_id,
                    'account_type'=>$account_type,
                    'amount'=>$phase_settings->payout,
                    'payment_mode'=>'payout',
                    'status'=>'pending',
                    'tx_hash'=>0,
                    ]);

                if($user_id == 1){
                    if($account_type == 'positions'){
                      $wallet_address = EwalletSettings::find(3)->bitcoin_address ;
                       EwalletSettings::where('id',3)->increment('balance',$phase_settings->payout) ;
                    }else{
                      $wallet_address = EwalletSettings::find(2)->bitcoin_address ;
                       EwalletSettings::where('id',2)->increment('balance',$phase_settings->payout) ;
                    }
                }else{
                    if($account_type == 'positions'){
                       $wallet_address = EwalletSettings::find(3)->bitcoin_address ;
                       EwalletSettings::where('id',3)->increment('balance',$phase_settings->payout) ;
                    }else{
                      $wallet_address = User::find($user_id)->bitcoin_address;
                    }
                } 

                
                Transactions::create([
                      'user_id'=>$user_id,
                      'account_id'=>$account_id,
                      'payment_type'=>'payout',
                      'wallet_address'=>$wallet_address,
                      'amount'=>$phase_settings->payout
                    ]);

              


                  
            }

            if($phase_settings->positions_in_fly){
               Transactions::create([
                      'user_id'=>$user_id,
                      'account_id'=>$account_id,
                      'payment_type'=>'positions_fly_btc',
                      'wallet_address'=>EwalletSettings::find(6)->bitcoin_address,
                      'amount'=>$phase_settings->positions_in_fly
                    ]);
              EwalletSettings::where('id',6)->increment('balance',$phase_settings->positions_in_fly) ;

            }

            
             if($phase_settings->special_wallet){
              Transactions::create([
                      'user_id'=>$user_id,
                      'account_id'=>$account_id,
                      'payment_type'=>'special_wallet',
                      'wallet_address'=>EwalletSettings::find(7)->bitcoin_address,
                      'amount'=>$phase_settings->special_wallet
                    ]);
              EwalletSettings::where('id',7)->increment('balance',$phase_settings->special_wallet) ;

            }

    }
}
