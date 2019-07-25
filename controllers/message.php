<?php

class Message extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->convo = $this->model->getConvo();
		$this->view->render('views/message/index.php');
    }
    
    public function convo() {
		$this->view->tourDetails = $this->model->getTourDetails();
        $this->view->render('views/message/convo.php');
	}
	
	public function store () {
		$modelResult = $this->model->store();
		echo json_encode($modelResult);
		exit;
	}
}