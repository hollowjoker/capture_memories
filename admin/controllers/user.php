<?php

class User extends Controller
{
	protected $module;

	function __construct()
	{
		parent::__construct();
		$this->module = "user";
	}
	
	public function index()
	{
		$this->view->user = $this->model->fetchUser();
		$this->view->render('views/user/index.php');
	}

	// public function store() {
	// 	$modelResult = $this->model->store();
	// 	echo json_encode($modelResult);
	// 	exit;

	// }

	// public function update() {
	// 	$modelResult = $this->model->update();
	// 	echo json_encode($modelResult);
	// 	exit;
	// }

	// public function delete() {
	// 	$modelResult = $this->model->delete();
	// 	echo json_encode($modelResult);
	// 	exit;
	// }

}

?>