<?php

class Services_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getServices() {
		$type = $_GET['type'];
		$convoResult = DAOFactory::getTblServicesDAO()->getServices($type);

		foreach($convoResult as $k => $v) {
			$option = [
				'column' => 'message.created_at',
				'orderBy' => 'desc',
				'limit' => 1,
				'serviceId' => $v['id']
			];
			$convoResult[$k]['message'] = DAOFactory::getTblServicesMessageDAO()->getMessageByService($option);
		}
		return $convoResult;
	}

	public function getSingleConvoData() {
		$id = $_GET['id'];
		$type = $_GET['type'];
		$convoDataResult = DAOFactory::getTblServicesDAO()->getSingleService($id, $type);

		foreach($convoDataResult as $k => $v) {
			$option = [
				'column' => 'message.created_at',
				'orderBy' => 'desc',
				'serviceId' => $v['id']
			];
			$convoDataResult[$k]['messages'] = DAOFactory::getTblServicesMessageDAO()->getMessageByService($option);
		}
		return $convoDataResult;
	}
	
	public function messageStore() {
		$admin = Session::getSession('admin');
		$option = [
			'column' => 'id',
			'orderBy' => 'desc',
			'limit' => 1
		];
		$message = new TblServicesMessage;
		$message->tblServicesId = $_POST['tblServicesId'];
		$message->description = $_POST['description'];
		$message->tblSenderId = $admin['id'];
		$message->tblReceiverId = $_POST['tblReceiverId'];
		$message = Controller::insertDate($message);

		$messageResult = DAOFactory::getTblServicesMessageDAO()->insert($message);

		$convo = DAOFactory::getTblServicesDAO()->load($_POST['tblServicesId']);
		$convo = Controller::insertDateUpdate($convo);
		
		$convoResult = DAOFactory::getTblServicesDAO()->update($convo);
		return $message;
	}

	public function update() {
		$type = $_GET['type'];
		if($type == 'airline') {
			$data = DAOFactory::getTblAirlineTicketResDAO()->load($_GET['id']);
			$data->status = $_GET['status'];
			$data = Controller::insertDateUpdate($data);

			DAOFactory::getTblAirlineTicketResDAO()->update($data);
		} elseif($type == 'travel') {
			$data = DAOFactory::getTblTravelInsuranceDAO()->load($_GET['id']);
			$data->status = $_GET['status'];
			$data = Controller::insertDateUpdate($data);

			DAOFactory::getTblTravelInsuranceDAO()->update($data);
		} elseif ($type == 'visa') {
			$data = DAOFactory::getTblVisaProcessingDAO()->load($_GET['id']);
			$data->status = $_GET['status'];
			$data = Controller::insertDateUpdate($data);

			DAOFactory::getTblVisaProcessingDAO()->update($data);
		} elseif ($type == 'wifi') {
			$data = DAOFactory::getTblWifiRentalDAO()->load($_GET['id']);
			$data->status = $_GET['status'];
			$data = Controller::insertDateUpdate($data);

			DAOFactory::getTblWifiRentalDAO()->update($data);	
		}

		return $type;
	}
}