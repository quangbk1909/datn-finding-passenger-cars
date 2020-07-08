<header id="header">
	<div class="menu">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-12 col-xs-12">
					<div class="menu-left text-center text-md-left">
						<div class="logo-box p-2">
							<a href=""><img src="images/logo.jpg" alt=""></a>
						</div>
					</div>
				</div>
				<div class="col-md-10 col-sm-12 col-xs-12">	
					<div class="menu-items">
						<nav class="navbar navbar-expand-lg navbar-light bg-light menu-right">										
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>

							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav mr-auto nav-text">
									<li class="nav-item active">
										<a class="nav-link" href="">Trang chủ </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="coach/search">Tìm xe khách</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="car/search">Xe tiện chuyến<img src="images/hot.gif" alt=""></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="user/search">Tìm hành khách</a>
									</li>
								</ul>											
							</div>
							
						</nav>
						<div class="icons-set">
							<ul class="list-inline">
								<li class="icon-items nav-item dropdown ">
								<a class="nav-link dropdown-toggle-no-caret" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i></a>										
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">	
									<div class="notification-item">													
										<div class="search-details">
											<form class="form-inline">
											  <input class="form-control " type="search" placeholder="Search" aria-label="Search">
											  <button class="s-btn btn-link " type="submit"><i class="fas fa-search"></i></button>
											</form>																																								
										</div>
									</div>												
								</div>		
								</li>
								@if (Auth::check())
								<li class="icon-items nav-item dropdown">
								<a class="nav-link dropdown-toggle-no-caret" href="#" id="navbarDropdown2" onclick="markNotiAsRead()" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i id="noti-bell" class="fas fa-bell"></i> 
									{{-- <span id="noti-bell" class="fa-stack fa-1x has-badge" data-count="3">
									  <i class="fa fa-bell fa-stack-1x "></i>
									</span> --}}

								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown2">	
									<div class="notification-item">
										<div class="property">
											<ul>
												<li><div class="setting"><a href="#">Tất cả</a></div></li>
											</ul>
										</div>
										<div id="noti-list" class="notification-details">														
											@if (!isset($notifications))
												<div class="media">
													<div  class="media-body ">
														<p >Không có thông báo.</p>																
													</div>
												</div>
											@else
												@foreach ($notifications as $notification)
													<a href="user/dashboard">
														<div class="media">
															<div class="media-body">
																<p>{{$notification->content}}</p>	
																<div class="comment-date">{{$notification->created_at}}</div>
															</div>
														</div>
													</a>
												@endforeach
											@endif
										</div>
									</div>												
								</div>	
								@endif
								</li>
								@if (Auth::check())
									<li class="nav-item dropdown">
									<a  class="dropdown-toggle-no-caret" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i>
										{{Auth::user()->name}}
										<i class="fas fa-caret-down"></i></a>
										<div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountDropdown">
										  <a class="dropdown-item" href="user/dashboard">Trang cá nhân</a>
										  @if (isset(Auth::user()->belongToOrganization))
										  	<a class="dropdown-item" href="organization/{{Auth::user()->belongToOrganization->id}}"> Tổ chức</a>
										  @else
											<a class="dropdown-item" href="organization/create/new"> Tổ chức</a>
										  @endif
										  
										  <a class="dropdown-item" href="logout"> Đăng xuất</a>
									    </div>
									</li>
								@else 
									<li class="partner-btn">
										<a href="login" class="b-btn btn-link">Đăng nhập</a>
									</li>			
								@endif										
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>				
</header>
