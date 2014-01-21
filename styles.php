<?php

	// Load Styles
	function pecan_styles() {
		
		global $base;
		
		$theme_info = wp_get_theme();
		
		$my_styles = array(
			'all'	=>	array(
				'src'		=> $base . '/css/style.css',
				'deps'		=> '',
				'ver'		=> $theme_info->get('Version')
			)
		);
		
		foreach($my_styles as $style_type => $values) {
			extract($values);
			$handle = $style_type;
			$media = $style_type;
			wp_register_style($handle, $src, $deps, $ver, $media);
			wp_enqueue_style($handle);
		}
	}
	add_action('wp_enqueue_scripts','pecan_styles');

?>