@extends('layout.index')


@section('content')
	<section class="title-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="left-title-text">
					<h3>Hãng Xe</h3>
					</div>
				</div>
				<div class="col-md-6">
					<div class="right-title-text">  
						<ul>
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Hãng xe</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
		<!--my-account start-->
	<section class="my-account">			
		<div class="profile-bg">
			<img style="width: 2000px;height: 400px;" src="{{$organization->cover_image}}" alt="Responsive image">
			<div class="my-Profile-dt">
				<div class="container">
					<div class="row">
						<div class="container">							
							<div class="profile-dpt">
								<img style="width: 220px;height: 220px;" src="{{$organization->logo}}" alt="">
							</div>
							<div class="profile-all-dt">
								<div class="profile-name-dt mt-3">
									<h1>{{$organization->name}}</h1>
								</div>
								<div class="profile-dt">
									<ul>
										<li>
											<div class="phone-no" >
												<a href="#"><span><i class="fas fa-phone"></i></span> {{$organization->hotline}}</a>
											</div>
										</li>
										<li>
											<div class="website" title="Email">
												<a href="#"><span><i class="fas fa-envelope"></i></span> {{$organization->email}}</a>
											</div>										
										</li>
										<li>
											<div class="website" title="{{$organization->address}}">
												<a href="#"><span><i class="fas fa-map-marker-alt"></i></span> 
													@if (strlen($organization->address) > 30)
														{{substr($organization->address, 0,30)}}...
													@else
														{{$organization->address}}
													@endif
												</a>
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
									<h4>Cập nhật thông tin chuyến xe {{$coach->name}}</h4>
									<a href="organization/{{$organization->id}}"><i class="fas fa-angle-double-left"></i>Back</a>
									
								</div>
								<div class="edit-profile">
									<form action="organization/{{$organization->id}}/coach/update/{{$coach->id}}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
												<div class="input-heading">Tải lên ảnh của xe</div>	
												<input  type="file" multiple="" name="coach_image" accept="image/*">
										</div>
										<div class="form-group">
											<label for="nameUser">Tên chuyến</label>
											<input type="text" class="video-form" name="coach_name" placeholder="Bến xe ABC - Bến xe CDE" value="{{$coach->name}}" required="">							
										</div>
										<div class="form-group">
											<label for="locationUser">Tỉnh/Thành phố xuất phát</label>
											<div class="field-input">
												<select class="selectpicker form-control my-2" data-live-search="true" name="starting_province" title="Chọn tỉnh/thành phố xuất phát" required="">
													@foreach($provinces as $province)
												  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}" @if ($province->id == $coach->startingProvinceCity->id)
												  			selected="" 
												  		@endif>{{$province->name}}</option>
													@endforeach	
												</select>						
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Địa điểm đón khách</label>
											<div class="field-input">
												<input type="text" class="video-form" id="locationUser" name="specific_starting_location" value="{{$coach->specific_starting_location}}" required="">			
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Tỉnh/Thành phố đến</label>
											<div class="field-input">
												<select class="selectpicker form-control my-2" data-live-search="true" name="end_province" title="Chọn tỉnh/thành phố xuất phát" required="">
													@foreach($provinces as $province)
												  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}" @if ($province->id == $coach->endProvinceCity->id)
												  			selected="" 
												  		@endif>{{$province->name}}</option>
													@endforeach	
												</select>
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Địa điểm trả khách</label>
											<div class="field-input">
												<input type="text" class="video-form" id="locationUser" name="specific_end_location" value="{{$coach->specific_end_location}}" required="">		
											</div>											
										</div>
										<div class="form-group">
											<label for="textareaDescription">Lộ trình chuyến đi</label>
											<textarea class="text-area" id="textareaDescription" name="route" required="">{{$coach->route}}</textarea>							
										</div>
										<div class="form-group">
											<label for="emailAddress">Số ghế</label>
											<input type="number" class="video-form" id="emailAddress" name="capacity" value="{{$coach->capacity}}" required="">							
										</div>
										<div class="form-group">
											<label for="telPhone">Giá vé</label>
											<input type="number" class="video-form" id="telPhone" name="cost" value="{{$coach->cost}}" required="">							
										</div>
										
										<button type="submit" class="change-btn btn-link">Cập nhật</button>
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