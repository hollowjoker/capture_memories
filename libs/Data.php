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
	
	public function about_us() {
		$about_us = [
			[
				"business_content" => [
					[
						"description" => "The inspiration of this travel agency came from the fondness of me as the owner in traveling. The idea was created when I traveled in Taiwan last April 2018 with my MBA buddies (Animo Lasalle!)."
					],
					[
						"description" => "It’s a nature of each travel agency to provide the best travel to each clients. Notwithstanding, I realized that while traveling itself is enjoyable, it is more fun when you captured all the blissful moments you had during the travel. Hence, I came up with the name of my business to be Captured Memories Travel and Tours positioned as provider of blissful moments in your travel."
					],
					[
						"description" => "The long term vision of this business is to provide photographer for each tour of the client. In accordance with the trend and my personal experience, having good photos is almost essential to one’s travel in order to keep the memories and boost social media reactions. However, since the company is just starting, our first step is to give premium to the clients by giving them free photo edits in their travel. The idea is to allow them to send us their photos from their travel. The maximun is fifty (50) photos per day and per booking which will be provided by the lead person of the tour."
					],
					[
						"description" => "With this idea, I believe our agency can not only give our customers the excellent travel services from planning and actual travel but also to let them keep the blissful moments they had from captured memories that we can provide."
					],
					[
						"description" => "Hope to have business with you soon."
					],
					[
						"description" => "Here are some of the sample photos during  our recent Taiwan trip that we can offer you after you had a deal with us. Hope you’ll be inspired by it. (Disclaimer:  This photo was just taken from my phone and just enhanced by us to give instagrammable and enticing effect. 📷 😉 So the result of the edits will be affected by the quality of photos that will be send to us.)"
					],
					[
						"description" => "Photo credits from: Honey, Jeff and John"
					],
					[
						"description" => "Edited by: Jessica"
					],
				],
				"business_photos" => [
					[
						"caption" => "with the sunflowers",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/35050053_640381389638636_245503792383000576_o.jpg?_nc_cat=102&_nc_oc=AQkwGdFOrWTcqyNXvkP-VA1G1SQnvQx3ZawtDJSa8avBNcaqQqgz60AYkQ8QzjkwuwE&_nc_ht=scontent.fmnl2-1.fna&oh=47ae07a36522e1525946f31e1950a932&oe=5E4AC380"
					],
					[
						"caption" => "chasing up the sun",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34823311_640382282971880_6464560297473474560_o.jpg?_nc_cat=104&_nc_oc=AQmqlte-3PAAdGFqbAHZRWrsEZ-Dn8RpPxpEyNY7h1ynu_USIBjngfPqCq9vqkJ-yfA&_nc_ht=scontent.fmnl2-1.fna&oh=51d3bed71b05b604b6140455f2e9db7e&oe=5E4A831B"
					],
					[
						"caption" => "the gang",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34826170_640384299638345_2351727712499924992_o.jpg?_nc_cat=103&_nc_oc=AQmh5oSerQQwpTvfUYiiVfJlmRoZJ6B_lplEm8FsEepPKL2i-1rw9IrvlHUKaE2QMQg&_nc_ht=scontent.fmnl2-1.fna&oh=fa25d35ae9c11a40a0e382a1b94c1935&oe=5E578ADD"
					],
					[
						"caption" => "blending in the rainbow village",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/35077530_640388016304640_8744659088031350784_o.jpg?_nc_cat=104&_nc_oc=AQl2l1BuJK_D0KSZyNq8SfOpSjAoafmZPqeoe_XYkvACTTNj5FbICO71BRDLHxQ8NKs&_nc_ht=scontent.fmnl2-1.fna&oh=01b5ac405e9c6dcfa8274d4ff337adb0&oe=5E44FF19"
					],
					[
						"caption" => "cherry blossoms",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34962696_640386846304757_5055833396870119424_o.jpg?_nc_cat=106&_nc_oc=AQliqs1wuQm4hZsn6FMPlQsR4qaCqZF0j9rjse0XIX_VPBRtZKPWVbo9dJ4gQZHPR2I&_nc_ht=scontent.fmnl2-1.fna&oh=958f4f48ffbd3632277eedbc797c1dba&oe=5E4C7B28"
					],
					[
						"caption" => "the famous bridge",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/35072624_640388046304637_1911483291098152960_o.jpg?_nc_cat=101&_nc_oc=AQkKXeu1x8LSphTcHz_YRxvMWmOBB7UEL54wX3yOxqPrOrEAajw3MWLt9qyZaa-G2_E&_nc_ht=scontent.fmnl2-1.fna&oh=ab2aa1afcf4f96f8b0a3cf120ebb34d4&oe=5E55C4EE"
					],
					[
						"caption" => "into the woods",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/35026443_640389702971138_2238508453272223744_o.jpg?_nc_cat=103&_nc_oc=AQmU0NZm0rtpxD241-e4VBpJnUPg0zZ7lxAxJ0kkHBd7wr9qq6hi86IuuJA4lx-Y7Kc&_nc_ht=scontent.fmnl2-1.fna&oh=500b586686a05c7cb1772373edf6206d&oe=5E50B26E"
					],
					[
						"caption" => "showing off summer clothes in the highest road point of Taiwan",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34845084_640390659637709_8455796277945303040_o.jpg?_nc_cat=108&_nc_oc=AQl_t35AbnIUQMTLexP3-j3WnOPVnD-GqZqW8OHTq1Bnr9Ok-4Ks_QkwnTpxyae6phM&_nc_ht=scontent.fmnl2-1.fna&oh=2f703681adb3fdb94100eeecd352ee90&oe=5E16772B"
					],
					[
						"caption" => "withstanding the freezing weather (New Zealand feels)",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34846329_640391622970946_7052847091902578688_o.jpg?_nc_cat=103&_nc_oc=AQlN-conGDDaFvlFOjnMNtwDvFu2jTkTN6E2gzH5eUV3EK92k4VzeIEolMgKfM0vNR8&_nc_ht=scontent.fmnl2-1.fna&oh=319706af84700fe9fefff4f595b1c782&oe=5E5358A9"
					],
					[
						"caption" => "one of the buwis buhay itenirary",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34984914_640396986303743_3895432060688400384_o.jpg?_nc_cat=110&_nc_oc=AQkjibOzSlQJy_E3pXoEa63aTSYhBsE0sw6GhRq3SKtg4GTvxxxkJv9VcOrgJ_py5vw&_nc_ht=scontent.fmnl2-1.fna&oh=5fa1c2486e5c2de3a7189bf0c968e425&oe=5E60F9D0"
					],
					[
						"caption" => "the lanterns",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34848975_640396702970438_4753929021668982784_o.jpg?_nc_cat=105&_nc_oc=AQm8el8bSwR9i6Nl-dcN12G6wXRHob3NDKL7JLFOjysDzdPgndzcARDiKP-0pbSe0bM&_nc_ht=scontent.fmnl2-1.fna&oh=f8399ba761566697476f0ce5c908c9c0&oe=5E401CA9"
					],
					[
						"caption" => "old street",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34985015_640395349637240_651482466481078272_o.jpg?_nc_cat=110&_nc_oc=AQm6l3ovrzHzWNUfODhxSiASr22r5l2gVDD86o0MAwarT8NZc5KJlr_2GVoo3toOkZY&_nc_ht=scontent.fmnl2-1.fna&oh=33a7347500b107285918b61ccbeaa3de&oe=5E5260AE"
					],
					[
						"caption" => "waiting",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34963410_640397266303715_5429886204667494400_o.jpg?_nc_cat=102&_nc_oc=AQm_LpspyzjqybmVcHseqZMRiQ5_2D9edgM8eWNZswNrqDJscFUWSAfZ02uuh49jIyI&_nc_ht=scontent.fmnl2-1.fna&oh=4492cfbe3a3078a4a153de99641f6a98&oe=5E47A128"
					],
					[
						"caption" => "roaming around the city",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34963537_640397489637026_8085705276830777344_o.jpg?_nc_cat=106&_nc_oc=AQn0zInT9MTebJ6unRRFfQxxrgtOt2_shnVBYw9udBqU5dwda9RlklpkCXp8e6Ewnyo&_nc_ht=scontent.fmnl2-1.fna&oh=7f190054fa7312e0beb2fdf0e4e13343&oe=5E5A37E6"
					],
					[
						"caption" => "Taipei 101",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/35062775_640398096303632_2365316714146562048_o.jpg?_nc_cat=104&_nc_oc=AQmXfpwj39QmZ3rmUYKi-IlChAx4qZElw1nXuMOaBrio9n2xwHcJGO3R6nmJojhbEUY&_nc_ht=scontent.fmnl2-1.fna&oh=dc3db058c5056a67a386f46395e1f681&oe=5E5FEDE3"
					],
					[
						"caption" => "night market",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34904600_640398326303609_6574852562258755584_o.jpg?_nc_cat=109&_nc_oc=AQn9ksC6tXW-JeYuwdM4bsPXYcBXFT_9dFEbJHbUicgR-pjlVUlqj716x8LrXTI0ApY&_nc_ht=scontent.fmnl2-1.fna&oh=60e11d4a790a2fdd3455d57be212e0d4&oe=5E5B8EC0"
					],
					[
						"caption" => "mowdeling",
						"image" => "https://scontent.fmnl2-1.fna.fbcdn.net/v/t1.0-9/p720x720/34909230_640399219636853_7941867977433939968_o.jpg?_nc_cat=105&_nc_oc=AQlQb0k2UsVaJx3v51iMXUZep4oWWHQU8F6Ye1k9cPyhITra5W_Js6tSZ3tEmHk1vc8&_nc_ht=scontent.fmnl2-1.fna&oh=524b7a15381f5d4d47f6719944806e3c&oe=5E5D78CC"
					],
				],
				"capture_description" => [
					[
						"capture_content" => "Your travel buddy positioned to provide excellent travel services from planning, actual travel and documentation with free photo editing. Book with us."
					],
					[
						"capture_content" => "Thank you and we’ll keep you posted."
					],
				],
				"about_owner" => [
					[
						"owner_content" => "1. Certified Public Accountant"
					],
					[
						"owner_content" => "2. Master of Business Administration"
					],
					[
						"owner_content" => "3. Lasallian, UMakian, OLPAnian, Tuynian, Batangueña"
					],
					[
						"owner_content" => "4. Batang 90’s"
					],
					[
						"owner_content" => "5. Pinuno"
					],
				]
			],
		];

		return $about_us;
	}
}