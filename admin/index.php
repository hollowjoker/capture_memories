<?php

	// error_reporting(E_ALL);
	// ini_set('display_errors', 1);
	//  libs
	require 'libs/Session.php';	
	require 'libs/Server.php';
	
	Session::init();
	
	require 'libs/Bootstrap.php';
	require 'libs/Controller.php';
	require 'libs/Model.php';
	require 'libs/Views.php';

	//autoloader
	
	$app = new Bootstrap();
	exit;
	
?>