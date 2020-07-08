<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = "car";
    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function driver_schedule(){
    	return $this->hasMany('App\DriverSchedule','car_id','id');
    }

    public function rating(){
    	return $this->hasMany('App\Rating','car_id','id');
    }

    public function getAverageRatingStar() {
    	$ratings = $this->rating;
    	$total = 0;
    	foreach ($ratings as $rating) {
    		$total += $rating->star;
    	}
    	if (count($ratings) == 0) {
    		return 0;
    	}
    	return $total/count($ratings);
    }

    
}
