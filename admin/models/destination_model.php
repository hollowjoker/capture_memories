<?php

class Destination_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getDestinationData() {
		$result = DAOFactory::getTblPlaceDAO()->queryAll();
		return $result;
	}
	public function store() {
		$insert = new TblPlace;
		$insert->name = $_POST['name'];
		$insert->type = $_POST['type'];
		$insert->description = $_POST['description'];
		$insert->airlineStatus = isset($_POST['airlineStatus']) ? 'yes' : 'no';
		$insert->visaStatus = isset($_POST['visaStatus']) ? 'yes' : 'no';
		$insert->wifiStatus = isset($_POST['wifiStatus']) ? 'yes' : 'no';
		$insert->tourStatus = isset($_POST['tourStatus']) ? 'yes' : 'no';
		$insert->status = isset($_POST['status']) ? 'active' : 'inactive';
		$insert = Controller::insertDate($insert);
		$inserResult = DAOFactory::getTblPlaceDAO()->insert($insert);
		if($inserResult) {
			$result = [
				'type' => 'success',
				'messages' => 'Submit Successful!'
			];
		} else {
			$result = [
				'type' => 'error',
				'messages' => 'There has been an error, please try again later.'
			];
		}
		return $result;
	}
}