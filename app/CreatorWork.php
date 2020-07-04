<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreatorWork extends Model
{
    protected $table = 'creator_works';
    protected $guarded = ['id'];
    public static $rules = [
        'caption' => 'required',
    ];
    public function creator_profiles()
    {
        return $this->belongsTo('App\CreatorProfile');
    }
    public function work_creator_history_first()
    {
        return $this->hasOne('App\CreatorWork')->olderBy('id','desc');
    }
}
