<?php

use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\AppSettings::create([
           'company_name' => 'Cloud MLM Software',
           'company_address' => 'Calicut, India',
           'email_address' => 'info@cloudmlmsoftware.com',
           'logo' => 'dalsarulogo.png',
           'logo_ico' => 'dalsarulogo.png',
           'theme' => 'default',
          ]);
    }
}
