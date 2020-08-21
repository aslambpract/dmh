<?php

use Illuminate\Database\Seeder;

class UserAccounts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\UserAccounts::create([
            'user_id'        => 1,
            'account_type'        => 'account',
            'account_no'   => 001,
            'status'   => 'yes',
        ]); 
    }
}
