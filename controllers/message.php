<?php

class Message extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->render('views/message/index.php');
	}
}