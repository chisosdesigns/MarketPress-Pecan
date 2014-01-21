<?php

	$menus = array(
		'top-menu'		=> 'Top Menu',
		'footer-menu'	=> 'Footer Menu'
	);
	
	foreach($menus as $location => $description) {
		register_nav_menu($location, $description);
	}

?>