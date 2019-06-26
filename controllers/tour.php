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
}