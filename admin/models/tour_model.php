<?php

class Tour_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function store() {
		$uploadOk = 1;
		$target_dir = getcwd().DIRECTORY_SEPARATOR."../public/images/tour/";
		$target_file = $target_dir . basename($_FILES["imagePath"]["name"]);
		$target_public_dir = MAIN_URL."public/images/tour/";
		$public_file = $target_public_dir . basename($_FILES["imagePath"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$check = getimagesize($_FILES["imagePath"]["tmp_name"]);
		$result = [];
		$result['type'] = 'error';
		if($check === false) {
			$result['messages'] = "File is not an image.";
			$uploadOk = 0;
			return $result;
		}
		if(file_exists($target_file)) {
			$result['messages'] = "Sorry, file already exists.";
			$uploadOk = 0;
			return $result;
		}
		if($_FILES["imagePath"]["size"] > 5000000) {
			$result['messages'] = "Sorry, your file is too large.";
			$uploadOk = 0;
			return $result;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			$result['messages'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
			$uploadOk = 0;
			return $result;
		}
		if($uploadOk == 0) {
			$result['messages'] = "Sorry, your file was not uploaded.";
			return $result;
		} else {
			if(move_uploaded_file($_FILES["imagePath"]["tmp_name"], $target_file)) {
				$tour = new TblTourPackage;
				$tour->name = $_POST['name'];
				$tour->placeId = $_POST['placeId'];
				$tour->travelPeriodFromAt = date('Y-m-d',strtotime($_POST['travelPeriodFromAt']));
				$tour->travelPeriodToAt = date('Y-m-d',strtotime($_POST['travelPeriodToAt']));
				$tour->sellingPeriod = $_POST['sellingPeriod'];
				$tour->description = $_POST['description'];
				$tour->status = isset($_POST['status']) ? 'active' : 'inactive';
				$tour->imagePath = $target_file;
				$tour->imagePublicPath = $public_file;
				$tour = Controller::insertDate($tour);

				$insertResult = DAOFactory::getTblTourPackageDAO()->insert($tour);

				foreach($_POST['price'] as $k => $v) {
					$tourMeta = new TblTourPackageMeta;
					$tourMeta->price = $v;
					$tourMeta->status = isset($_POST['metaStatus'][$k]) ? 'active' : 'inactive';
					$tourMeta->quantity = $_POST['quantity'][$k];
					$tourMeta->tblTourPackageId = $insertResult;
					$tourMeta = Controller::insertDate($tourMeta);
					$insertMetaResult = DAOFactory::getTblTourPackageMetaDAO()->insert($tourMeta);
				}
				$result = [
					'type' => 'success',
					'messages' => 'Submit Successful'
				];

				return $result;

			} else {
				$result['messsages'] = "Sorry, there was an error uploading your file.";
				return $result;
			}
		}

	}

	public function getTourData() {
		$result = DAOFactory::getTblTourPackageDAO()->getTourPlaceData();
		foreach($result as $k => $v) {
			$result[$k]['meta'] = DAOFactory::getTblTourPackageMetaDAO()->getTourMetaData($v['id']);
		}
		return $result;
	}
	
	public function getPlaceData() {
		$availableOn = "tour_status";
		$result = DAOFactory::getTblPlaceDAO()->getPlaceByAvailability($availableOn);
		return $result;
	}
	
	public function update() {
		$result = DAOFactory::getTblTourPackageDAO()->load($_REQUEST['id']);
		$result->meta = DAOFactory::getTblTourPackageMetaDAO()->queryByTblTourPackageId($result->id);
		return $result;
	}
}