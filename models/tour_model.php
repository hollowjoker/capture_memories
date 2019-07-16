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
		return $tour;
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
}

?>