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
		$this->view->render('views/services/index.php');
	}
}