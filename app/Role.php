<?php namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Notifiable;
    protected $table = 'roles';

    public function users()
    {
        /**
         *
         *   Users
         */
        return $this->hasMany('App\User', 'role_id', 'id');
    }
}
