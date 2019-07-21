<?php

class Tour extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->render('views/tour/index.php');
	}

	public function international()
	{
		$this->view->tour = $this->model->getTourData();
		$this->view->render('views/tour/index.php');
	}
	
	public function bookingStore() {
		$modelResult = $this->model->bookingStore();
		echo json_encode($modelResult);
		exit;
	}
}