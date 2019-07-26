<?php

class Services_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getServices() {
		$type = $_GET['type'];
		$convoResult = DAOFactory::getTblServicesDAO()->getServices($type);

		foreach($convoResult as $k => $v) {
			$option = [
				'column' => 'created_at',
				'orderBy' => 'desc',
				'limit' => 1,
				'serviceId' => $v['id']
			];
			$convoResult[$k]['message'] = DAOFactory::getTblServicesMessageDAO()->getMessageByService($option);
		}
		return $convoResult;
	}
}