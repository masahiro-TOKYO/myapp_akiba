<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreatorsWorks extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'caption' => 'required',
        );
}
