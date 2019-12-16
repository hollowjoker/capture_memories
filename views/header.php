<?php
	$module = isset(explode('/',$_SERVER['REQUEST_URI'])[2]) ? explode('/',$_SERVER['REQUEST_URI'])[2] : '';
	$userSession = Session::getSession('user');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Capture the Memories</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?= URL ?>public/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= URL ?>public/font-awesome/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&display=swap" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet" />
		<link href="<?= MAIN_URL ?>public/now-ui-dashboard-master/assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
		<link href="<?= URL ?>public/css/style.css" rel="stylesheet" />
		<link rel="icon" href="<?=  URL."public/images/tour/captured_memories_new.png" ?>" type="image/png" sizes="16x16">
		<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	</head>
	<body
		data-update-booking-status-url="<?= URL."tour/updateBookingStatus"?>"
	>
		<div class="alert alert-warning alert-dismissible fade show"  data-alert="notif" role="alert">
			You have <a href="<?= URL.'message/?type=tour'?>" class="alert-link"><span data-count-holder="notif">0</span> tour payment due</a> today. Please pay 2 hours before the due payment.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light transparent <?= $module != '' ? "text-black border-bottom" : "nav_fixed" ?>">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="<?= URL ?>">
				<img src="<?= URL."public/images/tour/captured_memories_new.png"?>" class="img-fluid mr-4" alt="logo" style="width: 200px; margin-top:-50px;">
				<span class="text-dark text-pacifico" style="font-size:40px;">Captured Memories Travel and Tours</span>
			</a>

	

			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav mt-2 mt-lg-0 ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?= URL ?>">Home <span class="sr-only">(current)</span></a>
					</li>
					<!-- <li class="nav-item dropdown">
						<a class="nav-link" href="<?= URL.'services'?>">
						Services
						</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link" href="<?= URL.'about_us' ?>">About Us</a>
					</li>
					<?php if(!isset($userSession['id'])) : ?>
						<li class="nav-item">
							<a class="nav-link" href="#" data-toggle="modal" data-target="#signUpModal">Sign up</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Log in</a>
						</li>
					<?php else: ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= URL.'message/?type=tour'?>">
								Messages
								<span class="badge badge-pill badge-info font-size-08" data-booking-counter="reservation" data-counter-url="<?= URL.'tour/fetchBookingCounter?countertype=reservation'?>">0</span>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="header-avatar">
									<?= substr($userSession['first_name'], 0, 1).substr($userSession['last_name'], 0, 1)?>
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?= URL.'user/profile' ?>">Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= URL.'user/logout'?>">Log out</a>
							</div>
						</li>
					<?php endif;?>
				</ul>
			</div>	
		</nav>