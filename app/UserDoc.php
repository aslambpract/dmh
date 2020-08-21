<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDoc extends Model
{
    use SoftDeletes;

	protected $table = 'user_doc' ;

	protected $fillable =['user_id','doc','status'] ;
}

