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
			$emailResult = Controller::emailSend($emailData);
			
			if($emailResult) {
				$result = [
					'id' => $userId,
					'status' => 'success',
					'messages' => 'Please verfiy your email address'
				];
			} else {
				$result = [
					'status' => 'error',
					'messages' => 'Please try again.'
				];
			}

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

	public function submitForgotPassword() {
		$userData = DAOFactory::getTblUserDAO()->queryByEmail($_POST['email']);
		$result = [
			'type' => 'error',
			'messages' => 'Email not exist'
		];
		if(count($userData)) {
			$data = [
				'id' => $userData[0]->id,
				'displayName' => $userData[0]->firstName,
				'email' => $_POST['email'],
				'body' => 'forgetPassword',
				'subject' => 'Forgot Password'
			];
			$emailResult = Controller::emailSend($data);
			if($emailResult) {
				$result = [
					'type' => 'success',
					'messages' => 'Email sent. Please see your inbox'
				];
			} else {
				$result = [
					'type' => 'error',
					'messages' => 'Please try again.'
				];
			}
		}
		return $result;
	}

	public function submitVerifyPassword() {
		$userData = DAOFactory::getTblUserDAO()->load($_POST['id']);
		if($_POST['newPassword'] == $_POST['confirmPassword']) {
			if(count($userData)) {
				$userData->password = $_POST['newPassword'];
				DAOFactory::getTblUserDAO()->update($userData);
				
				$newUserData = DAOFactory::getTblUserDAO()->queryByEmailWhereActive($_POST['email'])[0];
				if(count($newUserData) == 0) {
					return $result = [
						'type' => 'error',
						'messages' => 'Please verify your email first'
					];
				}
				$userSession = Session::setSession('user',$newUserData);

				$result = [
					'type' => 'success',
					'messages' => 'Password update Success!'
				];
			} else {
				$result = [
					'type' => 'error',
					'messages' => 'Invalid User'
				];
			}
		} else {
			$result = [
				'type' => 'error',
				'messages' => 'New and Confirm password does not match'
			];
		}
		return $result;
	}

}

?>