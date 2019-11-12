<?php

class Booking extends Controller
{
	protected $module;

	function __construct()
	{
		parent::__construct();
		$this->module = "booking";
	}
	
	public function index()
	{
		$this->view->ongoing = $this->model->fetchTour('ongoing');
		$this->view->done = $this->model->fetchTour('done');
		$this->view->render('views/booking/index.php');
	}

	public function fetchBookingCounter() {
		$data = $this->model->fetchBookingCounter();
		echo json_encode($data);
		exit;
	}
}

?>