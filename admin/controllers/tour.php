<?php

class Tour extends Controller
{
	protected $module;

	function __construct()
	{
		parent::__construct();
		$this->module = "tour";
	}
	
	public function index()
	{
		$this->view->placeData = $this->model->getPlaceData();
		$this->view->tourData = $this->model->getTourData();
		$this->view->render('views/tour/index.php');
	}

	public function store() {
		$modelResult = $this->model->store();
		echo json_encode($modelResult);
		exit;

	}

	public function update() {
		$modelResult = $this->model->update();
		echo json_encode($modelResult);
		exit;
	}

	public function delete() {
		$modelResult = $this->model->delete();
		echo json_encode($modelResult);
		exit;
	}

	public function imageStore() {
		$modelResult = $this->model->imageStore();
		echo json_encode($modelResult);
		exit;
	}

	public function fetchGallery() {
		$modelResult = $this->model->fetchGallery();
		echo json_encode($modelResult);
		exit;
	}

}

?>