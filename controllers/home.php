<?php

class Home extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->module = "home";
	}
	
	public function index()
	{
		$this->view->tours = $this->model->getTourData('domestic');
		$this->view->international = $this->model->getTourData('international');
		$this->view->render('views/home/index.php');
	}
	
	public function mail() {
		$this->view->render('views/home/mail.php', true);
	}
	public function forget() {
		$this->view->render('views/home/forget.php', true);
	}
	public function verify() {
		$this->view->render('views/home/verify.php', true);
	}
	public function reset_password() {
		$this->view->render('views/home/reset_password.php');
	}
	public function verify_password() {
		$this->view->render('views/home/verify_password.php');
	}

}

?>