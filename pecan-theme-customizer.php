<?php

	function pecan_theme_customizer($wp_customize) {
		
		//General Theme Stuff
		$wp_customize->add_section(
			'generaltheme',
			array(
			    'title'      => __( 'General Theme Stuff', 'mp-pecan' ),
			    'priority'   => 30,
			)
		);
		
		$wp_customize->add_setting(
			'logo',
			array(
				'default'     => '',
				'transport'   => 'refresh'
			)
		);
		
		$wp_customize->add_setting(
			'mobilebg',
			array(
				'default'     => '',
				'transport'   => 'refresh'
			)
		);



		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'logo',
				array(
					'label'		=> __( 'Site Logo', 'mp-pecan' ),
					'section'	=> 'generaltheme',
					'settings'	=> 'logo'
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'mobilebg',
				array(
					'label'		=> __( 'Mobile Background Image', 'mp-pecan' ),
					'section'	=> 'generaltheme',
					'settings'	=> 'mobilebg'
				)
			)
		);
		

		
		// Contact Information
		$wp_customize->add_section(
			'contactinfo',
			array(
			    'title'      => __( 'Contact Information', 'mp-pecan' ),
			    'priority'   => 30,
			)
		);
		
		$contactinfoarray = array(
			'Address'		=>	'address',
			'City'			=>	'city',
			'State'			=>	'state',
			'Zip Code'		=>	'zip',
			'Phone Number'	=>	'phonenumber'
		);
		
		foreach($contactinfoarray as $key => $value) {

			$wp_customize->add_setting(
				$value,
				array(
					'default'     => '',
					'transport'   => 'refresh'
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$value,
					array(
						'label'		=> __( $key, 'mp-pecan' ),
						'section'	=> 'contactinfo',
						'settings'	=> $value,
						'type'		=> 'text'
					)
				)
			);		

		}

		
		
		
		// Social Media Stuff
		$wp_customize->add_section(
			'social',
			array(
			    'title'      => __( 'Social Media', 'gimmeabreak' ),
			    'priority'   => 30,
			)
		);

		$sm_networks = array(
			'fb'		=> 'Facebook',
			'gplus'		=> 'Google+',
			'instagram'	=> 'Instagram',
			'linkedin'	=> 'Linked-In',
			'pinterest'	=> 'Pinterest',
			'twitter'	=> 'Twitter',
			'youtube'	=> 'YouTube'
		);

		foreach($sm_networks as $key => $value) {

			$wp_customize->add_setting(
				$key,
				array(
					'default'     => '',
					'transport'   => 'refresh'
				)
			);
					
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					$key,
					array(
						'label'		=> __( $value . ' Username', 'gimmeabreak' ),
						'section'	=> 'social',
						'settings'	=> $key,
						'type'		=> 'text'
					)
				)
			);

		}
  		
		
	}
	add_action('customize_register','pecan_theme_customizer');

?>