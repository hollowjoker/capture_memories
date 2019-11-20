<?php

class home_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getTourData($tourType) {
		$option = [
			'column' => 'tour.created_at',
			'orderBy' => 'desc',
			'limit' => 5,
			'offset' => 2
		];
		$tour = DAOFactory::getTblTourPackageDAO()->getTourPlaceByType($tourType, $option);

		$optionMeta = [
			'column' => 'price',
			'orderBy' => 'asc',
			'limit' => 1
		];
		foreach($tour as $k => $v) {
			$tour[$k]['meta'] = DAOFactory::getTblTourPackageMetaDAO()->getTourMeta($v['id'], $optionMeta);
		}
		return $tour;
	}

	public function getTourDataRecent($tourType) {
		$option = [
			'column' => 'tour.created_at',
			'orderBy' => 'desc',
			'limit' => 3
		];
		$tour = DAOFactory::getTblTourPackageDAO()->getTourPlaceByType($tourType, $option);

		$optionMeta = [
			'column' => 'price',
			'orderBy' => 'asc',
			'limit' => 1
		];
		foreach($tour as $k => $v) {
			$tour[$k]['meta'] = DAOFactory::getTblTourPackageMetaDAO()->getTourMeta($v['id'], $optionMeta);
		}
		return $tour;
	}

	public function verifyEmail() {
		$id = $_GET['orion'];
		$email = $_GET['email'];
		$userData = DAOFactory::getTblUserDAO()->checkVerify($id, $email);
		$result = [
			'type' => 'error',
			'messages' => 'Invalid Credentials'
		];
		if(count($userData)) {
			$loadedUser = DAOFactory::getTblUserDAO()->load($id);
			$loadedUser->active = "active";
			
			DAOFactory::getTblUserDAO()->update($loadedUser);

			$userSignData = DAOFactory::getTblUserDAO()->queryByEmailWhereActive($email)[0];
			$userSession = Session::setSession('user',$userSignData);

		}
		$result = [
			'type' => 'success',
			'messages' => 'Verify Success!'
		];

		return $result;
	}
}

?>