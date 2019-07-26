<?php

class message_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getConvo() {
		$userId = Session::getSession('user')['id'];
		$convoResult = [];
		if($_GET['type'] == 'tour') {
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
		} else {
			$type = $_GET['type'];
			$convoResult = DAOFactory::getTblServicesDAO()->getServices($userId, $type);

			foreach($convoResult as $k => $v) {
				$option = [
					'column' => 'created_at',
					'orderBy' => 'desc',
					'limit' => 1,
					'serviceId' => $v['id']
				];
				$convoResult[$k]['message'] = DAOFactory::getTblServicesMessageDAO()->getMessageByService($option);
			}
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

	public function store() {
		$user = Session::getSession('user');
		$option = [
			'column' => 'id',
			'orderBy' => 'desc',
			'limit' => 1
		];
		$admin = DAOFactory::getTblUserDAO()->getAdmin($option);
		$message = new TblMessage;
		$message->tblConvoId = $_POST['tblConvoId'];
		$message->description = $_POST['description'];
		$message->tblSenderId = $user['id'];
		$message->tblReceiverId = $admin[0]['id'];
		$message = Controller::insertDate($message);

		$messageResult = DAOFactory::getTblMessageDAO()->insert($message);

		$convo = DAOFactory::getTblConvoDAO()->load($_POST['tblConvoId']);
		$convo->status = "unread";
		$convo = Controller::insertDateUpdate($convo);
		
		$convoResult = DAOFactory::getTblConvoDAO()->update($convo);
		return $message;
	}
}

?>