<?php

class Home extends Controller
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$tours = [
			[
				'image_path' => URL.'public/images/tour/du1.jpg',
				'name' => 'Vigan Tour 2D 1N',
				'place' => 'Vigan',
				'price' => '2999'
			],
			[
				'image_path' => URL.'public/images/tour/du2.jpg',
				'name' => 'Burias Group of Island Tour 2D 1N',
				'place' => 'Burias',
				'price' => '3599'
			],
			[
				'image_path' => URL.'public/images/tour/du3.jpg',
				'name' => 'Vigan Tour 2D 1N',
				'place' => 'Vigan',
				'price' => '2999'
			],
			[
				'image_path' => URL.'public/images/tour/du4.jpg',
				'name' => 'Vigan Tour 2D 1N',
				'place' => 'Vigan',
				'price' => '2999'
			]
		];
		$this->view->tours = $tours;
		// print_r(Controller::getMonths());
		// exit;
		$this->view->render('views/home/index.php');
	}

	public function register() {
		$birthDate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];

		$emailExist = DAOFactory::getUserDAO()->queryByEmail($_POST['email']);
		$result = [];
		if(count($emailExist)) {
			$result = [
				'status' => 'error',
				'message' => [
					'email' => 'Email Exists'
				]
			];
		} else {
			$newUser = new User;
			$newUser->firstName = $_POST['firstName'];
			$newUser->lastName = $_POST['lastName'];
			$newUser->email = $_POST['email'];
			$newUser->password = $_POST['password'];
			$newUser->phone = $_POST['phone'];
			$newUser->birthDate = date('Y-m-d',strtotime($birthDate));
			$newUser->created = $_POST['password'];
			$newUser->type = "user";
			$newUser->active = "active";
			$insertData = Controller::insertDate($newUser);
	
			$result = [
				'id' => DAOFactory::getUserDAO()->insert($insertData),
				'status' => 'success',
				'message' => 'Sign up success!'
			];

			$userData = DAOFactory::getUserDAO()->load($result['id']);

			$userSession = Session::setSession('user',$userData);
		}

		echo json_encode($result);
		exit;
	}

}

?>