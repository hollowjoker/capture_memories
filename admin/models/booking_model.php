<?php

class Booking_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function fetchTour($status) {
		$data = DAOFactory::getTblBookingDAO()->fetchBookingWithStatus($status);
		return $data;
	}
	
	public function fetchBookingCounter() {
		$type = $_GET['countertype'];
		$data = [];
		if($type == "reservation") {
			$data = DAOFactory::getTblConvoDAO()->fetchConvoByStatus('unread');
		} else {
			$data = DAOFactory::getTblServicesMessageDAO()->fetchConvoByStatus();
		}
		return $data;
	}
}

?>