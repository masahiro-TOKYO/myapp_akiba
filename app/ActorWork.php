<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorWork extends Model
{
    protected $table = 'actor_works';
    protected $guarded = ['id'];
    public static $rules = [
        'caption' => 'required',
        ];
}
