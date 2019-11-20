<?php

class Reservation extends Controller
{
	protected $module;

	function __construct()
	{
		parent::__construct();
		$this->module = "reservation";
	}
	
	public function index()
	{
		$this->view->convo = $this->model->getConvoData();
		$this->view->render('views/reservation/index.php');
	}

	public function messageStore() {
		$modelResult = $this->model->messageStore();
		echo json_encode($modelResult);
		exit;
	}

	public function convo() {
		$this->view->convo = $this->model->getSingleConvoData();
		$this->view->render('views/reservation/convo.php');
	}

	public function update() {
		$modelResult = $this->model->update();
		echo json_encode($modelResult);
		exit;
	}

	public function updateBookingStatus() {
		$modelResult = $this->model->updateBookingStatus();
		echo json_encode($modelResult);
		exit;
	}
}

?>