<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\UserSchedule;
use App\DriverSchedule;
use App\Combine;
use App\ProvinceCity;
use App\District;
use App\Rating;
use App\Notification;
use App\Car;
use App\User;


class UserController extends Controller
{

    public function getLogin() {
        return view('auth.login');
    }

    public function getSignup() {
        return view('auth.register');
    }

    public function postLogin(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))){
                return redirect('/');      
        }else{
            return redirect('login')->with('warning', 'Email đăng nhập hoặc mật khẩu không chính xác!');
        }
    }

    public function postSignup(Request $request) {
        request()->validate([
                'email' => 'required|string|email|max:255|unique:user',
                'password' => 'required|string|min:6|confirmed',
            ],
            [
                'min' => ':attribute không thể ít hơn :min ký tự.',
                'max' => ':attribute không thể nhiều hơn :max ký tự.',
                'unique' => ':attribute đã được sử dụng.',
                'confirmed'=> ':attribute xác nhận không trùng khớp',
            ],
            [
                'email' => 'Email',
                'password' => 'Password',
            ]
        );

        $user = new User;
        $user->email =  $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->avatar = "assets/images/user/avatar/non-avatar.png";
        $user->save();

        return redirect()->back()->with('success','Tạo tài khoản thành công. Đăng nhập vào hệ thống để tiếp tục các tính năng!');

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function showDashBoard() {
    	if (Auth::check()) {
            $user = Auth::user();
        } else {
        	 abort(403);
        }

        $followingCoachs = $user->coachFollowed;
        $scheduleInSearching = UserSchedule::where("user_id", "=", $user->id)->where("status",'=',0)->get();
		$scheduleInWaiting = UserSchedule::where("user_id", "=", $user->id)->where("status",'=',1)->get();
		if (isset($user->car)) {
			$driverSchedules = DriverSchedule::where("car_id","=",$user->car->id)->where("status","=",0)->get();
			$driverScheduleInWaiting = DriverSchedule::where("car_id","=",$user->car->id)->where("status","=",1)->get();
		}else{
			$driverSchedules = collect();
			$driverScheduleInWaiting = collect();
		}

        $combineHistories = Combine::join('user_schedule','combine.user_schedule_id','=','user_schedule.id')->join('driver_schedule','combine.driver_schedule_id','=','driver_schedule.id')->join('car','driver_schedule.car_id','=','car.id')->where('user_schedule.user_id','=',$user->id)->orWhere('car.user_id','=',$user->id)->where('combine.status','=',2)->select("combine.id","combine.driver_schedule_id","combine.user_schedule_id","combine.note","combine.status","combine.departure_time","combine.requester")->get();

        $requestRelateUserSchedules = Combine::join('user_schedule','combine.user_schedule_id','=','user_schedule.id')->where('user_schedule.user_id','=',$user->id)->where('combine.status','=',0)->select("combine.id","combine.driver_schedule_id","combine.user_schedule_id","combine.note","combine.status","combine.departure_time","combine.requester")->get();
        $requestRelateDriverSchedules = Combine::join('driver_schedule','combine.driver_schedule_id','=','driver_schedule.id')->join('car','driver_schedule.car_id','=','car.id')->where('car.user_id','=',$user->id)->where('combine.status','=',0)->select("combine.id","combine.driver_schedule_id","combine.user_schedule_id","combine.note","combine.status","combine.departure_time","combine.requester")->get();
    	return view('pages.user_dashboard', compact("user","followingCoachs","scheduleInSearching", "scheduleInWaiting","driverSchedules","driverScheduleInWaiting","requestRelateUserSchedules","requestRelateDriverSchedules", "combineHistories"));
    }

    public function getUpdateInfo() {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        return view('pages.user_info_update',compact("user"));
    }

    public function postUpdateInfo(Request $request) {
        request()->validate([
            'avatar' => 'max:2000000'
        ]);
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        $file = $request->file('avatar');
        if (isset($file)) {
            $destinationPath = 'assets/images/user/avatar';
            $fileName = microtime(). ".". $file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName);
            $user->avatar = $destinationPath . "/". $fileName;
        }

        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('success','Cập nhật thông tin thành công');

    }

    public function getCreateSchedule() {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        $provinces = ProvinceCity::get();
        $districts = District::get();
        return view('pages.user_add_schedule', compact("user","provinces","districts"));

    }


    public function getCreateDriverSchedule() {
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        $provinces = ProvinceCity::get();
        $districts = District::get();
        return view('pages.driver_add_schedule', compact("user","provinces","districts"));
    }


    public function postCreateSchedule(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        $userSchedule = new UserSchedule;
        $userSchedule->starting_district_id = $request->starting_district;
        $userSchedule->starting_province_city_id = $request->starting_province;
        $userSchedule->pick_up_location = $request->pick_up_location;
        $userSchedule->end_district_id = $request->end_district;
        $userSchedule->end_province_city_id = $request->end_province;
        $userSchedule->drop_off_location = $request->drop_off_location;
        $userSchedule->intended_number_passenger = $request->number_passenger;
        $userSchedule->user_id = $user->id;
        $userSchedule->date = $request->date;
        $userSchedule->time = $request->time;
        $userSchedule->status = 0;
        $userSchedule->save();
        return redirect()->back()->with("success","Tạo kế hoạch di chuyển thành công");

    }

    public function postCreateDriverSchedule(Request $request){
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        $car = $user->car;
        if (!isset($car)) {
            return redirect()->back()->with("warning","Bạn cần thêm xe trước khi thêm kế hoạch di chuyển");
        }

        $driverSchedule = new DriverSchedule;
        $driverSchedule->starting_district_id = $request->starting_district;
        $driverSchedule->starting_province_city_id = $request->starting_province;
        $driverSchedule->route_point = $request->route_point;
        $driverSchedule->end_district_id = $request->end_district;
        $driverSchedule->end_province_city_id = $request->end_province;
        $driverSchedule->car_id = $car->id;
        $driverSchedule->date = $request->date;
        $driverSchedule->time = $request->time;
        $driverSchedule->cost = $request->cost;
        $driverSchedule->status = 0;
        $driverSchedule->save();
        return redirect()->back()->with("success","Tạo kế hoạch di chuyển thành công");
    }

    public function getSearchCar(Request $request){
        $startingProvince = $request->starting_province;
        $startingDistrict = $request->starting_district;
        $endProvince = $request->end_province;
        $endDistrict = $request->end_district;
        $car_schedule_date = $request->car_schedule_date;
        $provinces = ProvinceCity::get();
        $districts = District::get();
        if ($startingProvince == "" && $startingDistrict == "" && $endProvince == "" && $endDistrict == "" && $car_schedule_date == "") {
             $driverSchedules = DriverSchedule::where("status","=",0)->paginate(6);
             return view("pages.searching_car",compact("driverSchedules","provinces","districts","startingProvince", "endProvince","startingDistrict","endDistrict","car_schedule_date"));
        }
        if ($startingProvince != "") {
            $query = DriverSchedule::where("starting_province_city_id", "=", $startingProvince);       
        }

        if ($endProvince != "") {
            $query = DriverSchedule::where("end_province_city_id", "=", $endProvince);       
        }

        if ($startingDistrict != "") {
            $query = DriverSchedule::where("starting_district_id", "=", $startingDistrict);       
        }

        if ($endDistrict != "") {
            $query = DriverSchedule::where("end_district_id", "=", $endDistrict);       
        }

        if ($car_schedule_date != "") {
            $query = DriverSchedule::where("date", "=", $car_schedule_date);       
        }

        if ($startingProvince != "") {
            $query = $query->where("starting_province_city_id", "=", $startingProvince);       
        }

        if ($endProvince != "") {
            $query = $query->where("end_province_city_id", "=", $endProvince);       
        }

        if ($startingDistrict != "") {
            $query = $query->where("starting_district_id", "=", $startingDistrict);       
        }

        if ($endDistrict != "") {
            $query = $query->where("end_district_id", "=", $endDistrict);       
        }   
        if ($car_schedule_date != "") {
            $query = $query->where("date", "=", $car_schedule_date);       
        }
    
        $driverSchedules = $query->where("status","=",0)->paginate(6);
        
        return view("pages.searching_car",compact("driverSchedules","provinces","districts","startingProvince", "endProvince","startingDistrict","endDistrict", "car_schedule_date"));
    }


    public function getSearchUserSchedule(Request $request){
        $startingProvince = $request->starting_province;
        $startingDistrict = $request->starting_district;
        $endProvince = $request->end_province;
        $endDistrict = $request->end_district;
        $user_schedule_date = $request->user_schedule_date;
        $provinces = ProvinceCity::get();
        $districts = District::get();
        if ($startingProvince == "" && $startingDistrict == "" && $endProvince == "" && $endDistrict == "" && $user_schedule_date == "") {
             $userSchedules = UserSchedule::where("status","=",0)->paginate(6);
             return view("pages.searching_user",compact("userSchedules","provinces","districts","startingProvince", "endProvince","startingDistrict","endDistrict", "user_schedule_date"));
        }
        if ($startingProvince != "") {
            $query = UserSchedule::where("starting_province_city_id", "=", $startingProvince);       
        }

        if ($endProvince != "") {
            $query = UserSchedule::where("end_province_city_id", "=", $endProvince);       
        }

        if ($startingDistrict != "") {
            $query = UserSchedule::where("starting_district_id", "=", $startingDistrict);       
        }

        if ($endDistrict != "") {
            $query = UserSchedule::where("end_district_id", "=", $endDistrict);       
        }    
        if ($user_schedule_date != "") {
            $query = UserSchedule::where("date", "=", $user_schedule_date);       
        }    

        if ($startingProvince != "") {
            $query = $query->where("starting_province_city_id", "=", $startingProvince);       
        }

        if ($endProvince != "") {
            $query = $query->where("end_province_city_id", "=", $endProvince);       
        }

        if ($startingDistrict != "") {
            $query = $query->where("starting_district_id", "=", $startingDistrict);       
        }

        if ($endDistrict != "") {
            $query = $query->where("end_district_id", "=", $endDistrict);       
        }  

        if ($user_schedule_date != "") {
            $query = $query->where("date", "=", $user_schedule_date);       
        }  
    
        $userSchedules = $query->where("status","=",0)->paginate(6);
        
        return view("pages.searching_user",compact("userSchedules","provinces","districts","startingProvince", "endProvince","startingDistrict","endDistrict", "user_schedule_date"));
    }


    public function postSearchCar(Request $request) {
        $startingProvince = $request->starting_province;
        $startingDistrict = $request->starting_district;
        $endProvince = $request->end_province;
        $endDistrict = $request->end_district;
        $car_schedule_date = $request->car_schedule_date;
        $urlQuery = "starting_province=" . $startingProvince. "&end_province=". $endProvince. "&starting_district=".$startingDistrict."&end_district=".$endDistrict ."&car_schedule_date=".$car_schedule_date;
        return redirect("car/search?".$urlQuery);
    }
    

    public function postSearchUserSchedule(Request $request) {
        $startingProvince = $request->starting_province;
        $startingDistrict = $request->starting_district;
        $endProvince = $request->end_province;
        $endDistrict = $request->end_district;
        $user_schedule_date = $request->user_schedule_date;
        $urlQuery = "starting_province=" . $startingProvince. "&end_province=". $endProvince. "&starting_district=".$startingDistrict."&end_district=".$endDistrict."&user_schedule_date=".$user_schedule_date;
        return redirect("user/search?".$urlQuery);
    }

    public function showDriverSchedule($id) {
        $driverSchedule = DriverSchedule::find($id);
        if (!isset($driverSchedule)) {
            abort(404);
        }
        $ratings = Rating::Where("car_id","=",$driverSchedule->car->id)->orderBy("created_at", "DESC")->get();
        if (Auth::check()) {
            $user = Auth::user();
            $userSchedules = UserSchedule::where("user_id","=",$user->id)->where("status","=",0)->get();
        }

        return view("pages.driver_schedule_detail", compact("driverSchedule", "ratings", "userSchedules"));
    }

    

    public function getDetailUserSchedule($id) {
        $userSchedule = UserSchedule::find($id);
        if (!isset($userSchedule)) {
            abort(404);
        }
        if (Auth::check()) {
            $user = Auth::user();
            $car = $user->car;
            if(isset($car)){
                $driverSchedules = DriverSchedule::where("car_id","=",$car->id)->where("status","=",0)->get();
            }
        }

        return view("pages.user_schedule_detail", compact("userSchedule", "driverSchedules"));
    }

    public function postCarRating(Request $request, $id) {
        if (!Auth::check()) {
            return redirect()->back()->with('warning','Bạn cần đăng nhập để có thể đánh giá!');
        }
        $user = Auth::user();
        $driverSchedule = DriverSchedule::find($id);
        if (!isset($driverSchedule)) {
            abort(404);
        }
        $car = $driverSchedule->car;
        $driver = $car->user;
       
        if ($driver->id == $user->id){
            return redirect()->back()->with('warning','Không thể tự đánh giá chuyến xe của mình!');
    
        }
        $rating = new Rating; 
        $rating->user_id = $user->id;
        $rating->car_id = $car->id;
        $rating->comment = $request->comment;
        $rating->star = $request->star;
        $rating->save();

        return redirect()->back()->with('success','Đánh giá của bạn đã được thêm!');


    }


    public function postRequestDriver(Request $request, $driver_schedule_id){
        $driverSchedule = DriverSchedule::find($driver_schedule_id);
        $userSchedule = UserSchedule::find($request->user_schedule_id);
        if ($userSchedule->user_id == $driverSchedule->car->user_id) {
            return redirect()->back()->with('warning','Không thể tự tạo yêu cầu đến bản thân!');
        }
        if (!isset($driverSchedule) || $driverSchedule->status !=0 ) {
            return redirect()->back()->with('warning','Chuyến xe không khả dụng!');
        }
        if (!isset($userSchedule) || $userSchedule->status !=0 ) {
            return redirect()->back()->with('warning','Dự định của bạn không khả dụng!');
        }
        $combine = Combine::where("user_schedule_id","=",$userSchedule->id)->where("driver_schedule_id","=",$driverSchedule->id)->first();
        if (isset($combine)) {
            return redirect()->back()->with('warning','Bạn đã tạo yêu cầu. Chờ phản hồi từ tài xế!');
        }

        $combine = new Combine;
        $combine->driver_schedule_id = $driverSchedule->id;
        $combine->user_schedule_id = $userSchedule->id;
        $combine->departure_time = $driverSchedule->date . " ". $driverSchedule->time;
        $combine->requester = 0;
        $combine->status = 0;
        $combine->save();

        $notification = new Notification;
        $notification->user_id = $driverSchedule->car->user_id;
        $notification->content = "Bạn nhận được một yêu cầu đặt xe cho chuyến đi ". $driverSchedule->starting_province_city->name. " đến ". $driverSchedule->end_province_city->name. " từ hành khách ". $userSchedule->user->name;
        $notification->readed = 0;
        $notification->save();
        return redirect()->back()->with('success','Tạo yêu cầu đặt xe thành công. Chờ phản hồi từ tài xế!');
    }


    public function postRequestUser(Request $request, $user_schedule_id){
        $userSchedule = UserSchedule::find($user_schedule_id);
        $driverSchedule = DriverSchedule::find($request->driver_schedule_id);
        if ($userSchedule->user_id == $driverSchedule->car->user_id) {
            return redirect()->back()->with('warning','Không thể tự tạo yêu cầu đến bản thân!');
        }
        if (!isset($driverSchedule) || $driverSchedule->status !=0 ) {
            return redirect()->back()->with('warning','Chuyến xe không khả dụng!');
        }
        if (!isset($userSchedule) || $userSchedule->status !=0 ) {
            return redirect()->back()->with('warning','Dự định của bạn không khả dụng!');
        }

        $combine = Combine::where("user_schedule_id","=",$userSchedule->id)->where("driver_schedule_id","=",$driverSchedule->id)->first();
        if (isset($combine)) {
            return redirect()->back()->with('warning','Bạn đã tạo yêu cầu. Chờ phản hồi từ hành khách!');
        }

        $combine = new Combine;
        $combine->driver_schedule_id = $driverSchedule->id;
        $combine->user_schedule_id = $userSchedule->id;
        $combine->departure_time = $userSchedule->date . " ". $userSchedule->time;
        $combine->requester = 1;
        $combine->status = 0;
        $combine->save();

        $notification = new Notification;
        $notification->user_id = $userSchedule->user_id;
        $notification->content = "Bạn nhận được một yêu cầu kết nối cho chuyến đi ". $userSchedule->starting_province_city->name. " đến ". $userSchedule->end_province_city->name. " từ tài xế ". $driverSchedule->car->user->name;
        $notification->readed = 0;
        $notification->save();
        return redirect()->back()->with('success','Tạo yêu cầu kết nối thành công. Chờ phản hồi từ hành khách!');
    }

    public function approveCombine($id){
        if (!Auth::check()) {
            return redirect()->back()->with('warning','Đăng nhập lại để tiếp tục');
        }
        $user = Auth::user();
        $combine = Combine::find($id);
        if(!isset($combine)){
            return redirect()->back()->with('warning','Yêu cầu không tồn tại');
        }
        $userSchedule = $combine->userSchedule;
        $driverSchedule = $combine->driverSchedule;

        if (($user->id != $userSchedule->user_id) && ($user->id != $driverSchedule->car->user_id)) {
            abort(403);
        }

        if(($user->id == $userSchedule->user_id) && ($combine->requester == 0)){
            return redirect()->back()->with('warning','Không thể chấp nhận yêu cầu bạn tự tạo ra');
        }
        if(($user->id == $driverSchedule->car->user_id) && ($combine->requester == 1)){
            return redirect()->back()->with('warning','Không thể chấp nhận yêu cầu bạn tự tạo ra');
        }
        $orthersCombineWithUserSchedule = Combine::where("id","!=",$combine->id)->where("user_schedule_id","=",$userSchedule->id)->get();
        foreach ($orthersCombineWithUserSchedule as $combine) {
            $combine->delete();
        }
        $orthersCombineWithDriverSchedule = Combine::where("id","!=",$combine->id)->where("driver_schedule_id","=",$driverSchedule->id)->get();
        foreach ($orthersCombineWithDriverSchedule as $combine) {
            $combine->delete();
        }

        $combine->status = 1;
        $combine->save();
        $driverSchedule->status = 1;
        $driverSchedule->save();
        $userSchedule->status = 1;
        $userSchedule->save();

        if($user->id == $userSchedule->user_id){
            $notification = new Notification;
            $notification->user_id = $driverSchedule->car->user_id;
            $notification->content = "Yêu cầu kết nối hành khách cho chuyến đi ". $driverSchedule->starting_province_city->name. " đến ". $driverSchedule->end_province_city->name. " với hành khách ". $userSchedule->user->name. " đã đươc chấp thuận";
            $notification->readed = 0;
            $notification->save();
        }

        if($user->id == $driverSchedule->car->user_id){
            $notification = new Notification;
            $notification->user_id = $userSchedule->user_id;
            $notification->content = "Yêu cầu kết nối với tài xế cho chuyến đi ". $driverSchedule->starting_province_city->name. " đến ". $driverSchedule->end_province_city->name. " với tài xế ". $driverSchedule->car->user->name. " đã đươc chấp thuận";
            $notification->readed = 0;
            $notification->save();
        }

        return redirect()->back()->with('success','Chấp thuận yêu cầu thành công!');
    }

    public function rejectCombine($id){
        if (!Auth::check()) {
            return redirect()->back()->with('warning','Đăng nhập lại để tiếp tục');
        }
        $user = Auth::user();
        $combine = Combine::find($id);
        if(!isset($combine)){
            return redirect()->back()->with('warning','Yêu cầu không tồn tại');
        }
        $userSchedule = $combine->userSchedule;
        $driverSchedule = $combine->driverSchedule;

        if (($user->id != $userSchedule->user_id) && ($user->id != $driverSchedule->car->user_id)) {
            abort(403);
        }
        if ($combine->status == 2) {
            return redirect()->back()->with("warning","Chuyến đi đã hoàn thành. Không thể hủy bỏ");
        }
        $combine->delete();

        if($user->id == $userSchedule->user_id && $combine->requester == 1){
            $notification = new Notification;
            $notification->user_id = $driverSchedule->car->user_id;
            $notification->content = "Yêu cầu kết nối hành khách cho chuyến đi ". $driverSchedule->starting_province_city->name. " đến ". $driverSchedule->end_province_city->name. " với hành khách ". $userSchedule->user->name. " đã bị từ chối";
            $notification->readed = 0;
            $notification->save();
        }

        if($user->id == $driverSchedule->car->user_id && $combine->requester == 0){
            $notification = new Notification;
            $notification->user_id = $userSchedule->user_id;
            $notification->content = "Yêu cầu kết nối với tài xế cho chuyến đi ". $driverSchedule->starting_province_city->name. " đến ". $driverSchedule->end_province_city->name. " với tài xế ". $driverSchedule->car->user->name. " đã bị từ chối";
            $notification->readed = 0;
            $notification->save();
        }

        return redirect()->back()->with('success','Hủy bỏ yêu cầu thành công!');
    }


    public function cancelCombine($id){
        if (!Auth::check()) {
            return redirect()->back()->with('warning','Đăng nhập lại để tiếp tục');
        }
        $user = Auth::user();
        $combine = Combine::find($id);
        if(!isset($combine)){
            return redirect()->back()->with('warning','Yêu cầu không tồn tại');
        }
        $userSchedule = $combine->userSchedule;
        $driverSchedule = $combine->driverSchedule;

        if (($user->id != $userSchedule->user_id) && ($user->id != $driverSchedule->car->user_id)) {
            abort(403);
        }
        $combine->delete();
        if ($userSchedule->status != 0) {
            $userSchedule->status = 0;
            $userSchedule->save();
        }
        if ($driverSchedule->status != 0) {
            $driverSchedule->status = 0;
            $driverSchedule->save();
        }

        if($user->id == $userSchedule->user_id){
            $notification = new Notification;
            $notification->user_id = $driverSchedule->car->user_id;
            $notification->content = "Chuyến đi ". $driverSchedule->starting_province_city->name. " đến ". $driverSchedule->end_province_city->name. " với hành khách ". $userSchedule->user->name. " đã bị hủy bỏ";
            $notification->readed = 0;
            $notification->save();
        }

        if($user->id == $driverSchedule->car->user_id){
            $notification = new Notification;
            $notification->user_id = $userSchedule->user_id;
            $notification->content = "Chuyến đi ". $userSchedule->starting_province_city->name. " đến ". $userSchedule->end_province_city->name. " với tài xế ". $driverSchedule->car->user->name. " đã bị hủy bỏ";
            $notification->readed = 0;
            $notification->save();
        }

        return redirect()->back()->with('success','Hủy chuyến thành công!');
    }

    public function completeCombine($id) {
        if (!Auth::check()) {
            return redirect()->back()->with('warning','Đăng nhập lại để tiếp tục');
        }
        $user = Auth::user();
        $combine = Combine::find($id);
        if(!isset($combine)){
            return redirect()->back()->with('warning','Yêu cầu không tồn tại');
        }
        $userSchedule = $combine->userSchedule;
        $driverSchedule = $combine->driverSchedule;

        if (($user->id != $userSchedule->user_id) && ($user->id != $driverSchedule->car->user_id)) {
            abort(403);
        }

        $combine->status = 2;
        $combine->save();
        $userSchedule->status = 2;
        $userSchedule->save();
        $driverSchedule->status = 2;
        $driverSchedule->save();

        return redirect()->back()->with('success','Hoàn thành chuyến đi thành công');


    }


    public function getUpdateDriverSchedule($id){
        $driverSchedule = DriverSchedule::find($id);
        if (!isset($driverSchedule)) {
            abort(404);
        }
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->id != $driverSchedule->car->user_id) {
                abort(403);
            }
        } else {
             abort(403);
        }
        $provinces = ProvinceCity::get();
        $districts = District::get();
        return view('pages.driver_update_schedule', compact("user","provinces","districts","driverSchedule"));
    }

    public function postUpdateDriverSchedule(Request $request,$id) {
        $driverSchedule = DriverSchedule::find($id);
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        
        if ($driverSchedule->car->user_id != $user->id) {
            abort(403);
        }
        $driverSchedule->starting_district_id = $request->starting_district;
        $driverSchedule->starting_province_city_id = $request->starting_province;
        $driverSchedule->route_point = $request->route_point;
        $driverSchedule->end_district_id = $request->end_district;
        $driverSchedule->end_province_city_id = $request->end_province;
        $driverSchedule->date = $request->date;
        $driverSchedule->time = $request->time;
        $driverSchedule->cost = $request->cost;
        $driverSchedule->save();
        return redirect()->back()->with("success","Cập nhật kế hoạch di chuyển thành công");
    }

    public function deleteDriverSchedule($id){
        $driverSchedule = DriverSchedule::find($id);
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        
        if ($driverSchedule->car->user_id != $user->id) {
            abort(403);
        }

        $driverSchedule->delete();

        return redirect()->back()->with("success","Xóa bỏ kế hoạch di chuyển thành công");
    }

    public function getUpdateUserSchedule($id) {
        $userSchedule = UserSchedule::find($id);
        if (!isset($userSchedule)) {
            abort(404);
        }
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->id != $userSchedule->user_id) {
                abort(403);
            }
        } else {
             abort(403);
        }
        $provinces = ProvinceCity::get();
        $districts = District::get();
        return view('pages.user_update_schedule', compact("user","provinces","districts","userSchedule"));

    }


    public function postUpdateUserSchedule(Request $request, $id) {
        $userSchedule = UserSchedule::find($id);
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        
        if ($userSchedule->user_id != $user->id) {
            abort(403);
        }

        $userSchedule->starting_district_id = $request->starting_district;
        $userSchedule->starting_province_city_id = $request->starting_province;
        $userSchedule->pick_up_location = $request->pick_up_location;
        $userSchedule->end_district_id = $request->end_district;
        $userSchedule->end_province_city_id = $request->end_province;
        $userSchedule->drop_off_location = $request->drop_off_location;
        $userSchedule->intended_number_passenger = $request->number_passenger;
        $userSchedule->date = $request->date;
        $userSchedule->time = $request->time;
        $userSchedule->save();
        return redirect()->back()->with("success","Cập nhật kế hoạch di chuyển thành công");

    }

    public function deleteUserSchedule($id){
        $userSchedule = UserSchedule::find($id);
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        
        if ($userSchedule->user_id != $user->id) {
            abort(403);
        }

        $userSchedule->delete();

        return redirect()->back()->with("success","Xóa bỏ kế hoạch di chuyển thành công");
    }


    public function postCreateCar(Request $request) {
        request()->validate([
            'car_image' => 'max:2000000'
        ]);
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        $car = new Car;
        $file = $request->file('car_image');
        if (isset($file)) {
            $destinationPath = 'assets/images/car';
            $fileName = microtime(). ".". $file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName);
            $car->photo_path = $destinationPath . "/". $fileName;
        }

       
        $car->type = $request->type;
        $car->photo_path = $destinationPath . "/". $fileName;
        $car->license_plates = $request->license_plates;
        $car->capacity = $request->max_passenger;
        $car->user_id = $user->id;
        $car->save();

        return redirect()->back()->with('success','Thêm xe thành công');

    }

    public function postUpdateCar(Request $request, $id) {
        request()->validate([
            'car_image' => 'max:2000000'
        ]);
        if (Auth::check()) {
            $user = Auth::user();
        } else {
             abort(403);
        }
        $car = Car::find($id);
        if ($user->id != $car->user_id) {
            abort(403);
        }
        $file = $request->file('car_image');
        if (isset($file)) {
            $destinationPath = 'assets/images/car';
            $fileName = microtime(). ".". $file->getClientOriginalExtension();
            $file->move($destinationPath,$fileName);
            $car->photo_path = $destinationPath . "/". $fileName;
        }
        

        
        $car->type = $request->type;
        $car->license_plates = $request->license_plates;
        $car->capacity = $request->max_passenger;
        $car->save();

        return redirect()->back()->with('success','Cập nhật thông tin xe thành công');

    }


    public function getNotifications() {
        if (!Auth::check()) {
            return response()->json(array('unauthenticated'=> true), 200);
        }

        $user = Auth::user();
        $notifications = Notification::where('user_id','=',$user->id)->orderBy('created_at','desc')->limit(5)->get();
        return response()->json(array('notifications' => $notifications), 200);
    }

    public function markNotificationsAsRead() {
        if (!Auth::check()) {
            return response()->json(array('unauthenticated'=> true), 200);
        }

        $user = Auth::user();
        $notifications = Notification::where('user_id','=',$user->id)->get();
        foreach ($notifications as $notification) {
            $notification->readed = 1;
            $notification->save();
        }
        return response()->json(array('success' => true), 200);
    }
     


}
