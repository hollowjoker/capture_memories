<?php

class message_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getConvo() {
		$userId = Session::getSession('user')['id'];
		$convoResult = DAOFactory::getTblConvoDAO()->getConvo($userId);

		foreach($convoResult as $k => $v) {
			$option = [
				'column' => 'created_at',
				'orderBy' => 'desc',
				'limit' => 1,
				'convoId' => $v['id']
			];
			$convoResult[$k]['message'] = DAOFactory::getTblMessageDAO()->getMessageByConvo($option);
		}
		return $convoResult;
	}

	public function getTourDetails() {
		$convoId = $_REQUEST['id'];
		$convoResult = DAOFactory::getTblConvoDAO()->getConvoById($convoId);

		foreach($convoResult as $k => $v) {
			$option = [
				'column' => 'created_at',
				'orderBy' => 'desc',
				'convoId' => $v['id']
			];
			$convoResult[$k]['messages'] = DAOFactory::getTblMessageDAO()->getMessageByConvo($option);
			$bookingOption = [
				'bookingId' => $v['booking_id']
			];
			$convoResult[$k]['booking_meta'] = DAOFactory::getTblBookingMetaDAO()->getMetaByBooking($bookingOption);
		}
		return $convoResult;
	}
}

?>