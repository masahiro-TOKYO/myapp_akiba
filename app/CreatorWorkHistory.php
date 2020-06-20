<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreatorWorkHistory extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'work_id' => 'required',
        );
    public function work_creator_history_first()
    {
        return $this->hasOne('App\CreatorWorkHistory')->olderBy('id','desc');
    }
}
