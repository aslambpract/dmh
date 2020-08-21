<?php

use Illuminate\Database\Seeder;

class settingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Settings::create([
            'point_value'        => '100',
            'pair_value'        => '10',
            'pair_amount'   => 100,
            'tds'   => '0',
            'service_charge'   => '0',
            'sponsor_Commisions'   => '100',
            'joinfee' => '70',
            'voucher_daily_limit' => '1000',
            'content' => 'Welcome to Terms and Conditions',
            'cookie' => 'Welcome to cookie Policy',
            'wallet_id' => 'qwqwqw',
            'wallet_id_hash' => 'qwqwqw',
            'wallet_address' => '36rBxbZSzKqouzpw5R4WVpjY4iYjXC8vLH',
         ]);
    }
}
