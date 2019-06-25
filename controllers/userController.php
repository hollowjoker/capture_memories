<?php

class UserController extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function login()
	{
		$this->model->login();
	}
	
	public function logout()
	{
		echo 1;
		session::destroy();
		header('Location:'.URL);
	}

}

?>