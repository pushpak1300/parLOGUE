<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{env('APP_NAME')}}</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='manifest' href='/manifest.webmanifest'>
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Stylesheets -->
        <link rel="stylesheet" href="{{asset('di/css/flaticon.css')}}"/>

	<link rel="stylesheet" href="{{asset('di/css/bootstrap.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('di/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('di/css/slicknav.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('di/css/jquery-ui.min.css')}}"/>
	<link rel="stylesheet" href="{{asset('di/css/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('di/css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('di/css/style.css')}}"/>
    <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
<style>
             .title {
                font-size: 30px;
                color: black;
            }
</style>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
    </div>
    <header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 text-center text-lg-left">
						<!-- logo -->
						<a href="/" class="site-logo title m-b-md">
<i class="flaticon-bookmark"></i>
                            {{env('APP_NAME')}}
						</a>
					</div>
					
					<div class="col-xl-3 col-lg-3">
						<div class="user-panel">
							@auth
							<div class="up-item">
                                <i class="flaticon-profile"></i>
                                <a href="/">Home</a>
							</div>
							@else
							<div class="up-item">
                                <i class="flaticon-profile"></i>
                                <a href="/login">Sign</a> In</a>
							</div>
							@endauth
							
                            
                            <div class="up-item">
								<div class="shopping-card">
<i class="flaticon-bag"></i>
                                </div>
								<a href="/wishlist">Wish List</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
    </header>
    @yield('content')

    <section class="footer-section">
		
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links text-center">
					<a href="/home" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="/home" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
				</div>

<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This app is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://pushpak1300.github.io" target="_blank">Pushpak</a></p>

	</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="{{asset('di/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('di/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('di/js/jquery.slicknav.min.js')}}"></script>
	<script src="{{asset('di/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('di/js/jquery.nicescroll.min.js')}}"></script>
	<script src="{{asset('di/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('di/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('di/js/main.js')}}"></script>
    <script src="{{asset('plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
    <script src="../plugins/filterizr/jquery.filterizr.min.js"></script>

    <script>
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                alwaysShowClose: false,
                wrapping: false ,
                onShown: function() {
                    console.log('Checking our the events huh?');
                }
                });
            });


    // $('.btn[data-filter]').on('click', function() {
    //   $('.btn[data-filter]').removeClass('active');
    //   $(this).addClass('active');
    
</script>
@stack('js')

</body>
</html>