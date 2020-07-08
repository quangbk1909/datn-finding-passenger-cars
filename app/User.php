<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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


    public function car(){
        return $this->hasOne('App\Car','user_id','id');
    }

    public function organization(){
        return $this->hasMany('App\Organization','owner_id','id');
    }

    public function belongToOrganization(){
        return $this->belongsTo('App\Organization','organization_id','id');
    }

    public function userSchedule(){
        return $this->hasMany('App\UserSchedule','user_id','id');
    }

    public function coachFollowed(){
        return $this->belongsToMany('App\Coach','follow','user_id','coach_id');
    }

    public function notification(){
        return $this->hasMany('App\Notification','user_id','id');
    }
}
