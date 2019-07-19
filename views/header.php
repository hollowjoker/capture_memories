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
		<link rel="stylesheet" href="<?= URL ?>public/css/style.css">
		<link rel="stylesheet" href="<?= URL ?>public/font-awesome/font-awesome-4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&display=swap" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark transparent <?= $module != '' ? "text-black border-bottom" : "nav_fixed" ?>">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="http://localhost:8888/capture_memories/">
				<img src="/capture_memories/public/images/tour/captured_memories_new.png" class="img-fluid" alt="logo" style="width: 50px;">
			</a>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
				<ul class="navbar-nav mt-2 mt-lg-0 ml-auto small">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="<?= URL.'services'?>">
						Services
						</a>
					</li>
					<?php if(!isset($userSession['id'])) : ?>
						<li class="nav-item">
							<a class="nav-link" href="#" data-toggle="modal" data-target="#signUpModal">Sign up</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Log in</a>
						</li>
					<?php else: ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Welcome <?= isset($userSession['first_name']) ? $userSession['first_name'] : ""?>
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Profile</a>
								<a class="dropdown-item" href="#">Cart</a>
								<a class="dropdown-item" href="#">Messages</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= URL.'user/logout'?>">Log out</a>
							</div>
						</li>
					<?php endif;?>
				</ul>
			</div>	
		</nav>