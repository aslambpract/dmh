<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Stages extends Model
{
    use SoftDeletes;

    protected $table = 'stages' ;

    protected $fillable = ['stage_name'] ;
}
