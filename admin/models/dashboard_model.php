<?php

class Dashboard_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function fetchTotalSales() {
		$data = DAOFactory::getTblBookingDAO()->fetchTotalSales();
		$totalSales = 0;
		if(count($data)) {
			foreach($data as $k => $v) {
				$totalSales += $v['price'] * $v['quantity'];
			}
		}
		return $totalSales;
	}

	public function fetchTotalCustomers() {
		$data = DAOFactory::getTblUserDAO()->fetchTotalCustomers();
		$totalCustomers = count($data) ? $data[0][0] : 0;
		return $totalCustomers;
	}

	public function fetchTotalBookings($type) {
		$data = DAOFactory::getTblBookingDAO()->fetchTotalBookings($type);
		$total = count($data) ? $data[0][0] : 0;
		return $total;
	}
}

?>