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
		$target_file = null;
		$public_file = null;
		$check = true;

		$result = [];
		$result['type'] = 'error';

		if($_FILES["imagePath"]["size"] > 0) {
			$target_file = $target_dir . basename($_FILES["imagePath"]["name"]);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$target_public_dir = MAIN_URL."public/images/tour/";
			$public_file = $target_public_dir . basename($_FILES["imagePath"]["name"]);
			$check = getimagesize($_FILES["imagePath"]["tmp_name"]);

			if($check === false && $_FILES["imagePath"]["size"] > 0) {
				$result['messages'] = "File is not an image.";
				$uploadOk = 0;
				return $result;
			}
			if(file_exists($target_file) && $_FILES["imagePath"]["size"] > 0) {
				$result['messages'] = "Sorry, file already exists.";
				$uploadOk = 0;
				return $result;
			}
			if($_FILES["imagePath"]["size"] > 5000000) {
				$result['messages'] = "Sorry, your file is too large.";
				$uploadOk = 0;
				return $result;
			}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $_FILES["imagePath"]["size"] > 0) {
				$result['messages'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
				$uploadOk = 0;
				return $result;
			}
		}
		
		if($uploadOk == 0 && $_FILES["imagePath"]["size"] > 0) {
			$result['messages'] = "Sorry, your file was not uploaded.";
			return $result;
		} else {
			if($_FILES["imagePath"]["size"] > 0) {
				if(move_uploaded_file($_FILES["imagePath"]["tmp_name"], $target_file)) {
				} else {
					$result['messsages'] = "Sorry, there was an error uploading your file.";
					return $tour;
				}
			}
			if($_POST['id']) {
				$tour = DAOFactory::getTblTourPackageDAO()->load($_POST['id']);
				$tour = Controller::insertDateUpdate($tour);

				if($_FILES["imagePath"]["size"] > 0) {
					$tour->imagePath = $target_file;
					$tour->imagePublicPath = $public_file;
				}
			} else {
				$tour = new TblTourPackage;
				$tour->imagePath = $target_file;
				$tour->imagePublicPath = $public_file;
				$tour = Controller::insertDate($tour);
			}
			$tour->name = $_POST['name'];
			$tour->placeId = $_POST['placeId'];
			$tour->travelPeriodFromAt = $_POST['travelPeriodFromAt'];
			$tour->travelPeriodToAt = $_POST['travelPeriodToAt'];
			$tour->sellingPeriod = $_POST['sellingPeriod'];
			$tour->tourLimit = $_POST['tourLimit'];
			$tour->description = $_POST['description'];
			$tour->status = isset($_POST['status']) ? 'active' : 'inactive';

			$tourId = 0;
			if($_POST['id']) {
				$insertResult = DAOFactory::getTblTourPackageDAO()->update($tour);
				$tourId = $tour->id;
			} else {
				$insertResult = DAOFactory::getTblTourPackageDAO()->insert($tour);
				$tourId = $insertResult;
			}


			foreach($_POST['price'] as $k => $v) {
				if($_POST['metaId'][$k]){
					$tourMeta = DAOFactory::getTblTourPackageMetaDAO()->load($_POST['metaId'][$k]);
				} else {
					$tourMeta = new TblTourPackageMeta;
				}
				$tourMeta->price = $v;
				$tourMeta->status = isset($_POST['metaStatus'][$k]) ? 'active' : 'inactive';
				$tourMeta->quantity = $_POST['quantity'][$k];
				$tourMeta->tblTourPackageId = $tourId;
				$tourMeta = Controller::insertDate($tourMeta);
				if($_POST['metaId'][$k]) {	
					$insertMetaResult = DAOFactory::getTblTourPackageMetaDAO()->update($tourMeta);
				} else {
					$insertMetaResult = DAOFactory::getTblTourPackageMetaDAO()->insert($tourMeta);
				}
			}
			$result = [
				'type' => 'success',
				'messages' => 'Submit Successful'
			];

			return $result;

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

	public function delete() {
		$id = $_GET['id'];
		$tour = DAOFactory::getTblTourPackageDAO()->load($id);
		$tour = Controller::deleteDate($tour);
		$tourResult = DAOFactory::getTblTourPackageDAO()->update($tour);

		$result = [
			'type' => 'success'
		];
		return $result;
	}
}