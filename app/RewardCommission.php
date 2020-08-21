<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RewardCommission extends Model
{
    use SoftDeletes;

    protected $table = 'reward_commission';

    protected $fillable = ['user_id', 'from_id','total_amount','tds','service_charge','payable_amount','payment_type','payment_status','note'];
}
