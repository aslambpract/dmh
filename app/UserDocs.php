<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDocs extends Model
{
    use SoftDeletes;

	protected $table = 'user_docs' ;

	protected $fillable =['user_id','doc','status'] ;
}
