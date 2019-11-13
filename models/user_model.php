<?php
class user_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	function login()
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		
		$acc = DAOFactory::getTblUserDAO()->queryByEmailWhereActive($email);
		
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
					// $user = Controller::objToArray($each);

					Session::setSession('user',$each);
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

	public static function register() {
		$birthDate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
		$formatedDate = date('Y-m-d',strtotime($birthDate));
		$customDateDiff = date_create($formatedDate);
		$thisDateDiff = date_create(date('Y-m-d'));

		$emailExist = DAOFactory::getTblUserDAO()->queryByEmail($_POST['email']);

		$pass = true;
		$result = [
			'status' => 'error',
			'messages' => []
		];
		if(strlen($_POST['password']) < 8) {
			$result['messages'] = array_merge($result['messages'],
			[
				'password' => 'Must be 8 letters'
			]);
		}
		if(date_diff($customDateDiff, $thisDateDiff)->y < 18) {
			$result['messages'] = array_merge($result['messages'],
			[
				'month' => 'Must be 18 Years old and above',
				'day' => '',
				'year' => '',
			]);
		}
		if(count($emailExist)) {
			$result['messages'] = array_merge($result['messages'],['email' =>'Email Exists']);
		}
		
		if(count($result['messages'])) {
			$pass = false;
		}
		
		if($pass) {
			$newUser = new TblUser;
			$newUser->firstName = $_POST['firstName'];
			$newUser->lastName = $_POST['lastName'];
			$newUser->email = $_POST['email'];
			$newUser->password = $_POST['password'];
			$newUser->phone = $_POST['phone'];
			$newUser->birthDate = $formatedDate;
			$newUser->type = "user";
			$newUser->active = "inactive";
			$newUser->address = "";
			$newUser->about = "";
			$insertData = Controller::insertDate($newUser);
			
			$userId = DAOFactory::getTblUserDAO()->insert($insertData);

			$emailData = [
				'id' => $userId,
				'subject' => 'Verify your Password',
				'displayName' => $_POST['firstName'],
				'email' => $_POST['email'],	
				'body' => 'verify'
			];
			Controller::emailSend($emailData);
			
			$result = [
				'id' => $userId,
				'status' => 'success',
				'messages' => 'Please verfiy your email address'
			];

			// $userData = DAOFactory::getTblUserDAO()->queryByEmailWhereActive($_POST['email'])[0];
			// $userSession = Session::setSession('user',$userData);
		}
		return $result;
	}

	public function update() {
		$birthDate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
		$formatedDate = date('Y-m-d',strtotime($birthDate));
		
		$newUser = DAOFactory::getTblUserDAO()->load($_POST['id']);
		$newUser->firstName = $_POST['firstName'];
		$newUser->lastName = $_POST['lastName'];
		$newUser->phone = $_POST['phone'];
		$newUser->birthDate = $formatedDate;
		$newUser->address = $_POST['address'];
		$newUser->about = $_POST['about'];
		$insertData = Controller::insertDateUpdate($newUser);

		$result = [
			'id' => DAOFactory::getTblUserDAO()->update($insertData),
			'status' => 'success',
			'messages' => 'Update Success!'
		];

		$userData = DAOFactory::getTblUserDAO()->queryByEmailWhereActive($newUser->email)[0];
		$userSession = Session::setSession('user',$userData);
		return $result;
	}

}

?>