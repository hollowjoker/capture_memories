<?php

class User_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function fetchUser() {
		$userData = DAOFactory::getTblUserDAO()->queryAll();
		return $userData;
	}
}