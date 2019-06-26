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
				'id' => 1,
				'image_path' => URL.'public/images/tour/du1.jpg',
				'name' => 'Vigan Tour 2D 1N',
				'place' => 'Vigan',
				'price' => '2999'
			],
			[
				'id' => 2,
				'image_path' => URL.'public/images/tour/du2.jpg',
				'name' => 'Burias Group of Island Tour 2D 1N',
				'place' => 'Burias',
				'price' => '3599'
			],
			[
				'id' => 3,
				'image_path' => URL.'public/images/tour/du3.jpg',
				'name' => 'Vigan Tour 2D 1N',
				'place' => 'Vigan',
				'price' => '2999'
			],
			[
				'id' => 4,
				'image_path' => URL.'public/images/tour/du4.jpg',
				'name' => 'Vigan Tour 2D 1N',
				'place' => 'Vigan',
				'price' => '2999'
			]
		];
		$this->view->tours = $tours;
		$this->view->render('views/home/index.php');
	}

}

?>