<?php

class Home extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->module = "home";
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

		// $international = [
		// 	[
		// 		'id' => 1,
		// 		'bg_image' => URL.'public/images/tour/bali.jpg',
		// 		'title' => 'Bali',
		// 		'package' => '₱14,979/night average'
		// 	],
		// 	[
		// 		'id' => 2,
		// 		'bg_image' => URL.'public/images/tour/bangkok.jpg',
		// 		'title' => 'Bangkok',
		// 		'package' => '₱14,979/night average'
		// 	],
		// 	[
		// 		'id' => 3,
		// 		'bg_image' => URL.'public/images/tour/kuala_lumpur.jpg',
		// 		'title' => 'kuala Lumpur',
		// 		'package' => '₱14,979/night average'
		// 	],
		// 	[
		// 		'id' => 4,
		// 		'bg_image' => URL.'public/images/tour/beijing.jpg',
		// 		'title' => 'Beijing',
		// 		'package' => '₱14,979/night average'
		// 	],
		// 	[
		// 		'id' => 5,
		// 		'bg_image' => URL.'public/images/tour/dubai.jpg',
		// 		'title' => 'Dubai',
		// 		'package' => '₱14,979/night average'
		// 	]
		// ];
		$this->view->tours = $tours;
		$this->view->international = $this->model->getTourData('international');
		// echo '<pre>';
		// print_r($this->view->international);
		// exit;
		$this->view->render('views/home/index.php');
	}

}

?>