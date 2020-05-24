<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "district";
    public $timestamps = false;

    public function Province(){
        return $this->belongsTo('App\ProvinceCity','province_city_id','id');
    }
}
