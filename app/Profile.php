<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'job' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'area' => 'required',
        'introduction' => 'required',
    );
}
