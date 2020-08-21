<?php

use Illuminate\Database\Seeder;

class PaymenttypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\PaymentType::create([
          'payment_name'=>'Cheque',
          'code'=>'cheque',
          // 'status' =>'yes',
        ]);
        App\PaymentType::create([
          'payment_name'=>'Paypal',
          'code'=>'paypal',
        ]);
        App\PaymentType::create([
          'payment_name'=>'Bitaps',
          'code'=>'bitaps',
          'status' =>'yes',
        ]);
        App\PaymentType::create([
          'payment_name'=>'Stripe',
          'code'=>'stripe',
        ]);

        App\PaymentType::create([
          'payment_name'=>'Ewallet',
          'code'=>'ewallet',
          // 'status' =>'yes',

        ]);
        App\PaymentType::create([
          'payment_name'=>'Ipaygh',
          'code'=>'ipaygh',
        ]);

      // App\PaymentType::create([
      //     'payment_name'=>'Authorize',
      //     'code'=>'authorize',
      // ]);

        App\PaymentType::create([
          'payment_name'=>'Skrill',
          'code'=>'skrill',
        ]);

        App\PaymentType::create([
          'payment_name'=>'Rave',
          'code'=>'rave',
        ]);
        App\PaymentType::create([
          'payment_name'=>'Voucher',
          'code'=>'voucher',
        ]);
    }
}
