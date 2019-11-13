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
		$this->view->render('views/home/verify.php', true);
		exit;
		$this->view->render('views/home/forget.php', true);
		$this->view->render('views/home/mail.php', true);
		$this->view->tours = $this->model->getTourData('domestic');
		$this->view->international = $this->model->getTourData('international');
		$this->view->render('views/home/index.php');
	}
	
	public function mail() {
		// $this->view->render('views/home/mail.php');
	}
	public function forget() {
		// $this->view->render('views/home/mail.php');
	}
	public function verify() {
		// $this->view->render('views/home/mail.php');
	}

}

?>