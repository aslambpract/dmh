<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;
use App\UserAccounts;
use App\Commission;
use App\User;
use App\PendingTable;
use App\Packages;
use App\EwalletSettings;
use App\Tree_Table;
 
class TreeUpgrade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tree:upgrade';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description =  'upgrding tree';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = DB::table('pending_table')->where('status','=','pending')->get() ;

        foreach ($data as $key => $value) 
        {
            
            try {
                DB::beginTransaction();

                $next = $value->next ;

                if($next ==1) {
                    $next = null ;
                    $package_amount = Packages::find(1)->amount ;
                    EwalletSettings::where('id',1)->increment('balance',$package_amount) ;
                }
                // <!-- add for dmh -->
                // if($next ==2){
                   $placementid=Tree_Table::where('user_id',$value->account_id)->value('placement_id');
                   $tree_table_id=DB::table('tree_table'.$next)->where('placement_id',$placementid)->where('type','vaccant')->value('id');
                   if(isset($tree_table_id)) {
                    $placement =DB::table('tree_table'.$next)->where('id',$tree_table_id)->first() ;
                   }else{
                      $placement  = $this->getflyplacement($next) ;
                   }
               // }else{
               //     $placement  = $this->getflyplacement($next) ;
               // }

                   // cmtd for dmh
                   // $placement  = $this->getflyplacement($next) ;
                   
                   $cyclecount = 1 ;
                   if(DB::table('tree_table'.$next)->where('user_id',$value->account_id)->count()){
                        $tree = DB::table('tree_table'.$next)->where('user_id','=',$value->account_id)->increment('cyclecount');
                        $placement_id =DB::table('tree_table'.$next)->where('user_id','=',$value->account_id)->value('placement_id');
                        $cyclecount =DB::table('tree_table'.$next)->where('user_id','=',$value->account_id)->value('cyclecount');

                   }else{

                       $tree = DB::table('tree_table'.$next)->where('id','=',$placement->id)->update([
                                'user_id'=>$value->account_id,
                                'sponsor'=>0,
                                'type'=>'yes',
                                'updated_at'=>date('Y-m-d H:i:s')
                                ]);
                        $this->createVaccant($value->account_id,$next) ;
                        
                        $placement_id = DB::table('tree_table'.$next)->find($placement->id)->placement_id ;


          
                    }

                 
                   /* added for dmh by anitta*/
                    if($placement_id >0){

                        Commission::phase_commission($placement_id,$value->next,$value->account_id) ;
                    }
                    PendingTable::where('account_id',$value->account_id)->update(['status'=>'finish']);

                            
                      if(DB::table('tree_table'.$next)->where('placement_id',$placement_id)->where('type','=','yes')->count() == 2){
                          Packages::calculations($placement_id,$value->next,$cyclecount);

                     }
                   /* */                                    

                      
                
                DB::commit();

            } catch (Exception $e) {
                DB::rollBack();
   
            }
            

            
           
           
        }

            if(DB::table('pending_table')->where('status','=','pending')->count()){
                $this->callsilent('tree:upgrade') ;
            }
            // else{
            // // $this->callsilent('transaction:payout') ;
                
            // }
     }

    public function getflyplacement($next){
      
       return DB::table('tree_table'.$next)->where('type','vaccant')->orderBy('id')->first() ;         
    }

    public function createVaccant($placement,$next){
        
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
        //   DB::table('tree_table'.$next)->insert([
        //     'sponsor'      => 0,
        //     'user_id'      => '0',
        //     'placement_id' => $placement,
        //     'leg'          => '3',
        //     'type'         => 'vaccant',
        // ]);
       
    }
}