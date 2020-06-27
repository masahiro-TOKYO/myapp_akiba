<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorProfile extends Model
{
    protected $table = 'actor_profiles';
    protected $guarded = ['id'];
    public static $rules = [
        'user_id' => 'required',
        'name' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'area' => 'required',
        'introduction' => 'required',
    ];
    public function users()
    {
      return $this->hasMany('App\User');

    }
}
