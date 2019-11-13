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
	
	public function verifyEmail() {
		$this->view->$modelResult = $this->model->verifyEmail();
		$this->view->render('views/home/verify.php');
	}

	public function passwordReset() {
		echo 1;
	}

}

?>