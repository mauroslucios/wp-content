<?php
/**
 * Medical Care: Customizer-home-page
 *
 * @subpackage Medical Care
 * @since 1.0
 */

//  Home Page Panel
	$wp_customize->add_panel( 'medical_care_custompage_panel', array(
		'title' => esc_html__( 'Custom Page Settings', 'medical-care' ),
		'priority' => 2,
	));
	// Header
    $wp_customize->add_section('medical_care_header',array(
        'title' => __('Header section', 'medical-care'),
        'panel' => 'medical_care_custompage_panel',
        'priority' => 1,
    ) );
    $wp_customize->add_setting( 'medical_care_section_contact_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_contact_heading', array(
		'label'       => esc_html__( 'header Settings', 'medical-care' ),		
		'section'     => 'medical_care_header',
		'settings'    => 'medical_care_section_contact_heading',
	) ) );
	$wp_customize->add_setting('medical_care_search_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'medical_care_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Medical_Care_Customizer_Customcontrol_Switch(
			$wp_customize,
			'medical_care_search_show_hide',
			array(
				'settings'        => 'medical_care_search_show_hide',
				'section'         => 'medical_care_header',
				'label'           => __( 'show search bar', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
    $wp_customize->add_setting('medical_care_our_location',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_care_our_location',array(
		'label' => esc_html__('Our Location Text','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_our_location',
		'type'    => 'text',
	));
	$wp_customize->selective_refresh->add_partial( 'medical_care_our_location', array(
		'selector' => '.contact_info i',
		'render_callback' => 'medical_care_customize_partial_medical_care_our_location',
	) );
	$wp_customize->add_setting('medical_care_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_care_address',array(
		'label' => esc_html__('Our Address','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_address',
		'type'    => 'text',
	));
	$wp_customize->add_setting('medical_care_location_icon',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_location_icon',array(
		'label'	=> __('Location/Address Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_header',
		'setting'	=> 'medical_care_location_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('medical_care_our_contact',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_care_our_contact',array(
		'label' => esc_html__('Contact Text','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_our_contact',
		'type'    => 'text',
	));
	$wp_customize->add_setting('medical_care_phone_no',array(
		'default' => '',
		'sanitize_callback' => 'medical_care_sanitize_phone_number'
	));
	$wp_customize->add_control('medical_care_phone_no',array(
		'label' => esc_html__('Our Phone no','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_phone_no',
		'type'    => 'text',
	));
	$wp_customize->add_setting('medical_care_phone_icon',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_phone_icon',array(
		'label'	=> __('Phone Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_header',
		'setting'	=> 'medical_care_phone_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('medical_care_days_open',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_care_days_open',array(
		'label' => esc_html__('Opening Days','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_days_open',
		'type'    => 'text',
	));
	$wp_customize->add_setting('medical_care_opening_time',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_care_opening_time',array(
		'label' => esc_html__('Opening Time','medical-care'),
		'section' => 'medical_care_header',
		'setting' => 'medical_care_opening_time',
		'type'    => 'text',
	));
	$wp_customize->add_setting('medical_care_time_icon',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_time_icon',array(
		'label'	=> __('Clock/Time Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_header',
		'setting'	=> 'medical_care_time_icon',
		'type'		=> 'icon'
	)));

    //Slider
	$wp_customize->add_section( 'medical_care_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'medical-care' ),
    	'panel' => 'medical_care_custompage_panel',
    	'priority' => 2
	) );
	$wp_customize->add_setting( 'medical_care_section_slide_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Settings', 'medical-care' ),
		'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'medical-care' ),		
		'section'     => 'medical_care_slider_section',
		'settings'    => 'medical_care_section_slide_heading',
		'priority'	  => 1,
	) ) );
	$wp_customize->add_setting(
		'medical_care_slider_arrows',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'medical_care_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Medical_Care_Customizer_Customcontrol_Switch(
			$wp_customize,
			'medical_care_slider_arrows',
			array(
				'settings'        => 'medical_care_slider_arrows',
				'section'         => 'medical_care_slider_section',
				'label'           => __( 'Check To show Slider', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
				'priority' => 2,
			)
		)
	);
	
	//cusatomizer setting
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => -1,
	);

	$post_list = get_posts($args);

	$i = 0;
	$pst_sls[] = __('Select', 'medical-care');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID] = $p_post->post_title;
	}

	for ($i = 1; $i <= 4; $i++) {
		$wp_customize->add_setting('medical_care_post_setting' . $i, array(
		    'sanitize_callback' => 'medical_care_sanitize_select',
		));
		$wp_customize->add_control('medical_care_post_setting' . $i, array(
		    'type'            => 'select',
		    'choices'         => $pst_sls,
		    'label'           => __('Select post', 'medical-care'),
		    'section'         => 'medical_care_slider_section',
		    'priority'        => 2,
		));
	}

	wp_reset_postdata();

	$wp_customize->add_setting(
		'medical_care_slider_excerpt_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'medical_care_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Medical_Care_Customizer_Customcontrol_Switch(
			$wp_customize,
			'medical_care_slider_excerpt_show_hide',
			array(
				'settings'        => 'medical_care_slider_excerpt_show_hide',
				'section'         => 'medical_care_slider_section',
				'label'           => __( 'Show Hide excerpt', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
			)
		)
	);
	$wp_customize->add_setting('medical_care_slider_excerpt_count',array(
		'default'=> 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_integer'
	));
	$wp_customize->add_control(new Medical_Care_Slider_Custom_Control( $wp_customize, 'medical_care_slider_excerpt_count',array(
		'label' => esc_html__( 'Excerpt Limit','medical-care' ),
		'section'=> 'medical_care_slider_section',
		'settings'=>'medical_care_slider_excerpt_count',
		'input_attrs' => array(
			'reset'			   => 20,
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'priority'        => 3,
	)));
	$wp_customize->add_setting(
		'medical_care_slider_button_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'medical_care_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Medical_Care_Customizer_Customcontrol_Switch(
			$wp_customize,
			'medical_care_slider_button_show_hide',
			array(
				'settings'        => 'medical_care_slider_button_show_hide',
				'section'         => 'medical_care_slider_section',
				'label'           => __( 'Show Hide Button', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'priority'        => 3,
			)
		)
	);
	$wp_customize->add_setting('medical_care_slider_read_more',array(
		'default' => 'Make An Appointment',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('medical_care_slider_read_more',array(
		'label' => esc_html__('Button Text','medical-care'),
		'section' => 'medical_care_slider_section',
		'setting' => 'medical_care_slider_read_more',
		'type'    => 'text',
	));
	$wp_customize->add_setting( 'medical_care_slider_content_alignment',
		array(
			'default' => 'LEFT-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'medical_care_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Medical_Care_Text_Radio_Button_Custom_Control( $wp_customize, 'medical_care_slider_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Slider Content Alignment', 'medical-care' ),
			'section' => 'medical_care_slider_section',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','medical-care'),
	            'CENTER-ALIGN' => __('CENTER','medical-care'),
	            'RIGHT-ALIGN' => __('RIGHT','medical-care'),
			),
		)
	) );

	$wp_customize->add_setting('medical_care_slider_opacity',array(
        'default' => '0.7',
        'sanitize_callback' => 'medical_care_sanitize_choices'
	));
	$wp_customize->add_control('medical_care_slider_opacity',array(
		'type' => 'radio',
		'label'     => __('Slider Opacity', 'medical-care'),
		'section' => 'medical_care_slider_section',
		'type' => 'select',
		'choices' => array(
			'0' => __('0','medical-care'),
			'0.1' => __('0.1','medical-care'),
			'0.2' => __('0.2','medical-care'),
			'0.3' => __('0.3','medical-care'),
			'0.4' => __('0.4','medical-care'),
			'0.5' => __('0.5','medical-care'),
			'0.6' => __('0.6','medical-care'),
			'0.7' => __('0.7','medical-care'),
			'0.8' => __('0.8','medical-care'),
			'0.9' => __('0.9','medical-care'),
			'1' => __('1','medical-care')
		),
	) );

	// OUR Services
	$wp_customize->add_section('medical_care_service',array(
		'title' => esc_html__('Our Services','medical-care'),
		'priority' => 3,
		'panel' => 'medical_care_custompage_panel',
	));
	$wp_customize->add_setting( 'medical_care_section_services_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_services_heading', array(
		'label'       => esc_html__( 'Services Settings', 'medical-care' ),	
		'section'     => 'medical_care_service',
		'settings'    => 'medical_care_section_services_heading',
	) ) );
	$wp_customize->add_setting(
		'medical_care_services_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'medical_care_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Medical_Care_Customizer_Customcontrol_Switch(
			$wp_customize,
			'medical_care_services_enable',
			array(
				'settings'        => 'medical_care_services_enable',
				'section'         => 'medical_care_service',
				'label'           => __( 'Show / Hide services', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('medical_care_our_services_subtitle',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_care_our_services_subtitle',array(
		'label' => esc_html__('Section First Title','medical-care'),
		'section' => 'medical_care_service',
		'setting' => 'medical_care_our_services_subtitle',
		'type'    => 'text',
	));
	$wp_customize->selective_refresh->add_partial( 'medical_care_our_services_subtitle', array(
		'selector' => '#our-services h3',
		'render_callback' => 'medical_care_customize_partial_medical_care_our_services_subtitle',
	) );
	$wp_customize->add_setting('medical_care_our_services_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_care_our_services_title',array(
		'label' => esc_html__('Section Second Title','medical-care'),
		'section' => 'medical_care_service',
		'setting' => 'medical_care_our_services_title',
		'type'    => 'text',
	));

	$medical_care_categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($medical_care_categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('medical_care_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'medical_care_sanitize_select',
	));
	$wp_customize->add_control('medical_care_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Post','medical-care'),
		'section' => 'medical_care_service',
	));

	$wp_customize->add_setting('medical_care_service_count',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_care_service_count',array(
		'label'	=> esc_html__('Service Count','medical-care'),
		'section'	=> 'medical_care_services_section',
		'type'		=> 'number',
	));

	//Footer
    $wp_customize->add_section( 'medical_care_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'medical-care' ),
    	'panel' => 'medical_care_custompage_panel',
	) );
	$wp_customize->add_setting( 'medical_care_section_footer_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_footer_heading', array(
		'label'       => esc_html__( 'Footer Settings', 'medical-care' ),		
		'section'     => 'medical_care_footer_copyright',
		'settings'    => 'medical_care_section_footer_heading',
		'priority' => 1,
	) ) );
    $wp_customize->add_setting('medical_care_footer_text',array(
		'default'	=> 'Medical WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('medical_care_footer_text',array(
		'label'	=> esc_html__('Copyright Text','medical-care'),
		'section'	=> 'medical_care_footer_copyright',
		'type'		=> 'textarea'
	));
	$wp_customize->selective_refresh->add_partial( 'medical_care_footer_text', array(
		'selector' => '.site-info a',
		'render_callback' => 'medical_care_customize_partial_medical_care_footer_text',
	) );
	$wp_customize->add_setting( 'medical_care_footer_content_alignment',
		array(
			'default' => 'CENTER-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'medical_care_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Medical_Care_Text_Radio_Button_Custom_Control( $wp_customize, 'medical_care_footer_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Footer Content Alignment', 'medical-care' ),
			'section' => 'medical_care_footer_copyright',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','medical-care'),
	            'CENTER-ALIGN' => __('CENTER','medical-care'),
	            'RIGHT-ALIGN' => __('RIGHT','medical-care'),
			),
			'active_callback' => '',
		)
	) );
	$wp_customize->add_setting( 'medical_care_footer_widget',
		array(
			'default' => '4',
			'transport' => 'refresh',
			'sanitize_callback' => 'medical_care_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Medical_Care_Text_Radio_Button_Custom_Control( $wp_customize, 'medical_care_footer_widget',
		array(
			'type' => 'select',
			'label' => esc_html__('Footer Per Column','medical-care'),
			'section' => 'medical_care_footer_copyright',
			'choices' => array(
				'1' => __('1','medical-care'),
	            '2' => __('2','medical-care'),
	            '3' => __('3','medical-care'),
	            '4' => __('4','medical-care'),
			)
		)
	) );