<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combine extends Model
{
    protected $table = "combine";
    public $timestamps = false;

    public function driverSchedule(){
    	return $this->belongsTo('App\DriverSchedule','driver_schedule_id','id');
    }

    public function userSchedule(){
    	return $this->belongsTo('App\UserSchedule','user_schedule_id','id');
    }
}
