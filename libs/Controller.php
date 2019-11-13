<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Controller{
	function __construct(){
		$this->view = new Views();
	}
	static function objToArray($obj){
		$array = array();
		foreach($obj as $var=>$val){
			$array[$var] = $val;
		}
		return $array;
	}
	
	public function loadModel($name){
		$path = 'models/' . $name . '_model.php';
		
		if(file_exists($path)){
			require $path;
			
			$modelName = $name . '_model';
			
			$this->model = new $modelName();
			
		}
	}
	
	static function removeComma($string){
		$pattern = '/^\(/';
		// echo $string;
		$matches = array();
		preg_match($pattern,$string,$matches);
		
		if(substr($string,0,1) == '('){
			// preg_replace('/\(|\)/','',$string);
			$string = strtr($string, array('(' => '', ')' => ''));
			// str_replace(')', '', $string);
			// preg_replace( "(", "", $path );
			// $pattern = '/^\)/';
			
			// str_replace($pattern, '', $string);
			$string = '-'.$string;
		}
		
		$string = str_replace(',', '', $string);
		// exit;
		return $string;
		
	}
	
	static function setComma($string){
		 $a = str_replace(',', '', $string);
		 
		 return $a;
	}
	
	
	static function getFloat($int){
		if($int == ''){
			return '0.00';
		}
		if($int < 0){
			$int *= (-1);
			return '('.number_format($int,2).')';
		} else {
			return number_format($int,2);
		}
	}

	static function getMonths() {
		$months = [];
		for($i=1;$i<=12;$i++) {
			$months[] = [
				'number' => $i,
				'name' => date('F', mktime(0, 0, 0, $i, 10))
			];
		}
		return $months;
	}

	static function insertDate($data) {
		$data->createdAt = date('Y-m-d H:i:s');
		$data->updatedAt = date('Y-m-d H:i:s');
		$data->deletedAt = null;

		return $data;
	}
	
	static function insertDateUpdate($data) {
		$data->updatedAt = date('Y-m-d H:i:s');
		return $data;
	}
	
	static function deleteDate($data) {
		$data->deletedAt = date('Y-m-d H:i:s');
		return $data;
	}
	
	static function generateReference() {
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		$length = 15;
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return "TR-".$randomString;
	}

	static function emailSend($data) {
		$body = "";
		if($data['body'] == 'verify') {
			$body = self::verify($data);
		} elseif ($data['body'] == 'forgetPassword') {
			$body = self::forgetPassword($data);
		}
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "adec.joshua@gmail.com";
		$mail->Password = "adec2019";
		$mail->setFrom("adec.joshua@gmail.com", "Capture Memories");
		$mail->addAddress($data['email'], $data['displayName']);
		$mail->Subject = $data['subject'];
		$mail->Body = $body;
		$mail->isHTML(true);

		if(!$mail->send()){
			return 0;
		}else{
			return 1;
		}
	}

	static function verify($data) {
		$string = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
				<head style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
				<meta name="viewport" content="width=device-width" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">

				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
				<title style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">ZURBemails</title>
					
				<link rel="stylesheet" type="text/css" href="stylesheets/email.css" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">

				</head>
				
				<style style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
				* { 
					margin:0;
					padding:0;
				}
				* { font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; }

				img { 
					max-width: 100%; 
				}
				.collapse {
					margin:0;
					padding:0;
				}
				body {
					-webkit-font-smoothing:antialiased; 
					-webkit-text-size-adjust:none; 
					width: 100%!important; 
					height: 100%;
				}
				a { color: #2BA6CB;}

				.btn {
					text-decoration:none;
					color: #FFF;
					background-color: #666;
					padding:10px 16px;
					font-weight:bold;
					margin-right:10px;
					text-align:center;
					cursor:pointer;
					display: inline-block;
				}

				p.callout {
					padding:15px;
					background-color:#ECF8FF;
					margin-bottom: 15px;
				}
				.callout a {
					font-weight:bold;
					color: #2BA6CB;
				}

				table.social {
					background-color: #ebebeb;
					
				}
				.social .soc-btn {
					padding: 3px 7px;
					font-size:12px;
					margin-bottom:10px;
					text-decoration:none;
					color: #FFF;font-weight:bold;
					display:block;
					text-align:center;
				}
				a.fb { background-color: #3B5998!important; }
				a.tw { background-color: #1daced!important; }
				a.gp { background-color: #DB4A39!important; }
				a.ms { background-color: #000!important; }

				.sidebar .soc-btn { 
					display:block;
					width:100%;
				}

				table.head-wrap { width: 100%;}

				.header.container table td.logo { padding: 15px; }
				.header.container table td.label { padding: 15px; padding-left:0px;}

				table.body-wrap { width: 100%;}

				table.footer-wrap { width: 100%;	clear:both!important;
				}
				.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
				.footer-wrap .container td.content p {
					font-size:10px;
					font-weight: bold;
					
				}
				h1,h2,h3,h4,h5,h6 {
				font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
				}
				h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

				h1 { font-weight:200; font-size: 44px;}
				h2 { font-weight:200; font-size: 37px;}
				h3 { font-weight:500; font-size: 27px;}
				h4 { font-weight:500; font-size: 23px;}
				h5 { font-weight:900; font-size: 17px;}
				h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}

				.collapse { margin:0!important;}

				p, ul { 
					margin-bottom: 10px; 
					font-weight: normal; 
					font-size:14px; 
					line-height:1.6;
				}
				p.lead { font-size:17px; }
				p.last { margin-bottom:0px;}

				ul li {
					margin-left:5px;
					list-style-position: inside;
				}
				ul.sidebar {
					background:#ebebeb;
					display:block;
					list-style-type: none;
				}
				ul.sidebar li { display: block; margin:0;}
				ul.sidebar li a {
					text-decoration:none;
					color: #666;
					padding:10px 16px;
					margin-right:10px;
					cursor:pointer;
					border-bottom: 1px solid #777777;
					border-top: 1px solid #FFFFFF;
					display:block;
					margin:0;
				}
				ul.sidebar li a.last { border-bottom-width:0px;}
				ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}

				.container {
					display:block!important;
					max-width:600px!important;
					margin:0 auto!important; /* makes it centered */
					clear:both!important;
				}

				/* This should also be a block element, so that it will fill 100% of the .container */
				.content {
					padding:15px;
					max-width:600px;
					margin:0 auto;
					display:block; 
				}

				.content table { width: 100%; }


				/* Odds and ends */
				.column {
					width: 300px;
					float:left;
				}
				.column tr td { padding: 15px; }
				.column-wrap { 
					padding:0!important; 
					margin:0 auto; 
					max-width:600px!important;
				}
				.column table { width:100%;}
				.social .column {
					width: 280px;
					min-width: 279px;
					float:left;
				}

				.clear { display: block; clear: both; }

				@media only screen and (max-width: 600px) {
					
					a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

					div[class="column"] { width: auto!important; float:none!important;}
					
					table.social div[class="column"] {
						width:auto!important;
					}

				}
				</style>
				<body bgcolor="#FFFFFF" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;height: 100%;width: 100%!important;">

				<!-- HEADER -->
				<table class="head-wrap" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;">
					<tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
						<td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
						<td class="header container" style="margin: 0 auto!important;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;">
								<div class="content" style="margin: 0 auto;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 600px;display: block;">
								<table style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;">
									<tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
										<td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"><img src="https://i.ibb.co/LSKdrNH/captured-memories-new.png" class="img-fluid" alt="logo" style="width: 50px;margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 100%;"></td>
										<td align="right" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"><h6 class="collapse" style="margin: 0!important;padding: 0;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #444;font-weight: 900;font-size: 14px;text-transform: uppercase;">Captured Memories Travel and Tours</h6></td>
									</tr>
								</table>
								</div>
						</td>
						<td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
					</tr>
				</table><!-- /HEADER -->


				<!-- BODY -->
				<table class="body-wrap" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;">
					<tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
						<td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
						<td class="container" bgcolor="#FFFFFF" style="margin: 0 auto!important;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;">

							<div class="content" style="margin-top: 50px;margin: 0 auto;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 600px;display: block;">
							<table style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;">
								<tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
									<td style="text-align: center;margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
										<h2 style="margin: 0;padding: 0;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #000;font-weight: 200;font-size: 37px;">Email Confirmation</h2>
										<h3 style="margin-top: 40px;">Hi, '.$data['displayName'].'</h3>
										<p class="lead" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 17px;line-height: 1.6;">You are almost ready to start enjoying our app.</p>
										<p style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;">Simply click the big yellow button to verify your email address.</p>
										<div style="margin-top: 50px;margin: 0;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
										<a href="'.MAILHOST.'home/verifyEmail?orion='.$data['id'].'&email='.$data['email'].'" class="btn" style="background-color: #ffc107; padding: 14px 16px; font-size: 18px; text-decoration:none;">Verify Email Address</a>
										</div>
									</td>
								</tr>
							</table>
							</div><!-- /content -->
													
						</td>
						<td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
					</tr>
				</table><!-- /BODY -->

				</body>
			</html>
		';
		return $string;
	}
	
	static function forgetPassword($data) {
		$string = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
				<head style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
				<!-- If you delete this meta tag, Half Life 3 will never be released. -->
				<meta name="viewport" content="width=device-width" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
				​
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
				<title style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">ZURBemails</title>
					
				<link rel="stylesheet" type="text/css" href="stylesheets/email.css" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
				​
				</head>
				
				<style style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
					/* ------------------------------------- 
						GLOBAL 
				------------------------------------- */
				* { 
					margin:0;
					padding:0;
				}
				* { font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; }
				​
				img { 
					max-width: 100%; 
				}
				.collapse {
					margin:0;
					padding:0;
				}
				body {
					-webkit-font-smoothing:antialiased; 
					-webkit-text-size-adjust:none; 
					width: 100%!important; 
					height: 100%;
				}
				​
				​
				/* ------------------------------------- 
						ELEMENTS 
				------------------------------------- */
				a { color: #2BA6CB;}
				​
				.btn {
					text-decoration:none;
					color: #FFF;
					background-color: #666;
					padding:10px 16px;
					font-weight:bold;
					margin-right:10px;
					text-align:center;
					cursor:pointer;
					display: inline-block;
				}
				​
				p.callout {
					padding:15px;
					background-color:#ECF8FF;
					margin-bottom: 15px;
				}
				.callout a {
					font-weight:bold;
					color: #2BA6CB;
				}
				​
				table.social {
				/* 	padding:15px; */
					background-color: #ebebeb;
					
				}
				.social .soc-btn {
					padding: 3px 7px;
					font-size:12px;
					margin-bottom:10px;
					text-decoration:none;
					color: #FFF;font-weight:bold;
					display:block;
					text-align:center;
				}
				a.fb { background-color: #3B5998!important; }
				a.tw { background-color: #1daced!important; }
				a.gp { background-color: #DB4A39!important; }
				a.ms { background-color: #000!important; }
				​
				.sidebar .soc-btn { 
					display:block;
					width:100%;
				}
				​
				/* ------------------------------------- 
						HEADER 
				------------------------------------- */
				table.head-wrap { width: 100%;}
				​
				.header.container table td.logo { padding: 15px; }
				.header.container table td.label { padding: 15px; padding-left:0px;}
				​
				​
				/* ------------------------------------- 
						BODY 
				------------------------------------- */
				table.body-wrap { width: 100%;}
				​
				​
				/* ------------------------------------- 
						FOOTER 
				------------------------------------- */
				table.footer-wrap { width: 100%;	clear:both!important;
				}
				.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
				.footer-wrap .container td.content p {
					font-size:10px;
					font-weight: bold;
					
				}
				​
				​
				/* ------------------------------------- 
						TYPOGRAPHY 
				------------------------------------- */
				h1,h2,h3,h4,h5,h6 {
				font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
				}
				h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }
				​
				h1 { font-weight:200; font-size: 44px;}
				h2 { font-weight:200; font-size: 37px;}
				h3 { font-weight:500; font-size: 27px;}
				h4 { font-weight:500; font-size: 23px;}
				h5 { font-weight:900; font-size: 17px;}
				h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#444;}
				​
				.collapse { margin:0!important;}
				​
				p, ul { 
					margin-bottom: 10px; 
					font-weight: normal; 
					font-size:14px; 
					line-height:1.6;
				}
				p.lead { font-size:17px; }
				p.last { margin-bottom:0px;}
				​
				ul li {
					margin-left:5px;
					list-style-position: inside;
				}
				​
				/* ------------------------------------- 
						SIDEBAR 
				------------------------------------- */
				ul.sidebar {
					background:#ebebeb;
					display:block;
					list-style-type: none;
				}
				ul.sidebar li { display: block; margin:0;}
				ul.sidebar li a {
					text-decoration:none;
					color: #666;
					padding:10px 16px;
				/* 	font-weight:bold; */
					margin-right:10px;
				/* 	text-align:center; */
					cursor:pointer;
					border-bottom: 1px solid #777777;
					border-top: 1px solid #FFFFFF;
					display:block;
					margin:0;
				}
				ul.sidebar li a.last { border-bottom-width:0px;}
				ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}
				
				​
				/* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
				.container {
					display:block!important;
					max-width:600px!important;
					margin:0 auto!important; /* makes it centered */
					clear:both!important;
				}
				​
				/* This should also be a block element, so that it will fill 100% of the .container */
				.content {
					padding:15px;
					max-width:600px;
					margin:0 auto;
					display:block; 
				}
				​
				.content table { width: 100%; }
				​
				​
				/* Odds and ends */
				.column {
					width: 300px;
					float:left;
				}
				.column tr td { padding: 15px; }
				.column-wrap { 
					padding:0!important; 
					margin:0 auto; 
					max-width:600px!important;
				}
				.column table { width:100%;}
				.social .column {
					width: 280px;
					min-width: 279px;
					float:left;
				}
				​
				/* Be sure to place a .clear element after each set of columns, just to be safe */
				.clear { display: block; clear: both; }
				​
				​
				/* ------------------------------------------- 
						PHONE
						For clients that support media queries.
						Nothing fancy. 
				-------------------------------------------- */
				@media only screen and (max-width: 600px) {
					
					a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}
				​
					div[class="column"] { width: auto!important; float:none!important;}
					
					table.social div[class="column"] {
						width:auto!important;
					}
				​
				}
				</style>
				<body bgcolor="#FFFFFF" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;height: 100%;width: 100%!important;">
				​
				<!-- HEADER -->
				<table class="head-wrap" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;">
					<tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
						<td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
						<td class="header container" style="margin: 0 auto!important;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;">
								<div class="content" style="margin: 0 auto;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 600px;display: block;">
								<table style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;">
									<tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
										<td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"><img src="https://i.ibb.co/LSKdrNH/captured-memories-new.png" class="img-fluid" alt="logo" style="width: 50px;margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 100%;"></td>
										<td align="right" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"><h6 class="collapse" style="margin: 0!important;padding: 0;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #444;font-weight: 900;font-size: 14px;text-transform: uppercase;">Captured Memories Travel and Tours</h6></td>
									</tr>
								</table>
								</div>
						</td>
						<td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
					</tr>
				</table><!-- /HEADER -->
				​
				​
				<!-- BODY -->
				<table class="body-wrap" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;">
					<tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
						<td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
						<td class="container" bgcolor="#FFFFFF" style="margin: 0 auto!important;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;">
				​
							<div class="content" style="margin-top: 50px;margin: 0 auto;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 600px;display: block;">
							<table style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;">
								<tr style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
									<td style="text-align: center;margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
										<h2 style="margin: 0;padding: 0;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;line-height: 1.1;margin-bottom: 35px;color: #000;font-weight: 200;font-size: 37px;">Password Reset</h2>
										<p class="lead" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 17px;line-height: 1.6;">Seems like you forgot your password for Captured Memories</p>
										<p class="lead" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 17px;line-height: 1.6;">Travel and Tours. If this true, click below to reset your password.</p>
										<div style="margin-top: 20px;margin-bottom: 20px;margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;">
											<a href="'.MAILHOST.'home/passwordReset?orion='.$data['id'].'&email='.$data['email'].'" class="btn" style="background-color: #007bff;padding: 14px 16px;font-size: 18px;margin: 20px 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #FFF;text-decoration: none;font-weight: bold;margin-right: 10px;text-align: center;cursor: pointer;display: inline-block;">Reset My Password</a>
										</div>
										<p class="lead" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 17px;line-height: 1.6;">If you do not forgot your password you can</p>
										<p class="lead" style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 17px;line-height: 1.6;">safely ignore this email.</p>
									</td>
								</tr>
							</table>
							</div><!-- /content -->
													
						</td>
						<td style="margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;"></td>
					</tr>
				</table><!-- /BODY -->
				​
				</body>
			</html>
		';

		return $string;
	}
}