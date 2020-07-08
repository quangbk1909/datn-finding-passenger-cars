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
						<form action="coach/search" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-box">
								<select class="selectpicker form-control my-3" data-live-search="true" name="starting_province" title="Chọn tỉnh/thành phố xuất phát">
									@foreach($provinces as $province)
								  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}" >{{$province->name}}</option>
									@endforeach	
								</select>
								<select class="selectpicker form-control mt-3" data-live-search="true" name="end_province" title="Chọn tỉnh/thành phố đến" >
									@foreach($provinces as $province)
								  		<option value="{{$province->id}}" data-tokens="{{$province->convertNameToEn()}}" >{{$province->name}}</option>
									@endforeach
								</select>	
								<button class="search-btn btn-link" type="submit">Tìm xe khách</button>
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
								<p>Kết nối các hành khách có cùng điểm xuất phát và điểm đến tiết kiệm chi phí đi xe con. (đang phát triển)</p>
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
							<h1> Một Số Hãng Xe Nổi Bật </h1>
						</div>
					</div>
				</div>
				<div class="row mb-5">				
					<div class="col-md-12">						
						<div class="new-resto">
							<div class="large-12 columns">
								 <div class="owl-carousel dis-owl owl-theme">	
								 	@foreach ($topOrganization as $organization)
										<div class="item"><a href="organization/{{$organization->id}}"><img style="width: 150px;height: 100px;" src="{{$organization->logo}}" alt=""></a></div>																			 	
								 	@endforeach																																	
																												
								</div>         
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</section>
@endsection