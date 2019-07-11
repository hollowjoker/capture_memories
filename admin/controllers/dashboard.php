<?php
class Dashboard extends Controller
{
	protected $module;
	
	function __construct()
	{
		parent::__construct();
		$this->module = "dashboard";
	}
	
	public function index()
	{
		$this->view->render('views/'.$this->module.'/index.php');
	}

}

?>