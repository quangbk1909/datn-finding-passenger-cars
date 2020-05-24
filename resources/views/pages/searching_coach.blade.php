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
							<li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
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
						<div class="filter-heading">						
							<h3>Filters</h3>
						</div>						
						<div class="accordion" id="accordionone">
							<div class="location">
							<button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Địa điểm</button>
								<div id="collapseOne" class="collapse show" data-parent="#accordionone">
									<div class="search-area">
										<form class="form-group">
											<select class="selectpicker form-control my-2" data-live-search="true" title="Chọn tỉnh/thành phố xuất phát">
												@foreach($provinces as $province)
											  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}" @if ($province->id == $startingProvince)
											  			selected="" 
											  		@endif>{{$province->name}}</option>
												@endforeach	
											</select>
											<select class="selectpicker form-control my-2" data-live-search="true" title="Chọn tỉnh/thành phố đến">
												@foreach($provinces as $province)
											  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}" @if ($province->id == $endProvince)
											  			selected="" 
											  		@endif>{{$province->name}}</option>
												@endforeach
											</select>	
											<div class="form-group my-2">
											    <input type="text" class="form-control" id="drop_off_place"  placeholder="Điền địa điểm xuống">
											</div>
											<button type="submit" class="my-2 btn btn-block search-btn btn-link" >Filter</button>
										</form>
									</div>									
								</div>
							</div>
						</div>
						<div class="accordion" id="accordiontwo">
							<div class="location">							
								<button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Giá vé</button>
								<div id="collapseTwo" class="collapse" data-parent="#accordiontwo">								
									<div class="filter-checkbox">
										<p>
										  <input type="checkbox" id="c13" name="cb">
										  <label for="c13"> Breakfast</label>
										</p>
										<p>
										  <input type="checkbox" id="c14" name="cb">
										  <label for="c14">Lunch</label>
										</p>
										<p>
										  <input type="checkbox" id="c15" name="cb">
										  <label for="c15"> Dinner</label>
										</p>
										<p>
										  <input type="checkbox" id="c16" name="cb">
										  <label for="c16">Cafe's</label>
										</p>
										<p>
										  <input type="checkbox" id="c17" name="cb">
										  <label for="c17">Delivery</label>
										</p>																		
									</div>																		
								</div>
							</div>
						</div>
						<div class="accordion" id="accordionthree">
							<div class="location">							
								<button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Loại xe</button>
								<div id="collapseThree" class="collapse" data-parent="#accordionthree">									
									<div class="filter-checkbox">
										<p>
										  <input type="checkbox" id="c18" name="cb">
										  <label for="c18">Pizza</label>
										</p>
										<p>
										  <input type="checkbox" id="c19" name="cb">
										  <label for="c19">Drinks & Beer Restaurants</label>
										</p>
										<p>
										  <input type="checkbox" id="c20" name="cb">
										  <label for="c20">Cakes & Desserts</label>
										</p>
										<p>
										  <input type="checkbox" id="c21" name="cb">
										  <label for="c21">Sushi</label>
										</p>
										<p>
										  <input type="checkbox" id="c22" name="cb">
										  <label for="c22">Fast Food</label>
										</p>
										<p>
										  <input type="checkbox" id="c23" name="cb">
										  <label for="c23">Shawarma</label>
										</p>
										<p>
										  <input type="checkbox" id="c24" name="cb">
										  <label for="c24">Fish</label>
										</p>
										<p>
										  <input type="checkbox" id="c25" name="cb">
										  <label for="c25">Lunch</label>
										</p>														
										<p>
										  <input type="checkbox" id="c26" name="cb">
										  <label for="c26">Coffee Cafe’s</label>
										</p>
										<p>
										  <input type="checkbox" id="c27" name="cb">
										  <label for="c27">Cheese Tika</label>
										</p>
										<p>
										  <input type="checkbox" id="c28" name="cb">
										  <label for="c28">Samosa and Pakodas</label>
										</p>
										<p>
										  <input type="checkbox" id="c29" name="cb">
										  <label for="c29">Chinese</label>
										</p>										
									</div>																		
								</div>
							</div>
						</div>	
						<div class="accordion" id="accordionsix">
							<div class="location">							
								<button class="filter-dropdown" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Rating</button>
								<div id="collapseSix" class="collapse"  data-parent="#accordionsix">									
									<div class="filter-checkbox">
										<p>
										  <input type="checkbox" id="c47" name="cb">
										  <label for="c47" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
										</p>
										<p>
										  <input type="checkbox" id="c48" name="cb">
										  <label for="c48" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
										</p>
										<p>
										  <input type="checkbox" id="c49" name="cb">
										  <label for="c49" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
										</p>
										<p>
										  <input type="checkbox" id="c50" name="cb">
										  <label for="c50" class="rating-color"><i class="fas fa-star"></i><i class="fas fa-star"></i></label>
										</p>
										<p>
										  <input type="checkbox" id="c51" name="cb">
										  <label for="c51" class="rating-color"><i class="fas fa-star"></i></label>
										</p>																																																		
									</div>																		
								</div>
							</div>
						</div>						
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
						@foreach($coachs as $coach)
							<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
								<div class="all-meal">
									<div class="top">
										<a href="meal_detail.html"><div class="bg-gradient"></div></a>
										<div class="top-img">
											<img style="width: 260px;height: 160px;" src="{{$coach->photo_path}}" alt="">
										</div>
										<div class="logo-img">
											<img style="width: 64px;height: 64px;" src="{{$coach->organization->logo}}" alt="">
										</div>
										<div class="top-text">
											<div class="heading"><h4><a href="meal_detail.html">{{$coach->organization->name}}</a></h4></div>
											<div class="sub-heading">
											<p>{{number_format($coach->cost)}} vnđ</p>
											</div>
										</div>
									</div>
									<div class="bottom">
										<div class="bottom-text">
											<div class="delivery font-weight-bold"><a href="restaurant_detail.html">{{$coach->name}}</a></div>
											<div class="delivery"><i class="fas fa-shopping-cart"></i>Số lượng khách : {{$coach->number_current_passenger}}/{{$coach->capacity}}</div>
											<div class="time"><i class="far fa-clock"></i>Chuyến tiếp theo : {{$coach->getTimeRemaining() + $coach->fixed_time}} phút</div>

											<div class="star">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half"></i>								
												<span>4.5</span> 
												<div class="comments"><a href="#"><i class="fas fa-comment-alt"></i>05</a></div>
											</div>								
										</div>
									</div>
								</div>					
							</div>
						@endforeach
					</div>
					<div class="row">
						<div class="col-lg-12 col-md-12 ">
							<div class="main-p-pagination m-top">
								<nav aria-label="Page navigation example">
									<ul class="pagination">
										<li class="page-item">
											<a class="page-link" href="#" aria-label="Previous">
											<i class="fas fa-chevron-left"></i>
										</a>
										</li>
										<li class="page-item"><a class="page-link active" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">...</a></li>
										<li class="page-item"><a class="page-link" href="#">24</a></li>
										<li class="page-item">
										<a class="page-link" href="#" aria-label="Next">
											<i class="fas fa-chevron-right"></i>
											</a>
										</li>
									</ul>
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