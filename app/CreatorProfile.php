<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreatorProfile extends Model
{
    protected $table = 'creator_profiles';
    protected $guarded = array('id');
    public static $rules = array(
        'user_id' => 'required',
        'name' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'area' => 'required',
        'introduction' => 'required',
    );
    public function creator_works()
    {
        return $this->hasMany('App\CreatorWork');
    }
}
