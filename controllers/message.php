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
        $this->view->render('views/message/convo.php');
    }
}