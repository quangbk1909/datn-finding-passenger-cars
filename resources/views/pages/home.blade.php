@extends('layout.index')

@section('content')
<section>
		<!--banner start-->
		<section class="block-preview">
			<div class="cover-banner" style="background-image: url(images/homepage/banner1.jpg)"></div>
			<div class="container">
				<div class="row">	
					<div class="col-lg-8 col-md-6 col-sm-12">
						<div class="left-text-b">
							<h1 class="title  font-weight-bold" >Chọn địa điểm, Tìm kiếm</h1>
							<h6 class="exeption">Chọn tỉnh bạn xuất phát và đến để tìm kiếm xe khách tốt nhất</h6>
							<p>Các thông tin chuyến đi sẽ được cung cấp đầy đủ</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
						<form>
							<div class="form-box">
								<div class="input-group-prepend">
								  <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
								</div>
								<input  class="find-address skills" name="search" type="text" placeholder="Chọn tỉnh/thành phố xuất phát"/>
								<div class="input-group-prepend">
								  <div class="input-group-text-1"><i class="fas fa-map-marker-alt"></i></div>
								</div>
								<input  class="find-resto skills" name="search" type="text" placeholder="Chọn tỉnh/thành phố đến"/>
								<button class="search-btn btn-link" type="button">Tìm xe khách</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!--banner end-->
		
		<!--how-to-work start-->
		<section class="how-to-work">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="work-item">
							<div class="work-img">
								<img src="images/homepage/how-to-work/img_1.jpg" alt="">
							</div>
							<div class="work-text">
								<h4>Tra cứu thông tin xe khách</h4>
								<p>Tìm kiếm xe khách đi các tỉnh. Cung cấp các thông tin trực tiếp từ quản lý nhà xe, địa điểm, thời gian xuất phát, trạng thái. số lượng ghế,...</p>
							</div>
						</div>
					</div><div class="col-md-4 col-sm-12 col-xs-12">
						<div class="work-item">
							<div class="work-img">
								<img src="images/homepage/how-to-work/img_2.png" alt="">
							</div>
							<div class="work-text">
								<h4>Kết nối xe chiều về</h4>
								<p>Kết nối hành khách với các xe ô tô con có chiều về cùng trong khoảng thời gian, tiết kiệm chi phí, tối ưu lợi nhuận.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">
						<div class="work-item">
							<div class="work-img">
								<img src="images/homepage/how-to-work/img_3.jpg" alt="">
							</div>
							<div class="work-text">
								<h4>Liên hệ đi chung</h4>
								<p>Kết nối các hành khách có cùng điểm xuất phát và điểm đến tiết kiệm chi phí đi xe con.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--how-to-work end-->	
		<!--discover-new-restaurants-&-book-now start-->
		<section class="new-restaurants-book-now">		
			<div class="container">
				<Div class="row">
					<div class="col-md-12">
						<div class="new-heading">
							<h1> Các Hãng Xe Nổi Bật </h1>
						</div>
					</div>
				</div>
				<div class="row">				
					<div class="col-md-12">						
						<div class="new-resto">
							<div class="large-12 columns">
								 <div class="owl-carousel dis-owl owl-theme">																																		
									<div class="item"><a href="#"><img src="images/homepage/resto-book/img_1.jpg" alt=""></a></div>														
									<div class="item"><a href="#"><img src="images/homepage/resto-book/img_2.jpg" alt=""></a></div>							
									<div class="item"><a href="#"><img src="images/homepage/resto-book/img_3.jpg" alt=""></a></div>	
									<div class="item"><a href="#"><img src="images/homepage/resto-book/img_4.jpg" alt=""></a></div>							
									<div class="item"><a href="#"><img src="images/homepage/resto-book/img_5.jpg" alt=""></a></div>							
									<div class="item"><a href="#"><img src="images/homepage/resto-book/img_1.jpg" alt=""></a></div>															
									<div class="item"><a href="#"><img src="images/homepage/resto-book/img_2.jpg" alt=""></a></div>															
									<div class="item"><a href="#"><img src="images/homepage/resto-book/img_3.jpg" alt=""></a></div>																						
								</div>         
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--discover-new-restaurants-&-book-now end-->	
		<!--order-food-online-in-your-area start-->
		<section class="order-food-online">		
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="new-heading">
							<h1> Xe Khách Theo Khu Vực </h1>
						</div>
						<div class="your-location">
							<span><i class="fas fa-map-marker-alt"></i>Hà Nội</span>Thay đổi vị trí
						</div>
						<div class="all-items">
							<div class="search col-lg-4 col-md-6 col-sm-12 col-xs-12">
								<form>
									<input  class="search-location" name="search" type="search" placeholder="Enter Your Location"/>
									<div class="icon-btn">
										<div class="cross-icon">
										<i class="fas fa-crosshairs"></i>
										</div>
										<div class="s-m-btn">
											<button class="search-meal-btn btn-link">Search</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<div class="all-meal">
							<div class="top">
								<a href="meal_detail.html"><div class="bg-gradient"></div></a>
								<div class="top-img">
									<img src="images/homepage/meals/img-1.jpg" alt="">
								</div>
								<div class="logo-img">
									<img src="images/homepage/meals/logo-1.jpg" alt="">
								</div>
								<div class="top-text">
									<div class="heading"><h4><a href="meal_detail.html">Bonn Burgur</a></h4></div>
									<div class="sub-heading">
									<h5><a href="restaurant_detail.html">Rooster</a></h5>
									<p>$5.00</p>
									</div>
								</div>
							</div>
							<div class="bottom">
								<div class="bottom-text">
									<div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Free : Free</div>
									<div class="time"><i class="far fa-clock"></i>Delivery Time : 30 Min</div>
									<div class="star">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>								
										<span>4.5</span> 
										<div class="comments"><a href="#"><i class="fas fa-comment-alt"></i>05</a></div>
									</div>								
								</div>
							</div>
						</div>					
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<div class="all-meal">
							<div class="top">
								<a href="meal_detail.html"><div class="bg-gradient"></div></a>
								<div class="top-img">
									<img src="images/homepage/meals/img-2.jpg" alt="">
								</div>
								<div class="logo-img">
									<img src="images/homepage/meals/logo-2.jpg" alt="">
								</div>
								<div class="top-text">
									<div class="heading"><h4><a href="meal_detail.html">Two Burgurs</a></h4></div>
									<div class="sub-heading">
									<h5><a href="restaurant_detail.html">Chef House</a></h5>
									<p>$5.00</p>
									</div>
								</div>
							</div>
							<div class="bottom">
								<div class="bottom-text">
									<div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Free : Free</div>
									<div class="time"><i class="far fa-clock"></i>Delivery Time : 30 Min</div>
									<div class="star">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>								
										<span>4.5</span> 
										<div class="comments"><a href="#"><i class="fas fa-comment-alt"></i>05</a></div>
									</div>								
								</div>
							</div>
						</div>					
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<div class="all-meal">
							<div class="top">
								<a href="meal_detail.html"><div class="bg-gradient"></div></a>
								<div class="top-img">
									<img src="images/homepage/meals/img-3.jpg" alt="">
								</div>
								<div class="logo-img">
									<img src="images/homepage/meals/logo-3.jpg" alt="">
								</div>
								<div class="top-text">
									<div class="heading"><h4><a href="meal_detail.html">Large Cheese Pizza...</a></h4></div>
									<div class="sub-heading">
									<h5><a href="restaurant_detail.html">Limon Resto</a></h5>
									<p>$12.00</p>
									</div>
								</div>
							</div>
							<div class="bottom">
								<div class="bottom-text">
									<div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Free : Free</div>
									<div class="time"><i class="far fa-clock"></i>Delivery Time : 30 Min</div>
									<div class="star">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>								
										<span>4.5</span> 
										<div class="comments"><a href="#"><i class="fas fa-comment-alt"></i>05</a></div>
									</div>								
								</div>
							</div>
						</div>					
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<div class="all-meal">
							<div class="top">
								<a href="meal_detail.html"><div class="bg-gradient"></div></a>
								<div class="top-img">
									<img src="images/homepage/meals/img-4.jpg" alt="">
								</div>
								<div class="logo-img">
									<img src="images/homepage/meals/logo-4.jpg" alt="">
								</div>
								<div class="top-text">
									<div class="heading"><h4><a href="meal_detail.html">Hakka Noodles</a></h4></div>
									<div class="sub-heading">
									<h5><a href="restaurant_detail.html">Ledbery</a></h5>
									<p>$5.00</p>
									</div>
								</div>
							</div>
							<div class="bottom">
								<div class="bottom-text">
									<div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Free : Free</div>
									<div class="time"><i class="far fa-clock"></i>Delivery Time : 30 Min</div>
									<div class="star">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>								
										<span>4.5</span> 
										<div class="comments"><a href="#"><i class="fas fa-comment-alt"></i>05</a></div>
									</div>								
								</div>
							</div>
						</div>					
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<div class="all-meal">
							<div class="top">
								<a href="meal_detail.html"><div class="bg-gradient"></div></a>
								<div class="top-img">
									<img src="images/homepage/meals/img-5.jpg" alt="">
								</div>
								<div class="logo-img">
									<img src="images/homepage/meals/logo-5.jpg" alt="">
								</div>
								<div class="top-text">
									<div class="heading"><h4><a href="meal_detail.html">Cappuccino Coffee</a></h4></div>
									<div class="sub-heading">
									<h5><a href="restaurant_detail.html">Organice cafe</a></h5>
									<p>$5.00</p>
									</div>
								</div>
							</div>
							<div class="bottom">
								<div class="bottom-text">
									<div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Free : Free</div>
									<div class="time"><i class="far fa-clock"></i>Delivery Time : 30 Min</div>
									<div class="star">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>								
										<span>4.5</span> 
										<div class="comments"><a href="#"><i class="fas fa-comment-alt"></i>05</a></div>
									</div>								
								</div>
							</div>
						</div>					
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<div class="all-meal">
							<div class="top">
								<a href="meal_detail.html"><div class="bg-gradient"></div></a>
								<div class="top-img">
									<img src="images/homepage/meals/img-6.jpg" alt="">
								</div>
								<div class="logo-img">
									<img src="images/homepage/meals/logo-6.jpg" alt="">
								</div>
								<div class="top-text">
									<div class="heading"><h4><a href="meal_detail.html">Choclate Cake</a></h4></div>
									<div class="sub-heading">
									<h5><a href="restaurant_detail.html">Chef House</a></h5>
									<p>$8.00</p>
									</div>
								</div>
							</div>
							<div class="bottom">
								<div class="bottom-text">
									<div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Free : Free</div>
									<div class="time"><i class="far fa-clock"></i>Delivery Time : 30 Min</div>
									<div class="star">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>								
										<span>4.5</span> 
										<div class="comments"><a href="#"><i class="fas fa-comment-alt"></i>05</a></div>
									</div>								
								</div>
							</div>
						</div>					
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<div class="all-meal">
							<div class="top">
								<a href="meal_detail.html"><div class="bg-gradient"></div></a>
								<div class="top-img">
									<img src="images/homepage/meals/img-7.jpg" alt="">
								</div>
								<div class="logo-img">
									<img src="images/homepage/meals/logo-7.jpg" alt="">
								</div>
								<div class="top-text">
									<div class="heading"><h4><a href="meal_detail.html"> Indian Dosa </a></h4></div>
									<div class="sub-heading">
									<h5><a href="restaurant_detail.html">Indian Resto</a></h5>
									<p>$10.00</p>
									</div>
								</div>
							</div>
							<div class="bottom">
								<div class="bottom-text">
									<div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Free : Free</div>
									<div class="time"><i class="far fa-clock"></i>Delivery Time : 30 Min</div>
									<div class="star">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>								
										<span>4.5</span> 
										<div class="comments"><a href="#"><i class="fas fa-comment-alt"></i>05</a></div>
									</div>								
								</div>
							</div>
						</div>					
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<div class="all-meal">
							<div class="top">
								<a href="meal_detail.html"><div class="bg-gradient"></div></a>
								<div class="top-img">
									<img src="images/homepage/meals/img-8.jpg" alt="">
								</div>
								<div class="logo-img">
									<img src="images/homepage/meals/logo-8.jpg" alt="">
								</div>
								<div class="top-text">
									<div class="heading"><h4><a href="meal_detail.html">Double Tikki Burgur</a></h4></div>
									<div class="sub-heading">
									<h5><a href="restaurant_detail.html">Rooster</a></h5>
									<p>$5.00</p>
									</div>
								</div>
							</div>
							<div class="bottom">
								<div class="bottom-text">
									<div class="delivery"><i class="fas fa-shopping-cart"></i>Delivery Free : Free</div>
									<div class="time"><i class="far fa-clock"></i>Delivery Time : 30 Min</div>
									<div class="star">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>								
										<span>4.5</span> 
										<div class="comments"><a href="#"><i class="fas fa-comment-alt"></i>05</a></div>
									</div>								
								</div>
							</div>
						</div>					
					</div>
				</div>
				<div class="meal-btn">
					<a href="#" class="m-btn btn-link">Show All</a>
				</div>
			</div>
		</section>
		<!--order-food-online-in-your-area end-->
		
		<!--featured-restaurants start-->
		<section class="featured-restaurants mb-5">
			<div class="container">				
				<div class="row">									
					<div class="col-lg-8">
						<div class="new-heading">
							<h1> Xe Con Chiều Về </h1>
						</div>
						<div class ="bg-resto">
							<div class="resto-item">	
								<div class="row">	
									<div class="col-md-4 col-sm-12">
										<div class="resto-img">
											<img src="images/homepage/featured-restaurants/logo_01.jpg" alt="">
											<div class="resto-name">
												<h4><a href="#"> Food Roster </a></h4>
												<p>Indian Restaurant</p>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">															
										<div class="resto-location">
											<span><i class="fas fa-map-marker-alt"></i></span>New York City,1569  
										</div>						
									</div>	
									<div class="col-md-4 col-sm-12">															
										<div class="menu-btn">
											<a class="mn-btn btn-link" href="#"> View Menu</a>  
										</div>						
									</div>
								</div>						
							</div>
							<div class="resto-item">	
								<div class="row">	
									<div class="col-md-4 col-sm-12">
										<div class="resto-img">
											<img src="images/homepage/featured-restaurants/logo_02.jpg" alt="">
											<div class="resto-name">
												<h4><a href="#"> Chef House </a></h4>
												<p>American Restaurant</p>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">															
										<div class="resto-location">
											<span><i class="fas fa-map-marker-alt"></i></span>New York City,1569  
										</div>						
									</div>	
									<div class="col-md-4 col-sm-12">															
										<div class="menu-btn">
											<a class="mn-btn btn-link" href="#"> View Menu</a>  
										</div>						
									</div>
								</div>						
							</div>
							<div class="resto-item">	
								<div class="row">	
									<div class="col-md-4 col-sm-12">
										<div class="resto-img">
											<img src="images/homepage/featured-restaurants/logo_03.jpg" alt="">
											<div class="resto-name">
												<h4><a href="#"> Rooster </a></h4>
												<p>Indian Restaurant</p>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">															
										<div class="resto-location">
											<span><i class="fas fa-map-marker-alt"></i></span>New York City,1569  
										</div>						
									</div>	
									<div class="col-md-4 col-sm-12">															
										<div class="menu-btn">
											<a class="mn-btn btn-link" href="#"> View Menu</a>  
										</div>						
									</div>
								</div>						
							</div>
							<div class="resto-item">	
								<div class="row">	
									<div class="col-md-4 col-sm-12">
										<div class="resto-img">
											<img src="images/homepage/featured-restaurants/logo_04.jpg" alt="">
											<div class="resto-name">
												<h4><a href="#"> Limon Resto </a></h4>
												<p>Australian Restaurant</p>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">															
										<div class="resto-location">
											<span><i class="fas fa-map-marker-alt"></i></span>New York City,1569  
										</div>						
									</div>	
									<div class="col-md-4 col-sm-12">															
										<div class="menu-btn">
											<a class="mn-btn btn-link" href="#"> View Menu</a>  
										</div>						
									</div>
								</div>						
							</div>
							<div class="resto-item">	
								<div class="row">	
									<div class="col-md-4 col-sm-12">
										<div class="resto-img">
											<img src="images/homepage/featured-restaurants/logo_05.jpg" alt="">
											<div class="resto-name">
												<h4><a href="#"> Ramen Bakery </a></h4>
												<p>Canadian Bakery</p>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-12">															
										<div class="resto-location">
											<span><i class="fas fa-map-marker-alt"></i></span>New York City,1569  
										</div>						
									</div>	
									<div class="col-md-4 col-sm-12">															
										<div class="menu-btn">
											<a class="mn-btn btn-link" href="#"> View Menu</a>  
										</div>						
									</div>
								</div>						
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="new-heading treading-sellers">
							<h1>Top Rating </h1>
						</div>
						<div class ="bg-resto">
							<div class="treading-item">	
								<div class="row">	
									<div class=" col-lg-7 col-md-6">
										<div class="resto-img">
											<img src="images/homepage/featured-restaurants/logo_06.jpg" alt="">
											<div class="resto-name">
												<h4><a href="#"> Steak Resto </a></h4>
												<p>Treading</p>
											</div>										
										</div>
										
									</div>	
									<div class="col-lg-5 col-md-6 ">
										<div class="menu-btn">
											<a class="mn-btn btn-link" href="#">View Menu</a>  
										</div>
									</div>
								</div>						
							</div>		
							<div class="treading-item">	
								<div class="row">	
									<div class="col-lg-7 col-md-6">
										<div class="resto-img">
											<img src="images/homepage/featured-restaurants/logo_02.jpg" alt="">
											<div class="resto-name">
												<h4><a href="#"> Meshi Restaurant </a></h4>
												<p>Treading</p>
											</div>										
										</div>
										
									</div>	
									<div class="col-lg-5 col-md-6">
										<div class="menu-btn">
											<a class="mn-btn btn-link" href="#"> View Menu</a>  
										</div>
									</div>
								</div>						
							</div>
							<div class="treading-item">	
								<div class="row">	
									<div class="col-lg-7 col-md-6">
										<div class="resto-img">
											<img src="images/homepage/featured-restaurants/logo_07.jpg" alt="">
											<div class="resto-name">
												<h4><a href="#"> Momo Resto </a></h4>
												<p>Treading</p>
											</div>										
										</div>
										
									</div>	
									<div class="col-lg-5 col-md-6">
										<div class="menu-btn">
											<a class="mn-btn btn-link" href="#"> View Menu</a>  
										</div>
									</div>
								</div>						
							</div>	
							<div class="treading-item">	
								<div class="row">	
									<div class="col-lg-7 col-md-6">
										<div class="resto-img">
											<img src="images/homepage/featured-restaurants/logo_01.jpg" alt="">
											<div class="resto-name">
												<h4><a href="#"> Rooster </a></h4>
												<p>Treading</p>
											</div>										
										</div>
										
									</div>	
									<div class="col-lg-5 col-md-6">
										<div class="menu-btn">
											<a class="mn-btn btn-link" href="#"> View Menu</a>  
										</div>
									</div>
								</div>						
							</div>	
							<div class="treading-item">	
								<div class="row">	
									<div class="col-lg-7 col-md-6">
										<div class="resto-img">
											<img src="images/homepage/featured-restaurants/logo_03.jpg" alt="">
											<div class="resto-name">
												<h4><a href="#"> Limon Bakery </a></h4>
												<p>Treading</p>
											</div>										
										</div>
										
									</div>	
									<div class="col-lg-5 col-md-6">
										<div class="menu-btn">
											<a class="mn-btn btn-link" href="#"> View Menu</a>  
										</div>
									</div>
								</div>						
							</div>	
							
						</div>
					</div>
					
				</div>	
			</div>
			
		</section>
		<!--featured restaurants end-->		
	</section>
@endsection