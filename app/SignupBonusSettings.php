<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignupBonusSettings extends Model
{
     protected $table = 'signup_bonus';

    protected $fillable = ['period','type','pair_value','pair_commission','pair_commission_percent','binary_cap','ceiling'];
}
