<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = "organization";
    public $timestamps = false;

    public function car(){
        return $this->hasMany('App\Coach','organization_id','id');
    }

    public function owner(){
    	return $this->belongsTo('App\User','owner_id','id');
    }

    public function user(){
        return $this->hasMany('App\User','organization_id','id');
    }

    public function coach(){
        return $this->hasMany('App\Coach','organization_id','id');
    }
}
