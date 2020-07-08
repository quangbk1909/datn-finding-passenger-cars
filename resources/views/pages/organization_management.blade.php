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
							<li class="breadcrumb-item"><a href="">Trang chủ</a></li>
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
				<div class="col-lg-3 col-md-4 col-12">
					<div class="left-tab-links">
						<div class="nav nav-pills nav-stacked nav-tabs ui vertical menu fluid">
							<a href="#add-coach"  data-toggle="tab" class="item user-tab cursor-pointer active">Thêm chuyến mới</a>
							@if ($isOwner)
							<a href="#add-user" data-toggle="tab" class="item user-tab cursor-pointer">Thêm thành viên</a>
							@endif
							<a href="#list-user" data-toggle="tab" class="item user-tab cursor-pointer">Danh sách thành viên</a>
							<a href="#edit-profile" data-toggle="tab" class="item user-tab cursor-pointer">Sửa thông tin</a>
						</div>						
					</div>				
				</div>
				<div class="col-lg-9 col-md-8 col-12">
					<div class="tab-content">		
						<div class="tab-pane active" id="add-coach">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Thêm chuyến xe</h4>
									<a href="organization/{{$organization->id}}"><i class="fas fa-angle-double-left"></i>Back</a>
									
								</div>
								<div class="edit-profile">
									<form action="organization/{{$organization->id}}/coach/create" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
												<div class="input-heading">Tải lên ảnh của xe</div>	
												<input  type="file" name="coach_image" accept="image/*" required="" max>
										</div>
										<div class="form-group">
											<label for="nameUser">Tên chuyến</label>
											<input type="text" class="video-form" name="coach_name" placeholder="Bến xe ABC - Bến xe CDE" required="">							
										</div>
										<div class="form-group">
											<label for="locationUser">Tỉnh/Thành phố xuất phát</label>
											<div class="field-input">
												<select class="selectpicker form-control my-2" data-live-search="true" name="starting_province" title="Chọn tỉnh/thành phố xuất phát" required="">
													@foreach($provinces as $province)
												  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}">{{$province->name}}</option>
													@endforeach	
												</select>						
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Địa điểm đón khách</label>
											<div class="field-input">
												<input type="text" class="video-form" id="locationUser" name="specific_starting_location" placeholder="VD: Bến xe ABC" required="">			
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Tỉnh/Thành phố đến</label>
											<div class="field-input">
												<select class="selectpicker form-control my-2" data-live-search="true" name="end_province" title="Chọn tỉnh/thành phố xuất phát" required="">
													@foreach($provinces as $province)
												  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}">{{$province->name}}</option>
													@endforeach	
												</select>
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Địa điểm trả khách</label>
											<div class="field-input">
												<input type="text" class="video-form" id="locationUser" name="specific_end_location" placeholder="Bến xe XYZ" required="">		
											</div>											
										</div>
										<div class="form-group">
											<label for="locationUser">Thời gian xuất phát các chuyến trong ngày</label>
											<div class="field-input">
												<input type="text" class="video-form" id="timer" name="timer" placeholder="hh:mm:ss,hh:mm:ss,..." required="">	
												<input type="time" class="video-form my-1" onchange="handler(event);" id="appt" name="appt" >
											</div>											
										</div>
										<div class="form-group">
											<label for="textareaDescription">Lộ trình chuyến đi</label>
											<textarea class="text-area" id="textareaDescription" name="route" required="" placeholder="Địa điểm 1 - điểm 2 - điểm 3"></textarea>							
										</div>
										<div class="form-group">
											<label for="emailAddress">Số ghế</label>
											<input type="number" class="video-form" id="emailAddress" name="capacity"  required="">							
										</div>
										<div class="form-group">
											<label for="telPhone">Giá vé</label>
											<input type="number" class="video-form" id="telPhone" name="cost"  required="">							
										</div>
										
										<button type="submit" class="change-btn btn-link">Thêm</button>
									</form>
								</div>
							</div>							
						</div>		

						@if ($isOwner)
						<div class="tab-pane" id="add-user">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Thêm thành viên</h4>
								</div>
								<div class="edit-profile">
									<form action="organization/{{$organization->id}}/staff/add" method="POST" enctype="multipart/form-data">									@csrf	
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" class="video-form" id="email" name="user_mail" placeholder="Điền email của nhân viên được thêm">							
										</div>																
										<button type="submit" class="change-btn btn-link">Thêm</button>
									</form>
								</div>
							</div>					
						</div>	
						@endif
						
						<div class="tab-pane" id="list-user">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Danh sách nhân viên</h4>						
								</div>
								<div class="about-dtp">
									<div class="follow-bg">
										<ul>
											@foreach ($staffs as $staff)
												<li>
													<div class="suggestion-usd-2">
														<a href="#"><img style="width: 40px;height: 40px;" src="{{$staff->avatar}}" alt=""></a>
														<div class="sgt-text-2">
															<a href="#"><h4>{{$staff->name}}</h4></a>
															<p><span><i class="fas fa-envelope"></i></span> {{$staff->email}}<p>
														</div>
														@if ($isOwner)
															<button class="btn-link"><a class="text-light" href="organization/{{$organization->id}}/staff/delete/{{$staff->id}}">Delete</a></button>
														@endif
														
													</div>
												</li>
											@endforeach
											
										</ul>
									</div>
									<div class="main-p-pagination">
										<nav aria-label="Page navigation example">
										  @if(isset($staffs))
												{{$staffs->appends(request()->input())->links()}}
											@endif
										</nav>

									</div>
								</div>
							</div>
						</div>


						<div class="tab-pane" id="edit-profile">
							<div class="timeline">
								<div class="tab-content-heading">
									<h4>Sửa thông tin</h4>
								</div>
								<div class="edit-profile">
									<form action="organization/{{$organization->id}}/update/info" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<div class="input-heading">Tải lên logo mới của hãng</div>	
											<input  type="file" name="logo" accept="image/*">
										</div>
										<div class="form-group">
											<div class="input-heading">Tải lên ảnh bìa mới của hãng</div>	
											<input  type="file" name="cover_image" accept="image/*">
										</div>
										<div class="form-group">
											<label for="name">Tên hãng</label>
											<input type="text" class="video-form" id="name" name="name" value="{{$organization->name}}">							
										</div>
										<div class="form-group">
											<label for="email">Email Address*</label>
											<input type="email" class="video-form" id="email" name="email" value="{{$organization->email}}">							
										</div>
										<div class="form-group">
											<label for="hotline">Phone Number*</label>
											<input type="text" class="video-form" id="hotline" name="hotline" value="{{$organization->hotline}}">							
										</div>
										<div class="form-group">
											<label for="address">Địa chỉ liên hệ</label>
											<input type="text" class="video-form" id="address" name="address" value="{{$organization->address}}">							
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

@section("script")
	<script>
		function handler(e) {
			var timer = $("#timer").val();
			if (timer == "") {
				$("#timer").val(e.target.value);
			} else {
				timer += "," + e.target.value;
				$("#timer").val(timer);
			}
		}
	</script>
@endsection