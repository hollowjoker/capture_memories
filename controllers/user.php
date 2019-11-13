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

	public function update() {
		$modelResult = $this->model->update();
		echo json_encode($modelResult);
		exit;
	}

	public function submitForgotPassword() {
		$modelResult = $this->model->submitForgotPassword();
		echo json_encode($modelResult);
		exit;	
	}

	public function submitVerifyPassword() {
		$modelResult = $this->model->submitVerifyPassword();
		echo json_encode($modelResult);
		exit;
	}

}

?>