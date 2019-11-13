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
		$modelResult = $this->model->verifyEmail();;
		return $modelResult;
	}

}

?>