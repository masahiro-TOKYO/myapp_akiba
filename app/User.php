<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function works()
    {
        if($this->role==='creator')
        {
            return $this->hasMany('App\CreatorWork');
        }
        if($this->role==='actor')
        {
            return $this->hasMany('App\ActorWork');
        }
    }
    // public function works_first()
    // {
    //     if($this->role==='creator')
    //     {
    //         return $this->hasOne('App\CreatorWork')->orderBy('created_at','desc');
    //     }
    //     if($this->role==='actor')
    //     {
    //         return $this->hasOne('App\ActorWork')->orderBy('created_at','desc');
    //     }
    // }

    public function creator_works_first()
    {
        return $this->hasOne('App\CreatorWork')->orderBy('created_at','desc'); 
    }
    public function actor_works_first()
    {
        return $this->hasOne('App\ActorWork')->orderBy('created_at','desc'); 
    }

    public function profile()
    {
        if($this->role==='actor')
        {
            return $this->hasOne('App\ActorProfile');
        }
        if($this->role==='creator')
        {
            return $this->hasOne('App\CreatorProfile');
        }
    }

    public function isCreator()
    {
        return (bool)($this->role==='creator');
    }
    public function isActor()
    {
        return (bool)($this->role==='actor');
    }
    public function isCreatedProfile()
    {
        return (bool)($this->profile_status);
    }
}
