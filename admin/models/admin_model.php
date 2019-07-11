<?php

class Admin_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	function login()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		
		$acc = DAOFactory::getTblUserDAO()->queryByEmailFilterType($email);
		$result = [
			'status' => 'error',
			'messages' => []
		];

		if(!empty($acc))
		{
			
			foreach($acc as $each)
			{
				if($each['password'] == $password)
				{
					$admin = Controller::reConstArray($each);
					Session::setSession('admin',$admin);
					$result = [
						'status' => 'success',
						'messages' => 'Login Success!'
					];
					return $result;
				}
			}
		}
		$result['messages'] = array_merge($result['messages'],
		[
			'email' => 'Invalid Email',
			'password' => 'Invalid Password'
		]);

		return $result;
	}
	


}

?>