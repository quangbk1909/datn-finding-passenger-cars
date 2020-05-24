<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coach;
use App\ProvinceCity;

class CoachController extends Controller
{
    public function searchCoach(Request $request){
    	$startingProvince = $request->starting_province;
    	$endProvince = $request->end_province;
    	$specificLocation = $request->specific_location;
    	$query = Coach::Where("starting_province_city_id", "=", $startingProvince)->Where("end_province_city_id", "=", $endProvince);
    	if ($specificLocation != "") {
    		$query = $query->search($specificLocation);    		
    	}
    	$coachs = $query->get();	
    	$provinces = ProvinceCity::get();
    	return view("pages.searching_coach",compact("coachs","provinces","startingProvince","specificLocation", "endProvince"));
    }

    public function show($id) {
    	$coach = Coach::find($id);
    	return view("pages.coach_detail", compact("coach"));

    }

}
