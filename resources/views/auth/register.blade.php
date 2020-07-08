@extends('layout.index')

@section('content')


	<section class="login_register">			
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
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6 col-12">
					<h1>Tạo tài khoản</h1>
					<div class="login-container">
						<div class="row">			
							<div class="col-lg-12 col-md-12 col-12">
								<form action="signup" method="POST" enctype="multipart/form-data">	
									@csrf
									<div class="login-form">	
										<div class="login-logo">									
											<a href=""><img src="images/logo.jpg" alt=""></a>
										</div>
										<div class="form-group">
											<input type="text" class="video-form" id="name" name="name" placeholder="Họ tên" required="">							
										</div>
										<div class="form-group">
											<input type="email" class="video-form" id="email" name="email" placeholder="Email đăng nhập" required="">							
										</div>
										<div class="form-group">
											<input type="text" class="video-form" id="phone_number" name="phone_number"  placeholder="Số điện thoại" required="">						
										</div>
										<div class="form-group">
											<input type="password" class="video-form" id="password" name="password" placeholder="Mật khẩu" required="">							
										</div>
										<div class="form-group">
											<input type="password" class="video-form" id="password_confirmation" name="password_confirmation" placeholder="Xác nhận lại mật khẩu" required="">
										</div>
										
										<button type="submit" class="login-btn btn-link">Đăng ký</button>
										<div class="forgot-password">	
											<p>Bạn đã có tài khoản?<a href="login"><span style="color:#ffa803;"> - Đăng nhập ngay</span></a></p>
										</div>										
									</div>	
								</form>		
							</div>
						</div>						
					</div>						
				</div>				
			</div>			
		</div>
	</section>

@endsection