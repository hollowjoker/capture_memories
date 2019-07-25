<?php

class User extends Controller
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

	public function register() {
		$modelResult = $this->model->register();
		echo json_encode($modelResult);
		exit;
	}

	public function profile() {
		$this->view->render('views/user/index.php');
	}

}

?>