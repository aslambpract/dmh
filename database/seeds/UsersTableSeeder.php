<?php

use Illuminate\Database\Seeder;
use \App\ProfileInfo;

class UsersTableSeeder extends Seeder
{

    public function run()
    {

        $user = \App\User::create([
            'name'       => 'John',
            'lastname'   => 'Doe',
            'username'   => 'admin',
            'email'      => 'info@infinty-btc.com',
            'rank_id'    => '1',
            'password'   => bcrypt('123456'),
            'confirmed'  => 1,
            'admin'      => 1,
            'confirmation_code' => md5(microtime() . env('APP_KEY')),
            'transaction_pass' => '123456',
            'approved'    =>1,
        ]);
        // $user = \App\User::create([
        //     'name'       => 'system',
        //     'lastname'   => 'user',
        //     'username'   => 'system',
        //     'email'      => 'system@infinty-btc.com',
        //     'rank_id'    => '1',
        //     'password'   => bcrypt('123456'),
        //     'confirmed'  => 1,
        //     'admin'      => 0,
        //     'confirmation_code' => md5(microtime() . env('APP_KEY')),
        //     'transaction_pass' => '123456',
        //     'approved'    =>1,
        // ]);
    }
}
