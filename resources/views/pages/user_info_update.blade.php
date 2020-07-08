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
									<h4>Cập nhật thông tin</h4>
									<a href="user/dashboard"><i class="fas fa-angle-double-left"></i>Back</a>
								</div>
								<div class="edit-profile">
									<form action="user/info/update" method="POST" enctype="multipart/form-data">
										@csrf
										@if (isset($user->avatar))
											<div class="form-group mt-3">
												<img style="width: 220px;height: 220px;" src="{{$user->avatar}}" alt="">
											</div>
										@endif
										
										<div class="form-group">
											<div class="input-heading">Tải lên cá nhân mới</div>	
											<input  type="file" multiple="" name="avatar" accept="image/*">
										</div>
										<div class="form-group">
											<label for="name">Họ tên</label>
											<div class="field-input">
												<input type="text" class="video-form" id="name" name="name" required="" value="{{$user->name}}">		
											</div>											
										</div>
										<div class="form-group">
											<label for="gender">Giới tính</label>
											<select  class="video-form" id="gender" name="gender" required="" >		
												<option value="1" @if ($user->gender == 1)
													selected="" 
												@endif>Nữ</option>
												<option value="0" @if ($user->gender == 0)
													selected="" 
												@endif>Name</option>
											</select>					
										</div>
										<div class="form-group">
											<label for="dob">Ngày sinh</label>
											<div class="field-input">
												<input type="date" class="video-form my-1" id="dob" name="dob" value="{{$user->dob}}">
											</div>											
										</div>
										<div class="form-group">
											<label for="phone_number">Số điên thoại</label>
											<div class="field-input">
												<input type="text" class="video-form my-1" id="phone_number" name="phone_number" value="{{$user->phone_number}}">
											</div>											
										</div>
										<div class="form-group">
											<label for="address">Địa chỉ</label>
											<div class="field-input">
												<input type="text" class="video-form my-1" id="address" name="address" value="{{$user->address}}">
											</div>											
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

