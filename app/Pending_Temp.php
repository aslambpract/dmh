<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pending_Temp extends Model
{
    use SoftDeletes;

    protected $table = 'pending_temp';


    protected $fillable = ['order_id', 'user_id','username','email','package','sponsor','request_data','payment_method','payment_type','invoice','payment_code','amount','payment_address','rave_ref_id','payment_data','payment_response_data','payment_status','approved_by','paytoken','ordercode','paypal_express_data'];
}
