<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalarySetting extends Model
{
    protected $table="salarysetting";

    protected $fillable=['post_name','monthly_repurchase','calculation_periods','sales_volume','ratio','payment','carry_forward_volume'];

    public static function updateSalarySetting($cloumn_name, $salary_id, $value)
    {
    	
        if ($cloumn_name == 'post_name') {
            self::where('id', '=', $salary_id)->update(['post_name' => $value]);
        } elseif ($cloumn_name == 'monthly_repurchase') {
            self::where('id', '=', $salary_id)->update(['monthly_repurchase' => $value]);
        } elseif ($cloumn_name == 'calculation_periods') {
            self::where('id', '=', $salary_id)->update(['calculation_periods' => $value]);
        } elseif ($cloumn_name == 'sales_volume') {
            self::where('id', '=', $salary_id)->update(['sales_volume' => $value]);
        } elseif ($cloumn_name == 'monthly_repurchase') {
            self::where('id', '=', $salary_id)->update(['ratio' => $value]);
        } elseif ($cloumn_name == 'payment') {
            self::where('id', '=', $salary_id)->update(['payment' => $value]);
        }
        elseif ($cloumn_name == 'carry_forward_volume') {
            self::where('id', '=', $salary_id)->update(['carry_forward_volume' => $value]);
        }  

         elseif ($cloumn_name == 'closing_date') {
            self::where('id', '=', $salary_id)->update(['closing_date' => $value]);
        }         
    }
}
