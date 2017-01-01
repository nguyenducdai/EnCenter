
<!DOCTYPE html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>The Future</title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{url('site/css/animate.css')}}">
	<link rel="stylesheet" href="{{url('style.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{url('site/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{url('site/css/bootstrap.css')}}">
	<!-- Superfish -->
	<link rel="stylesheet" href="{{url('site/css/superfish.css')}}">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{url('site/css/magnific-popup.css')}}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{url('site/css/bootstrap-datepicker.min.css')}}">
	<!-- CS Select -->
	<link rel="stylesheet" href="{{url('site/css/cs-select.css')}}">
	<link rel="stylesheet" href="{{url('site/css/cs-skin-border.css')}}">
	
	<link rel="stylesheet" href="{{url('site/css/style.css')}}">
	<script src="{{url('site/js/modernizr-2.6.2.min.js')}}"></script>
	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="{{ url("/")}}"><i class="icon-piechart"></i>The Future</a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li class="active"><a href="{{ url("/")}}">Trang Chủ</a></li>
							
							<li><a href="{{route('cp.home.gioithieu')}}"> Giới Thiệu</a></li>
							<li><a href="{{route('cp.home.archive.new')}}">Tin Tức - Sự Kiện</a></li>
							<li><a href="{{route('cp.home.archive')}}">Khóa Học</a></li>
							<li><a href="{{route('cp.home.lienhe')}}">Liên Hệ</a></li>
							 @if (Auth::guest())
							<li><a href="{{ url('/login') }}">Đăng Nhập | Đăng ký</a></li>
							@else
							  <li class="fh5co-sub-ddown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="fh5co-sub-menu">
                                    <li><a href="{{route('cp.home.profile')}}">Profile</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
							@endif
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<!-- end:header-top -->