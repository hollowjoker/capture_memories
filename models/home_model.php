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
			'limit' => 5
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
}

?>