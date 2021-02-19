<?php

use Illuminate\Database\Seeder;

class EmailSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_setting')->insert([
             
              'username' => 'apikey',
              'password' => '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',
              'host' => 'smtp.sendgrid.net',
              'port' => '587',
              'from_name' => 'dreammakershome',
              'from_email' => 'baffour@thedreammakershome.com',

               ]);
    }
}
