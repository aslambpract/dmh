<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';
    protected $fillable = ['content','cookie','upload_user','wallet_id','wallet_id_hash','wallet_address'];

    public static function getSettings()
    {
        return DB::table('settings')->get();
    }
}
