<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreatorWork extends Model
{
    protected $table = 'creator_works';
    protected $guarded = ['id'];
    public static $rules = [
        'creator_profile_id' => 'required',
        'caption' => 'required',
    ];
    public function creator_profiles()
    {
        return $this->belongsTo('App\CreatorProfile');
    }
}
