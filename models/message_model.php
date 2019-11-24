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

		$uploadOk = 1;
		$target_dir = getcwd().DIRECTORY_SEPARATOR."public/images/files/";

		$target_file = null;
		$public_file = null;
		$check = true;

		$result = [];
		$result['type'] = 'error';
		if($_FILES["file"]["size"] > 0) {
			$target_file = $target_dir . basename($_FILES["file"]["name"]);

			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$target_public_dir = URL."public/images/files/";
			$public_file = $target_public_dir . basename($_FILES["file"]["name"]);
			$check = getimagesize($_FILES["file"]["tmp_name"]);

			if($check === false && $_FILES["file"]["size"] > 0) {
				$result['messages'] = "File is not an image.";
				$uploadOk = 0;
				return $result;
			}

			if($_FILES["file"]["size"] > 5000000) {
				$result['messages'] = "Sorry, your file is too large.";
				$uploadOk = 0;
				return $result;
			}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $_FILES["file"]["size"] > 0) {
				$result['messages'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
				$uploadOk = 0;
				return $result;
			}
		}
		if($uploadOk == 0 && $_FILES["file"]["size"] > 0) {
			$result['messages'] = "Sorry, your file was not uploaded.";
			return $result;
		} else {
			if($_FILES["file"]["size"] > 0) {
				if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
					$message = new TblMessage;
					$message->tblConvoId = $_POST['tblConvoId'];
					$message->description = $_POST['description'];
					$message->tblSenderId = $user['id'];
					$message->tblReceiverId = $admin[0]['id'];

					$message = Controller::insertDate($message);
					
					$messageResult = DAOFactory::getTblMessageDAO()->insert($message);

					$loadMessageData = DAOFactory::getTblMessageDAO()->load($messageResult);
					$loadMessageData->description = $public_file;
					DAOFactory::getTblMessageDAO()->update($loadMessageData);

					$result['type'] = 'success';
				} else {
					$result['messsages'] = "Sorry, there was an error uploading your file.";
					return $result;
				}
			}
		}

		$convo = DAOFactory::getTblConvoDAO()->load($_POST['tblConvoId']);
		$convo->status = "unread";
		$convo = Controller::insertDateUpdate($convo);
		
		$convoResult = DAOFactory::getTblConvoDAO()->update($convo);

		$result = [
			'type' => 'success' 
		];
		return $result;
	}
}

?>