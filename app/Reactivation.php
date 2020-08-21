<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reactivation extends Model
{
    protected $table="reactivation";

    protected $fillable=["account_id","status"];
}
