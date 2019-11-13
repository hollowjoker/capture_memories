<?php
	$module = isset(explode('/',$_SERVER['REQUEST_URI'])[3]) ? explode('/',$_SERVER['REQUEST_URI'])[3] : '';
	// print_r($);	
	// exit;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
		<link rel="icon" type="image/png" href="../assets/img/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>
			Admin
		</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="<?= MAIN_URL ?>public/now-ui-dashboard-master/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?= MAIN_URL ?>public/now-ui-dashboard-master/assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet" />
		<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="<?= URL.'public/css/style.css'?>" rel="stylesheet" />
		<script>
			let initiateModule = "";
		</script>  
	</head>
	<body>
		<div class="wrapper">
			<div class="sidebar" data-color="orange">
				<div class="logo">
					<!-- <a href="http://www.creative-tim.com" class="simple-text logo-mini">CAPTURE</a> -->
					<a href="<?= URL ?>" class="simple-text logo-normal">CAPTURE MEMORIES</a>
				</div>
				<div class="sidebar-wrapper" id="sidebar-wrapper">
					<ul class="nav">
						<li class="<?= $module == 'dashboard' ? 'active' : ''?>">
							<a href="<?= URL.'dashboard'?>">
								<i class="now-ui-icons design_app"></i><p>Dashboard</p>
							</a>
						</li>
						<li class="<?= $module == 'destination' ? 'active' : ''?> ">
							<a href="<?= URL.'destination'?>">
								<i class="now-ui-icons location_map-big"></i><p>Destinations</p>
							</a>
						</li>
						<li class="<?= $module == 'tour' ? 'active' : ''?> ">
							<a href="<?= URL.'tour'?>">
								<i class="now-ui-icons transportation_air-baloon"></i><p>Tours</p>
							</a>
						</li>
						<li class="<?= $module == 'reservation' ? 'active' : ''?> ">
							<a href="<?= URL.'reservation'?>">
								<i class="now-ui-icons ui-1_calendar-60"></i>
								<div class="d-flex pt-1 justify-content-between">
									Reservations
									<div>
										<span class="badge badge-pill badge-light font-size-08" data-booking-counter="reservation" data-counter-url="<?= URL.'booking/fetchBookingCounter?countertype=reservation'?>">0</span>
									</div>
								</div>
							</a>
						</li>
						<!-- <li class="<?= $module == 'services' ? 'active' : ''?> ">
							<a href="<?= URL.'services/?type=airline'?>">
								<i class="now-ui-icons objects_spaceship"></i>
								<div class="d-flex pt-1 justify-content-between">
									Services
									<div>
										<span class="badge badge-pill badge-light font-size-08" data-booking-counter="services" data-counter-url="<?= URL.'booking/fetchBookingCounter?countertype=services'?>">0</span>
									</div>
								</div>
							</a>
						</li> -->
						<li class="<?= $module == 'booking' ? 'active' : ''?> ">
							<a href="<?= URL.'booking'?>">
								<i class="now-ui-icons objects_spaceship"></i><p>Bookings</p>
							</a>
						</li>
						<li class="<?= $module == 'user' ? 'active' : ''?> ">
							<a href="<?= URL.'user'?>">
								<i class="now-ui-icons users_single-02"></i><p>User Profile</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel" id="main-panel">
				<!-- Navbar -->
				<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
					<div class="container-fluid">
						<div class="navbar-wrapper">
							<div class="navbar-toggle">
								<button type="button" class="navbar-toggler">
									<span class="navbar-toggler-bar bar1"></span>
									<span class="navbar-toggler-bar bar2"></span>
									<span class="navbar-toggler-bar bar3"></span>
								</button>
							</div>
							<a class="navbar-brand" href="#pablo"><?= $module ?></a>
						</div>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-bar navbar-kebab"></span>
							<span class="navbar-toggler-bar navbar-kebab"></span>
							<span class="navbar-toggler-bar navbar-kebab"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navigation">
							<ul class="navbar-nav">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="now-ui-icons users_single-02"></i>
										<p><span class="d-lg-none d-md-block">Account</span></p>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
										<!-- <a class="dropdown-item" href="#">Profile</a> -->
										<a class="dropdown-item" href="<?= URL.'admin/logout'?>">Logout</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="panel-header panel-header-sm"></div>
				<!-- End Navbar -->
				<div class="content">