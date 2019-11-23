<?php

class Tour extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$type = isset($_GET['type']) ? $_GET['type'] : '';
		$this->view->tours = $type == 'domestic' || $type == '' ? $this->model->getTourAllData('domestic') : [];
		$this->view->international = $type == 'international' || $type == '' ? $this->model->getTourAllData('international') : [];
		$this->view->render('views/tour/index.php');
	}

	public function international()
	{
		$this->view->type = "International";
		$this->view->tour = $this->model->getTourData();
		$this->view->referenceNo = Controller::generateReference();
		$this->view->render('views/tour/package.php');
	}

	public function domestic()
	{
		$this->view->type = "Local";
		$this->view->tour = $this->model->getTourData();
		$this->view->referenceNo = Controller::generateReference();
		$this->view->render('views/tour/package.php');
	}
	
	public function bookingStore() {
		$modelResult = $this->model->bookingStore();
		echo json_encode($modelResult);
		exit;
	}

	public function tourChecker() {
		$modelResult = $this->model->tourChecker();
		echo json_encode($modelResult);
		exit;
	}

	public function fetchBookingCounter() {
		$modelResult = $this->model->fetchBookingCounter();
		echo json_encode($modelResult);
		exit;
	}
}