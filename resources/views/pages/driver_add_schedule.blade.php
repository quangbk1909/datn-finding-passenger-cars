@extends('layout.index')


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
				<div class="col-lg-12 col-md-12 col-12">
					<div class="tab-content">
						<div class="tab-pane active" id="add-coach">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Thêm lộ trình chuyến xe mới</h4>
									<a href="user/dashboard"><i class="fas fa-angle-double-left"></i>Back</a>
								</div>
								<div class="edit-profile">
									<form action="driver/schedule/create" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label for="locationUser">Tỉnh/Thành phố xuất phát</label>
											<div class="field-input">
												<select class="selectpicker form-control my-2" data-live-search="true" name="starting_province" title="Chọn tỉnh/thành phố xuất phát" required="">
													@foreach($provinces as $province)
												  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}" >{{$province->name}}</option>
													@endforeach	
												</select>						
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Quận/Huyện xuất phát</label>
											<div class="field-input">
												<select class="selectpicker form-control my-2" data-live-search="true" name="starting_district" title="Chọn quận/huyện xuất phát" required="">
													@foreach($districts as $district)
												  		<option value="{{$district->id}}" data-tokens="{{$district->convertNameToEn()}}" >{{$district->name}}</option>
													@endforeach	
												</select>						
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Địa điểm qua</label>
											<div class="field-input">
												<input type="text" class="video-form" id="locationUser" name="route_point" required="">			
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Tỉnh/Thành phố đến</label>
											<div class="field-input">
												<select class="selectpicker form-control my-2" data-live-search="true" name="end_province" title="Chọn tỉnh/thành phố đến phát" required="">
													@foreach($provinces as $province)
												  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}">{{$province->name}}</option>
													@endforeach	
												</select>
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Quận/Huyện đến</label>
											<div class="field-input">
												<select class="selectpicker form-control my-2" data-live-search="true" name="end_district" title="Chọn tỉnh/thành phố xuất phát" required="">
													@foreach($districts as $district)
												  		<option value="{{$district->id}}" data-tokens="{{$district->convertNameToEn()}}" >{{$district->name}}</option>
													@endforeach	
												</select>						
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Giá (vnđ/1km)</label>
											<div class="field-input">
												<input type="number" class="video-form my-1" id="cost" name="cost" required="">
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Ngày dự kiến</label>
											<div class="field-input">
												<input type="date" class="video-form my-1" id="date" name="date" required="">
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Thời gian dự kiến</label>
											<div class="field-input">
												<input type="time" class="video-form my-1" id="time" name="time" required="">
											</div>											
										</div>

										
										<button type="submit" class="change-btn btn-link">Tạo</button>
									</form>
								</div>
							</div>							
						</div>		
																																
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!--my-account-tabs end-->

@endsection