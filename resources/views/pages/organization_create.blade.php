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
							<li class="breadcrumb-item" aria-current="page">Hãng xe</li>
							<li class="breadcrumb-item active" aria-current="page">Thêm</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	
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
					<div class="tab-pane" id="edit-profile">
						<div class="timeline">
							<div class="tab-content-heading">
								<h4>Tạo hãng xe mới</h4>
							</div>
							<div class="edit-profile">
								<form action="organization/create/new" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<div class="input-heading">Tải lên logo mới của hãng</div>	
										<input  type="file" name="logo" accept="image/*" required="">
									</div>
									<div class="form-group">
										<div class="input-heading">Tải lên ảnh bìa mới của hãng</div>	
										<input  type="file" name="cover_image" accept="image/*" required="">
									</div>
									<div class="form-group">
										<label for="name">Tên hãng</label>
										<input type="text" class="video-form" id="name" name="name" required="">							
									</div>
									<div class="form-group">
										<label for="email">Email Address*</label>
										<input type="email" class="video-form" id="email" name="email" required="">							
									</div>
									<div class="form-group">
										<label for="hotline">Phone Number*</label>
										<input type="text" class="video-form" id="hotline" name="hotline" required="" >							
									</div>
									<div class="form-group">
										<label for="address">Địa chỉ liên hệ</label>
										<input type="text" class="video-form" id="address" name="address" required="">							
									</div>
									<button type="submit" class="change-btn btn-link">Thêm</button>
								</form>
							</div>
						</div>							
					</div>						
				</div>
			</div>
		</div>
	</section>
	<!--my-account-tabs end-->

@endsection

