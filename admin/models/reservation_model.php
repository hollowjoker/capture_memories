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
		$uploadOk = 1;
		$target_dir = getcwd().DIRECTORY_SEPARATOR."../public/images/files/";
		$target_file = null;
		$public_file = null;
		$check = true;

		$result = [];
		$result['type'] = 'error';
		if($_FILES["file"]["size"] > 0) {
			$target_file = $target_dir . basename($_FILES["file"]["name"]);

			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$target_public_dir = MAIN_URL."public/images/files/";
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
		$convo = Controller::insertDateUpdate($convo);
		
		$convoResult = DAOFactory::getTblConvoDAO()->update($convo);

		$result = [
			'type' => 'success' 
		];
		return $result;
	}

	public function update() {
		$update = DAOFactory::getTblBookingDAO()->load($_GET['id']);
		$update->status = $_GET['status'];
		$update = Controller::insertDateUpdate($update);

		$result = DAOFactory::getTblBookingDAO()->update($update);
		return $result;
	}
}

?>