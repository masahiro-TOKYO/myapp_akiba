<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorProfile extends Model
{
    protected $table = 'actor_profiles';
    protected $guarded = array('id');
    public static $rules = array(
        'name' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'area' => 'required',
        'introduction' => 'required',
    );
}
