<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingCommission1 extends Model
{
   protected $table = 'pending_commission1';


    protected $fillable = ['sponsor','user_id','type','give_sp_cm'] ;
}
