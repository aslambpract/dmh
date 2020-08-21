<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoadPosition extends Model
{
      use SoftDeletes ;

    protected $table = 'load_position' ;

    protected $fillable = ['user_id','no_of_positions'];//
}
