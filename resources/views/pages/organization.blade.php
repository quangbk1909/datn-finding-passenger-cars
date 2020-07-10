@extends('layout.index')

@section("css")
	<style>
		.list-unstyled a{
			color: gray;
		}
		.list-unstyled a:hover {
		  color: orange;
		}
	</style>
@endsection

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
	<!--title-bar end-->
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
												<a href="organization/{{$organization->id}}"><span><i class="fas fa-phone"></i></span> {{$organization->hotline}}</a>
											</div>
										</li>
										<li>
											<div class="website" title="Email">
												<a href="organization/{{$organization->id}}"><span><i class="fas fa-envelope"></i></span> {{$organization->email}}</a>
											</div>										
										</li>
										<li>
											<div class="website" title="{{$organization->address}}">
												<a href="organization/{{$organization->id}}"><span><i class="fas fa-map-marker-alt"></i></span> 
													@if (strlen($organization->address) > 30)
														{{substr($organization->address, 0,30)}}...
													@else
														{{$organization->address}}
													@endif
												</a>
											</div>										
										</li>
										<li>
											<a href="organization/management/{{$organization->id}}" class="setting-btn btn-link"><span><i class="fas fa-cog"></i></span>Cài đặt</a>
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
	<!--partners start-->
	<section class="all-partners">			
		<div class="container">		
			<div class="row">		
				<div class="col-lg-3 col-md-4">
					<div class="popular-restaurants">
						<h4>Người sáng lập </h4>
						<div class="popular-restaurants-items">
							<ul class="list-unstyled">
								<li>
									@if ($organization->owner->avatar != "")
										<img style="width: 80px;height: 80px;" src="{{$organization->owner->avatar}}" class="img-responsive" alt="image" title="image">
									@else 
										
										<img style="width: 80px;height: 80px;" src="assets/images/user/avatar/non-avatar.png" class="img-responsive" alt="image" title="image">
									@endif
									<div class="caption  mt-3">
										<h4 class="font-weight-bold">{{$organization->owner->name}}</h4>
									</div>
								</li>
							</ul>					
						</div>							
					</div>
					<div class="popular-restaurants">
						<h4>Thành viên</h4>
						<div class="popular-restaurants-items">
							<ul class="list-unstyled">
								@foreach($staff as $employee)
								<li>
									@if ($employee->avatar != "")
										<img style="width: 80px;height: 80px;" src="{{$employee->avatar}}" class="img-responsive" alt="image" title="image">
									@else 
										<img style="width: 80px;height: 80px;" src="assets/images/user/avatar/non-avatar.png" class="img-responsive" alt="image" title="image">
									@endif
									<div class="caption  mt-3">
										<h4 class="font-weight-bold">{{$employee->name}}</h4>
									</div>
								</li>
								@endforeach
								<a href="organization/management/{{$organization->id}}">Xem hết</a>
							</ul>					
						</div>							
					</div>
					
		
				</div>	
				<div class="col-lg-6 col-md-8">
					@foreach($coachs as $coach)
						<div class="partner-section">
							<div class="partner-bar">
								<div class="partner-topbar">
									<div class="partner-dt">
										<a href="#"><img src="{{$coach->photo_path}}" alt=""></a>
										<div class="partner-name">
											<a href="#"><h4>{{$coach->name}}</h4></a>
											<p><span><i class="fas fa-map-marker-alt"></i></span>Điểm xuất phát : {{$coach->specific_starting_location}}</p>
											<p><span><i class="fas fa-map-marker-alt"></i></span>Điểm dừng : {{$coach->specific_end_location}}</p>
										</div>
										
									</div>
								</div>
								<div class="partner-subbar">
									<div class="detail-text">
										<ul>
											<li>Chuyến đầu - Chuyến cuối : {{$coach->timer->first()->started_time}} - {{$coach->timer->last()->started_time}}</li>
											<li>Chuyến tiếp theo : {{$coach->getTimeRemaining()}} phút</li>
											<li>Trì hoãn : {{$coach->fixed_time}} phút</li>
											<li>Giá vé : {{number_format($coach->cost)}} vnđ</li>
											<li>Số khách : {{$coach->number_current_passenger}}/{{$coach->capacity}}</li>
											
											<li>Đánh giá : 
												<div class="review-stars">
													@php
														$star = round($coach->getAverageRatingStar(), 1);
														$integerPart = (int)$star;
														$decimalPart = $star - $integerPart;
													@endphp
													@if($star == 0) 
														<p>chưa có đánh giá</p>
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
											</li>
										</ul>
									</div>
								</div>
								@if ($isStaff)
									<div class="partner-bottombar">
										<ul class="bottom-partner-links">
											<li><a href="/organization/{{$organization->id}}/coach/update-status/{{$coach->id}}" data-toggle="tooltip" data-placement="top" title="Call Now"><i class="fas fa-info-circle"></i>Cập nhật trạng thái</a></li>
											<li class="line-lr"><a href="/organization/{{$organization->id}}/coach/update/{{$coach->id}}" data-toggle="tooltip" data-placement="top" title="Order Now"><i class="fas fa-edit"></i>Sửa thông tin</a></li>
											<li><a href="organization/{{$organization->id}}/coach/delete/{{$coach->id}}" onclick="return confirm('Bạn chắc chắn muốn xóa chuyến xe khỏi hãng?');" data-toggle="tooltip" data-placement="top" title="View Menu"><i class="fas fa-trash-alt"></i>Xóa xe</a></li>
										</ul>
									</div>
								@endif
							</div>
						</div>
				
					@endforeach
					
					<div class="main-p-pagination">
						<nav aria-label="Page navigation example">
						  @if(isset($coachs))
								{{$coachs->appends(request()->input())->links()}}
							@endif
						</nav>

					</div>


				</div>
				<div class="col-lg-3 col-md-4 ">
					<div class="mb-3">
						<form class="form-inline mr-auto" action="organization/{{$organization->id}}/coach/searching" method="GET" enctype="multipart/form-data">
							
						  <input class="form-control mr-sm-2" type="text" name="searching" placeholder="Tìm xe" aria-label="Search">
						  <button class="btn btn-outline-warning btn-rounded btn-sm my-0" type="submit"><i class="text-warning">Search</i></button>
						</form>
					</div>
					<div class="mb-3">
						<a href="organization/management/{{$organization->id}}" class="btn btn-warning btn-rounded btn-sm my-0" type="submit"><i class="text-light">Thêm chuyến mới</i></a>
					</div>

					@if (!$isStaff)
						<div class="popular-restaurants">
							<h4>Hãng phổ biến khác </h4>	
							<div class="popular-restaurants-items">
								<ul class="list-unstyled">
									@foreach ($othersOrganization as $another)
										<li>
											<a href="organization/{{$another->id}}"><img src="{{$another->logo}}" class="img-responsive" alt="image" title="image"></a>
											<div class="caption">
												<a href="restaurant_detail.html"><h4 class="font-weight-bold">{{$another->name}}</h4></a>
												<p><span><i class="fas fa-phone"></i></span> {{$another->hotline}}</p>
												<p title="{{$another->address}}"><span><i class="fas fa-map-marker-alt"></i> {{substr($another->address, 0,20)}}...</p>
											</div>
										</li>
									@endforeach
									
									
								</ul>					
							</div>							
						</div>
					@endif
				</div>
			</div>			
		</div>
	</section>
			
	<!--partners end-->
@endsection



