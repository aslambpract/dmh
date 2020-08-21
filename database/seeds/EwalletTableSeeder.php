<?php



use Illuminate\Database\Seeder;



class EwalletTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        \App\EwalletSettings::create([

            'bitcoin_address'          => "2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm",

            'type'          => "registration_wallet",          

        ]);

        // \App\EwalletSettings::create([

        //     'bitcoin_address'          => "34XMSWjz3ujKf81knywmJnJtoJ95m9VUyg",
        //     'type'          => "saving_wallet", 

        // ]);

        \App\EwalletSettings::create([

            'bitcoin_address'          => "2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm",
            'type'          => "admin_wallet",   

        ]);

        \App\EwalletSettings::create([

            'bitcoin_address'          => "2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm",
            'type'          => "position_wallet",
           

        ]);
  \App\EwalletSettings::create([

            'bitcoin_address'          => "2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm",
            'type'          => "account_system",

        ]);
  \App\EwalletSettings::create([

            'bitcoin_address'          => "2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm",
            'type'          => "account_reactivated",           

        ]);

  \App\EwalletSettings::create([

            'bitcoin_address'          => "2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm",
            'type'          => "position_infinity_btc",           

        ]);

    \App\EwalletSettings::create([

            'bitcoin_address'          => "2N9dtyJNb43uHUDPWjfLSCQneM12X2uknwm",
            'type'          => "special_wallet",           

        ]);



    }

}

