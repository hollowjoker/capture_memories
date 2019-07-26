<?php

class Services extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->services = Data::Services();
		$this->view->domesticPlaces = $this->model->getPlaces('domestic');
		$this->view->internationalPlaces = $this->model->getPlaces('international');
		$this->view->render('views/services/index.php');
	}

	public function store() {
		$modelResult = $this->model->store();
		echo json_encode($modelResult);
		exit;
	}
}