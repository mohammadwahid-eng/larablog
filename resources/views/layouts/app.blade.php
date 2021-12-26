<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Larablog') }}</title>

		<!-- plugins:css -->
		<link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
		<link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
		<!-- endinject -->
		<!-- inject:css -->
		<!-- endinject -->
		<!-- Layout styles -->
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<!-- End layout styles -->
		<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

		@stack('header')
	</head>
	<body>
		<div class="container-scroller">
			@include('admin.partials.header')
			<!-- partial -->
			<div class="container-fluid page-body-wrapper">
				@include('admin.partials.sidebar')
				<!-- partial -->
				<div class="main-panel">
					<div class="content-wrapper">
						@if (!Route::is('admin.home'))
							@if (Session::has('status'))
								<div class="alert alert-success">{{ Session::get('status') }}</div>
							@endif
							@if ($errors->any())
								<div class="alert alert-danger">
									<ul class="m-0">
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<div class="page-header">
								<h3 class="page-title">@yield('title')</h3>
								@yield('breadcrumbs')
							</div>
						@endif
						@yield('content')
					</div>
					<!-- content-wrapper ends -->
					<!-- partial:partials/_footer.html -->
					<footer class="footer">
						<div class="d-sm-flex justify-content-center justify-content-sm-between">
							<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
							<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
						</div>
					</footer>
					<!-- partial -->
				</div>
				<!-- main-panel ends -->
			</div>
			<!-- page-body-wrapper ends -->
		</div>
		<!-- container-scroller -->
		<!-- plugins:js -->
		<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
		<!-- endinject -->
		<!-- Plugin js for this page -->
		<script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
		<script src="{{ asset('vendors/moment/moment.min.js') }}"></script>
		<script src="{{ asset('vendors/daterangepicker/daterangepicker.js') }}"></script>
		<script src="{{ asset('vendors/chartist/chartist.min.js') }}"></script>
		<!-- End plugin js for this page -->
		<!-- inject:js -->
		<script src="{{ asset('js/off-canvas.js') }}"></script>
		<script src="{{ asset('js/misc.js') }}"></script>
		<!-- endinject -->

		@stack('footer')
	</body>
</html>
