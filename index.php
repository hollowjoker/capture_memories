<?php
	//  libs

	// error_reporting(E_ALL);
	// ini_set('display_errors', 1);
	
	require 'libs/Session.php';	
	require 'libs/Server.php';
	
	Session::init();
	
	require 'libs/Bootstrap.php';
	require 'libs/Controller.php';
	require 'libs/Data.php';
	require 'libs/Model.php';
	require 'libs/Views.php';

	require 'PHPMailer-master/src/Exception.php';
	require 'PHPMailer-master/src/PHPMailer.php';
	require 'PHPMailer-master/src/SMTP.php';
	
	//autoloader
	
	$app = new Bootstrap();
	exit;
	
?>