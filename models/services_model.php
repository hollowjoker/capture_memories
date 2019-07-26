<?php

class services_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function store() {
		$user = Session::getSession('user');
		$birthDate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
		$formatedDate = date('Y-m-d',strtotime($birthDate));
		$serviceType = $_POST['service_type'];
		
		if($serviceType == 'wifi') {
			$type = $_POST['type'];
			$data = new TblWifiRental;
			$data->tblUserId = $user['id'];
			$data->passengerName = $_POST['passenger_name'];
			$data->destination = $_POST[$type];
			$data->destinationType = $type;
			$data->status = 'pending';
			$data->traveledFromAt = date('Y-m-d', strtotime($_POST['travelFromAt']));
			$data->traveledToAt = date('Y-m-d', strtotime($_POST['travelToAt']));
			$data = Controller::insertDate($data);

			$baseResultId = DAOFactory::getTblWifiRentalDAO()->insert($data);
		}
		if($serviceType == 'airline') {
			$type = $_POST['type'];
			$data = new TblAirlineTicketRe;
			$data->tblUserId = $user['id'];
			$data->passengerName = $_POST['name'];
			$data->age = $_POST['age'];
			$data->type = $_POST['type'];
			$data->birthDate = $formatedDate;
			$data->status = 'pending';
			if($type != 'domestic') {
				$data->passportNo = $_POST['passport_number'];
				$data->expiryDate = date('Y-m-d', strtotime($_POST['expiry_date']));
			}
			$data = Controller::insertDate($data);

			$baseResultId = DAOFactory::getTblAirlineTicketResDAO()->insert($data);
		}
		if($serviceType == 'visa') {
			$data = new TblVisaProcessing;
			$data->tblUserId = $user['id'];
			$data->passengerName = $_POST['name'];
			$data->age = $_POST['age'];
			$data->traveledFromAt = date('Y-m-d', strtotime($_POST['departingAt']));
			$data->traveledToAt = date('Y-m-d', strtotime($_POST['returningAt']));
			$data->status = 'pending';
			$data = Controller::insertDate($data);

			$baseResultId = DAOFactory::getTblVisaProcessingDAO()->insert($data);
		}
		if($serviceType == 'travel') {
			$data = new TblTravelInsurance;
			$data->tblUserId = $user['id'];
			$data->passengerName = $_POST['name'];
			$data->age = $_POST['age'];
			$data->birthDate = $formatedDate;
			$data->status = 'pending';
			$data = Controller::insertDate($data);

			$baseResultId = DAOFactory::getTblTravelInsuranceDAO()->insert($data);
		}
		$service = new TblService;
		$service->tblUserId = $user['id'];
		$service->tblServiceId = $baseResultId;
		$service->status = 'active';
		$service->type = $serviceType;
		$service = Controller::insertDate($service);

		$serviceResult = DAOFactory::getTblServicesDAO()->insert($service);
		
		$option = [
			'column' => 'id',
			'orderBy' => 'desc',
			'limit' => 1
		];
		$admin = DAOFactory::getTblUserDAO()->getAdmin($option);

		$serviceMessage = new TblServicesMessage;
		$serviceMessage->tblSenderId = $user['id'];
		$serviceMessage->tblReceiverId = $admin[0]['id'];
		$serviceMessage->tblServicesId = $serviceResult;
		$serviceMessage->description = $_POST['message'];
		$serviceMessage = Controller::insertDate($serviceMessage);

		$serviceMessageResult = DAOFactory::getTblServicesMessageDAO()->insert($serviceMessage);

		$result = [
			'type' => 'success',
			'messages' => 'Inquiry submitted, please wait for our confirmation. Thank you!'
		];

		return $result;
		
	}

	public function getPlaces($type) {
		$option = [
			'column' => 'name',
			'orderBy' => 'asc',
			'where' => [
				'column' => 'type',
				'value' => $type
			]
		];
		$places = DAOFactory::getTblPlaceDAO()->getPlace($option);

		return $places;
	}
}

?>