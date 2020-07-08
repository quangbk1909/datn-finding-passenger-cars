<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Coach;
use App\Rating;
use App\Follow;
use App\ProvinceCity;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller
{
    public function searchCoach(Request $request){
    	$startingProvince = $request->starting_province;
    	$endProvince = $request->end_province;
    	$specificLocation = $request->specific_location;
        
        if ($startingProvince != "" && $endProvince == "") {
            $query = Coach::Where("starting_province_city_id", "=", $startingProvince);       
        } else if ($startingProvince == "" && $endProvince != "") {
            $query = Coach::Where("end_province_city_id", "=", $endProvince);
        } else {
            $query = Coach::Where("starting_province_city_id", "=", $startingProvince)->Where("end_province_city_id", "=", $endProvince);
        }
    	if ($specificLocation != "") {
    		$query = $query->search($specificLocation);    		
    	}
        $max_cost = (int)$request->max_cost;
        if($max_cost != 0) {
            $query = $query->Where("cost", "<=", $max_cost);
        }
        $seats = $request->seats;
        if (isset($seats)) {
            if (count($seats) == 1){
                $numberSeats = explode("-", $seats[0]);
                $query = $query->WhereBetween("capacity",$numberSeats);
            } else { 
                $query = $query->where(function ($subQuery) use ($seats) {
                    $numberSeats = explode("-", $seats[0]);
                    $subQuery->WhereBetween('capacity',$numberSeats);
                    for($i = 1; $i < count($seats); $i++) {
                        $numberSeats = explode("-", $seats[$i]);
                        $subQuery->OrWhereBetween('capacity',$numberSeats);
                    }
                });
            }
        }
        $star = (int)$request->rating_star;
        if ($star != 0) {
            $query = $query->WhereRaw("(select avg(star) from rating where coach_id = coach.id) >= ?",$star);
        }
        
    	$coachs = $query->paginate(6);	
    	$provinces = ProvinceCity::get();
    	return view("pages.searching_coach",compact("coachs","provinces","startingProvince","specificLocation", "endProvince", "max_cost", "seats", "star"));
    }

    public function getSearchCoach(){
        $provinces = ProvinceCity::get();
        return view("pages.searching_coach", compact("provinces"));
    }

    public function show($id) {
    	$coach = Coach::find($id);
        if (!isset($coach)) {
            abort(404);
        }
        $ratings = Rating::Where("coach_id","=",$id)->orderBy("created_at", "DESC")->get();
        if (Auth::user()) {
            $user = Auth::user();
            $follow = Follow::Where("user_id","=",$user->id)->Where("coach_id" ,'=',$coach->id)->first();
            if (isset($follow)) {
                $isFollow = 1;               
            } else {
                $isFollow = 0;
            }
        } else {
            $isFollow = -1;
        }
    	return view("pages.coach_detail", compact("coach", "ratings", "isFollow"));

    }

    public function postRating(Request $request,$id){
        if (!Auth::check()) {
            return redirect()->back()->with('warning','Bạn cần đăng nhập để có thể đánh giá!');
        }
        $user = Auth::user();
        $coach = Coach::find($id);
        $organization = $coach->organization;
        $staff = $organization->user;
        if (isset($staff)) {
            foreach ($staff as $employee) {
                if ($employee->id == $user->id){
                    return redirect()->back()->with('warning','Nhân viên không thể tự đánh giá xe trong hãng!');
                }
            }    
        }
        $rating = new Rating; 
        $rating->user_id = $user->id;
        $rating->coach_id = $coach->id;
        $rating->comment = $request->comment;
        $rating->star = $request->star;
        $rating->save();

        return redirect()->back()->with('success','Đánh giá của bạn đã được thêm!');

    }

    public function postSearchCoach(Request $request){
        $startingProvince = $request->starting_province;
        $endProvince = $request->end_province;
        $urlQuery = "starting_province=" . $startingProvince. "&end_province=". $endProvince;
        $specificLocation = $request->specific_location;
        if ($specificLocation != "") {
            $urlQuery .= "&specific_location=" . $specificLocation;      
        }
        if($request->max_cost != 0) {
            $urlQuery .= "&max_cost=" . $request->max_cost; 
        }
        $seats = $request->seats;
        if (isset($seats)) {
            foreach ($seats as $seat) {
                $urlQuery .= "&seats[]=" . $seat; 
            }    
        }
        if($request->rating_star != 0) {
            $urlQuery .= "&rating_star=" . $request->rating_star; 
        }
         return redirect("coach/search?".$urlQuery);
    }

    public function follow($id) {
        if (!Auth::check()) {
            return response()->json(array('unauthenticated'=> true), 200);
        }
        $user = Auth::user();
        $follow = Follow::Where("user_id","=", $user->id)->Where("coach_id","=",$id)->first();
        if (isset($follow)) {
            return response()->json(array('isFollowing'=> true), 200);
        }

        $follow = new Follow;
        $follow->user_id = $user->id;
        $follow->coach_id = $id;
        $follow->save();
        return response()->json(array('followSuccess'=> true), 200);
    }

    public function unfollow($id) {
        if (!Auth::check()) {
            return response()->json(array('unauthenticated'=> true), 200);
        }
        $user = Auth::user();
        $follow = Follow::Where("user_id","=", $user->id)->Where("coach_id","=",$id)->first();
        if (!isset($follow)) {
            return response()->json(array('notFollowing'=> true), 200);
        }
        $follow->delete();
        return response()->json(array('unfollowSuccess'=> true), 200);
    }

}
