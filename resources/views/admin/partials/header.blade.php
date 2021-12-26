<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="navbar-brand-wrapper d-flex align-items-center">
		<a class="navbar-brand brand-logo" href="{{ route('admin.home') }}">
			<img src="{{ asset('images/logo.svg') }}" alt="logo" class="logo-dark" />
		</a>
		<a class="navbar-brand brand-logo-mini" href="{{ route('admin.home') }}">
			<img src="{{ asset('images/logo-mini.svg') }}" alt="logo" />
		</a>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
		<form class="search-form d-none d-md-block" action="#">
			<i class="icon-magnifier"></i>
			<input type="search" class="form-control" placeholder="Search Here" title="Search here">
		</form>
		<ul class="navbar-nav navbar-nav-right ml-auto">
			<li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">
				<a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
					<div class="d-inline-flex mr-3">
						<i class="flag-icon flag-icon-us"></i>
					</div>
					<span class="profile-text font-weight-normal">English</span>
				</a>
				<div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
					<a class="dropdown-item">
						<i class="flag-icon flag-icon-us"></i> English </a>
					<a class="dropdown-item">
						<i class="flag-icon flag-icon-fr"></i> French </a>
					<a class="dropdown-item">
						<i class="flag-icon flag-icon-ae"></i> Arabic </a>
					<a class="dropdown-item">
						<i class="flag-icon flag-icon-ru"></i> Russian </a>
				</div>
			</li>
		</ul>
	</div>
</nav>