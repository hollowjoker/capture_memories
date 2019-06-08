<?php
class Views{
	function __construct(){
	
	}
	
	
	public function render($link,$hasHeader = false){ 
		if($hasHeader == true){
			require $link;
		} else {
			if(strpos( $link, 'admin' ) !== false) {
				require 'views/layout/admin/header.php';
				require $link;
				require 'views/layout/admin/footer.php';
			} else {
				require 'views/layout/customer/header.php';
				require $link;
				require 'views/layout/customer/footer.php';
			}
		
		}
	}
}