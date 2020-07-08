<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSchedule extends Model
{
    protected $table = "user_schedule";
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }


    public function starting_district(){
        return $this->belongsTo('App\District','starting_district_id','id');
    }

    public function starting_province_city(){
        return $this->belongsTo('App\ProvinceCity','starting_province_city_id','id');
    }

    public function end_district(){
        return $this->belongsTo('App\District','end_district_id','id');
    }

    public function end_province_city(){
        return $this->belongsTo('App\ProvinceCity','end_province_city_id','id');
    }

    public function combine(){
        return $this->hasOne('App\Combine','user_schedule_id','id');
    }
}
