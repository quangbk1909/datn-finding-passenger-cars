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
					<h3>Xe Khách</h3>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-title-text">  
						<ul>
							<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
							<li class="breadcrumb-item " aria-current="page">xe khách</li>
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
			<div class="row">					
				<div class="col-lg-8 col-md-8">
					<div id="sync1" class="owl-carousel owl-theme">
						<div class="item">
							<img style="width: 750px;height: 445px;" src="{{$coach->photo_path}}" alt="">
						</div>
						@foreach ($coach->extendedImage as $extendedImage)
							<div class="item">
								<img style="width: 750px;height: 445px;" src="{{$extendedImage->image_path}}" alt="">
							</div>
						@endforeach
											
					</div>

					<div id="sync2" class="owl-carousel owl-theme">
						<div class="item">
							<img style="width: 84px;height: 84px;" src="{{$coach->photo_path}}" alt="">
						</div>
						@foreach ($coach->extendedImage as $extendedImage)
							<div class="item">
								<img style="width: 84px;height: 84px;" src="{{$extendedImage->image_path}}" alt="">
							</div>
						@endforeach
					</div>
					
					<div class="resto-meal-dt">
						<div class="resto-detail">
							<div class="resto-picy">
								<a href="organization/{{$coach->organization->id}}"><img style="width: 64px;height: 64px;" src="{{$coach->organization->logo}}" alt=""></a>
							</div>
							<div class="name-location mt-3">
								<a href="organization/{{$coach->organization->id}}"><h1>{{$coach->organization->name}}</h1></a>
							</div>
						</div>
						<div class="right-side-btns">										
							<div class="resto-review-stars">
								@php
									$star = round($coach->getAverageRatingStar(), 1);
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
						<ul class="nav nav-tabs" role="tablist">
						<li class ="nav-item" role="presentation">
							<a  href="#reviews"class="nav-link" aria-controls="reviews" role="tab" data-toggle="tab">{{count($coach->rating)}} Đánh giá</a>
						</li>
						<li class ="nav-item" role="presentation">
							<a href="#map" class="nav-link" aria-controls="map" role="tab" data-toggle="tab">Bản đồ</a>
						</li>
						</ul>
						
						<div class="tab-content">
							<div class="tab-pane active" role="tabpanel" id="reviews">
								<div class="comment-post">
									<div class="post-items">
										<a href="my_dashboard.html">
										<div class="img-dp">
											<i class="fas fa-user"></i>
										</div>									
										</a>
										<form action="coach/rating/{{$coach->id}}" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="select-rating">
												<h4 class="m-1 font-weight-bold">Đánh giá của bạn :</h4>
												<input class="rating" name="star" value="0">
											</div>
											<input type="text" class="rating-input" name="comment" placeholder="Thêm mô tả cho đánh giá của bạn để nhà xe cải tiến!">
											<input class="rating-btn btn-link" type="submit" value="Gửi đánh giá">
										</form>
									</div>
								</div>
								@foreach ($ratings as $k=>$rating)
									<div class="main-comments @if ($k == count($coach->rating) - 1)
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

							<div class="tab-pane my-3" role="tabpanel" id="map">
								<iframe width="750" height="550" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyDDeMHPFeEYXtauiKCYrj8pzZ6ZrThd4no&origin={{$coach->specific_starting_location .", ". $coach->startingProvinceCity->name}}&destination={{$coach->specific_end_location .", ". $coach->endProvinceCity->name}}&waypoints={{$coach->route}}" allowfullscreen>
								</iframe>
							</div>
						</div>					
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="right-side">
						<div class="new-heading t-bottom">
							<a href="coach/{{$coach->id}}"><h1>{{$coach->name}}</h1></a>
						</div>
						<div class="about-meal">
							<h4> Lộ trình - Thời gian</h4>
							<p>{{$coach->route}} </span></p>
							<p>Chuyến đầu - Chuyến cuối : {{$coach->timer->first()->started_time}} - {{$coach->timer->last()->started_time}}</p>
						</div>					
						<div class="price">
							<span>Giá vé:</span>
							<span>{{number_format($coach->cost)}} vnđ</span>
						</div>
						<div class="dt-detail">
							<ul>
								<li>
									<div class="delivery"><i class="fas fa-users"></i>Số lượng khách : {{$coach->number_current_passenger}}/{{$coach->capacity}}</div>
								</li>
								<li>
									<div class="time"><i class="far fa-clock"></i>Khởi hành sau: {{$coach->getTimeRemaining() + $coach->fixed_time}} phút</div>
								</li>
								<li>
									<div class="time"><i class="fas fa-location-arrow"></i>Điểm đón khách: {{$coach->specific_starting_location}}</div>
								</li>
								<li>
									<div class="time"><i class="fas fa-location-arrow"></i>Điểm trả khách: {{$coach->specific_end_location}}</div>
								</li>
							</ul>
						</div>
						@if ($isFollow == 0)
							<div class="order-now-check">
								<button id="follow" class="on-btn btn-link" onclick="follow({{$coach->id}})">Theo dõi</button>
							</div>
						@elseif ($isFollow == 1) 
							<div class="order-now-check">
								<button id="follow" class="on-btn btn-link" onclick="unfollow({{$coach->id}})">Bỏ theo dõi</button>
							</div>
						@endif
						
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

		function follow(coachID){
			$.ajax({
               type:'GET',
               url:'/coach/follow/' + coachID,
               success:function(data) {
               		if (data.unauthenticated) {
               			alert("Bạn cần đăng nhập để tiếp tục!")
               		}
               		if (data.isFollowing) {
               			alert("Bạn đã đang theo dõi chuyến xe này!")
               		}
               		if (data.followSuccess) {
                    	$("#follow").replaceWith('<button id="follow" class="on-btn btn-link" onclick="unfollow('+ coachID +')">Bỏ theo dõi</button>');
               		}
               }
            });
		}


		function unfollow(coachID){
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
                    	$("#follow").replaceWith('<button id="follow" class="on-btn btn-link" onclick="follow('+ coachID +')">Theo dõi</button>');
               		}
               }
            });
		}
	</script>
@endsection