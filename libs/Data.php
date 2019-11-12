<?php

class Data{

	function __construct(){
		$this->view = new Views();
	}

	public function services() {
		$data = [
			[
				"icon" => "fas fa-wifi",
				"main_title" => "Wifi Rental",
				"content" => 
				[
					[
						'title' => 'CHOOSE DESTINATION',
						'description' => 'look for your destination and fill out the guest information.'
					],
					[
						'title' => 'WAIT FOR THE AGENT RESPONSE',
						'description' => 'a travel agent will email or call you within 24hrs.'
					],
					[
						'title' => 'PAYMENT',
						'description' => 'deposit the total amount thru bank account of the travel agency.'
					],
					[
						'title' => 'CONFIRMATION',
						'description' => 'he travel agency will deliver the wifi rental on specified date of travel'
					],
				],
				"data-action" => "wifi-rental"
			],
			[
				"icon" => "fas fa-globe-asia",
				"main_title" => "AIRLINE TICKETING",
				"content" => 
				[
					[
						'title' => 'INFORMATION',
						'description' => 'fill out the guest information.'
					],
					[
						'title' => 'WAIT FOR THE AGENT RESPONSE',
						'description' => 'a travel agent will email or call you within 24hrs.'
					],
					[
						'title' => 'MAKE PAYMENT',
						'description' => 'deposit the total amount thru bank account of the travel agency.'
					],
					[
						'title' => 'CONFIRMATION',
						'description' => 'confirmed payment and get the booking confirmation thru your email'
					],
				],
				"data-action" => "airline-ticketing"
			],
			[
				"icon" => "fab fa-cc-visa",
				"main_title" => "VISA PROCESSING",
				"content" => 
				[
					[
						'title' => 'INFORMATION',
						'description' => 'Choose the destination and fill out guest information together with the complete travel documents.'
					],
					[
						'title' => 'WAIT FOR THE AGENT RESPONSE',
						'description' => 'a travel agent will email or call you within 24hrs.'
					],
					[
						'title' => 'MAKE PAYMENT',
						'description' => 'deposit the total amount thru bank account of the travel agency.'
					],
					[
						'title' => 'CONFIRMATION',
						'description' => 'the travel agency will deliver the result of the documents from the embassy.'
					],
				],
				"data-action" => "visa-processing"
			],
			[
				"icon" => "fas fa-user-shield",
				"main_title" => "TRAVEL INSURANCE",
				"content" => 
				[
					[
						'title' => 'INFORMATION',
						'description' => 'provide the basic information needed in availing a travel insurance'
					],
					[
						'title' => 'PAYMENT',
						'description' => 'deposit the total amount thru bank account of the travel agency'
					],
					[
						'title' => 'CONFIRMATION',
						'description' => 'the travel agency will email the confirmed  insurance policy of the guest.'
					],
				],
				"data-action" => "travel-insurance"
			],
			[
				"icon" => "fas fa-map-marked-alt",
				"main_title" => "TOUR PACKAGE",
				"content" => 
				[
					[
						'title' => 'INFORMATION',
						'description' => 'Choose a destination and fill out the basic guest information'
					],
					[
						'title' => 'WAIT FOR THE AGENT RESPONSE',
						'description' => 'a travel agent will email or call you within 24hrs'
					],
					[
						'title' => 'MAKE PAYMENT',
						'description' => 'deposit the total amount thru bank account of the travel agency'
					],
					[
						'title' => 'CONFIRMATION',
						'description' => 'confirmed payment and get the travel voucher thru your email'
					],
				],
				"data-action" => "tour-package"
			],
		];

		return $data;
	}
	
}