<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignupBonus extends Model
{
    protected $table="signup_bonus_setting";

    protected $fillable=['rank','qualify_personal_sv','income','capping'];

     public static function updateSignupBonusSettings($cloumn_name, $rank_id, $value)
    {
        if ($cloumn_name == 'rank') {
            self::where('id', '=', $rank_id)->update(['rank' => $value]);
        } elseif ($cloumn_name == 'personal_pv') {
            self::where('id', '=', $rank_id)->update(['personal_pv' => $value]);
        } elseif ($cloumn_name == 'qualify_personal_sv') {
            self::where('id', '=', $rank_id)->update(['qualify_personal_sv' => $value]);
        } elseif ($cloumn_name == 'income') {
            self::where('id', '=', $rank_id)->update(['income' => $value]);
        } elseif ($cloumn_name == 'capping') {
            self::where('id', '=', $rank_id)->update(['capping' => $value]);
        } 
    }
}
