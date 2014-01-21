<?php

	// Load Scripts
	function pecan_scripts() {
	
		global $base;
		
		$theme_info = wp_get_theme();
		
		$my_scripts = array(
			'modernizr'		=>	array(
				'deregister'	=>	FALSE,
				'newurl'		=>	TRUE,
				'url'			=>	$base . "/js/modernizr-ck.js",
				'deps'			=>	'',
				'ver'			=>	'2.7.1'
			),
			'jquery'		=>	array(
				'deregister'	=>	TRUE,
				'newurl'		=>	TRUE,
				'url'			=>	"http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js",
				'deps'			=>	'',
				'ver'			=>	'1.10.2'
			),
			'bootstrap_js'	=>	array(
				'deregister'	=>	FALSE,
				'newurl'		=>	TRUE,
				'url'			=>	$base . '/js/bootstrap-ck.js',
				'deps'			=>	'jquery',
				'ver'			=>	'3.0.3'
			)
		);
		
		foreach($my_scripts as $script_name => $values) {
			extract($values);
			if($deregister) {
				wp_deregister_script($script_name);
			}
			if($newurl) {
				wp_register_script($script_name,$url,$deps,$ver);
			}
			wp_enqueue_script($script_name);
		}		
	}
	add_action('wp_enqueue_scripts','pecan_scripts');

?>