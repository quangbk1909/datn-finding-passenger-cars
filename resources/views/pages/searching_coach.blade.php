@extends('layout.index')

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
							<li class="breadcrumb-item"><a href="">Trang chủ</a></li>
							<li class="breadcrumb-item " aria-current="page">xe khách</li>
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
						<form action="coach/search" method="POST" enctype="multipart/form-data" >
							@csrf
							<div class="filter-heading">						
								<h3>Filters</h3>
							</div>						
							<div class="accordion" id="accordionone">
								<div class="location">
								<button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Địa điểm</button>
									<div id="collapseOne" class="collapse show" data-parent="#accordionone">
										<div class="search-area">
											
												<select class="selectpicker form-control my-2" data-live-search="true" name="starting_province" title="Chọn tỉnh/thành phố xuất phát">
													@foreach($provinces as $province)
														<option value="">Không xác định</option>
												  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}" @if ((isset($startingProvince))&&($province->id == $startingProvince))
												  			selected="" 
												  		@endif>{{$province->name}}</option>
													@endforeach	
												</select>
												<select class="selectpicker form-control my-2" data-live-search="true" name="end_province" title="Chọn tỉnh/thành phố đến" >
													@foreach($provinces as $province)
														<option value="">Không xác định</option>
												  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}" @if((isset($endProvince))&& ($province->id == $endProvince))
												  			selected="" 
												  		@endif>{{$province->name}}</option>
													@endforeach
												</select>	
												<div class="form-group my-2">
												    <input type="text" class="form-control" id="drop_off_place" name="specific_location" placeholder="Điền địa điểm xuống" @if ($specificLocation != "")
												    	value="{{$specificLocation}}" 
												    @endif>
												</div>
									
										</div>									
									</div>
								</div>
							</div>
							<div class="accordion" id="accordiontwo">
								<div class="location">
									@if ($max_cost != 0)
										<button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Giá vé</button>
										<div id="collapseTwo" class="collapse show" data-parent="#accordiontwo">								
											<div class="form-group my-2">
											    <input type="number" class="form-control" name="max_cost"  placeholder="Giá vé nhỏ hơn" value="{{$max_cost}}" >
											</div>															
										</div>
									@else 
										<button class="filter-dropdown collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Giá vé</button>
										<div id="collapseTwo" class="collapse" data-parent="#accordiontwo">								
											<div class="form-group my-2">
											    <input type="number" class="form-control" name="max_cost"  placeholder="Giá vé nhỏ hơn" value="{{$max_cost}}" >
											</div>															
										</div>
									@endif						
									
								</div>
							</div>
							<div class="accordion" id="accordionthree">
								<div class="location">		
								@if (isset($seats))
									<button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Loại xe</button>
									<div id="collapseThree" class="collapse show" data-parent="#accordionthree">									
										<div class="filter-checkbox">
											<p>
											  <input type="checkbox" id="c18" name="seats[]" value="0-16" @if (in_array("0-16", $seats))
											  	checked="" 
											  @endif>
											  <label for="c18">Nhỏ hơn 16 chỗ</label>
											</p>
											<p>
											  <input type="checkbox" id="c19" name="seats[]" value="17-29" @if (in_array("17-29", $seats))
											  	checked="" 
											  @endif>
											  <label for="c19">17 đến 29 chỗ</label>
											</p>
											<p>
											  <input type="checkbox" id="c20" name="seats[]" value="30-34" @if (in_array("30-34", $seats))
											  	checked="" 
											  @endif>
											  <label for="c20">30 đến 34 chỗ</label>
											</p>
											
											<p>
											  <input type="checkbox" id="c22" name="seats[]" value="35-39" @if (in_array("35-39", $seats))
											  	checked="" 
											  @endif>
											  <label for="c22">35 đến 39 chỗ</label>
											</p>
											<p>
											  <input type="checkbox" id="c23" name="seats[]" value="40-46" @if (in_array("40-46", $seats))
											  	checked="" 
											  @endif>
											  <label for="c23">40 đến 46 chỗ</label>
											</p>
											
										</div>																		
									</div>
								@else 
									<button class="filter-dropdown collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Loại xe</button>
									<div id="collapseThree" class="collapse" data-parent="#accordionthree">									
										<div class="filter-checkbox">
											<p>
											  <input type="checkbox" id="c18" name="seats[]" value="0-16">
											  <label for="c18">Nhỏ hơn 16 chỗ</label>
											</p>
											<p>
											  <input type="checkbox" id="c19" name="seats[]" value="17-29">
											  <label for="c19">17 đến 29 chỗ</label>
											</p>
											<p>
											  <input type="checkbox" id="c20" name="seats[]" value="30-34">
											  <label for="c20">30 đến 34 chỗ</label>
											</p>
											
											<p>
											  <input type="checkbox" id="c22" name="seats[]" value="35-39">
											  <label for="c22">35 đến 39 chỗ</label>
											</p>
											<p>
											  <input type="checkbox" id="c23" name="seats[]" value="40-46">
											  <label for="c23">40 đến 46 chỗ</label>
											</p>
											
										</div>																		
									</div>
								@endif
								</div>
							</div>	
							<div class="accordion" id="accordionsix">
								<div class="location">
									@if ($star != 0)
										<button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">Rating</button>
										<div id="collapseSix" class="collapse show"  data-parent="#accordionsix">									
											<div class="filter-checkbox">
												<p>
												  <input type="radio" id="c47" name="rating_star" value="5" @if ($star == 5)
												  	checked="" 
												  @endif>
												  <label for="c47" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
												</p>
												<p>
												  <input type="radio" id="c48" name="rating_star" value="4" @if ($star == 4)
												  	checked="" 
												  @endif>
												  <label for="c48" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
												</p>
												<p>
												  <input type="radio" id="c49" name="rating_star" value="3" @if ($star == 3)
													checked="" 
												  @endif>
												  <label for="c49" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
												</p>
												<p>
												  <input type="radio" id="c50" name="rating_star" value="2" @if ($star == 2)
													checked="" 
												  @endif>
												  <label for="c50" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
												</p>
												<p>
												  <input type="radio" id="c51" name="rating_star" value="1" @if ($star == 1)
												  	checked="" 
												  @endif>
												  <label for="c51" class="rating-color"><i class="fas fa-star"></i></label>
												</p>																																																		
											</div>																		
										</div>					
									@else 
										<button class="filter-dropdown collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Rating</button>
										<div id="collapseSix" class="collapse"  data-parent="#accordionsix">									
											<div class="filter-checkbox">
												<p>
												  <input type="radio" id="c47" name="rating_star" value="5" >
												  <label for="c47" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
												</p>
												<p>
												  <input type="radio" id="c48" name="rating_star" value="4" >
												  <label for="c48" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
												</p>
												<p>
												  <input type="radio" id="c49" name="rating_star" value="3" >
												  <label for="c49" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
												</p>
												<p>
												  <input type="radio" id="c50" name="rating_star" value="2">
												  <label for="c50" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
												</p>
												<p>
												  <input type="radio" id="c51" name="rating_star" value="1" >
												  <label for="c51" class="rating-color"><i class="fas fa-star"></i></label>
												</p>																																																		
											</div>																		
										</div>	
									@endif						
									
								</div>
							</div>
							<button type="submit" class="my-2 btn btn-block search-btn btn-link" >Filter</button>

						</form>
												
					</div>
				</div>
				<div class="col-lg-9 col-md-8">
					<div class="col-lg-12 col-md-12 m-left m-right">
						<div class="all-meals-show">
							<div class="new-heading">
								<h1> Kết Quả Tìm Kiếm </h1>
								<div class="loc-title">
									Xe khách phù hợp
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						@if(isset($coachs))
							@foreach($coachs as $coach)
								<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
									<div class="all-meal">
										<div class="top">
											<a href="coach/{{$coach->id}}"><div class="bg-gradient"></div></a>
											<div class="top-img">
												<img style="width: 260px;height: 160px;" src="{{$coach->photo_path}}" alt="">
											</div>
											<div class="logo-img">
												<img style="width: 64px;height: 64px;" src="{{$coach->organization->logo}}" alt="">
											</div>
											<div class="top-text">
												<div class="heading"><h4><a href="organization/{{$coach->organization->id}}">{{$coach->organization->name}}</a></h4></div>
												<div class="sub-heading">
												<p>{{number_format($coach->cost)}} vnđ</p>
												</div>
											</div>
										</div>
										<div class="bottom">
											<div class="bottom-text">
												<div class="delivery font-weight-bold"><a href="coach/{{$coach->id}}">{{$coach->name}}</a></div>
												<div class="delivery"><i class="fas fa-users"></i>Số lượng khách : {{$coach->number_current_passenger}}/{{$coach->capacity}}</div>
												<div class="time"><i class="far fa-clock"></i>Chuyến tiếp theo : {{$coach->getTimeRemaining() + $coach->fixed_time}} phút</div>

												<div class="star">
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
													<div class="comments"><a href="coach/{{$coach->id}}#reviews"><i class="fas fa-comment-alt"></i>{{count($coach->rating)}}</a></div>
												</div>								
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
									@if(isset($coachs))
										{{$coachs->appends(request()->input())->links()}}
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