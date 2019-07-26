<?php

class Reservation_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function getConvoData() {
		$convoResult = DAOFactory::getTblConvoDAO()->getCompleteConvos();
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

	public function getSingleConvoData() {
		
		$id = $_GET['id'];
		$convo = DAOFactory::getTblConvoDAO()->load($id);
		$convo->status = "read";

		$convoResult = DAOFactory::getTblConvoDAO()->update($convo);

		
		$convoDataResult = DAOFactory::getTblConvoDAO()->getConvo($id);

		foreach($convoDataResult as $k => $v) {
			$option = [
				'column' => 'message.created_at',
				'orderBy' => 'desc',
				'convoId' => $v['id']
			];
			$convoDataResult[$k]['messages'] = DAOFactory::getTblMessageDAO()->getMessageByConvo($option);
			$bookingOption = [
				'bookingId' => $v['booking_id']
			];
			$convoDataResult[$k]['booking_meta'] = DAOFactory::getTblBookingMetaDAO()->getMetaByBooking($bookingOption);
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
		$message = new TblMessage;
		$message->tblConvoId = $_POST['tblConvoId'];
		$message->description = $_POST['description'];
		$message->tblSenderId = $admin['id'];
		$message->tblReceiverId = $_POST['tblReceiverId'];
		$message = Controller::insertDate($message);

		$messageResult = DAOFactory::getTblMessageDAO()->insert($message);

		$convo = DAOFactory::getTblConvoDAO()->load($_POST['tblConvoId']);
		$convo = Controller::insertDateUpdate($convo);
		
		$convoResult = DAOFactory::getTblConvoDAO()->update($convo);
		return $message;
	}
}

?>