@extends('layout.index')

@section('css')
	<link rel="stylesheet" href="css/simple-rating.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
@endsection

@section('content')
	
	<!--my-account start-->
	<section class="my-account">			
		<div class="profile-bg">
			<div style="height: 200px;" class="row"></div>
			<div class="my-Profile-dt">
				<div class="container">
					<div class="row">
						<div class="container">							
							<div class="profile-dpt">
								<img style="width: 220px;height: 220px;" src="{{$user->avatar}}" alt="">
							</div>
							<div class="profile-all-dt">
								<div class="profile-name-dt">
									@if($user->name != "")
										<h1>{{$user->name}}</h1>
									@else
										<h1>(Chưa cài đặt tên)</h1>
									@endif
									
									<p><span><i class="fas fa-map-marker-alt"></i></span>@if($user->address != "")
										{{$user->address}}
									@else
										(Chưa thêm địa chỉ)
									@endif</p>
								</div>
								<div class="profile-dt">
									<ul>
										<li>
											<div class="phone-no" title="Call Us">
												<a href="#"><span><i class="fas fa-phone"></i></span>{{$user->phone_number}}</a>
											</div>
										</li>
										<li>
											<div class="website" title="Website">
												<a href="#">{{$user->email}}</a>
											</div>										
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--my-account end-->	
	<!--my-account-tabs start-->
	<section class="all-profile-details">
		<div class="container">
			@if (session('success'))
				<div class="col-md-11 alert alert-success alert-dismissible fade show" role="alert">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			 	 </button>
			 	 {{session('success')}}
			</div>
			@endif

			@if ($errors->first())
				<div class=" col-md-11 alert alert-danger alert-dismissible fade show" role="alert">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			 	 </button>
			 	 {{$errors->first()}}
			</div>
			@endif

			@if (session('warning'))
				<div class=" col-md-11 alert alert-danger alert-dismissible fade show" role="alert">
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			 	 </button>
			 	 {{session('warning')}}
			</div>
			@endif	
			<div class="row">
				<div class="col-lg-3 col-md-4 col-12">
					<div class="left-tab-links">
						<div class="nav nav-pills nav-stacked nav-tabs ui vertical menu fluid">
							<a href="#about" data-toggle="tab" class="item user-tab cursor-pointer">Thông tin cá nhân</a>
							<a href="#following" data-toggle="tab" class="item user-tab cursor-pointer">Danh sách theo dõi</a>
							<a href="#user-schedule" data-toggle="tab" class="item user-tab cursor-pointer">Dự định di chuyển</a>
							<a href="#user-schedule-request" data-toggle="tab" class="item user-tab cursor-pointer">Yêu cầu với lịch trình</a>
							<a href="#user-schedule-in-waiting" data-toggle="tab" class="item user-tab cursor-pointer">Đã kết nối với chuyến xe</a>
							<a href="#driver-schedule" data-toggle="tab" class="item user-tab cursor-pointer">Lịch trình xe</a>
							<a href="#driver-schedule-request" data-toggle="tab" class="item user-tab cursor-pointer">Yêu cầu với xe</a>
							<a href="#driver-schedule-in-waiting" data-toggle="tab" class="item user-tab cursor-pointer">Đã kết nối với hành khách</a>

							<a href="#order-history" data-toggle="tab" class="item user-tab cursor-pointer">Lịch sử</a>								
							<a href="#manage-cards" data-toggle="tab" class="item user-tab cursor-pointer">Quản lý thông tin xe</a>

						</div>						
					</div>				
				</div>
				<div class="col-lg-9 col-md-8 col-12">
					<div class="tab-content">
						<div class="tab-pane active" id="about">
							<div class="profile-about">
								<div class="tab-content-heading">
									<h4>Thông tin cơ bản</h4>
									<a href="user/info/update"><i class="far fa-edit"></i>Cập nhật</a>
								</div>
								<div class="about-dtp">
									<div class="about-bg">
										<ul>
											<li>
												<div class="dp-detail">
													<h6>Họ tên</h6>
													<p>{{$user->name}}</p>
												</div>
											</li>
											<li>
												<div class="dp-detail">
													<h6>Ngày sinh</h6>
													<p>{{$user->dob}}</p>
												</div>
											</li>
											<li>
												<div class="dp-detail">
													<h6>Giới tính</h6>
													@if($user->gender == 0)
														<p>Nam</p>
													@else
														<p>Nữ</p>
													@endif
												</div>
											</li>
											<li>
												<div class="dp-detail">
													<h6>Địa chỉ</h6>
													<p>{{$user->address}}</p>
												</div>
											</li>
											<li>
												<div class="dp-detail">
													<h6>Số điện thoại</h6>
													<p>{{$user->phone_number}}</p>
												</div>
											</li>
											<li>
												<div class="dp-detail">
													<h6>Email</h6>
													<p>{{$user->email}}</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						
						<div class="tab-pane" id="following">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Danh sách xe đang theo dõi</h4>						
								</div>
								<div class="about-dtp">
									<div class="follow-bg">
										<ul>
											@foreach($followingCoachs as $coach)
												<li>
													<div class="suggestion-usd-2">
														<a href="coach/{{$coach->id}}"><img style="width: 40px;height: 40px;" src="{{$coach->photo_path}}" alt=""></a>
														<div class="sgt-text-2">
															<a href="coach/{{$coach->id}}"><h4>{{$coach->name}}</h4></a>
															<p><span><i class="fas fa-bus"></i></span> {{$coach->organization->name}}<p>
														</div>
														<button class="btn-link" onclick="confirm('Bạn chắc chắn bỏ theo dõi chuyến xe này?'); unfollow({{$coach->id}},this)">Bỏ theo dõi</button>
													</div>
												</li>
											@endforeach
											
										</ul>
									</div>
								</div>
							</div>
						</div>
						
						<div class="tab-pane" id="user-schedule">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Dự định di chuyển muốn tìm xe</h4>
									<a href="user/schedule/create"><i class="far fa-edit"></i>Thêm mới</a>
								</div>
								<div class="my-orders">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-12">
											<div class="my-checkout">
												<div class="table-responsive">
													<table class="table  table-bordered">
														<thead>
															<tr>
																<td class="td-heading">Tỉnh đi - Tỉnh đến</td>
																<td class="td-heading">Số người dự kiến</td>
																<td class="td-heading">Ngày dự kiến</td>
																<td class="td-heading">Action</td>
																
															</tr>
														</thead>
														<tbody>
															@foreach ($scheduleInSearching as $schedule)
																<tr>
																	<td class="td-content">{{$schedule->starting_province_city->name}} - {{$schedule->end_province_city->name}}</td>									
																	<td class="td-content">{{$schedule->intended_number_passenger}}</td>
																	<td class="td-content">{{$schedule->date}}</td>
																	<td>
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#trace-{{$schedule->id}}">Chi tiết</button>															
																		<a href="user/schedule/update/{{$schedule->id}}"><button class="invoice-btn btn-link" title="Sửa"><i class="far fa-file-alt"></i></button></a>
																		<a href="car/search?starting_province={{$schedule->starting_province_city->id}}&starting_district={{$schedule->starting_district->id}}&end_province={{$schedule->end_province_city->id}}&end_district={{$schedule->end_district->id}}&car_schedule_date={{$schedule->date}}"><button class="invoice-btn btn-link" title="Tìm xe"><i class="fas fa-search-location"></i></button></a>
																		<a href="user/schedule/delete/{{$schedule->id}}" onclick="return confirm('Bạn chắc chắn muốn xóa bỏ dự định di chuyển này?');"><button class="trash-btn btn-link" title="Xóa"><i class="far fa-trash-alt"></i></button></a>
																		
																		<div class="modal fade" tabindex="-1" id="trace-{{$schedule->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$schedule->pick_up_location}}, {{$schedule->starting_district->name}}, {{$schedule->starting_province_city->name}}&destination={{$schedule->drop_off_location}}, {{$schedule->end_district->name}}, {{$schedule->end_province_city->name}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết lịch trình</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$schedule->pick_up_location}}, {{$schedule->starting_district->name}}, {{$schedule->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$schedule->drop_off_location}}, {{$schedule->end_district->name}}, {{$schedule->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$schedule->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$schedule->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Số người dự kiến</div>
																											<div class="attr-r">{{$schedule->intended_number_passenger}}</div>
																										</div>
																									
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>
																	</td>																
																</tr>
															@endforeach
																																													
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="user-schedule-request">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Các yêu cầu với lịch trình</h4>
								</div>
								<div class="my-orders">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-12">
											<div class="my-checkout">
												<div class="table-responsive">
													<table class="table table-bordered">
														<thead>
															<tr class="d-flex">
																<td class="td-heading col-2">Kế hoạch hành khách</td>
																<td class="td-heading col-2">Kế hoạch chuyến xe</td>
																<td class="td-heading col-2">Thời gian xuất phát</td>
																<td class="td-heading col-2">Ghi chú</td>
																<td class="td-heading col-2">Bên yêu cầu</td>
																<td class="td-heading col-3">Action</td>
																
															</tr>
														</thead>
														<tbody>
															@foreach ($requestRelateUserSchedules as $combine)
																@php
																	$userScheduleInRequest = $combine->userSchedule;
																	$driverScheduleInRequest = $combine->driverSchedule;
																@endphp
																<tr class="d-flex">
																	<td class="td-content col-sm-2">
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#user-schedule-in-request-{{$userScheduleInRequest->id}}">Chi tiết</button>
																		<div class="modal fade" tabindex="-1" id="user-schedule-in-request-{{$userScheduleInRequest->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$userScheduleInRequest->pick_up_location}}, {{$userScheduleInRequest->starting_district->name}}, {{$userScheduleInRequest->starting_province_city->name}}&destination={{$userScheduleInRequest->drop_off_location}}, {{$userScheduleInRequest->end_district->name}}, {{$userScheduleInRequest->end_province_city->name}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết lịch trình</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$userScheduleInRequest->pick_up_location}}, {{$userScheduleInRequest->starting_district->name}}, {{$userScheduleInRequest->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$userScheduleInRequest->drop_off_location}}, {{$userScheduleInRequest->end_district->name}}, {{$userScheduleInRequest->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$userScheduleInRequest->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$userScheduleInRequest->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Số người dự kiến</div>
																											<div class="attr-r">{{$userScheduleInRequest->intended_number_passenger}}</div>
																										</div>
																									
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>	
																	</td>									
																	<td class="td-content col-sm-2">
																		
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#driver-schedule-in-request-{{$driverScheduleInRequest->id}}">Chi tiết</button>
																		<div class="modal fade" tabindex="-1" id="driver-schedule-in-request-{{$driverScheduleInRequest->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$driverScheduleInRequest->starting_district->name}}, {{$driverScheduleInRequest->starting_province_city->name}}&destination={{$driverScheduleInRequest->end_district->name}}, {{$driverScheduleInRequest->end_province_city->name}}&waypoints={{$driverScheduleInRequest->route_point}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết chuyến xe</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$driverScheduleInRequest->starting_district->name}}, {{$driverScheduleInRequest->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverScheduleInRequest->route_point}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverScheduleInRequest->end_district->name}}, {{$driverScheduleInRequest->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$driverScheduleInRequest->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$driverScheduleInRequest->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giá</div>
																											<div class="attr-r">{{$driverScheduleInRequest->cost}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Xe</div>
																											<div class="attr-r">{{$driverScheduleInRequest->car->type}} - {{$driverScheduleInRequest->car->license_plates}}</div>
																										</div>
																								
																										<div class="payment-method-dt">
																											<div class="attr-l">Tài xế</div>
																											<div class="attr-r">{{$driverScheduleInRequest->car->user->name}} - {{$driverScheduleInRequest->car->user->phone_number}}</div>
																										</div>
																										
																								
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>	

																	</td>
																	<td class="td-content col-sm-2">{{$combine->departure_time}}</td>
																	<td class="td-content col-sm-2">{{$combine->note}}</td>
																	@if ($combine->requester == 0)
																		<td class="td-content col-sm-2">Hành khách</td>
																		<td class="td-content col-sm-2">													
																			<a  onclick="return confirm('Bạn chắc chắn muốn hủy bỏ yêu cầu này?');" href="combine/reject/{{$combine->id}}"><button class="invoice-btn btn-link" title="Hủy bỏ"><i class="fas fa-window-close"></i></button></a>
																		</td>	
																	@else
																		<td class="td-content col-sm-2">Tài xế</td>
																		<td class="td-content col-sm-2">													
																			<a  onclick="return confirm('Bạn chắc chắn muốn hủy bỏ yêu cầu này?');" href="combine/reject/{{$combine->id}}"><button class="invoice-btn btn-link" title="Hủy bỏ"><i class="fas fa-window-close"></i></button></a>
																			<a  onclick="return confirm('Xác nhận chấp nhận yêu cầu?');" href="combine/approve/{{$combine->id}}"><button class="invoice-btn btn-link" title="Chấp nhận"><i class="fas fa-check-square"></i></button></a>
																		</td>	
																	@endif
																	
																													
																</tr>
															@endforeach
																																													
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="tab-pane" id="user-schedule-in-waiting">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Kết nối chờ khởi hành</h4>
								</div>
								<div class="my-orders">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-12">
											<div class="my-checkout">
												<div class="table-responsive">
													<table class="table  table-bordered">
														<thead>
															<tr>
																<td class="td-heading">Kế hoạch dự định</td>
																<td class="td-heading">Chuyến đã bắt</td>
																<td class="td-heading">Thời gian xuất phát</td>
																<td class="td-heading">Ghi chú</td>
																<td class="td-heading">Action</td>
																
															</tr>
														</thead>
														<tbody>
															@foreach ($scheduleInWaiting as $schedule)
																@php
																	$combine = $schedule->combine;
																	$driverSchedule = $combine->driverSchedule;
																@endphp
																<tr>
																	<td>
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#user-schedule-{{$schedule->id}}">Chi tiết</button>
																		<div class="modal fade" tabindex="-1" id="user-schedule-{{$schedule->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$schedule->pick_up_location}}, {{$schedule->starting_district->name}}, {{$schedule->starting_province_city->name}}&destination={{$schedule->drop_off_location}}, {{$schedule->end_district->name}}, {{$schedule->end_province_city->name}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết lịch trình</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$schedule->pick_up_location}}, {{$schedule->starting_district->name}}, {{$schedule->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$schedule->drop_off_location}}, {{$schedule->end_district->name}}, {{$schedule->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$schedule->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$schedule->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Số người dự kiến</div>
																											<div class="attr-r">{{$schedule->intended_number_passenger}}</div>
																										</div>
																									
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>	
																	</td>									
																	<td class="td-content">
																		
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#driver-schedule-{{$driverSchedule->id}}">Chi tiết</button>
																		<div class="modal fade" tabindex="-1" id="driver-schedule-{{$driverSchedule->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$driverSchedule->starting_district->name}}, {{$driverSchedule->starting_province_city->name}}&destination={{$driverSchedule->end_district->name}}, {{$driverSchedule->end_province_city->name}}&waypoints={{$driverSchedule->route_point}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết chuyến xe</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$driverSchedule->starting_district->name}}, {{$driverSchedule->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverSchedule->route_point}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverSchedule->end_district->name}}, {{$driverSchedule->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$driverSchedule->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$driverSchedule->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giá</div>
																											<div class="attr-r">{{$driverSchedule->cost}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Xe</div>
																											<div class="attr-r">{{$driverSchedule->car->type}} - {{$driverSchedule->car->license_plates}}</div>
																										</div>
																								
																										<div class="payment-method-dt">
																											<div class="attr-l">Tài xế</div>
																											<div class="attr-r">{{$driverSchedule->car->user->name}} - {{$driverSchedule->car->user->phone_number}}</div>
																										</div>
																										
																								
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>	

																	</td>
																	<td class="td-content">{{$combine->departure_time}}</td>
																	<td class="td-content">{{$combine->note}}</td>
																	<td>													
														
																		<a  onclick="return confirm('Bạn chắc chắn muốn hủy bỏ yêu cầu này?');" href="combine/reject/{{$combine->id}}"><button class="invoice-btn btn-link" title="Hủy bỏ"><i class="fas fa-trash-alt"></i></button></a>
																		<a  onclick="return confirm('Xác nhận hoàn thành chuyến đi?');" href="combine/complete/{{$combine->id}}"><button class="invoice-btn btn-link" title="Hoàn thành"><i class="fas fa-check-square"></i></button></a>
																	</td>																
																</tr>
															@endforeach
																																													
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="driver-schedule">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Lịch trình xe</h4>
									<a href="driver/schedule/create"><i class="far fa-edit"></i>Thêm mới</a>
								</div>
								<div class="my-orders">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-12">
											<div class="my-checkout">
												<div class="table-responsive">
													<table class="table  table-bordered">
														<thead>
															<tr>
																<td class="td-heading">Tỉnh xuất phát - Tỉnh trả</td>
																<td class="td-heading">Đường đi</td>
																<td class="td-heading">Ngày dự kiến</td>
																<td class="td-heading">Action</td>
																
															</tr>
														</thead>
														<tbody>
															@foreach ($driverSchedules as $driverSchedule)
																<tr>
																	<td class="td-content">{{$driverSchedule->starting_province_city->name}} - {{$driverSchedule->end_province_city->name}}</td>									
																	<td class="td-content">{{$driverSchedule->route_point}}</td>
																	<td class="td-content">{{$driverSchedule->date}}</td>
																	<td>
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#driver-schedule-{{$driverSchedule->id}}">Chi tiết</button>															
																		<a href="driver/schedule/update/{{$driverSchedule->id}}"><button class="invoice-btn btn-link"><i class="far fa-file-alt"></i></button></a>
																		<a href="user/search?starting_province={{$driverSchedule->starting_province_city->id}}&starting_district={{$driverSchedule->starting_district->id}}&end_province={{$driverSchedule->end_province_city->id}}&end_district={{$driverSchedule->end_district->id}}&user_schedule_date={{$driverSchedule->date}}"><button class="invoice-btn btn-link" title="Tìm xe"><i class="fas fa-search-location"></i></button></a>
																		<a href="driver/schedule/delete/{{$driverSchedule->id}}" onclick="return confirm('Bạn chắc chắn muốn xóa bỏ dự định chuyến xe này?');"><button class="trash-btn btn-link"><i class="far fa-trash-alt"></i></button></a>
																		
																		<div class="modal fade" tabindex="-1" id="driver-schedule-{{$driverSchedule->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$driverSchedule->starting_district->name}}, {{$driverSchedule->starting_province_city->name}}&destination={{$driverSchedule->end_district->name}}, {{$driverSchedule->end_province_city->name}}&waypoints={{$driverSchedule->route_point}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết lịch trình</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$driverSchedule->starting_district->name}}, {{$driverSchedule->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverSchedule->route_point}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverSchedule->end_district->name}}, {{$driverSchedule->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$driverSchedule->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$driverSchedule->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giá</div>
																											<div class="attr-r">{{$driverSchedule->cost}}</div>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>
																	</td>																
																</tr>
															@endforeach
																																													
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="driver-schedule-request">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Các yêu cầu với xe</h4>
								</div>
								<div class="my-orders">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-12">
											<div class="my-checkout">
												<div class="table-responsive">
													<table class="table table-bordered">
														<thead>
															<tr class="d-flex">
																<td class="td-heading col-2">Kế hoạch xe</td>
																<td class="td-heading col-2">Kế hoạch hành khách</td>
																<td class="td-heading col-2">Thời gian xuất phát</td>
																<td class="td-heading col-2">Ghi chú</td>
																<td class="td-heading col-2">Bên yêu cầu</td>
																<td class="td-heading col-3">Action</td>
																
															</tr>
														</thead>
														<tbody>
															@foreach ($requestRelateDriverSchedules as $combine)
																@php
																	$userScheduleInRequest = $combine->userSchedule;
																	$driverScheduleInRequest = $combine->driverSchedule;
																@endphp
																<tr class="d-flex">
																	<td class="td-content col-sm-2">
																		
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#driver-schedule-2-in-request-{{$driverScheduleInRequest->id}}">Chi tiết</button>
																		<div class="modal fade" tabindex="-1" id="driver-schedule-2-in-request-{{$driverScheduleInRequest->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$driverScheduleInRequest->starting_district->name}}, {{$driverScheduleInRequest->starting_province_city->name}}&destination={{$driverScheduleInRequest->end_district->name}}, {{$driverScheduleInRequest->end_province_city->name}}&waypoints={{$driverScheduleInRequest->route_point}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết chuyến xe</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$driverScheduleInRequest->starting_district->name}}, {{$driverScheduleInRequest->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverScheduleInRequest->route_point}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverScheduleInRequest->end_district->name}}, {{$driverScheduleInRequest->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$driverScheduleInRequest->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$driverScheduleInRequest->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giá</div>
																											<div class="attr-r">{{$driverScheduleInRequest->cost}}</div>
																										</div>
																										
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>	

																	</td>
																	<td  class="td-content col-sm-2">
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#user-schedule-2-in-request{{$userScheduleInRequest->id}}">Chi tiết</button>
																		<div class="modal fade" tabindex="-1" id="user-schedule-2-in-request{{$userScheduleInRequest->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$userScheduleInRequest->pick_up_location}}, {{$userScheduleInRequest->starting_district->name}}, {{$userScheduleInRequest->starting_province_city->name}}&destination={{$userScheduleInRequest->drop_off_location}}, {{$userScheduleInRequest->end_district->name}}, {{$userScheduleInRequest->end_province_city->name}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết lịch trình</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$userScheduleInRequest->pick_up_location}}, {{$userScheduleInRequest->starting_district->name}}, {{$userScheduleInRequest->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$userScheduleInRequest->drop_off_location}}, {{$userScheduleInRequest->end_district->name}}, {{$userScheduleInRequest->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$userScheduleInRequest->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$userScheduleInRequest->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Số người dự kiến</div>
																											<div class="attr-r">{{$userScheduleInRequest->intended_number_passenger}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Hành khách</div>
																											<div class="attr-r">{{$userScheduleInRequest->user->name}} - {{$userScheduleInRequest->user->phone_number}}</div>
																										</div>
																									
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>	
																	</td>	
																	<td class="td-content col-sm-2">{{$combine->departure_time}}</td>
																	<td class="td-content col-sm-2">{{$combine->note}}</td>
																	@if ($combine->requester == 0)
																		<td class="td-content col-sm-2">Hành khách</td>
																		<td class="td-content col-sm-2">													
																			<a onclick="return confirm('Bạn chắc chắn muốn hủy bỏ yêu cầu này?');" href="combine/reject/{{$combine->id}}"><button class="invoice-btn btn-link" title="Hủy bỏ"><i class="fas fa-window-close"></i></button></a>
																			<a onclick="return confirm('Xác nhận chấp nhận yêu cầu?');" href="combine/approve/{{$combine->id}}"><button class="invoice-btn btn-link" title="Chấp nhận"><i class="fas fa-check-square"></i></button></a>
																		</td>	
																	@else
																		<td class="td-content col-sm-2">Tài xế</td>
																		<td class="td-content col-sm-2">													
																			<a onclick="return confirm('Bạn chắc chắn muốn hủy bỏ yêu cầu này?');" href="combine/reject/{{$combine->id}}"><button class="invoice-btn btn-link" title="Hủy bỏ"><i class="fas fa-window-close"></i></button></a>
																		</td>	
																	@endif
																													
																</tr>
															@endforeach
																																													
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane" id="driver-schedule-in-waiting">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Kết nối chờ khởi hành</h4>
								</div>
								<div class="my-orders">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-12">
											<div class="my-checkout">
												<div class="table-responsive">
													<table class="table  table-bordered">
														<thead>
															<tr>
																<td class="td-heading">Kế hoạch di chuyển của xe</td>
																<td class="td-heading">Dự định của hành khách</td>
																<td class="td-heading">Thời gian xuất phát</td>
																<td class="td-heading">Ghi chú</td>
																<td class="td-heading">Action</td>
																
															</tr>
														</thead>
														<tbody>
															@foreach ($driverScheduleInWaiting as $driverSchedule)
																@php
																	$combine = $driverSchedule->combine;
																	$userSchedule = $combine->userSchedule;
																@endphp
																<tr>
																									
																	<td class="td-content">
																		
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#driver-schedule-2-{{$driverSchedule->id}}">Chi tiết</button>
																		<div class="modal fade" tabindex="-1" id="driver-schedule-2-{{$driverSchedule->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$driverSchedule->starting_district->name}}, {{$driverSchedule->starting_province_city->name}}&destination={{$driverSchedule->end_district->name}}, {{$driverSchedule->end_province_city->name}}&waypoints={{$driverSchedule->route_point}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết chuyến xe</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$driverSchedule->starting_district->name}}, {{$driverSchedule->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverSchedule->route_point}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverSchedule->end_district->name}}, {{$driverSchedule->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$driverSchedule->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$driverSchedule->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giá</div>
																											<div class="attr-r">{{$driverSchedule->cost}}</div>
																										</div>
																										
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>	

																	</td>
																	<td>
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#user-schedule-2-{{$userSchedule->id}}">Chi tiết</button>
																		<div class="modal fade" tabindex="-1" id="user-schedule-2-{{$userSchedule->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$userSchedule->pick_up_location}}, {{$userSchedule->starting_district->name}}, {{$userSchedule->starting_province_city->name}}&destination={{$userSchedule->drop_off_location}}, {{$userSchedule->end_district->name}}, {{$userSchedule->end_province_city->name}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết lịch trình</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$userSchedule->pick_up_location}}, {{$userSchedule->starting_district->name}}, {{$userSchedule->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$userSchedule->drop_off_location}}, {{$userSchedule->end_district->name}}, {{$userSchedule->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$userSchedule->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$userSchedule->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Số người dự kiến</div>
																											<div class="attr-r">{{$userSchedule->intended_number_passenger}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Hành khách</div>
																											<div class="attr-r">{{$userSchedule->user->name}} - {{$userSchedule->user->phone_number}}</div>
																										</div>
																									
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>	
																	</td>	
																	<td class="td-content">{{$combine->departure_time}}</td>
																	<td class="td-content">{{$combine->note}}</td>
																	<td>													
																		<a href="combine/cancel/{{$combine->id}}" onclick="return confirm('Bạn chắc chắn muốn hủy chuyến đi này?');"><button class="invoice-btn btn-link" title="Hủy chuyến"><i class="far fa-trash-alt"></i></button></a>
																		<a  onclick="return confirm('Xác nhận hoàn thành chuyến đi?');" href="combine/complete/{{$combine->id}}"><button class="invoice-btn btn-link" title="Hoàn thành"><i class="fas fa-check-square"></i></button></a>
																	</td>																
																</tr>
															@endforeach
																																													
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
						
						<div class="tab-pane" id="restaurants-changes">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Driver Changes</h4>						
								</div>
								<div class="about-dtp">
									<div class="recently-resto-bg">
										<div class="container">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-12">
													<form>
													<div class="basic-info v-top">
														<h4>Basic Info</h4>
														<div class="driver-dt">								
															<a href="user_profile_view.html"><img src="images/recipe-details/comment-1.png" alt=""></a>
															<h4> Rock Smith</h4>
														</div>														
														<div class="form-group">
															<label for="searchCity">City*</label>
															<input type="Search" class="video-form" id="searchCity" placeholder="Search City">							
														</div>
														<div class="form-group">
															<div class="checkbox-title">Are you the Owner or Manager of the Place?</div>
															<div class="filter-radio">
																<ul>
																	<li>
																	  <input type="radio" id="c1" name="cb1">
																	  <label for="c1">I’m the owner</label>
																	</li>
																	<li>
																	  <input type="radio" id="c2" name="cb1">
																	  <label for="c2">I’m the driver</label>
																	</li>
																</ul>
															</div>
														</div>
													</div>
													<div class="basic-info">
														<h4>Contact Info</h4>
														<div class="form-group">
															<label for="emailAddress2">Email Address*</label>
															<input type="email" class="video-form" id="emailAddress2" placeholder="Enter Email Address">							
														</div>
														<div class="form-group">
															<label for="telNumber3">Phone Number*</label>
															<input type="text" class="video-form" id="telNumber3" placeholder="Enter Phone Number">							
														</div>																												
														<div class="form-group">
															<div class="checkbox-title">Do You Have a Bike?* <span style="color:#a1a1a1;">(Only 2 wheeler vehicles?)</span></div>
															<div class="filter-radio">
																<ul>
																	<li>
																	  <input type="radio" id="c3" name="cb2">
																	  <label for="c3">I have a bike</label>
																	</li>
																	<li>
																	  <input type="radio" id="c4" name="cb2">
																	  <label for="c4">Buy soon</label>
																	</li>
																</ul>
															</div>
														</div>
													</div>
													<div class="basic-info">
														<h4>Timing</h4>						
														<div class="form-group">
															<div class="checkbox-title">Add Time*</div>
															<div class="filter-checkboxs">
																<ul>
																	<li>
																	  <input type="checkbox" id="c21" name="ca">
																	  <label for="c21" title="Monday">Mon</label>
																	</li>
																	<li>
																	  <input type="checkbox" id="c22" name="ca">
																	  <label for="c22" title="Tuesday">Tue</label>
																	</li>
																	<li>
																	  <input type="checkbox" id="c23" name="ca">
																	  <label for="c23" title="Wednesday"> Wed</label>
																	</li>
																	<li>
																	  <input type="checkbox" id="c24" name="ca">
																	  <label for="c24" title="Thursday">Thu</label>
																	</li>
																	<li>
																	  <input type="checkbox" id="c25" name="ca">
																	  <label for="c25" title="Friday">Fri</label>
																	</li>
																	<li>
																	  <input type="checkbox" id="c26" name="ca">
																	  <label for="c26" title="Saturday">Sat</label>
																	</li>
																	<li>
																	  <input type="checkbox" id="c27" name="ca">
																	  <label for="c27" title="Sunday">Sun</label>
																	</li>									
																</ul>
															</div>
														</div>
														<div class="row">	
															<div class="col-md-3 col-12">	
																<div class="form-group">
																	<div class="checkbox-title">From*</div>
																	<select class="selectpicker" tabindex="-98">
																		<option value="0">12.00 AM</option>
																		<option value="1">01.00 AM</option>
																		<option value="2">02.00 AM</option>
																		<option value="3">03.00 AM</option>
																		<option value="4">04.00 AM</option>
																		<option value="5">05.00 AM</option>
																		<option value="6">06.00 AM</option>
																		<option value="7">07.00 AM</option>
																		<option value="8">08.00 AM</option>
																		<option value="9">09.00 AM</option>
																		<option value="9">10.00 AM</option>
																		<option value="9">11.00 AM</option>																																							  														  
																	</select>
																</div>
															</div>
															<div class="col-md-3 col-12">	
																<div class="form-group">
																	<div class="checkbox-title">To*</div>
																	<select class="selectpicker" tabindex="-98">
																		<option value="0">12.00 PM</option>
																		<option value="1">01.00 PM</option>
																		<option value="2">02.00 PM</option>
																		<option value="3">03.00 PM</option>
																		<option value="4">04.00 PM</option>
																		<option value="5">05.00 PM</option>
																		<option value="6">06.00 PM</option>
																		<option value="7">07.00 PM</option>
																		<option value="8">08.00 PM</option>
																		<option value="9">09.00 PM</option>
																		<option value="9">10.00 PM</option>
																		<option value="9">11.00 PM</option>																																							  														  
																	</select>
																</div>
															</div>
															<div class="col-md-3 col-12">	
																<button class="add-time-btn">Add Time</button>
															</div>
															<div class="col-md-12">
																<div class="selected-time">
																	<ul>
																		<li>Monday</li>
																		<li>9.00AM to 11.00PM</li>
																		<li><a href="#"><i class="far fa-window-close"></i></a></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>																										
													<div class="basic-info c-top">
														<h4>More Details</h4>												
														<div class="form-group">
															<div class="checkbox-title">Working Details*</div>
															<div class="filter-radio">
																<ul>
																	<li>
																	  <input type="radio" value="value1" id="c5" name="cb3">
																	  <label for="c5">Working under 3 km</label>
																	</li>
																	<li>
																	  <input type="radio" value="value2" id="c6" name="cb3">
																	  <label for="c6">Working under 5 km</label>
																	</li>
																</ul>
															</div>
														</div>
														<div class="form-group">
															<div class="checkbox-title">Earning*</div>
															<div class="filter-radio">
																<ul>
																	<li>
																	  <input type="radio" value="value3" id="c7" name="cb4">
																	  <label for="c7">Every order commission</label>
																	</li>
																	<li>
																	  <input type="radio" value="value4" id="c8" name="cb4">
																	  <label for="c8">Monthly Salary</label>
																	</li>
																</ul>
															</div>
														</div>	
														<div class="form-group">
															<div class="checkbox-title">Registered By Company*</div>
															<div class="filter-radio">
																<ul>
																	<li>
																	  <input type="radio" value="value1" id="c9" name="cb5">
																	  <label for="c9">Uber</label>
																	</li>
																	<li>
																	  <input type="radio" value="value2" id="c10" name="cb5">
																	  <label for="c10">Ola Cab</label>
																	</li>
																</ul>
															</div>
														</div>										
													</div>													
													<button type="submit" class="add-resto-btn1 btn-link v-bottom">Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>								
						
						
						<div class="tab-pane" id="order-history">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Lịch sử</h4>
								</div>
								<div class="my-orders">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-12">
											<div class="my-checkout">
												<div class="table-responsive">
													<table class="table  table-bordered">
														<thead>
															<tr>
																<td class="td-heading">Kế hoạch di chuyển của xe</td>
																<td class="td-heading">Dự định của hành khách</td>
																<td class="td-heading">Thời gian xuất phát</td>
																<td class="td-heading">Ghi chú</td>
																<td class="td-heading">Action</td>
																
															</tr>
														</thead>
														<tbody>
															@foreach ($combineHistories as $combineHistory)
																@php
																	$driverScheduleHistory = $combineHistory->driverSchedule;
																	$userScheduleHistory = $combineHistory->userSchedule;
																@endphp
																<tr>
																	<td class="td-content">
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#driver-schedule-history-{{$driverScheduleHistory->id}}">Chi tiết</button>
																		<div class="modal fade" tabindex="-1" id="driver-schedule-history-{{$driverScheduleHistory->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$driverScheduleHistory->starting_district->name}}, {{$driverScheduleHistory->starting_province_city->name}}&destination={{$driverScheduleHistory->end_district->name}}, {{$driverScheduleHistory->end_province_city->name}}&waypoints={{$driverScheduleHistory->route_point}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết chuyến xe</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$driverScheduleHistory->starting_district->name}}, {{$driverScheduleHistory->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverScheduleHistory->route_point}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$driverScheduleHistory->end_district->name}}, {{$driverScheduleHistory->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$driverScheduleHistory->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$driverScheduleHistory->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giá</div>
																											<div class="attr-r">{{$driverScheduleHistory->cost}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Xe</div>
																											<div class="attr-r">{{$driverScheduleHistory->car->type}} - {{$driverScheduleHistory->car->license_plates}}</div>
																										</div>
																								
																										<div class="payment-method-dt">
																											<div class="attr-l">Tài xế</div>
																											<div class="attr-r">{{$driverScheduleHistory->car->user->name}} - {{$driverScheduleHistory->car->user->phone_number}}</div>
																										</div>
																										
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>	

																	</td>
																	<td>
																		<button class="trace-btn btn-link" data-toggle="modal" data-target="#user-schedule-history-{{$userScheduleHistory->id}}">Chi tiết</button>
																		<div class="modal fade" tabindex="-1" id="user-schedule-history-{{$userScheduleHistory->id}}" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-xl">
																				<div class="modal-content">
																					<div class="trace-model">
																						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																						<div class="container mb-1">
																							<div class="row no-gutters">
																								<div class="col-lg-8 col-md-6 col-12">
																									<div >
																										<iframe width="750" height="600" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$userScheduleHistory->pick_up_location}}, {{$userScheduleHistory->starting_district->name}}, {{$userScheduleHistory->starting_province_city->name}}&destination={{$userScheduleHistory->drop_off_location}}, {{$userScheduleHistory->end_district->name}}, {{$userScheduleHistory->end_province_city->name}}" allowfullscreen>
																										</iframe>
																										
																									</div>																							
																								</div>
																								<div class="col-lg-4 col-md-6 col-12">
																									<div class="right-order-dt">
																										<h1>Chi tiết lịch trình</h1>
																										<div class="trace-steps">
																											<ul>
																												<li class="active">
																													<div class="steps-names">{{$userScheduleHistory->pick_up_location}}, {{$userScheduleHistory->starting_district->name}}, {{$userScheduleHistory->starting_province_city->name}}</div>
																												</li>
																												<li class="active">
																													<div class="steps-names">{{$userScheduleHistory->drop_off_location}}, {{$userScheduleHistory->end_district->name}}, {{$userScheduleHistory->end_province_city->name}}</div>
																												</li>																											
																											</ul>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Ngày</div>
																											<div class="attr-r">{{$userScheduleHistory->date}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Giờ</div>
																											<div class="attr-r">{{$userScheduleHistory->time}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Số người dự kiến</div>
																											<div class="attr-r">{{$userScheduleHistory->intended_number_passenger}}</div>
																										</div>
																										<div class="payment-method-dt">
																											<div class="attr-l">Hành khách</div>
																											<div class="attr-r">{{$userScheduleHistory->user->name}} - {{$userScheduleHistory->user->phone_number}}</div>
																										</div>

																									
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>																			
																			</div>
																		</div>	
																	</td>	
																	<td class="td-content">{{$combineHistory->departure_time}}</td>
																	<td class="td-content">{{$combineHistory->note}}</td>
																	<td>
																		@if ($user->id == $userScheduleHistory->user_id)
																			<button class="invoice-btn btn-link" title="Đánh giá" data-toggle="modal" data-target="#rating-{{$combineHistory->id}}"><i class="fas fa-star-half-alt"></i></button></a>

																			<div class="modal fade" tabindex="-1" id="rating-{{$combineHistory->id}}" role="dialog" aria-hidden="true">
																				<div class="modal-dialog modal-xl">
																					<div class="modal-content">
																						<div class="trace-model">
																							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
																							<div class="container mb-1">
																								<div class="row no-gutters">
																									<div class="col-lg-12 col-md-12 col-12">
																										<div class="right-order-dt">
																											<h1>Gửi đánh giá</h1>
																											@if (!Auth::check())
																												<p>Bạn phải đăng nhập để đánh giá!</p>
																											@endif
																											<form action="car/rating/{{$driverScheduleHistory->id}}" method="POST" enctype="multipart/form-data">
																												@csrf
																												<div class="select-rating my-3">
																													<input class="rating" name="star" value="0">
																												</div>

																												<input type="text" class="form-control my-3" name="comment" placeholder="Thêm mô tả cho đánh giá của bạn ">
																												<input class="btn btn-link my-3" type="submit" value="Gửi đánh giá">
																											</form>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>																			
																				</div>
																			</div>

																		@endif													
																		
																	</td>																
																</tr>
															@endforeach
																																													
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>								
						
						
						
						<div class="tab-pane" id="manage-cards">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Thông tin xe</h4>
								</div>
								@if (isset($user->car))
									<div class="payments">
										<div class="card-dbt">										
											<div class="container">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-12">																				
														<form action="user/car/update/{{$user->car->id}}" method="POST" enctype="multipart/form-data">
															@csrf
															<div class="form-group mt-3">
																<img style="width: 220px;height: 220px;" src="{{$user->car->photo_path}}" alt="">
															</div>
															<div class="form-group">
																<div class="input-heading">Tải lên ảnh của xe</div>	
																<input  type="file" multiple="" name="car_image" accept="image/*">
															</div>
															<div class="form-group">	
																<input type="text" class="video-form" id="type" name="type" value="{{$user->car->type}}">																				
															</div>
															<div class="form-group">
																<label for="" class="my-2 text-dark">Biển số</label>		
																<input type="text" class="video-form" id="license_plates" name="license_plates" value="{{$user->car->license_plates}}">	
															</div>
															<div class="form-group">
																<label for="" class="my-2 text-dark">Số khách tối đa</label>		
																<input type="number" class="video-form" id="max_passenger" name="max_passenger" value="{{$user->car->capacity}}">																				
															</div>
												
															
															<div class="col-md-12 col-12 ">
																<div class="form-group">
																	<button class="card-btn btn-link">Cập nhật</button>																				
																</div>
															</div>														
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								@else
									<div class="payments">
										<div class="payment-dt">
											<h4>Chưa có thông tin xe</h4>										
										</div>
										<div class="card-dbt">										
											<div class="container">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-12">																				
														<form action="user/car/create" method="POST" enctype="multipart/form-data">
															@csrf
															<div class="form-group">
																<div class="input-heading">Tải lên ảnh của xe</div>	
																<input  type="file" multiple="" name="car_image" accept="image/*">
															</div>
															<div class="form-group">	
																<label for="type" class="my-2 text-dark">Loại xe</label>														
																<input type="text" class="video-form" id="type" name="type" >																				
															</div>
															<div class="form-group">
																<label for="" class="my-2 text-dark">Biển số</label>		
																<input type="text" class="video-form" id="license_plates" name="license_plates" >	
															</div>
															<div class="form-group">
																<label for="" class="my-2 text-dark">Số khách tối đa</label>		
																<input type="text" class="video-form" id="max_passenger" name="max_passenger" >																				
															</div>
																<div class="col-md-12 col-12 ">
																	<div class="form-group">
																		<button class="card-btn btn-link">Thêm</button>						
																	</div>
																</div>
															</div>														
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								@endif
							</div>
						</div>
						
					</div>
				</div>
			
			</div>
		</div>
	</section>
	<!--my-account-tabs end-->

@endsection

@section("script")
	<script src="js/simple-rating.js"></script>
	<script>
		$(document).ready(function(){
 			$('.rating').rating();
		});

		function unfollow(coachID, element){
			$.ajax({
               type:'GET',
               url:'/coach/unfollow/' + coachID,
               success:function(data) {
               		if (data.unauthenticated) {
               			alert("Bạn cần đăng nhập để tiếp tục!")
               		}
               		if (data.notFollowing) {
               			alert("Bạn chưa theo dõi chuyến xe này!")
               		}
               		if (data.unfollowSuccess) {
                    	element.closest("li").remove();
               		}
               }
            });
		}

	</script>

@endsection