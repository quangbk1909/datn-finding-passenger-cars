<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use FullTextSearchTrait;

    protected $table = "coach";
    public $timestamps = false;

    protected $searchable = [
        'route',
    ];

    public function organization(){
    	return $this->belongsTo('App\Organization','organization_id','id');
    }

    public function timer(){
        return $this->hasMany('App\Timer','coach_id','id');
    }

    public function rating(){
    	return $this->hasMany('App\Rating','coach_id','id');
    }

    public function getTimeRemaining() {
    	$now = time();
    	$timeRemaining  = PHP_INT_MAX;
		$timeToFirstDeparture = PHP_INT_MAX;
		foreach ($this->timer as $timeStr) {
			$time = strtotime($timeStr->started_time);
			$duration = (int)(($time - $now)/60);
			if ($duration > 0 && $timeRemaining > $duration) {
				$timeRemaining = $duration;
			}
			if ($timeToFirstDeparture > $duration) {
				$timeToFirstDeparture = $duration;
			}
		}
		if ($timeRemaining == PHP_INT_MAX && $timeToFirstDeparture == PHP_INT_MAX) {
			return rand(0,60);
			
		} 
		if ($timeRemaining == PHP_INT_MAX ) {
			return $timeToFirstDeparture + 60*24;    			
		} 
			
		return $timeRemaining;
		
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
