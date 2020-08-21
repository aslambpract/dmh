<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ShareBonus ;
use App\Sales ;
use App\PointHistory ;
use App\UserAccounts ;
use App\PendingTable ;
use App\User ;
use App\Balance ;
use App\Payout ;
use DB ;

// 9946159096

class ShareBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       // $variable = DB::table('tree_table_bck')->where('cyclecount','>=',1)->pluck('user_id') ;


       // foreach ($variable as $key => $value) {
              
       //        if(DB::table('tree_table')->where('placement_id',$value)->where('user_id','>',0)->count() == 3){

       //            PendingTable::create([                   
       //              'account_id' => $value,
       //              'next'       => 1,
       //              'status'     => "pending",  
       //              'from_id'    => 0,                                       
       //          ]);

       //        }
              
       // }


// 22222222222222
       //  $variable = DB::table('tree_table2')->where('user_id','>',0)->pluck('user_id') ;


       // foreach ($variable as $key => $value) {
              
       //        if(DB::table('tree_table2')->where('placement_id',$value)->where('user_id','>',0)->count() == 3){

       //            PendingTable::create([                   
       //              'account_id' => $value,
       //              'next'       => 1,
       //              'status'     => "finish-1",  
       //              'from_id'    => 0,                                       
       //          ]);
       //          $tree = DB::table('tree_table')->where('user_id','=',$value)->increment('cyclecount');


       //        }
              
       // }


      //3333333333333333333333333

       //   $variable = DB::table('tree_table')->where('cyclecount',2)->pluck('user_id') ;


       // foreach ($variable as $key => $value) {
              
       //        if(DB::table('tree_table')->where('placement_id',$value)->where('cyclecount',2)->count() == 3){

       //            PendingTable::create([                   
       //              'account_id' => $value,
       //              'next'       => 2,
       //              'status'     => "finish-1",  
       //              'from_id'    => 0,                                       
       //          ]);
       //          $tree = DB::table('tree_table2')->where('user_id','=',$value)->increment('cyclecount');


       //        }
              
       // }



      // 44444444444444444


       //   $variable = DB::table('tree_table2')->where('cyclecount',2)->pluck('user_id') ;


       // foreach ($variable as $key => $value) {
              
       //        if(DB::table('tree_table2')->where('placement_id',$value)->where('cyclecount',2)->count() == 3){

       //            PendingTable::create([                   
       //              'account_id' => $value,
       //              'next'       => 1,
       //              'status'     => "finish-2",  
       //              'from_id'    => 0,                                       
       //          ]);
       //          $tree = DB::table('tree_table')->where('user_id','=',$value)->increment('cyclecount');


       //        }
              
       // }

      //55555555555555555555



       //   $variable = DB::table('tree_table')->where('cyclecount',3)->pluck('user_id') ;


       // foreach ($variable as $key => $value) {
              
       //        if(DB::table('tree_table')->where('placement_id',$value)->where('cyclecount',3)->count() == 3){

       //            PendingTable::create([                   
       //              'account_id' => $value,
       //              'next'       => 2,
       //              'status'     => "finish-2",  
       //              'from_id'    => 0,                                       
       //          ]);
       //          $tree = DB::table('tree_table2')->where('user_id','=',$value)->increment('cyclecount');


       //        }
              
       // }



      //66666666666666666

        // $variable = DB::table('tree_table2')->where('cyclecount',3)->pluck('user_id') ;


       // foreach ($variable as $key => $value) {
              
              // if(DB::table('tree_table2')->where('placement_id',$value)->where('cyclecount',3)->count() == 3){

              //     PendingTable::create([                   
              //       'account_id' => $value,
              //       'next'       => 1,
              //       'status'     => "finish-3",  
              //       'from_id'    => 0,                                       
              //   ]);
                // $tree = DB::table('tree_table')->where('user_id','=',$value)->increment('cyclecount');


              // }
              
       }

            
    }

   
    public function payout()
    {
        
    }
}
