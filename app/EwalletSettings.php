<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class EwalletSettings extends Model

{

    protected $table = 'ewallet_settings';



    protected $fillable = ['bitcoin_address','type'];



    public static function updateewalletSetting($cloumn_name, $salary_id, $value)

    {

        

        if ($cloumn_name == 'bitcoin_address') {

            self::where('id', '=', $salary_id)->update(['bitcoin_address' => $value]);

        } elseif ($cloumn_name == 'type') {

            self::where('id', '=', $salary_id)->update(['type' => $value]);

        // } elseif ($cloumn_name == 'development') {

        //     self::where('id', '=', $salary_id)->update(['development' => $value]);

        // } elseif ($cloumn_name == 'consultant') {

        //     self::where('id', '=', $salary_id)->update(['consultant' => $value]);

        

        // } elseif ($cloumn_name == 'signup') {

        //     self::where('id', '=', $salary_id)->update(['signup' => $value]);

        // }

        // elseif ($cloumn_name == 'rank') {

        //     self::where('id', '=', $salary_id)->update(['rank' => $value]);

        }     

             

    }

}

