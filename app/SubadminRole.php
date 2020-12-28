<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubadminRole extends Model
{
    use SoftDeletes, Notifiable;
    protected $table = 'subadmin_roles';
    protected $fillable=["role_name","link","submenu_count","is_root","parent_id","main_role","icon","role_no"];
}
