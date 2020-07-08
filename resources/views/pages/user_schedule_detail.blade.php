@extends('layout.index')

@section('css')
	<link href="css/thumbnail.slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/simple-rating.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
@endsection
@section('content')
	<section class="title-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="left-title-text">
					<h3>Kế hoạch hành khách</h3>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-title-text">  
						<ul>
							<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
							<li class="breadcrumb-item " aria-current="page">hành khách</li>
							<li class="breadcrumb-item active" aria-current="page">chi tiết</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--title-bar end-->
	<!--meal-detail-start-->
	<section class="all-partners">			
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
			@php
				$user = $userSchedule->user;
			@endphp
			<div class="row">					
				<div class="col-lg-4 col-md-4">
					<div class="resto-meal-dt">
						<div class="resto-detail">
							<div class="resto-picy">
								<img style="width: 64px;height: 64px;" src="{{$user->avatar}}" alt="">
							</div>
							<div class="name-location mt-3">
								<h1>{{$user->name}}</h1>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-8">
					<div class="right-side">
						<div class="about-meal">
							<h4> Chi tiết kế hoạch di chuyển</h4>
						</div>					
						<div class="dt-detail">
							<ul>
								<li>
									<div class="time"><i class="far fa-clock"></i>Thời gian: {{$userSchedule->date}}, {{$userSchedule->time}}</div>
								</li>
								<br>
								<li>
									<div class="time"><i class="fas fa-location-arrow"></i>Địa điểm xuất phát: {{$userSchedule->pick_up_location}}, {{$userSchedule->starting_district->name}}, {{$userSchedule->starting_province_city->name}}</div>
								</li>
								<br>
								<li>
									<div class="time"><i class="fas fa-location-arrow"></i>Địa điểm xuống: {{$userSchedule->drop_off_location}}, {{$userSchedule->end_district->name}}, {{$userSchedule->end_province_city->name}}</div>
								</li>
								<br>
								<li>
									<div class="delivery"><i class="fas fa-users"></i>Số khách dự kiến : {{$userSchedule->intended_number_passenger}}</div>
								</li>
							</ul>
						</div>
						<div class="about-meal">
							<h4>Thông tin liên hệ</h4>
						</div>	
						<div class="dt-detail">
							<ul>
								<li>
									<div class="time"><i class="fas fa-phone"></i></i>Số điện thoại: {{$user->phone_number}}</div>
								</li>

							</ul>
						</div>

						
						<div class="order-now-check">
							<button class="on-btn btn-link" data-toggle="modal" data-target="#trace-{{$userSchedule->id}}">Kết nối</button>
						</div>
						
						<div class="modal fade" tabindex="-1" id="trace-{{$userSchedule->id}}" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-xl">
								<div class="modal-content">
									<div class="trace-model">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
										<div class="container mb-1">
											<div class="row no-gutters">
												<div class="col-lg-12 col-md-12 col-12">
													<div class="right-order-dt">
														<h1>Tạo yêu cầu</h1>
														@if (!Auth::check())
															<p>Bạn phải đăng nhập để kết nối!</p>
														@elseif (isset($driverSchedules))
														<form action="user/request/{{$userSchedule->id}}" method="POST" enctype="multipart/form-data">
															@csrf
															<div class="form-group">
																<label for="locationUser" class="my-2">Chọn kết hoạch di chuyển để đặt xe: </label>
																<div class="field-input">
																	<select class="selectpicker form-control my-2" data-live-search="true" name="driver_schedule_id" title="Kế hoạch lái xe của bạn" required="">
																		
																			@foreach ($driverSchedules as $driverSchedule)
																				<option value="{{$driverSchedule->id}}">{{$driverSchedule->starting_district->name}}, {{$driverSchedule->starting_province_city->name}} - {{$driverSchedule->route_point}} - {{$driverSchedule->end_district->name}}, {{$driverSchedule->end_province_city->name}} - {{$driverSchedule->date ." ". $driverSchedule->time}}</option>
																			@endforeach
																		
																	</select>		

																</div>
																<div class="tab-content-heading m-2">
																	<a href="driver/schedule/create" target="_blank"><i class="far fa-edit"></i>Thêm mới</a>
																</div>										
															</div>
															<button type="submit" class="change-btn btn-link">Gửi yêu cầu</button>
														</form>
														@else
															<p>Thêm thông tin xe để kết nối!</p>
														@endif
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>																			
							</div>
						</div>

						
						
					</div>
						
				</div>
			</div>			
		</div>
	</section>			
	<!--meal-deail end-->
@endsection

@section("script")
	<script src="js/custom.js"></script>
	<script src="js/thumbnail.slider.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/simple-rating.js"></script>
	
	
@endsection