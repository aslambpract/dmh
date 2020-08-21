<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingBinaryCommission extends Model
{
    protected $table = 'pending_binary_commission';


    protected $fillable = ['sponsor_id','left_user_id','right_user_id','status'] ;}
