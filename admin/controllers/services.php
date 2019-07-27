<?php

class Services extends Controller
{
	protected $module;

	function __construct()
	{
		parent::__construct();
		$this->module = "services";
	}
	
	public function index()
	{
		$this->view->services = $this->model->getServices();
		$this->view->render('views/services/index.php');
	}

	public function convo()
	{
		$this->view->services = $this->model->getSingleConvoData();
		$this->view->render('views/services/convo.php');
	}

	public function messageStore() {
		$modelResult = $this->model->messageStore();
		echo json_encode($modelResult);
		exit;
	}
	
	public function update() {
		$modelResult = $this->model->update();
		echo json_encode($modelResult);
		exit;
	}
}

?>