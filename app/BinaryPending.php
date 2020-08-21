<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinaryPending extends Model
{
   protected $table = 'binary_pending';

    protected $fillable = ['user_id','from_id','type'];
}
