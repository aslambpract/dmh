<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SponsorCommissionPending extends Model
{
    protected $table = 'sponsor_commission_pending';

    protected $fillable = ['user_id','sv','status'];
}
