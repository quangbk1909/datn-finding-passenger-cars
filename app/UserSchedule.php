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
}
