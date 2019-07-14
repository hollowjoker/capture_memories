<?php

class Tour extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->render('views/tour/index.php');
	}

	public function international()
	{
		$this->view->render('views/international/index.php');
	}
}