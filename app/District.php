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

    function convertNameToEn() {
      $nameStr = $this->name;
      $nameStr = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $nameStr);
      $nameStr = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $nameStr);
      $nameStr = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $nameStr);
      $nameStr = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $nameStr);
      $nameStr = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $nameStr);
      $nameStr = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $nameStr);
      $nameStr = preg_replace("/(đ)/", "d", $nameStr);
      $nameStr = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $nameStr);
      $nameStr = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $nameStr);
      $nameStr = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $nameStr);
      $nameStr = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $nameStr);
      $nameStr = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $nameStr);
      $nameStr = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $nameStr);
      $nameStr = preg_replace("/(Đ)/", "D", $nameStr);

      return $nameStr;
  }
}
