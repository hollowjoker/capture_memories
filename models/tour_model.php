<?php

class tour_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getTourData() {
		$option = [
			'id' => $_GET['id']
		];
		$tourType = "";
		$tour = DAOFactory::getTblTourPackageDAO()->getTourPlaceByType($tourType, $option);
		$optionMeta = [
			'column' => 'quantity',
			'orderBy' => 'asc',
		];
		foreach($tour as $k => $v) {
			$tour[$k]['meta'] = DAOFactory::getTblTourPackageMetaDAO()->getTourMeta($v['id'], $optionMeta);
		}
		return $tour;
	}

	public function bookingStore() {
		$user = Session::getSession('user');
		$booking = new TblBooking;
		$booking->tblTourPackageMetaId = $_POST['metaId'];
		$booking->departingAt = date('Y-m-d', strtotime($_POST['departingAt']));
		$booking->returningAt = date('Y-m-d', strtotime($_POST['returningAt']));
		$booking->transactionNo = $_POST['referenceNo'];
		$booking->tblUserId = $user['id'];
		$booking->status = 'pending';
		$booking = Controller::insertDate($booking);

		$bookingResult = DAOFactory::getTblBookingDAO()->insert($booking);

		foreach($_POST['companionName'] as $k => $v) {
			$bookingMeta = new TblBookingMeta;
			$bookingMeta->tblBookingId = $bookingResult;
			$bookingMeta->companionName = $v;
			$bookingMeta->age = $_POST['age'][$k];
			$bookingMeta = Controller::insertDate($bookingMeta);

			$bookingMetaResult = DAOFactory::getTblBookingMetaDAO()->insert($bookingMeta);
		}

		$convo = new TblConvo;
		$convo->tblUserId = $user['id'];
		$convo->tblBookingId = $bookingResult;
		$convo->status = "unread";
		$convo = Controller::insertDate($convo);

		$convoResult = DAOFactory::getTblConvoDAO()->insert($convo);


		$option = [
			'column' => 'id',
			'orderBy' => 'desc',
			'limit' => 1
		];
		$admin = DAOFactory::getTblUserDAO()->getAdmin($option);

		$message = new TblMessage;
		$message->tblConvoId = $convoResult;
		$message->tblSenderId = $user['id'];
		$message->tblReceiverId = $admin[0]['id'];
		$message->description = $_POST['description'];
		$message = Controller::insertDate($message);

		$messageResult = DAOFactory::getTblMessageDAO()->insert($message);
		
		$result = [
			'type' => 'success',
			'messages' => 'Reservation has been submitted. Please wait for the confirmation a travel agent will send you a message through your inbox. Thank You!'
		];

		return $result;
	}

	public function getTourAllData($tourType) {
		$option = [
			'column' => 'tour.created_at',
			'orderBy' => 'desc',
		];
		$tour = DAOFactory::getTblTourPackageDAO()->getTourPlaceByType($tourType, $option);

		$optionMeta = [
			'column' => 'price',
			'orderBy' => 'asc',
		];
		if($tourType == 'international') {
			$option['limit'] = 1;
		}
		foreach($tour as $k => $v) {
			$tour[$k]['meta'] = DAOFactory::getTblTourPackageMetaDAO()->getTourMeta($v['id'], $optionMeta);
		}
		
		return $tour;
	}
	
	public function tourChecker() {
		$departing = date('Y-m-d', strtotime($_POST['departing']));
		$returning = date('Y-m-d', strtotime($_POST['returning']));
		
		$params = [
			'departing' => $departing,
			'returning' => $returning,
			'metaId' => $_POST['metaId']
		];
		$packageData = DAOFactory::getTblTourPackageMetaDAO()->fetchTour($_POST['metaId']);
		$bookingData = DAOFactory::getTblBookingDAO()->tourChecker($params);
		$bookingCount = 0;
		foreach($bookingData as $k => $v) {
			$bookingCount += $v['quantity'];
		}
		$tourLimit = count($packageData) ? $packageData[0]['tour_limit'] : 0;
		$totalSlot = $tourLimit - $bookingCount;
		return array(
			'slot' => $totalSlot
		);
	}
}

?>