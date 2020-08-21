<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostName extends Model
{
    protected $table="post_name";

    protected $fillable=['user_id','post_id','updated_post_id'];
}
