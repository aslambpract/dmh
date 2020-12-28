<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use DB;
use Config;

class AddToBuilder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lead:AddtoBulder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
 

          if(Config::get('app.url') == 'http://office.thedreammakershome.com/'){
          $url = 'http://dmh.demo' ;

        }else{
          $url = 'http://dmh.cloudmlm.online/' ;
        }
 

        // $unregistered_user=User::where('builder_id',0)->select('email','password')->where('id','>','2020-11-21')->get();  
        $unregistered_user=User::where('builder_id',0)
                                ->select('email','password')
                                ->where('id','>','1')
                                ->where('admin','1')
                                ->get();  
        foreach ($unregistered_user as $key => $value) { 
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $url."/secure/auth/register",
             CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('email' =>$value->email,'password' => $value->password,'password_confirmation' => $value->password),
            CURLOPT_HTTPHEADER => array(
            "Cookie: XSRF-TOKEN=eyJpdiI6IjdMOFBhTGpVMXFvSmQxYUYvTktsTmc9PSIsInZhbHVlIjoiSFpNV2FPYVBDQ05uQWk0UlBTZ0RlUnUzSVRZYW1uYmJ1eFFTYmZGekREQVBqcHpoYnN1bnp5d3hPeUJjdzlQL3FlZkpMcGNaMU9LMmcrM0NWZXZSWUk3YWc2bGtMbjBwYkIyT1lINGQ1OWthM0VGS3o1RVkxYTJMZStKZTcxNzkiLCJtYWMiOiJjNmNjZDU2NDUzZDk4NDFmODEyYTBlMDcyNmU2M2NmZTc4ZDE3YTA3ZTdiZTg1ZTNiMjM5Y2QyMDljODAxNWQzIn0%3D; architect_session=eyJpdiI6ImIwdzNUMStVQkorak4vNDZ2LzdHT2c9PSIsInZhbHVlIjoiY2hGcGpLdHU5UUw0ajJzTEFHc2lUQ3NmSTRqMUV5UjIvMkdHb21jTUlpVlU1N09pWU9hMjJwR0lkZ29SUzEvSU5tRkRhMzlOYlhPd0gxV0hxZlR1Q2k5UUtQM0tycndiaEVBK3FJWG1sRDYzQkdzaVhRSnNkZlQrRGNuckNnZ0YiLCJtYWMiOiJlZjZmZjJmYmE4YjM4OTlhODhmMTE0NmI0YmIyNjE5NWFiMWEyMjdhMzhiYzdjZDc4MTZlODVkMjQxYjRiN2RhIn0%3D"
            ),
            ));

            $response = curl_exec($curl);
          
           
            curl_close($curl);
            $jsonArrayResponse = json_decode($response);
 
            // User::where('email',$value->email)->update(['builder_api_token'=>$jsonArrayResponse->token]);
            // $builder_user_id   =  DB::connection('pagebuilder')->table('users')->where('email',$value->email)
            //                                          ->value('id');
            $user_id= User::where('email',$value->email)->value('id');
            $update_builder_id = User::where('email',$value->email)->update(['builder_id'=>$user_id]);

        }
            // dd("done");
    }
}
