<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transactions extends Model
{
     
    use SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = ['user_id', 'account_id','payment_type','wallet_address','amount','status','payment_responce'];

 
}
