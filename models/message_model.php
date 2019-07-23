<?php

class message_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getConvo() {
		$userId = Session::getSession('user')['id'];
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
		return $convoResult;
	}
}

?>