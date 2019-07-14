<?php
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

	static function reConstArray($array) {
		$arr = [];
		foreach($array as $k => $v) {
			if(!is_numeric($k)) {
				$arr[$k] = $v;
			}
		}
		return $arr;
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
	
}