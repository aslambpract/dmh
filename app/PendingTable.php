<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingTable extends Model
{
    protected $table = 'pending_table';
    protected $fillable = ['account_id','next','status','from_id'] ;
}
