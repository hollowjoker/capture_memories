<?php

class home_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public static function getUsers() {
		// $factory = new DAOFactory();
		// $factory->load('user');
		$items = DAOFactory::getUserDAO()->queryAll();
		// $acc = DAOFactory::getUserDAO()->query/All();

		return $items;
	}
}

?>