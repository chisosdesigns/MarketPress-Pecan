<!DOCTYPE html>
<!-- header.php -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="<?php echo get_bloginfo('language'); ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo get_bloginfo('language'); ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo get_bloginfo('language'); ?>"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="<?php echo get_bloginfo('language'); ?>"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="<?php echo get_bloginfo('language'); ?>"><!--<![endif]-->
	<head>
		<title><?php

			// Print the <title> tag based on what is being viewed.
			global $page, $paged;
		
			wp_title( '|', true, 'right' );
		
			// Add the blog name.
			bloginfo( 'name' );
		
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) ) {
				echo " | $site_description";
			}
		
			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 ) {
				echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
			}
	
		?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<!-- End header.php -->