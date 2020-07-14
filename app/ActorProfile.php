<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorProfile extends Model
{
    protected $table = 'actor_profiles';
    protected $guarded = ['id'];
    public static $rules = [
        'name' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'area' => 'required',
        'introduction' => 'required',
        //画像のバリデーション
        'image' => 'required|file|mimes:jpeg,png'
    ];
    public function users()
    {
      return $this->hasMany('App\User');

    }

    public function getGenderLabelAttribute()
    {
        if($this->gender==='woman') $gender = '女性';
        if($this->gender==='men') $gender = '男性';
        if($this->gender==='other') $gender = 'その他';
        
        return $gender;
    }
}
