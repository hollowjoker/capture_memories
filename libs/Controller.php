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
		return "Hi please verify your account <a href='".MAILHOST."home/verifyEmail?orion=".$data['id']."&email=".$data['email']."'>Verify</a>";
	}
	
}