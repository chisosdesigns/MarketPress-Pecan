<?php


	
	function pecan_theme_customizer($wp_customize) {
		
		// Create Array
		
		$pecan_settings_array = array(
			array(
				'reference'	=>	'generaltheme',
				'nicename'	=>	'General Theme Stuff',
				'settings'	=>	array(
					array(
						'setting_ref'		=>	'logo',
						'setting_nice_name'	=>	'Site Logo',
						'setting_type'		=>	'image'
					),
					array(
						'setting_ref'		=>	'mobilebg',
						'setting_nice_name'	=>	'Mobile Background Image',
						'setting_type'		=>	'image'
					)
				)
			),
			
			array(
				'reference'	=>	'social',
				'nicename'	=>	'Social Media',
				'settings'	=>	array(
					array(
						'setting_ref'		=>	'fb',
						'setting_nice_name'	=>	'Facebook URL',
						'setting_type'		=>	'text'
					),
					array(
						'setting_ref'		=>	'gplus',
						'setting_nice_name'	=>	'Google+ URL',
						'setting_type'		=>	'text'
					),
					array(
						'setting_ref'		=>	'instagram',
						'setting_nice_name'	=>	'Instagram URL',
						'setting_type'		=>	'text'
					),
					array(
						'setting_ref'		=>	'linkedin',
						'setting_nice_name'	=>	'LinkedIn URL',
						'setting_type'		=>	'text'
					),
					array(
						'setting_ref'		=>	'pinterest',
						'setting_nice_name'	=>	'Pinterest URL',
						'setting_type'		=>	'text'
					),
					array(
						'setting_ref'		=>	'twitter',
						'setting_nice_name'	=>	'Twitter URL',
						'setting_type'		=>	'text'
					),
					array(
						'setting_ref'		=>	'youtube',
						'setting_nice_name'	=>	'YouTube URL',
						'setting_type'		=>	'text'
					)
				)
			),
			
			array(
				'reference'	=>	'layouta',
				'nicename'	=>	'General Layout',
				'settings'	=>	array(
					array(
						'setting_ref'		=>	'fullwidth',
						'setting_nice_name'	=>	'Is layout full width?',
						'setting_type'		=>	'checkbox'
					)
				)
			),

			array(
				'reference'	=>	'contactinfo',
				'nicename'	=>	'Contact Information',
				'settings'	=>	array(
					array(
						'setting_ref'		=>	'address',
						'setting_nice_name'	=>	'Address',
						'setting_type'		=>	'text'
					),
					array(
						'setting_ref'		=>	'city',
						'setting_nice_name'	=>	'City',
						'setting_type'		=>	'text'
					),
					array(
						'setting_ref'		=>	'state',
						'setting_nice_name'	=>	'State',
						'setting_type'		=>	'text'
					),
					array(
						'setting_ref'		=>	'zip',
						'setting_nice_name'	=>	'Zip Code',
						'setting_type'		=>	'text'
					),
					array(
						'setting_ref'		=>	'phone',
						'setting_nice_name'	=>	'Phone Number',
						'setting_type'		=>	'text'
					)
				)
			)



		);
		
		foreach ($pecan_settings_array as $pecan_section) {

			// Extracting gives $reference, $nicename, and $settings
			extract($pecan_section, EXTR_OVERWRITE);

			$wp_customize->add_section(
				$reference,
				array(
				    'title'		=>	__( $nicename, 'mp-pecan' ),
				    'priority'	=>	30,
				)
			);
			
			foreach($settings as $setting) {
				
				// Extracting gives $setting_ref, $setting_nice_name, and $setting_type
				// Also possible to have an array called $choices
				extract($setting, EXTR_OVERWRITE);
				
				// Create the setting
				$wp_customize->add_setting(
					$setting_ref,
					array(
						'default'     => '',
						'transport'   => 'refresh'
					)
				);
				
				switch ($setting_type) {
					case 'text':
						$wp_customize->add_control(
							new WP_Customize_Control(
								$wp_customize,
								$setting_ref,
								array(
									'label'		=> __( $setting_nice_name, 'mp-pecan' ),
									'section'	=> $reference,
									'settings'	=> $setting_ref,
									'type'		=> 'text'
								)
							)
						);
						break;
					case 'checkbox':
						$wp_customize->add_control(
							new WP_Customize_Control(
								$wp_customize,
								$setting_ref,
								array(
									'label'		=> __( $setting_nice_name, 'mp-pecan' ),
									'section'	=> $reference,
									'settings'	=> $setting_ref,
									'type'		=> 'checkbox'
								)
							)
						);
						break;
					case 'radio':
						$wp_customize->add_control(
							new WP_Customize_Control(
								$wp_customize,
								$setting_ref,
								array(
									'label'		=> __( $setting_nice_name, 'mp-pecan' ),
									'section'	=> $reference,
									'settings'	=> $setting_ref,
									'type'		=> 'radio',
									'choices'	=> $choices
								)
							)
						);
						break;
					case 'select':
						$wp_customize->add_control(
							new WP_Customize_Control(
								$wp_customize,
								$setting_ref,
								array(
									'label'		=> __( $setting_nice_name, 'mp-pecan' ),
									'section'	=> $reference,
									'settings'	=> $setting_ref,
									'type'		=> 'select',
									'choices'	=> $choices
								)
							)
						);
						break;
					case 'colorwheel':
						$wp_customize->add_control( 
							new WP_Customize_Color_Control( 
								$wp_customize, 
								$setting_ref, 
								array(
									'label'      => __( $setting_nice_name, 'mp-pecan' ),
									'section'    => $reference,
									'settings'   => $setting_ref,
								)
							)
						);
						break;
					case 'upload':
						$wp_customize->add_control( 
							new WP_Customize_Upload_Control( 
								$wp_customize, 
								$setting_ref, 
								array(
									'label'      => __( $setting_nice_name, 'mp-pecan' ),
									'section'    => $reference,
									'settings'   => $setting_ref,
								)
							)
						);
						break;
					case 'image':
						$wp_customize->add_control(
							new WP_Customize_Image_Control(
								$wp_customize,
								$setting_ref,
								array(
									'label'		=> __( $setting_nice_name, 'mp-pecan' ),
									'section'	=> $reference,
									'settings'	=> $setting_ref
								)
							)
						);
						break;
				}
				
			}
			
		}
		
	}
	add_action('customize_register','pecan_theme_customizer');

?>