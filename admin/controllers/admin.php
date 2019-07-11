<?php

class Admin extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function login()
	{
		$modelResult = $this->model->login();
		echo json_encode($modelResult);
		exit;
	}
	
	public function logout()
	{
		session::destroy();
		header('Location:'.URL);
	}

}

?>