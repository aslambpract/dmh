<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwardSetting extends Model
{
    protected $table="riward_setting";

    protected $fillable=['rank','percentage','mini_monthly_income','points','allow_after_six_months'];

     public static function updateRiwardSettings($cloumn_name, $riward_id, $value)
    {
        if ($cloumn_name == 'rank') {
            self::where('id', '=', $riward_id)->update(['rank' => $value]);
        } elseif ($cloumn_name == 'percentage') {
            self::where('id', '=', $riward_id)->update(['percentage' => $value]);
        } elseif ($cloumn_name == 'mini_monthly_income') {
            self::where('id', '=', $riward_id)->update(['mini_monthly_income' => $value]);
        } elseif ($cloumn_name == 'points') {
            self::where('id', '=', $riward_id)->update(['points' => $value]);
        } elseif ($cloumn_name == 'allow_after_six_months') {
            self::where('id', '=', $riward_id)->update(['allow_after_six_months' => $value]);
        }
    }
}
