<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "rating";
    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
