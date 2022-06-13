<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>San Fierro RolePlay - Dashboard</title>
    <!-- ================= Favicon ================== -->
	<link rel="icon" type="image/x-icon" href="{{ @asset('img/sfrp_favico.png') }}">
    <!-- Styles -->
	<link href="{{ @asset('css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ @asset('css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ @asset('css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ @asset('css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ @asset('css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ @asset('css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ @asset('css/lib/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ @asset('css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ @asset('css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ @asset('css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ @asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ @asset('css/lib/toastr/toastr.min.css') }}" rel="stylesheet">

</head>

<body>
	<!-- /# Start Sidebar -->
    @include('components.sidebar')
    <!-- /# End Sidebar -->

	<!-- /# Start Header -->
	@include('components.header')
	<!-- /# End Header -->

	<!-- /# Start Main -->
    @yield('content')
	<!-- /# End Main -->
	
	<!-- jquery vendor -->
	<script src="{{ @asset('js/lib/jquery.min.js') }}"></script>
	<script src="{{ @asset('js/lib/jquery.nanoscroller.min.js') }}"></script>
	<!-- nano scroller -->
	<script src="{{ @asset('js/lib/menubar/sidebar.js') }}"></script>
	<script src="{{ @asset('js/lib/preloader/pace.min.js') }}"></script>
	<!-- sidebar -->

	<script src="{{ @asset('js/lib/bootstrap.min.js') }}"></script>
	<script src="{{ @asset('js/scripts.js') }}"></script>
	<!-- bootstrap -->

	<script src="{{ @asset('js/lib/calendar-2/moment.latest.min.js') }}"></script>
	<script src="{{ @asset('js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
	<script src="{{ @asset('js/lib/calendar-2/pignose.init.js') }}"></script>


	<script src="{{ @asset('js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
	<script src="{{ @asset('js/lib/weather/weather-init.js') }}"></script>
	<script src="{{ @asset('js/lib/circle-progress/circle-progress.min.js') }}"></script>
	<script src="{{ @asset('js/lib/circle-progress/circle-progress-init.js') }}"></script>

	<script src="{{ @asset('js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
	<script src="{{ @asset('js/lib/sparklinechart/sparkline.init.js') }}"></script>
	<script src="{{ @asset('js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ @asset('js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
	<!-- scripit init-->
	<script src="{{ @asset('js/dashboard2.js') }}"></script>

	<script src="{{ @asset('js/lib/toastr/toastr.min.js') }}"></script>
	<script src="{{ @asset('js/lib/toastr/toastr.init.js') }}"></script>
	
	<script src="{{ @asset('ckeditor/ckeditor.js') }}"></script>
	<script src="https://kit.fontawesome.com/e8688b67db.js" crossorigin="anonymous"></script>
	<script>
		CKEDITOR.replace( 'editor' );
	</script>

	@if(Session::has('message'))
		<div id="toast-container" class="toast-bottom-right">
			<div class="toast toast-{{ Session::get('alert-class', '-info') }}" aria-live="polite" style="display: block;">
				<button id="close-btn" type="button" class="toast-close-button" role="button" onclick='$(this).parent().hide();'>×</button>
				<div class="toast-title">{{ Session::get('title', 'Information !') }}</div>
				<div class="toast-message">{{ Session::get('message') }}</div>
			</div>
		</div>
	@endif
</body>

</html>