@extends('layout.index')

@section('content')

	<section class="title-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="left-title-text">
					<h3>Hành khách</h3>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-title-text">  
						<ul>
							<li class="breadcrumb-item"><a href="">Trang chủ</a></li>
							<li class="breadcrumb-item " aria-current="page">hành khách</li>
							<li class="breadcrumb-item active" aria-current="page">tìm kiếm</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--title-bar end-->
	<!--meals start-->
	<section class="all-partners">			
		<div class="container">		
			<div class="row">	
				<div class="col-lg-3 col-md-4">
					<div class="filters partner-bottom">
						<form action="user/search" method="POST" enctype="multipart/form-data" >
							@csrf
							<div class="filter-heading">						
								<h3>Tìm kiếm</h3>
							</div>						
							<div class="accordion" id="accordionone">
								<div class="location">
								<button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Địa điểm</button>
									<div id="collapseOne" class="collapse show" data-parent="#accordionone">
										<div class="search-area">
											
											<select class="selectpicker form-control my-2" data-live-search="true" name="starting_province" title="Chọn tỉnh/thành phố xuất phát" required="">
												@foreach($provinces as $province)
											  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}" @if ((isset($startingProvince))&&($province->id == $startingProvince))
											  			selected="" 
											  		@endif>{{$province->name}}</option>
												@endforeach	
											</select>
											<select class="selectpicker form-control my-2" data-live-search="true" name="starting_district" title="Chọn quận/huyện xuất phát" >
												@foreach($districts as $district)
											  		<option value="{{$district->id}}" data-tokens="{{$district->convertNameToEn()}}" @if ((isset($startingDistrict))&&($district->id == $startingDistrict))
											  			selected="" 
											  		@endif>{{$district->name}}</option>
												@endforeach	
											</select>
											<select class="selectpicker form-control my-2" data-live-search="true" name="end_province" title="Chọn tỉnh/thành phố đến" required="">
												@foreach($provinces as $province)
											  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}" @if((isset($endProvince))&& ($province->id == $endProvince))
											  			selected="" 
											  		@endif>{{$province->name}}</option>
												@endforeach
											</select>	
											<select class="selectpicker form-control my-2" data-live-search="true" name="end_district" title="Chọn quận/huyện đến" >
												@foreach($districts as $district)
											  		<option value="{{$district->id}}" data-tokens="{{$district->convertNameToEn()}}" @if((isset($endDistrict))&& ($district->id == $endDistrict))
											  			selected="" 
											  		@endif>{{$district->name}}</option>
												@endforeach
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class="accordion" id="accordiontwo">
								<div class="location">
									<button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Ngày dự kiến</button>
									<div id="collapseTwo" class="collapse show" data-parent="#accordiontwo">								
										<div class="form-group my-2">
											<div class="field-input">
												@if ($user_schedule_date != "")
													<input type="date" class="video-form my-1" id="user_schedule_date" name="user_schedule_date" value="{{$user_schedule_date}}" >
												@else
													<input type="date" class="video-form my-1" id="user_schedule_date" name="user_schedule_date"  >
												@endif
											</div>											
										</div>															
									</div>
								</div>
							</div>
							<button type="submit" class="my-2 btn btn-block search-btn btn-link" >Tìm</button>

						</form>
												
					</div>
				</div>
				<div class="col-lg-9 col-md-8">
					<div class="col-lg-12 col-md-12 m-left m-right">
						<div class="all-meals-show">
							<div class="new-heading">
								<h1> Kết Quả Tìm Kiếm </h1>
								<div class="loc-title">
									Lộ trình hành khách
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						@if(isset($userSchedules))
							@foreach($userSchedules as $userSchedule)
								@php
									$passenger = $userSchedule->user;
								@endphp
								<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
									<div class="all-meal">
										<div class="top">
											<a href="user/schedule/detail/{{$userSchedule->id}}"><div class="bg-gradient"></div></a>
											<div class="top-img">
												<img style="width: 260px;height: 64px;" src="images/homepage/meals/img-1.jpg" alt="">
											</div>
											<div class="logo-img">
												<img style="width: 64px;height: 64px;" src="{{$passenger->avatar}}" alt="">
											</div>
											<div class="top-text">
												<div class="heading"><h4 class="text-dark" title="{{$passenger->name}}">{{$passenger->name}}</h4></div>
											</div>
										</div>
										<div class="bottom">
											<div class="bottom-text">
												<div class="delivery"><i class="fas fa-map-marker-alt"></i></i>Điểm đi: {{$userSchedule->pick_up_location}}, {{$userSchedule->starting_district->name}}, {{$userSchedule->starting_province_city->name}} </div>
												<div class="delivery"><i class="fas fa-map-marker-alt"></i></i>Điểm đến: {{$userSchedule->drop_off_location}}, {{$userSchedule->end_district->name}}, {{$userSchedule->end_province_city->name}} </div>
												<div class="delivery"><i class="fas fa-users"></i></i>Số khách dự kiến: {{$userSchedule->intended_number_passenger}} </div>
												<div class="time"><i class="far fa-clock"></i>Thời gian:  {{$userSchedule->date}} {{$userSchedule->time}}</div>							
											</div>
										</div>
									</div>					
								</div>
							@endforeach
						@endif
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 ">
							<div class="main-p-pagination m-top">
								<nav aria-label="Page navigation example">
									@if(isset($userSchedules))
										{{$userSchedules->appends(request()->input())->links()}}
									@endif
								</nav>
							</div>
						</div>
					</div>
				</div>
				
			</div>			
		</div>
	</section>			
	<!--meals end-->

	

@endsection