<?php
/**
 * Beauty Salon Spa: Customizer-home-page
 *
 * @subpackage Beauty Salon Spa
 * @since 1.0
 */

	//  Home Page Panel
	$wp_customize->add_panel( 'beauty_salon_spa_custompage_panel', array(
		'title' => esc_html__( 'Custom Page Settings', 'beauty-salon-spa' ),
		'priority' => 2,
	));
	// Top Header
    $wp_customize->add_section('beauty_salon_spa_top',array(
        'title' => __('Contact info', 'beauty-salon-spa'),
        'priority' => 3,
        'panel' => 'beauty_salon_spa_custompage_panel',
    ) );
    $wp_customize->add_setting( 'beauty_salon_spa_section_contact_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_contact_heading', array(
		'label'       => esc_html__( 'Contact Settings', 'beauty-salon-spa' ),	
		'description' => __( 'Add contact info in the below feilds', 'beauty-salon-spa' ),		
		'section'     => 'beauty_salon_spa_top',
		'settings'    => 'beauty_salon_spa_section_contact_heading',
	) ) );
    $wp_customize->add_setting('beauty_salon_spa_top_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_top_text',array(
		'label' => esc_html__('Add Topbar Text','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_top_text',
		'type'    => 'text'
	));	
    $wp_customize->add_setting('beauty_salon_spa_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('beauty_salon_spa_email_address',array(
		'label' => esc_html__('Add Email Address','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_email_address',
		'type'    => 'text'
	));
	$wp_customize->add_setting('beauty_salon_spa_mail_icon',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_mail_icon',array(
		'label'	=> __('Add Mail Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_top',
		'setting'	=> 'beauty_salon_spa_mail_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('beauty_salon_spa_location_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_location_address',array(
		'label' => esc_html__('Add Location','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_location_address',
		'type'    => 'text'
	));
	$wp_customize->add_setting('beauty_salon_spa_address_icon',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_address_icon',array(
		'label'	=> __('Add Address Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_top',
		'setting'	=> 'beauty_salon_spa_address_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('beauty_salon_spa_call_number',array(
		'default' => '',
		'sanitize_callback' => 'beauty_salon_spa_sanitize_phone_number'
	));
	$wp_customize->add_control('beauty_salon_spa_call_number',array(
		'label' => esc_html__('Add Phone Number','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_call_number',
		'type'    => 'text'
	));
	$wp_customize->add_setting('beauty_salon_spa_call_icon',array(
		'default'	=> 'fas fa-phone-volume',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_call_icon',array(
		'label'	=> __('Add Call Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_top',
		'setting'	=> 'beauty_salon_spa_call_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('beauty_salon_spa_talk_btn_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_talk_btn_text',array(
		'label' => esc_html__('Add Button Text','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_talk_btn_text',
		'type'    => 'text'
	));
    $wp_customize->add_setting('beauty_salon_spa_talk_btn_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('beauty_salon_spa_talk_btn_link',array(
		'label' => esc_html__('Add Button URL','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_top',
		'setting' => 'beauty_salon_spa_talk_btn_link',
		'type'    => 'url'
	));

    //Slider
	$wp_customize->add_section( 'beauty_salon_spa_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'beauty-salon-spa' ),
    	'priority'   => 3,
    	'panel' => 'beauty_salon_spa_custompage_panel',
	) );
	$wp_customize->add_setting( 'beauty_salon_spa_section_slide_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Settings', 'beauty-salon-spa' ),
		'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'beauty-salon-spa' ),		
		'section'     => 'beauty_salon_spa_slider_section',
		'settings'    => 'beauty_salon_spa_section_slide_heading',
		'priority'	  => 1,
	) ) );
	$wp_customize->add_setting(
		'beauty_salon_spa_slider_arrows',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_slider_arrows',
			array(
				'settings'        => 'beauty_salon_spa_slider_arrows',
				'section'         => 'beauty_salon_spa_slider_section',
				'label'           => __( 'Check To show Slider', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'priority'	  => 1,
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('beauty_salon_spa_slider_count',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_slider_count',array(
		'label'	=> esc_html__('Slider Count','beauty-salon-spa'),
		'section'	=> 'beauty_salon_spa_slider_section',
		'type'		=> 'number',
		'priority'	  => 1,
	));

	$beauty_salon_spa_slider_count = get_theme_mod('beauty_salon_spa_slider_count');

	$beauty_salon_spa_args = array('numberposts' => -1);
	$post_list = get_posts($beauty_salon_spa_args);
	$i = 0;
	$pst_sls[]= __('Select','beauty-salon-spa');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $i = 1; $i <= $beauty_salon_spa_slider_count; $i++ ) {
		$wp_customize->add_setting('beauty_salon_spa_post_setting'.$i,array(
			'sanitize_callback' => 'beauty_salon_spa_sanitize_select',
		));
		$wp_customize->add_control('beauty_salon_spa_post_setting'.$i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','beauty-salon-spa'),
			'section' => 'beauty_salon_spa_slider_section',
			'priority'	  => 1,
		));
	}
	wp_reset_postdata();

	$wp_customize->add_setting(
		'beauty_salon_spa_slider_excerpt_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_slider_excerpt_show_hide',
			array(
				'settings'        => 'beauty_salon_spa_slider_excerpt_show_hide',
				'section'         => 'beauty_salon_spa_slider_section',
				'label'           => __( 'Show Hide excerpt', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'priority'	  => 1,
			)
		)
	);
	$wp_customize->add_setting('beauty_salon_spa_slider_excerpt_count',array(
		'default'=> 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'beauty_salon_spa_sanitize_integer'
	));
	$wp_customize->add_control(new Beauty_Salon_Spa_Slider_Custom_Control( $wp_customize, 'beauty_salon_spa_slider_excerpt_count',array(
		'label' => esc_html__( 'Excerpt Limit','beauty-salon-spa' ),
		'section'=> 'beauty_salon_spa_slider_section',
		'settings'=>'beauty_salon_spa_slider_excerpt_count',
		'input_attrs' => array(
			'reset'			   => 20,
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'priority'	  => 1,
	)));
	$wp_customize->add_setting(
		'beauty_salon_spa_slider_button_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_slider_button_show_hide',
			array(
				'settings'        => 'beauty_salon_spa_slider_button_show_hide',
				'section'         => 'beauty_salon_spa_slider_section',
				'label'           => __( 'Show Hide Button', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'priority'	  => 1,
			)
		)
	);
	$wp_customize->add_setting('beauty_salon_spa_slider_read_more',array(
		'default' => 'BOOK NOW',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('beauty_salon_spa_slider_read_more',array(
		'label' => esc_html__('Button Text','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_slider_section',
		'setting' => 'beauty_salon_spa_slider_read_more',
		'type'    => 'text',
		'priority'	  => 1,
	));

	$wp_customize->add_setting('beauty_salon_spa_slider_content_alignment',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_slider_content_alignment',array(
		'type' => 'radio',
		'label'     => __('Slider Content Alignment', 'beauty-salon-spa'),
		'section' => 'beauty_salon_spa_slider_section',
		'type' => 'select',
		'choices' => array(
			'LEFT-ALIGN' => __('LEFT','beauty-salon-spa'),
            'CENTER-ALIGN' => __('CENTER','beauty-salon-spa'),
            'RIGHT-ALIGN' => __('RIGHT','beauty-salon-spa'),
		),
	) );

	$wp_customize->add_setting('beauty_salon_spa_slider_opacity',array(
        'default' => '1',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_slider_opacity',array(
		'type' => 'radio',
		'label'     => __('Slider Opacity', 'beauty-salon-spa'),
		'section' => 'beauty_salon_spa_slider_section',
		'type' => 'select',
		'choices' => array(
			'0' => __('0','beauty-salon-spa'),
			'0.1' => __('0.1','beauty-salon-spa'),
			'0.2' => __('0.2','beauty-salon-spa'),
			'0.3' => __('0.3','beauty-salon-spa'),
			'0.4' => __('0.4','beauty-salon-spa'),
			'0.5' => __('0.5','beauty-salon-spa'),
			'0.6' => __('0.6','beauty-salon-spa'),
			'0.7' => __('0.7','beauty-salon-spa'),
			'0.8' => __('0.8','beauty-salon-spa'),
			'0.9' => __('0.9','beauty-salon-spa'),
			'1' => __('1','beauty-salon-spa')
		),
	) );

	// Services Section
	$wp_customize->add_section( 'beauty_salon_spa_services_section' , array(
    	'title'      => __( 'Services Section Settings', 'beauty-salon-spa' ),
		'priority'   => 4,
		'panel' => 'beauty_salon_spa_custompage_panel',
	) );
	$wp_customize->add_setting( 'beauty_salon_spa_section_services_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_services_heading', array(
		'label'       => esc_html__( 'Services Section Settings', 'beauty-salon-spa' ),		
		'section'     => 'beauty_salon_spa_services_section',
		'settings'    => 'beauty_salon_spa_section_services_heading',
	) ) );
	$wp_customize->add_setting(
		'beauty_salon_spa_services_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_services_show_hide',
			array(
				'settings'        => 'beauty_salon_spa_services_show_hide',
				'section'         => 'beauty_salon_spa_services_section',
				'label'           => __( 'Check To show Section', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('beauty_salon_spa_services_short_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_services_short_title',array(
		'label'	=> esc_html__('Section Short Title ','beauty-salon-spa'),
		'section'	=> 'beauty_salon_spa_services_section',
		'type'		=> 'text',
	));
	$wp_customize->add_setting('beauty_salon_spa_services_main_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_services_main_title',array(
		'label'	=> esc_html__('Section Main Title','beauty-salon-spa'),
		'section'	=> 'beauty_salon_spa_services_section',
		'type'		=> 'text',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('beauty_salon_spa_services_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'beauty_salon_spa_sanitize_select',
	));
	$wp_customize->add_control('beauty_salon_spa_services_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display Services','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_services_section',
	));

	$wp_customize->add_setting('beauty_salon_spa_service_count',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_service_count',array(
		'label'	=> esc_html__('Service Count','beauty-salon-spa'),
		'section'	=> 'beauty_salon_spa_services_section',
		'type'		=> 'number',
	));

	//Footer
    $wp_customize->add_section( 'beauty_salon_spa_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'beauty-salon-spa' ),
    	'priority' => 6,
    	'panel' => 'beauty_salon_spa_custompage_panel',
	) );
	$wp_customize->add_setting( 'beauty_salon_spa_section_footer_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_footer_heading', array(
		'label'       => esc_html__( 'Footer Settings', 'beauty-salon-spa' ),		
		'section'     => 'beauty_salon_spa_footer_copyright',
		'settings'    => 'beauty_salon_spa_section_footer_heading',
		'priority' => 1,
	) ) );
    $wp_customize->add_setting('beauty_salon_spa_footer_text',array(
		'default'	=> 'Salon WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('beauty_salon_spa_footer_text',array(
		'label'	=> esc_html__('Copyright Text','beauty-salon-spa'),
		'section'	=> 'beauty_salon_spa_footer_copyright',
		'type'		=> 'textarea'
	));

	$wp_customize->add_setting('beauty_salon_spa_footer_content_alignment',array(
        'default' => 'CENTER-ALIGN',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_footer_content_alignment',array(
		'type' => 'radio',
		'label'     => __('Footer Content Alignment', 'beauty-salon-spa'),
		'section' => 'beauty_salon_spa_footer_copyright',
		'type' => 'select',
		'choices' => array(
			'LEFT-ALIGN' => __('LEFT','beauty-salon-spa'),
            'CENTER-ALIGN' => __('CENTER','beauty-salon-spa'),
            'RIGHT-ALIGN' => __('RIGHT','beauty-salon-spa'),
		),
	) );

	$wp_customize->add_setting('beauty_salon_spa_footer_widget',array(
        'default' => '4',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_footer_widget',array(
		'type' => 'radio',
		'label'     => __('Footer Per Column', 'beauty-salon-spa'),
		'section' => 'beauty_salon_spa_footer_copyright',
		'type' => 'select',
		'choices' => array(
			'1' => __('1','beauty-salon-spa'),
            '2' => __('2','beauty-salon-spa'),
            '3' => __('3','beauty-salon-spa'),
            '4' => __('4','beauty-salon-spa'),
		)
	) );