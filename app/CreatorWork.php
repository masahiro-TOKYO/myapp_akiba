<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreatorWork extends Model
{
    protected $table = 'creator_works';
    protected $guarded = array('id');
    public static $rules = array(
        'user_id' => 'required',
        'caption' => 'required',
    );
    public function creator_profiles()
    {
        return $this->belongsTo('App\CreatorProfile');
    }
}
