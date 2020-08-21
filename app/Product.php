<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'product';

    protected $fillable = ['name','description','image','quantity','price','status','mrp_price','dp_price','sv'];
}
