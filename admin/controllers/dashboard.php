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
		$this->view->totalSales = $this->model->fetchTotalSales();
		$this->view->totalCustomers = $this->model->fetchTotalCustomers();
		$this->view->totalLocalBookings = $this->model->fetchTotalBookings('local');
		$this->view->totalInternationalBookings = $this->model->fetchTotalBookings('international');
		$this->view->render('views/'.$this->module.'/index.php');
	}

}

?>