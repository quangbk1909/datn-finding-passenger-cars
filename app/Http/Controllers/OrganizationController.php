<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Organization;
use App\User;
use App\Coach;
use App\ProvinceCity;
use App\Timer;

class OrganizationController extends Controller
{

    public function getHome() {
        $topOrganization = Organization::limit(10)->get();
        $provinces = ProvinceCity::get();
        return view('pages.home', compact("topOrganization","provinces"));
    }

    public function getCreate() {
        return view('pages.organization_create');
    }

    public function postCreate(Request $request) {
        if(Auth::check()){
            $user = Auth::user();
        } else {
            abort(403);
        }
        request()->validate([
            'logo' => 'max:2000000',
            'cover_image' => 'max:2000000'
        ]);

        if ($user->organization_id != 0) {
            return redirect()->back()->with("warning","Bạn đã thuộc về một hãng xe. Vào trang quản lý để thực hiện tiếp!");
        }

        $organization = new Organization;

        $logo_file = $request->file('logo');
        if (isset($logo_file)) {
            $destinationPath = 'assets/images/organization/logo';
            $fileName = microtime(). ".". $logo_file->getClientOriginalExtension();
            $logo_file->move($destinationPath,$fileName);
            $organization->logo = $destinationPath . "/". $fileName;
        }

        $cover_image = $request->file('cover_image');
        if (isset($cover_image)) {
            $destinationPath = 'assets/images/organization/cover';
            $fileName = microtime(). ".". $cover_image->getClientOriginalExtension();
            $cover_image->move($destinationPath,$fileName);
            $organization->cover_image = $destinationPath . "/". $fileName;
        }

        $organization->name = $request->name;
        $organization->email = $request->email;
        $organization->hotline = $request->hotline;
        $organization->address = $request->address;
        $organization->owner_id = $user->id;
        $organization->save();

        $user->organization_id = $organization->id;
        $user->save();
        return redirect()->back()->with('success','Tạo hãng xe mới thành công!');
    }

    public function show($id) {
        $isStaff = false;
        if (Auth::check()) {
            $user = Auth::user();
            $staff = User::Where("id", "=", $user->id)->Where("organization_id","=",$id)->first();
            if (isset($staff)) {
                $isStaff = true;
            }
        }
    	$organization = Organization::find($id);
    	$staff = User::where("organization_id", "=",$id)->limit(5)->get();
    	$othersOrganization = Organization::where("id", "!=", $id)->limit(5)->get();
        $coachs = Coach::Where("organization_id", "=", $id)->paginate(6);
    	return view("pages.organization", compact("organization", "staff", "othersOrganization","coachs","isStaff"));
    }

    public function showWithCoachSearching(Request $request,$id) {
        $isStaff = false;
        if (Auth::check()) {
            $user = Auth::user();
            $staff = User::Where("id", "=", $user->id)->Where("organization_id","=",$id)->first();
            if (isset($staff)) {
                $isStaff = true;
            }
        }
        $organization = Organization::find($id);
        $staff = User::where("organization_id", "=",$id)->limit(5)->get();
        $othersOrganization = Organization::where("id", "!=", $id)->limit(5)->get();
        $coachs = Coach::Where("organization_id", "=", $id)->Where("name", "like", "%". $request->searching."%")->paginate(6);
        return view("pages.organization", compact("organization", "staff", "othersOrganization","coachs","isStaff"));
    }

    public function getManagementView($id) {
        if (Auth::check()) {
            $user = Auth::user();
            $staff = User::Where("id", "=", $user->id)->Where("organization_id","=",$id)->first();
            if (!isset($staff)) {
                abort(403);
            }
        } else {
            abort(403);
        } 

    	$organization = Organization::find($id);
        $provinces = ProvinceCity::get();
        $owner = $organization->owner;
        if ($user->id == $owner->id) {
            $isOwner = true;
        } else {
            $isOwner = false;
        }

        $staffs = User::Where("organization_id","=",$id)->Where("id", "!=", $owner->id)->paginate(5);
    	return view("pages.organization_management", compact("organization","provinces","isOwner", "staffs"));
    }


    public function getUpdateCoach($organizationID,$coachID){
        if (Auth::check()) {
            $user = Auth::user();
            $staff = User::Where("id", "=", $user->id)->Where("organization_id","=",$organizationID)->first();
            if (!isset($staff)) {
                abort(403);
            }
        }
        $organization = Organization::find($organizationID);
        $coach = Coach::find($coachID);
        $provinces = ProvinceCity::get();
        if ($coach->organization->id != $organizationID) {
            abort(403);
        }
        return view("pages.coach_update", compact("organization","coach","provinces"));
    }

    public function getUpdateStatusCoach($organizationID,$coachID){
        if (Auth::check()) {
            $user = Auth::user();
            $staff = User::Where("id", "=", $user->id)->Where("organization_id","=",$organizationID)->first();
            if (!isset($staff)) {
                abort(403);
            }
        }
        $organization = Organization::find($organizationID);
        $coach = Coach::find($coachID);
        $provinces = ProvinceCity::get();
        if ($coach->organization->id != $organizationID) {
            abort(403);
        }
        return view("pages.coach_update_status", compact("organization","coach","provinces"));
    }

    public function postUpdateCoach(Request $request, $organizationID, $coachID){
        request()->validate([
            'coach_image' => 'max:2000000'
        ]);
        $coach = Coach::find($coachID);
        $file = $request->file('coach_image');
        if (isset($file)) {
            $destinationPath = 'assets/images/coach';
            $fileName = microtime(). ".". $file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName);
            $coach->photo_path = $destinationPath . "/". $fileName;
        }
        
        $coach->name = $request->coach_name;
        $coach->starting_province_city_id = $request->starting_province;
        $coach->end_province_city_id = $request->end_province;
        $coach->specific_starting_location = $request->specific_starting_location;
        $coach->specific_end_location = $request->specific_end_location;
        $coach->route = $request->route;
        $coach->capacity = $request->capacity;
        $coach->cost = $request->cost;
        $coach->save();

        return redirect()->back()->with("success","Cập nhật thông tin xe khách thành công!");
    }

    public function postCreateCoach(Request $request, $id){
        request()->validate([
            'coach_image' => 'max:2000000'
        ]);
        $coach = new Coach;
        $file = $request->file('coach_image');
        if (isset($file)) {
            $destinationPath = 'assets/images/coach';
            $fileName = microtime(). ".". $file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName);
            $coach->photo_path = $destinationPath . "/". $fileName;
        }

        
        $coach->name = $request->coach_name;
        $coach->starting_province_city_id = $request->starting_province;
        $coach->end_province_city_id = $request->end_province;
        $coach->specific_starting_location = $request->specific_starting_location;
        $coach->specific_end_location = $request->specific_end_location;
        $coach->route = $request->route;
        $coach->capacity = $request->capacity;
        $coach->cost = $request->cost;
        $coach->organization_id = $id;
        $coach->save();

        $timers = explode(",", $request->timer);
        foreach ($timers as $timer) {
            $time = strtotime($timer);
            if ($time == 0) {
                continue;
            }
            
            $t = new Timer;
            $t->started_time = date("H:i:s",$time) ;
            $t->coach_id  = $coach->id;
            $t->save();
        }
        return redirect()->back()->with("success","Thêm xe mới thành công");
    }

    public function addNewStaff(Request $request, $id) {
        $user = User::Where("email", "=", $request->user_mail)->first();
        if (!isset($user)){
            return redirect()->back()->with("warning","Không có user nào tồn tại với email");
        }
        if($user->organization_id != 0) {
            if ($user->organization_id == $id) {
                return redirect()->back()->with("warning","User đã là nhân viên của hãng");
            } else {
                 return redirect()->back()->with("warning","User đã thuộc một hãng xe khác");
            }
        }
        $user->organization_id = $id;
        $user->save();
        return redirect()->back()->with("success", "Thêm nhân viên thành công");
    }

    public function deleteStaff($organization_id,$staff_id){
        $staff = User::find($staff_id);
        if (!isset($staff)){
            return redirect()->back()->with("warning","User không tồn tại");
        }
        if ($staff->organization_id != $organization_id) {
            return redirect()->back()->with("warning","Nhân viên không thuộc hãng");
        }
        $staff->organization_id = null;
        $staff->save();
        return redirect()->back()->with("success","Nhân viên đã được xóa khỏi hãng");
    }

    public function deleteCoach($organization_id,$coach_id){
        $coach = Coach::find($coach_id);
        if (!isset($coach)){
            return redirect()->back()->with("warning","Chuyến xe không tồn tại");
        }
        if ($coach->organization_id != $organization_id) {
            return redirect()->back()->with("warning","Chuyến xe không thuộc hãng");
        }
        $coach->delete();
        return redirect()->back()->with("success","Chuyến xe đã được xóa khỏi hãng");
    }


    public function postUpdateInfo(Request $request, $id) {
        $organization = Organization::find($id);
        if(Auth::check()){
            $user = Auth::user();
        } else {
            abort(403);
        }
        request()->validate([
            'logo' => 'max:2000000',
            'cover_image' => 'max:2000000'
        ]);

        $logo_file = $request->file('logo');
        if (isset($logo_file)) {
            $destinationPath = 'assets/images/organization/logo';
            $fileName = microtime(). ".". $logo_file->getClientOriginalExtension();
            $logo_file->move($destinationPath,$fileName);
            $organization->logo = $destinationPath . "/". $fileName;
        }

        $cover_image = $request->file('cover_image');
        if (isset($cover_image)) {
            $destinationPath = 'assets/images/organization/cover';
            $fileName = microtime(). ".". $cover_image->getClientOriginalExtension();
            $cover_image->move($destinationPath,$fileName);
            $organization->cover_image = $destinationPath . "/". $fileName;
        }

        $organization->name = $request->name;
        $organization->email = $request->email;
        $organization->hotline = $request->hotline;
        $organization->address = $request->address;

        $organization->save();
        return redirect()->back()->with('success','Cập nhật thông tin hệ hãng xe thành công!');

    }


}
