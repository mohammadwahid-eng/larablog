<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Larablog') }}</title>

		<!-- Styles -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

		@stack('header')
	</head>
	<body>
		@include('admin.partials.header')
		<div class="container-fluid">
			<div class="row">
				@include('admin.partials.sidebar')
				<div class="col-md-9 col-lg-10">
					@yield('breadcrumbs')
					@yield('content')
				</div>
			</div>
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
		@stack('footer')
	</body>
</html>
