<?php

/*

 * section HEADER LAYOUT

 */



   	$wp_customize->add_section( 'tesseract_header_layouts' , array(

    	'title'      => __('Header Layout', 'tesseract'),

    	'priority'   => 1,

		'panel'      => 'tesseract_header_options'

	) );





	$wp_customize->add_setting( 'tesseract_header_layout_setting', array(

			'sanitize_callback' => 'tesseract_sanitize_select_header_layout_types',

			'default' 			=> 'defaultlayout'

	) );



	$wp_customize->add_control(

		new WP_Customize_Control(

		$wp_customize,

		'tesseract_header_layout_setting_control',

		array(

			'label'      => __( 'Header Layout Option', 'tesseract' ),

			'section'    => 'tesseract_header_layouts',

			'settings'   => 'tesseract_header_layout_setting',

			'type'          => 'select',

			'default'       => 'defaultlayout',

			'choices'		=> array(

				'none'  	                => 	'None',

				'navbottom'        			=> 	'Nav Bottom',

				'navright'			    	=>  'Nav Right & Logo Left',

				'navleft'			    	=>  'Nav Left & Logo Right',

				'centered-inline-logo'		=>  'Logo In Menu Center',

				'navcentered'				=>  'Nav Centered',

				'vertical-left'				=>  'Nav Vertical Left',

				'vertical-right'			=>  'Nav Vertical Right',

				'defaultlayout'			    =>  'Default'

				),

			'priority'   => 1

		) )

	);

		

	$wp_customize->add_setting( 'inline_logo_side', array(

			'sanitize_callback' => 'tesseract_sanitize_inline_logo_side',

			'default' 			=> 'inlineright'

	) );



		

		

	$wp_customize->add_setting( 'tesseract_vertical_header_width', array(

		'transport'         => 'refresh',

		'sanitize_callback' => 'absint',

		'default' 			=> 230

	) );			

		

	$wp_customize->add_control( 'tesseract_vertical_header_width_control', array(

		'type'        		=> 'range',

		'priority'    		=> 2,

		'section'     		=> 'tesseract_header_layouts',

		'settings'     		=> 'tesseract_vertical_header_width',

		'label'       		=> 'Vertical Nav Width',

		'description' 		=> 'Use this range slider to set Vertical Nav Width',

		'input_attrs' 		=> array(

			'min'   => 200,

			'max'   => 400,

			'step'  => 1,

			'class' => 'tesseract-header-height',

			'style' => 'color: #0a0',

		),

		'priority' 			=> 2,

		'active_callback' 	=> 'tesseract_vertical_header_width_enable'

	) );


	$wp_customize->add_setting( 'tesseract_vertical_header_menu_fixed', array(
		'transport'         => 'refresh',
		'default' 			=> 'disable'
	) );			

	$wp_customize->add_control( 'tesseract_vertical_header_menu_fixed', array(
		'type'        		=> 'select',
		'section'     		=> 'tesseract_header_layouts',
		'settings'     		=> 'tesseract_vertical_header_menu_fixed',
		'label'       		=> 'Fixed Header Menu',
		'description' 		=> 'Use this you sticked/fixed the header menu, when your page is scrolling',
		'choices' 		=> array(
			'enable' => 'Enable',
			'disable' => 'Disable'
		),
		'priority' 			=> 3,
		'active_callback' 	=> 'tesseract_vertical_header_layout_choice'
	) );
	
	$wp_customize->add_setting( 'tesseract_centre_header_menu_rl', array(
		'transport'         => 'refresh',
		'default' 			=> 'left'
	) );			

	$wp_customize->add_control( 'tesseract_centre_header_menu_rl', array(
		'type'        		=> 'select',
		'section'     		=> 'tesseract_header_layouts',
		'settings'     		=> 'tesseract_centre_header_menu_rl',
		'label'       		=> 'Left/Right Position',
		'description' 		=> 'There are odd number of item in menu, so to place the logo choose below position',
		'choices' 		=> array(
			'right' => 'Right',
			'left' => 'Left'
		),
		'priority' 			=> 4,
		'active_callback' 	=> 'tesseract_centre_menu_in_logo_odd'
	) );

	$wp_customize->add_setting( 'tesseract_header_layout_bck_image' );	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tesseract_header_layout_bck_image', array(
	    'label'    => __( 'Header Layout Background Image', 'tesseract' ),
	    'description' => __('To set background image on header menu', 'tesseract'),
	    'section'  => 'tesseract_header_layouts',
	    'settings' => 'tesseract_header_layout_bck_image',
	    'priority' => 5
	) ) );
	
	$wp_customize->add_setting( 'tesseract_vertical_header_bck_img_rpt', array(
		'transport'         => 'refresh',
		'default' 			=> 'disable'
	) );			

	$wp_customize->add_control( 'tesseract_vertical_header_bck_img_rpt', array(
		'type'        		=> 'select',
		'section'     		=> 'tesseract_header_layouts',
		'settings'     		=> 'tesseract_vertical_header_bck_img_rpt',
		'label'       		=> 'Header Background Image Repeat',
		'description' 		=> 'Use this you repeat the same background image instead of one.',
		'choices' 		=> array(
			'enable' => 'Enable',
			'disable' => 'Disable'
		),
		'priority' 			=> 6,
		'active_callback' 	=> 'tesseract_vertical_header_bck_image_choice'
	) );



	/*$wp_customize->add_setting( 'tesseract_header_height', array(

		'transport'         => 'postMessage',

		'sanitize_callback' => 'absint',

		'default' 			=> 10

	) );			

	

	$wp_customize->add_control( 'tesseract_header_height_control', array(

			'type'        		=> 'range',

			'priority'    		=> 2,

			'section'     		=> 'tesseract_header_layouts',

			'settings'     		=> 'tesseract_header_height',

			'label'       		=> 'Header Padding',

			'description' 		=> 'Use this range slider to set header height',

			'input_attrs' 		=> array(

				'min'   => 0,

				'max'   => 50,

				'step'  => 5,

				'class' => 'tesseract-header-height',

				'style' => 'color: #0a0',

			),

			'priority' 			=> 2

	) );*/

		