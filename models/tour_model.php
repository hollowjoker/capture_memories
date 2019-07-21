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
			'orderBy' => 'desc',
		];
		foreach($tour as $k => $v) {
			$tour[$k]['meta'] = DAOFactory::getTblTourPackageMetaDAO()->getTourMeta($v['id'], $optionMeta);
		}
		return $tour;
	}
}

?>