<?php

class home_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getTourData($tourType) {
		$tour = DAOFactory::getTblTourPackageDAO()->getTourPlaceByType($tourType);
		$option = [
			'column' => 'price',
			'orderBy' => 'asc',
			'limit' => 1
		];
		foreach($tour as $k => $v) {
			$tour[$k]['meta'] = DAOFactory::getTblTourPackageMetaDAO()->getTourMeta($v['id'], $option);
		}
		return $tour;
	}
}

?>