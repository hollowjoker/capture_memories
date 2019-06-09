<?php
	$module = isset(explode('/',$_SERVER['REQUEST_URI'])[3]) ? explode('/',$_SERVER['REQUEST_URI'])[3] : '';
	
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
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<!-- CSS Files -->
		<link href="<?= MAIN_URL ?>public/now-ui-dashboard-master/assets/css/bootstrap.min.css" rel="stylesheet" />
  		<link href="<?= MAIN_URL ?>public/now-ui-dashboard-master/assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
	</head>
	<body>
		<div class="wrapper">
			<div class="sidebar" data-color="orange">
				<div class="logo">
					<!-- <a href="http://www.creative-tim.com" class="simple-text logo-mini">CAPTURE</a> -->
					<a href="http://www.creative-tim.com" class="simple-text logo-normal">CAPTURE</a>
				</div>
				<div class="sidebar-wrapper" id="sidebar-wrapper">
					<ul class="nav">
						<li class="active ">
							<a href="./dashboard.html">
								<i class="now-ui-icons design_app"></i><p>Dashboard</p>
							</a>
						</li>
						<li>
							<a href="./user.html">
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
										<i class="now-ui-icons location_world"></i>
										<p><span class="d-lg-none d-md-block">Some Actions</span></p>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#pablo">
										<i class="now-ui-icons users_single-02"></i>
										<p><span class="d-lg-none d-md-block">Account</span></p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="panel-header panel-header-sm"></div>
				<!-- End Navbar -->
				<div class="content">