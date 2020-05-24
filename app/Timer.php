<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    protected $table = "timer";
    public $timestamps = false;

    public function coach(){
    	return $this->belongsTo('App\Coach','coach_id','id');
    }
}
