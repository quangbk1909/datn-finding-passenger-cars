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
					<h3>Xe Con</h3>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-title-text">  
						<ul>
							<li class="breadcrumb-item"><a href="">Trang chủ</a></li>
							<li class="breadcrumb-item " aria-current="page">xe con</li>
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
				$car = $driverSchedule->car;
				$driver = $car->user;
			@endphp
			<div class="row">					
				<div class="col-lg-8 col-md-8">
					<div id="sync1" class="owl-carousel owl-theme">
						<div class="item">
							<img style="width: 750px;height: 445px;" src="{{$car->photo_path}}" alt="">
						</div>
											
					</div>
					<div class="resto-meal-dt">
						<div class="resto-detail">
							<div class="resto-picy">
								<img style="width: 64px;height: 64px;" src="{{$driver->avatar}}" alt="">
							</div>
							<div class="name-location mt-3">
								<h1>{{$driver->name}}</h1>
							</div>
						</div>
						<div class="right-side-btns">										
							<div class="resto-review-stars">
								@php
									$star = round($car->getAverageRatingStar(), 1);
									$integerPart = (int)$star;
									$decimalPart = $star - $integerPart;
								@endphp
								@if($star == 0) 
									<i>Chưa có đánh giá</i>
								@else 
									@for($i = 0; $i < $integerPart; $i++ )
										<i class="fas fa-star"></i>
									@endfor
									@if ($decimalPart > 0)
										<i class="fas fa-star-half"></i>
									@endif
									<span>{{$star}}</span>
								@endif
							</div>
						</div>
					</div>
					<div class="all-tabs">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class ="nav-item" >
								<a  href="#reviews" class="nav-link" id="reviews-tab" data-toggle="tab" role="tab" aria-controls="reviews"  >{{count($car->rating)}} Đánh giá</a>
							</li>
							<li class ="nav-item">
								<a href="#map" class="nav-link" id="map-tab" data-toggle="tab" role="tab" aria-controls="map" >Bản đồ</a>
							</li>
						</ul>
						
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane" role="tabpanel" id="reviews" aria-labelledby="reviews-tab">
								<div class="comment-post my-3">
									@if (isset($ratings))
										<p class="m-3">Chưa có đánh giá</p>
									@endif
								</div>
								@foreach ($ratings as $k=>$rating)
									<div class="main-comments @if ($k == count($car->rating) - 1)
										bm-margin
									@endif ">
										<div class="rating-1">
											<div class="user-detail-heading">
												<a href="#"><img src="{{$rating->user->avatar}}" alt=""></a>
												<h4> {{$rating->user->name}}</h4><br>
												<div class="rate-star">
													@for($i = 0; $i < $rating->star; $i++ )
														<i class="fas fa-star"></i>
													@endfor
													<span>{{$rating->star}}</span>
												</div>
											</div>
											<div class="reply-time">											
												<p><i class="far fa-clock"></i>{{$rating->created_at}}</p>
											</div>
											<div class="comment-description">
												<p>{{$rating->comment}}</p>
											</div>
										</div>									
									</div>
								@endforeach
							</div>

							<div class="tab-pane my-3" role="tabpanel" id="map" aria-labelledby="map-tab">
								<iframe width="750" height="550" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$driverSchedule->starting_district->name .", ". $driverSchedule->starting_province_city->name}}&destination={{$driverSchedule->end_district->name .", ". $driverSchedule->end_province_city->name}}&waypoints={{$driverSchedule->route_point}}" allowfullscreen>
								</iframe>
							</div>
						</div>					
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="right-side">
						<div class="about-meal">
							<h4> Chi tiết chuyến đi</h4>
						</div>					
						<div class="price">
							<span>Giá vé:</span>
							<span>{{number_format($driverSchedule->cost)}} vnđ/1km</span>
						</div>
						<div class="dt-detail">
							<ul>
								<li>
									<div class="time"><i class="far fa-clock"></i>Thời gian: {{$driverSchedule->date}}, {{$driverSchedule->time}}</div>
								</li>
								<li>
									<div class="time"><i class="fas fa-location-arrow"></i>Khu vực xuất phát: {{$driverSchedule->starting_district->name}}, {{$driverSchedule->starting_province_city->name}}</div>
								</li>
								<li>
									<div class="time"><i class="fas fa-location-arrow"></i>Khu vực trả khách: {{$driverSchedule->end_district->name}}, {{$driverSchedule->end_province_city->name}}</div>
								</li>
							</ul>
						</div>
						<div class="about-meal">
							<h4> Chi tiết thông tin xe</h4>
						</div>	
						<div class="dt-detail">
							<ul>
								<li>
									<div class="delivery"><i class="fas fa-users"></i>Số khách tối đa : {{$car->capacity}}</div>
								</li>
								<li>
									<div class="time"><i class="fas fa-car"></i>Loại xe: {{$car->type}}</div>
								</li>
								<li>
									<div class="time"><i class="fas fa-info-circle"></i>Biển số: {{$car->license_plates}}</div>
								</li>
								<br>
								<li>
									<div class="time"><i class="fas fa-phone"></i></i>Số điện thoại: {{$car->user->phone_number}}</div>
								</li>
								
							</ul>
						</div>

						
						<div class="order-now-check">
							<button class="on-btn btn-link" data-toggle="modal" data-target="#trace-{{$driverSchedule->id}}">Đặt xe</button>
						</div>
						
						<div class="modal fade" tabindex="-1" id="trace-{{$driverSchedule->id}}" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-xl">
								<div class="modal-content">
									<div class="trace-model">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>													
										<div class="container mb-1">
											<div class="row no-gutters">
												<div class="col-lg-12 col-md-12 col-12">
													<div class="right-order-dt">
														<h1>Tạo yêu cầu</h1>
														@if (isset($userSchedules))
														<form action="driver/request/{{$driverSchedule->id}}" method="POST" enctype="multipart/form-data">
															@csrf
															<div class="form-group">
																<label for="locationUser" class="my-2">Chọn kết hoạch di chuyển để đặt xe: </label>
																<div class="field-input">
																	<select class="selectpicker form-control my-2" data-live-search="true" name="user_schedule_id" title="Kế hoạch di chuyển của bạn" required="">
																		
																			@foreach ($userSchedules as $userSchedule)
																				<option value="{{$userSchedule->id}}">{{$userSchedule->pick_up_location}}, {{$userSchedule->starting_district->name}}, {{$userSchedule->starting_province_city->name}} - {{$userSchedule->drop_off_location}}, {{$userSchedule->end_district->name}}, {{$userSchedule->end_province_city->name}} - {{$userSchedule->date ." ". $userSchedule->time}}</option>
																			@endforeach
																		
																	</select>		

																</div>
																<div class="tab-content-heading m-2">
																	<a href="user/schedule/create" target="_blank"><i class="far fa-edit"></i>Thêm mới</a>
																</div>										
															</div>
															<button type="submit" class="change-btn btn-link">Gửi yêu cầu</button>
														</form>
														@else
															<p>Bạn phải đăng nhập để đặt xe!</p>
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
	<script>
		$(document).ready(function(){
 			$('.rating').rating();
		});

		$(document).ready(() => {
		  let url = location.href.replace(/\/$/, "");
		  if (location.hash) {
		    const hash = url.split("#");
		    $('#myTab a[href="#'+hash[1]+'"]').tab("show");
		    url = location.href.replace(/\/#/, "#");
		    window.history.replaceState(null, null, url);
		    
		  } 
		   
		  $('a[data-toggle="tab"]').on("click", function() {
		    let newUrl;
		    const hash = $(this).attr("href");
		    
		    newUrl = url.split("#")[0] + hash;
		    window.history.replaceState(null, null, newUrl);
		  });
		});

	</script>
	
@endsection