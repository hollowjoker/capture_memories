<?php

class Destination extends Controller
{
	protected $module;

	function __construct()
	{
		parent::__construct();
		$this->module = "destination";
	}
	
	public function index()
	{
		$this->view->destinationData = $this->model->getDestinationData();
		$this->view->render('views/destination/index.php');
	}

	public function store() {
		$modelResult = $this->model->store();
		echo json_encode($modelResult);
		exit;
	}

	public function getDestination() {
		$modelResult = $this->model->getDestination();
		echo json_encode($modelResult);
		exit;
	}

}

?>