<?php

namespace App;
   
use Illuminate\Database\Eloquent\Model;

class Tree_Table6 extends Model
{
    
    public static $MODEL_NOT_FOUND = '-1';

    protected $table = 'tree_table6';

    protected $fillable = ['user_id', 'sponsor', 'placement_id', 'leg'];

    
}
