@extends('layout.index')

@section('css')
	<link href="css/thumbnail.slider.css" rel="stylesheet">
	<link rel="stylesheet" href="css/simple-rating.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
@endsection
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
							<li class="breadcrumb-item active" aria-current="page">xe khách</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--title-bar end-->
	<!--meal-detail-start-->
	<section class="all-partners">			
		<div class="container">		
			<div class="row">					
				<div class="col-lg-8 col-md-8">
					<div id="sync1" class="owl-carousel owl-theme">
						<div class="item">
							<img src="{{$coach->photo_path}}" alt="">
						</div>
						<div class="item">
							<img src="images/meal-detail/img-2.jpg" alt="">
						</div>
						<div class="item">
							<img src="images/meal-detail/img-3.jpg" alt="">
						</div>
						<div class="item">
							<img src="images/meal-detail/img-4.jpg" alt="">
						</div>
											
					</div>

					<div id="sync2" class="owl-carousel owl-theme">
						<div class="item">
							<img src="{{$coach->photo_path}}" alt="">
						</div>
						<div class="item">
							<img src="images/meal-detail/thumb-2.jpg" alt="">
						</div>
						<div class="item">
							<img src="images/meal-detail/thumb-3.jpg" alt="">
						</div>
						<div class="item">
							<img src="images/meal-detail/thumb-4.jpg" alt="">
						</div>
					</div>
					
					<div class="resto-meal-dt">
						<div class="resto-detail">
							<div class="resto-picy">
								<a href="restaurant_detail.html"><img style="width: 64px;height: 64px;" src="{{$coach->organization->logo}}" alt=""></a>
							</div>
							<div class="name-location mt-3">
								<a href="restaurant_detail.html"><h1>{{$coach->organization->name}}</h1></a>
							</div>
						</div>
						<div class="right-side-btns">										
							<div class="resto-review-stars">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star-half"></i>							
								<span>4.5/5</span>									
							</div>
						</div>
					</div>
					<div class="all-tabs">
						<ul class="nav nav-tabs" role="tablist">
						<li class ="nav-item" role="presentation">
							<a href="#reviews" class="nav-link" aria-controls="reviews" role="tab" data-toggle="tab">03 Reviews</a>
						</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" role="tabpanel" id="comments">
								<div class="comment-post">
									<div class="post-items">										
										<div class="img-dp">
											<i class="fas fa-user"></i>
										</div>
										<form>
											<input type="text" class="post-input" name="post" placeholder="Write a comment">
											<input class="submit-btn btn-link" type="submit" value="Post Comment">
										</form>
									</div>
								</div>
								<div class="main-pagination">
									<nav aria-label="Page navigation example">
									  <ul class="pagination">
										<li class="page-item">
										  <a class="page-link" href="#" aria-label="Previous">
											<i class="fas fa-chevron-left"></i>
										  </a>
										</li>
										<li class="page-item"><a class="page-link active" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item">
										  <a class="page-link" href="#" aria-label="Next">
											<i class="fas fa-chevron-right"></i>
										  </a>
										</li>
									  </ul>
									</nav>
								</div>
							</div>
							
							<div class="tab-pane" role="tabpanel" id="reviews">
								<div class="comment-post">
									<div class="post-items">
										<a href="my_dashboard.html">
										<div class="img-dp">
											<i class="fas fa-user"></i>
										</div>									
										</a>
										<div class="select-rating">
											<h4 class="m-1 font-weight-bold">Đánh giá của bạn :</h4>
											<input class="rating"  value="0">
										</div>
										<form>
											<input type="text" class="rating-input" name="post" placeholder="Thêm mô tả cho đánh giá của bạn để nhà xe cải tiến!">
											<input class="rating-btn btn-link" type="submit" value="Gửi đánh giá">
										</form>
									</div>
								</div>
								<div class="main-comments">
									<div class="rating-1">
										<div class="user-detail-heading">
											<a href="user_profile_view.html"><img src="images/recipe-details/comment-5.png" alt=""></a>
											<h4> Joy Cutler</h4><br>
											<div class="rate-star">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="far fa-star"></i>								
												<span>4.5</span> 
											</div>
										</div>
										<div class="reply-time">											
											<p><i class="far fa-clock"></i>12 hours ago</p>
										</div>
										<div class="comment-description">
											<p>Morbi hendrerit ipsum vel feugiat maximus. Duis posuere justo neque, sit amet efficitur quam aliquam non. Integer gravida ex quis lacinia consectetur.</p>
										</div>
									</div>									
								</div>
								<div class="main-comments bm-margin">
									<div class="rating-1">
										<div class="user-detail-heading">
											<a href="user_profile_view.html"><img src="images/recipe-details/comment-3.png" alt=""></a>
											<h4> Jass Singh</h4><br>
											<div class="rate-star">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="far fa-star"></i>								
												<span>4.5</span> 
											</div>
										</div>
										<div class="reply-time">											
											<p><i class="far fa-clock"></i>12 hours ago</p>
										</div>
										<div class="comment-description">
											<p>Morbi hendrerit ipsum vel feugiat maximus. Duis posuere justo neque, sit amet efficitur quam aliquam non. Integer gravida ex quis lacinia consectetur.</p>
										</div>
									</div>									
								</div>
								
							</div>
						</div>					
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<div class="right-side">
						<div class="new-heading t-bottom">
							<h1>{{$coach->name}}</h1>
						</div>
						<div class="about-meal">
							<h4> Lộ trình - Thời gian</h4>
							<p>{{$coach->route}} </span></p>
							<p>Chuyến đầu - Chuyến cuối : {{$coach->timer->first()->started_time}} - {{$coach->timer->last()->started_time}}</p>
						</div>					
						<div class="price">
							<span>Giá vé:</span>
							<span>{{number_format($coach->cost)}} vnđ</span>
						</div>
						<div class="dt-detail">
							<ul>
								<li>
									<div class="delivery"><i class="fas fa-users"></i>Số lượng khách : {{$coach->number_current_passenger}}/{{$coach->capacity}}</div>
								</li>
								<li>
									<div class="time"><i class="far fa-clock"></i>Khởi hành sau: {{$coach->getTimeRemaining() + $coach->fixed_time}} phút</div>
								</li>
								<li>
									<div class="time"><i class="fas fa-location-arrow"></i>Điểm đón khách: {{$coach->specific_starting_location}}</div>
								</li>
								<li>
									<div class="time"><i class="fas fa-location-arrow"></i>Điểm trả khách: {{$coach->specific_end_location}}</div>
								</li>
							</ul>
						</div>
						
						<div class="order-now-check">
							<button class="on-btn btn-link" onclick="">Theo dõi</button>
						</div>
					</div>
						
				</div>
			</div>			
		</div>
	</section>			
	<!--meal-deail end-->
@endsection

@section("script")
	<script src="js/custom.js"></script>
	<script src="js/thumbnail.slider.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/simple-rating.js"></script>
	<script>
		$(document).ready(function(){
 			$('.rating').rating();
		});
	</script>
@endsection