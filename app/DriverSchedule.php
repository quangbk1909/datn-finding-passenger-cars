<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverSchedule extends Model
{
    protected $table = "driver_schedule";
    public $timestamps = false;

    public function car(){
        return $this->hasOne('App\Combine','driver_schedule_id','id');
    }

    public function starting_district(){
        return $this->hasOne('App\District','starting_district_id','id');
    }

    public function starting_province_city(){
        return $this->hasOne('App\ProvinceCity','starting_province_city_id','id');
    }

    public function end_district(){
        return $this->hasOne('App\District','end_district_id','id');
    }

    public function end_province_city(){
        return $this->hasOne('App\ProvinceCity','end_province_city_id','id');
    }

}
