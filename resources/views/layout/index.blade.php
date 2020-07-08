<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}">
	
	<!-- Favicon -->
	<link href="images/fav.png" rel="shortcut icon" type="image/x-icon"/>

    <title>Hust | XeTinh </title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/mega.menu.css" rel="stylesheet">
	<link href="css/owlslider.css" rel="stylesheet">
    
	<!-- Owl Carousel for this template-->
	<link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
	<link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
	
    <!-- Fontawesome styles for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="vendor/bootstrap-select/bootstrap-select.min.css">
	@yield('css')

	<style>
		.fa-stack[data-count]:after{
		  position:absolute;
		  right:0%;
		  top:1%;
		  content: attr(data-count);
		  font-size:50%;
		  padding:.6em;
		  border-radius:999px;
		  line-height:.75em;
		  color: white;
		  background:rgba(255,0,0,.85);
		  text-align:center;
		  min-width:2em;
		  font-weight:bold; 
		}

	</style>
</head>

<body>
	<!--header start-->
	@include('layout.header')
	
	<!--header end-->
	<!-- content page -->
	@yield('content')
	<!-- end content page -->
	
	<!--footer start-->
	@include('layout.footer')
	<!--footer end-->	  

    <!--Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!--Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	 <!--Assect scripts for this page-->
	<script src="vendor/OwlCarousel/owl.carousel.js"></script>
	<script src="js/owlslider.js"></script>
	<script src="vendor/bootstrap-select/bootstrap-select.min.js"></script>

	@yield('script')

	<script src="js/noti.js"></script>
	
  </body>

</html>
