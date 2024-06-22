<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark"  data-sidebar-size="lg" data-sidebar-image="none">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
		<meta name="keywords" content="hris, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="didikhanafi">
        <title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon"  src="{{ asset('storage/' . $settingwebcom->favicon) }}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    	<link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="/assets/css/line-awesome.min.css">
		<link rel="stylesheet" href="/assets/css/material.css">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="/assets/css/select2.min.css">

		<!-- Datatable CSS -->
		<link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">

		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="/assets/css/bootstrap-datetimepicker.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="/assets/css/style.css">


        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    </head>

    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            <div class="header">

				<!-- Logo -->
                <div class="header-left">
					<a href="/home" class="logo">
					   	<img src="{{ asset('storage/' . $settingwebcom->lightlogo) }}" width="100"  alt="HRISapp">
					</a>
					<a href="/home" class="logo2">
						<img src="{{ asset('storage/' . $settingwebcom->lightlogo) }}" width="100" alt="HRISapp">
					</a>
				</div>
				<!-- /Logo -->

				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>

				<!-- Header Title -->
				<div class="page-title-box">
					<h3>{{$settingwebcom->webname}}</h3>
				</div>
				<!-- /Header Title -->

				<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa-solid fa-bars"></i></a>

				<!-- Header Menu -->
				<ul class="nav user-menu">

					<li class="nav-item dropdown has-arrow main-drop">
						<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
							<span class="user-img"><img src="/assets/img/profiles/avatar-21.jpg" alt="User Image">
							<span>{{ Auth::user()->name }}</span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="profile.html">My Profile</a>
							{{-- <a class="dropdown-item" href="settings.html">Settings</a> --}}
							<a class="dropdown-item" href="{{ route('logout') }}"
							   onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->

				<!-- Mobile Menu -->
				<div class="dropdown mobile-user-menu">
					<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="profile.html">My Profile</a>
						<a class="dropdown-item" href="{{ route('logout') }}"
						   onclick="event.preventDefault();
										 document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
					</div>
				</div>
				<!-- /Mobile Menu -->

            </div>
			<!-- /Header -->

			<!-- Sidebar -->
            @include('layouts/materi/slidebar')
			<!-- /Sidebar -->


            @yield('content')

        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
       <script src="/assets/js/jquery-3.7.0.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="/assets/js/bootstrap.bundle.min.js"></script>

		<!-- Slimscroll JS -->
		<script src="/assets/js/jquery.slimscroll.min.js"></script>

		<!-- Datatable JS -->
		<script src="/assets/js/jquery.dataTables.min.js"></script>
		<script src="/assets/js/dataTables.bootstrap4.min.js"></script>

		<!-- Select2 JS -->
		<script src="/assets/js/select2.min.js"></script>

		<!-- Datetimepicker JS -->
		<script src="/assets/js/moment.min.js"></script>
		<script src="/assets/js/bootstrap-datetimepicker.min.js"></script>

		 <!-- Theme Settings JS -->
		<script src="/assets/js/layout.js"></script>
		<script src="/assets/js/theme-settings.js"></script>
		<script src="/assets/js/greedynav.js"></script>

		<!-- Custom JS -->
		<script src="/assets/js/app.js"></script>


    </body>
</html>
