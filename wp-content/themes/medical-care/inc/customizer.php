<?php
/**
 * Medical Care: Customizer
 *
 * @subpackage Medical Care
 * @since 1.0
 */

function medical_care_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

  	require get_parent_theme_file_path( 'inc/custom-control.php' );

  	//Register the sortable control type.
	$wp_customize->register_control_type( 'Medical_Care_Control_Sortable' );

  	// Add homepage customizer file
  	require get_template_directory() . '/inc/customizer-home-page.php';

  	// pro section
 	$wp_customize->add_section('medical_care_pro', array(
        'title'    => __('UPGRADE MEDICAL PREMIUM', 'medical-care'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('medical_care_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Medical_Care_Pro_Control($wp_customize, 'medical_care_pro', array(
        'label'    => __('MEDICAL PREMIUM', 'medical-care'),
        'section'  => 'medical_care_pro',
        'settings' => 'medical_care_pro',
        'priority' => 1,
    )));

	// logo
	$wp_customize->add_setting('medical_care_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_integer'
	));
	$wp_customize->add_control(new Medical_Care_Slider_Custom_Control( $wp_customize, 'medical_care_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','medical-care'),
		'section'=> 'title_tagline',
		'settings'=>'medical_care_logo_max_height',
		'input_attrs' => array(
			'reset'			  => 100,
            'step'             => 1,
			'min'              => 0,
			'max'              => 250,
        ),
        'priority'	=> 9,
	)));
	$wp_customize->add_setting('medical_care_logo_title',
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
			'medical_care_logo_title',
			array(
				'settings'        => 'medical_care_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('medical_care_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'medical_care_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Medical_Care_Customizer_Customcontrol_Switch(
			$wp_customize,
			'medical_care_logo_text',
			array(
				'settings'        => 'medical_care_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);

	//colors
	if ( $wp_customize->get_section( 'colors' ) ) {
        $wp_customize->get_section( 'colors' )->title = __( 'Global Colors', 'medical-care' );
        $wp_customize->get_section( 'colors' )->priority = 2;
    }

    $wp_customize->add_setting( 'medical_care_global_color_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_global_color_heading', array(
			'label'       => esc_html__( 'Global Colors', 'medical-care' ),
			'section'     => 'colors',
			'settings'    => 'medical_care_global_color_heading',
			'priority'       => 1,

	) ) );

    $wp_customize->add_setting('medical_care_primary_color', array(
	    'default' => '#29b6f6',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'medical_care_primary_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Color', 'medical-care'),
	 
	)));

	$wp_customize->add_setting('medical_care_secondary_color', array(
	    'default' => '#003153',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'medical_care_secondary_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme secondary color', 'medical-care'),
	)));

	$wp_customize->add_setting('medical_care_service_bg', array(
	    'default' => '#f3fbff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'medical_care_service_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('service Bg color', 'medical-care'),
	)));

	$wp_customize->add_setting('medical_care_heading_color', array(
	    'default' => '#000',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'medical_care_heading_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Heading Color', 'medical-care'),
	 
	)));

	$wp_customize->add_setting('medical_care_text_color', array(
	    'default' => '#656566',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'medical_care_text_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Text Color', 'medical-care'),
	 
	)));

	$wp_customize->add_setting('medical_care_primary_fade', array(
	    'default' => '#ebf9ff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'medical_care_primary_fade', array(
	    'section' => 'colors',
	    'label' => esc_html__('theme Color fade', 'medical-care'),
	 
	)));

	$wp_customize->add_setting('medical_care_post_bg', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'medical_care_post_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('White Bg Color', 'medical-care'),
	)));

 	//typography
	$wp_customize->add_section( 'medical_care_typography_settings', array(
		'title'       => __( 'Typography', 'medical-care' ),
		'priority'       => 2,
	) );
	$medical_care_font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);
	$wp_customize->add_setting( 'medical_care_section_typo_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Settings', 'medical-care' ),
		'section'     => 'medical_care_typography_settings',
		'settings'    => 'medical_care_section_typo_heading',
	) ) );
	$wp_customize->add_setting( 'medical_care_headings_text', array(
		'sanitize_callback' => 'medical_care_sanitize_fonts',
	));
	$wp_customize->add_control( 'medical_care_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'medical-care'),
		'section' => 'medical_care_typography_settings',
		'choices' => $medical_care_font_choices
	));
	$wp_customize->add_setting( 'medical_care_body_text', array(
		'sanitize_callback' => 'medical_care_sanitize_fonts'
	));
	$wp_customize->add_control( 'medical_care_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'medical-care' ),
		'section' => 'medical_care_typography_settings',
		'choices' => $medical_care_font_choices
	) );

    // Theme General Settings
    $wp_customize->add_section('medical_care_theme_settings',array(
        'title' => __('Theme General Settings', 'medical-care'),
        'priority' => 2,
    ) );
    $wp_customize->add_setting( 'medical_care_section_sticky_header_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_sticky_header_heading', array(
		'label'       => esc_html__( 'Sticky Header Settings', 'medical-care' ),
		'section'     => 'medical_care_theme_settings',
		'settings'    => 'medical_care_section_sticky_header_heading',
		'priority' => 1,
	) ) );
    $wp_customize->add_setting(
		'medical_care_sticky_header',
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
			'medical_care_sticky_header',
			array(
				'settings'        => 'medical_care_sticky_header',
				'section'         => 'medical_care_theme_settings',
				'label'           => __( 'Show Sticky Header', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
				'priority' => 1,
			)
		)
	);
	$wp_customize->add_setting( 'medical_care_section_loader_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_loader_heading', array(
		'label'       => esc_html__( 'Loader Settings', 'medical-care' ),
		'section'     => 'medical_care_theme_settings',
		'settings'    => 'medical_care_section_loader_heading',
		'priority' => 1,
	) ) );
	$wp_customize->add_setting(
		'medical_care_theme_loader',
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
			'medical_care_theme_loader',
			array(
				'settings'        => 'medical_care_theme_loader',
				'section'         => 'medical_care_theme_settings',
				'label'           => __( 'Show Site Loader', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
				'priority' => 1,
			)
		)
	);

	$wp_customize->add_setting('medical_care_loader_style',array(
        'default' => 'style_one',
        'sanitize_callback' => 'medical_care_sanitize_choices'
	));
	$wp_customize->add_control('medical_care_loader_style',array(
        'type' => 'select',
        'label' => __('Select Loader Design','medical-care'),
        'section' => 'medical_care_theme_settings',
        'choices' => array(
            'style_one' => __('Circle','medical-care'),
            'style_two' => __('Bar','medical-care'),
        ),
        'priority' => 1,
	) );
	
	$wp_customize->add_setting( 'medical_care_section_theme_width_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_theme_width_heading', array(
		'label'       => esc_html__( 'Theme Width Settings', 'medical-care' ),
		'section'     => 'medical_care_theme_settings',
		'settings'    => 'medical_care_section_theme_width_heading',
		'priority' => 1,
	) ) );
	$wp_customize->add_setting('medical_care_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'medical_care_sanitize_choices'
	));
	$wp_customize->add_control('medical_care_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','medical-care'),
        'section' => 'medical_care_theme_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','medical-care'),
            'container' => __('Container','medical-care'),
            'container_fluid' => __('Container Fluid','medical-care'),
        ),
        'priority' => 1,
	) );
	$wp_customize->add_setting( 'medical_care_section_menu_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_menu_heading', array(
		'label'       => esc_html__( 'Menu Settings', 'medical-care' ),
		'section'     => 'medical_care_theme_settings',
		'settings'    => 'medical_care_section_menu_heading',
		'priority' => 1,
	) ) );
	$wp_customize->add_setting('medical_care_menu_text_transform',array(
        'default' => 'UPPERCASE',
        'sanitize_callback' => 'medical_care_sanitize_choices'
	));
	$wp_customize->add_control('medical_care_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','medical-care'),
        'section' => 'medical_care_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','medical-care'),
            'UPPERCASE' => __('UPPERCASE','medical-care'),
            'LOWERCASE' => __('LOWERCASE','medical-care'),
        ),
	) );
	$wp_customize->add_setting( 'medical_care_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'medical-care' ),
		'section'     => 'medical_care_theme_settings',
		'settings'    => 'medical_care_section_scroll_heading',
	) ) );
	$wp_customize->add_setting(
		'medical_care_scroll_enable',
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
			'medical_care_scroll_enable',
			array(
				'settings'        => 'medical_care_scroll_enable',
				'section'         => 'medical_care_theme_settings',
				'label'           => __( 'show Scroll Top', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'medical_care_scroll_options',
		array(
			'default' => 'right_align',
			'transport' => 'refresh',
			'sanitize_callback' => 'medical_care_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Medical_Care_Text_Radio_Button_Custom_Control( $wp_customize, 'medical_care_scroll_options',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Scroll Top Alignment', 'medical-care' ),
			'section' => 'medical_care_theme_settings',
			'choices' => array(
				'left_align' => __('LEFT','medical-care'),
				'center_align' => __('CENTER','medical-care'),
				'right_align' => __('RIGHT','medical-care'),
			)
		)
	) );
	$wp_customize->add_setting('medical_care_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_theme_settings',
		'setting'	=> 'medical_care_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'medical_care_section_cursor_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_cursor_heading', array(
		'label'       => esc_html__( 'Cursor Setting', 'medical-care' ),
		'section'     => 'medical_care_theme_settings',
		'settings'    => 'medical_care_section_cursor_heading',
	) ) );

	$wp_customize->add_setting(
		'medical_care_enable_custom_cursor',
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
			'medical_care_enable_custom_cursor',
			array(
				'settings'        => 'medical_care_enable_custom_cursor',
				'section'         => 'medical_care_theme_settings',
				'label'           => __( 'show custom cursor', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting( 'medical_care_section_animation_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_animation_heading', array(
		'label'       => esc_html__( 'Animation Setting', 'medical-care' ),
		'section'     => 'medical_care_theme_settings',
		'settings'    => 'medical_care_section_animation_heading',
	) ) );

	$wp_customize->add_setting(
		'medical_care_animation_enable',
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
			'medical_care_animation_enable',
			array(
				'settings'        => 'medical_care_animation_enable',
				'section'         => 'medical_care_theme_settings',
				'label'           => __( 'show/Hide Animation', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Post Layouts
	$wp_customize->add_panel( 'medical_care_post_panel', array(
		'title' => esc_html__( 'Post Layout', 'medical-care' ),
		'priority' => 4,
	));
    $wp_customize->add_section('medical_care_layout',array(
        'title' => __('Single-Post Layout', 'medical-care'),
        'panel' => 'medical_care_post_panel',
    ) );
    $wp_customize->add_setting( 'medical_care_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_post_heading', array(
		'label'       => esc_html__( 'single Post Structure', 'medical-care' ),
		'section'     => 'medical_care_layout',
		'settings'    => 'medical_care_section_post_heading',
	) ) );
	$wp_customize->add_setting( 'medical_care_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Medical_Care_Radio_Image_Control( $wp_customize, 'medical_care_single_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Single Post Page Layout', 'medical-care' ),
			'section' => 'medical_care_layout',
			'choices' => array(

				'single_right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'medical-care' )
				),
				'single_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'medical-care' )
				),
				'single_full_width' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'medical-care' )
				),
			)
		)
	) );
	$wp_customize->add_setting('medical_care_single_post_date',
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
			'medical_care_single_post_date',
			array(
				'settings'        => 'medical_care_single_post_date',
				'section'         => 'medical_care_layout',
				'label'           => __( 'Show Date', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'medical_care_single_post_date', array(
		'selector' => '.date-box',
		'render_callback' => 'medical_care_customize_partial_medical_care_single_post_date',
	) );
	$wp_customize->add_setting('medical_care_single_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_single_date_icon',array(
		'label'	=> __('date Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_layout',
		'setting'	=> 'medical_care_single_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('medical_care_single_post_admin',
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
			'medical_care_single_post_admin',
			array(
				'settings'        => 'medical_care_single_post_admin',
				'section'         => 'medical_care_layout',
				'label'           => __( 'Show Author/Admin', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'medical_care_single_post_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'medical_care_customize_partial_medical_care_single_post_admin',
	) );
	$wp_customize->add_setting('medical_care_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_single_author_icon',array(
		'label'	=> __('Author Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_layout',
		'setting'	=> 'medical_care_single_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('medical_care_single_post_comment',
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
			'medical_care_single_post_comment',
			array(
				'settings'        => 'medical_care_single_post_comment',
				'section'         => 'medical_care_layout',
				'label'           => __( 'Show Comment', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('medical_care_single_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_single_comment_icon',array(
		'label'	=> __('comment Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_layout',
		'setting'	=> 'medical_care_single_comment_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('medical_care_single_post_tag_count',
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
			'medical_care_single_post_tag_count',
			array(
				'settings'        => 'medical_care_single_post_tag_count',
				'section'         => 'medical_care_layout',
				'label'           => __( 'Show tag count', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('medical_care_single_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_single_tag_icon',array(
		'label'	=> __('tag Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_layout',
		'setting'	=> 'medical_care_single_tag_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('medical_care_single_post_tag',
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
			'medical_care_single_post_tag',
			array(
				'settings'        => 'medical_care_single_post_tag',
				'section'         => 'medical_care_layout',
				'label'           => __( 'Show Tags', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'medical_care_single_post_tag', array(
		'selector' => '.single-tags',
		'render_callback' => 'medical_care_customize_partial_medical_care_single_post_tag',
	) );
	$wp_customize->add_setting('medical_care_similar_post',
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
			'medical_care_similar_post',
			array(
				'settings'        => 'medical_care_similar_post',
				'section'         => 'medical_care_layout',
				'label'           => __( 'Show Similar post', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('medical_care_similar_text',array(
		'default' => 'Explore More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('medical_care_similar_text',array(
		'label' => esc_html__('Similar Post Heading','medical-care'),
		'section' => 'medical_care_layout',
		'setting' => 'medical_care_similar_text',
		'type'    => 'text'
	));
	$wp_customize->add_section('medical_care_archieve_post_layot',array(
        'title' => __('Archieve-Post Layout', 'medical-care'),
        'panel' => 'medical_care_post_panel',
    ) );
	$wp_customize->add_setting( 'medical_care_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'medical-care' ),
		'section'     => 'medical_care_archieve_post_layot',
		'settings'    => 'medical_care_section_archive_post_heading',
	) ) );
	$wp_customize->add_setting( 'medical_care_post_option',
		array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
	);
	$wp_customize->add_control( new Medical_Care_Radio_Image_Control( $wp_customize, 'medical_care_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Post Page Layout', 'medical-care' ),
			'section' => 'medical_care_archieve_post_layot',
			'choices' => array(
				'right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'medical-care' )
				),
				'left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'medical-care' )
				),
				'one_column' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'medical-care' )
				),
				'three_column' => array(
					'image' => get_template_directory_uri().'/assets/images/3column.jpg',
					'name' => __( 'Three Column', 'medical-care' )
				),
				'four_column' => array(
					'image' => get_template_directory_uri().'/assets/images/4column.jpg',
					'name' => __( 'Four Column', 'medical-care' )
				),
				'grid_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
					'name' => __( 'Grid-Right-Sidebar Layout', 'medical-care' )
				),
				'grid_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-left.png',
					'name' => __( 'Grid-Left-Sidebar Layout', 'medical-care' )
				),
				'grid_post' => array(
					'image' => get_template_directory_uri().'/assets/images/grid.jpg',
					'name' => __( 'Grid Layout', 'medical-care' )
				)
			)
		)
	) );
	$wp_customize->add_setting( 'medical_care_grid_column',
		array(
			'default' => '3_column',
			'transport' => 'refresh',
			'sanitize_callback' => 'medical_care_sanitize_choices'
		)
	);
	$wp_customize->add_control( new Medical_Care_Text_Radio_Button_Custom_Control( $wp_customize, 'medical_care_grid_column',
		array(
			'type' => 'select',
			'label' => esc_html__('Grid Post Per Row','medical-care'),
			'section' => 'medical_care_archieve_post_layot',
			'choices' => array(
				'1_column' => __('1','medical-care'),
	            '2_column' => __('2','medical-care'),
	            '3_column' => __('3','medical-care'),
	            '4_column' => __('4','medical-care'),
			)
		)
	) );
	$wp_customize->add_setting('archieve_post_order', array(
        'default' => array('title', 'image', 'meta','excerpt','btn'),
        'sanitize_callback' => 'medical_care_sanitize_sortable',
    ));
    $wp_customize->add_control(new Medical_Care_Control_Sortable($wp_customize, 'archieve_post_order', array(
    	'label' => esc_html__('Post Order', 'medical-care'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'medical-care') ,
        'section' => 'medical_care_archieve_post_layot',
        'choices' => array(
            'title' => __('title', 'medical-care') ,
            'image' => __('media', 'medical-care') ,
            'meta' => __('meta', 'medical-care') ,
            'excerpt' => __('excerpt', 'medical-care') ,
            'btn' => __('Read more', 'medical-care') ,
        ) ,
    )));
	$wp_customize->add_setting('medical_care_post_excerpt',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'medical_care_sanitize_integer'
	));
	$wp_customize->add_control(new Medical_Care_Slider_Custom_Control( $wp_customize, 'medical_care_post_excerpt',array(
		'label' => esc_html__( 'Excerpt Limit','medical-care' ),
		'section'=> 'medical_care_archieve_post_layot',
		'settings'=>'medical_care_post_excerpt',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	$wp_customize->add_setting('medical_care_read_more_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('medical_care_read_more_text',array(
		'label' => esc_html__('Read More Text','medical-care'),
		'section' => 'medical_care_archieve_post_layot',
		'setting' => 'medical_care_read_more_text',
		'type'    => 'text'
	));
	$wp_customize->add_setting('medical_care_date',
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
			'medical_care_date',
			array(
				'settings'        => 'medical_care_date',
				'section'         => 'medical_care_archieve_post_layot',
				'label'           => __( 'Show Date', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'medical_care_date', array(
		'selector' => '.date-box',
		'render_callback' => 'medical_care_customize_partial_medical_care_date',
	) );
	$wp_customize->add_setting('medical_care_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_date_icon',array(
		'label'	=> __('date Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_archieve_post_layot',
		'setting'	=> 'medical_care_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('medical_care_sticky_icon',array(
		'default'	=> 'fas fa-thumb-tack',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_sticky_icon',array(
		'label'	=> __('Sticky Post Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_archieve_post_layot',
		'setting'	=> 'medical_care_sticky_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('medical_care_admin',
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
			'medical_care_admin',
			array(
				'settings'        => 'medical_care_admin',
				'section'         => 'medical_care_archieve_post_layot',
				'label'           => __( 'Show Author/Admin', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'medical_care_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'medical_care_customize_partial_medical_care_admin',
	) );
	$wp_customize->add_setting('medical_care_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_author_icon',array(
		'label'	=> __('Author Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_archieve_post_layot',
		'setting'	=> 'medical_care_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('medical_care_comment',
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
			'medical_care_comment',
			array(
				'settings'        => 'medical_care_comment',
				'section'         => 'medical_care_archieve_post_layot',
				'label'           => __( 'Show Comment', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'medical_care_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'medical_care_customize_partial_medical_care_comment',
	) );
	$wp_customize->add_setting('medical_care_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_comment_icon',array(
		'label'	=> __('comment Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_archieve_post_layot',
		'setting'	=> 'medical_care_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('medical_care_tag',
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
			'medical_care_tag',
			array(
				'settings'        => 'medical_care_tag',
				'section'         => 'medical_care_archieve_post_layot',
				'label'           => __( 'Show tag count', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'medical_care_tag', array(
		'selector' => '.tags',
		'render_callback' => 'medical_care_customize_partial_medical_care_tag',
	) );
	$wp_customize->add_setting('medical_care_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Medical_Care_Fontawesome_Icon_Chooser(
        $wp_customize,'medical_care_tag_icon',array(
		'label'	=> __('tag Icon','medical-care'),
		'transport' => 'refresh',
		'section'	=> 'medical_care_archieve_post_layot',
		'setting'	=> 'medical_care_tag_icon',
		'type'		=> 'icon'
	)));

	// header-image
	$wp_customize->add_setting( 'medical_care_section_header_image_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_header_image_heading', array(
		'label'       => esc_html__( 'Header Image Settings', 'medical-care' ),
		'section'     => 'header_image',
		'settings'    => 'medical_care_section_header_image_heading',
		'priority'    =>'1',
	) ) );

	$wp_customize->add_setting('medical_care_show_header_image',array(
        'default' => 'on',
        'sanitize_callback' => 'medical_care_sanitize_choices'
	));
	$wp_customize->add_control('medical_care_show_header_image',array(
        'type' => 'select',
        'label' => __('Select Option','medical-care'),
        'section' => 'header_image',
        'choices' => array(
            'on' => __('With Header Image','medical-care'),
            'off' => __('Without Header Image','medical-care'),
        ),
	) );

	// breadcrumb
	$wp_customize->add_section('medical_care_breadcrumb_settings',array(
        'title' => __('Breadcrumb Settings', 'medical-care'),
        'priority' => 2
    ) );
	$wp_customize->add_setting( 'medical_care_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_breadcrumb_heading', array(
		'label'       => esc_html__( 'Theme Breadcrumb Settings', 'medical-care' ),
		'section'     => 'medical_care_breadcrumb_settings',
		'settings'    => 'medical_care_section_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'medical_care_enable_breadcrumb',
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
			'medical_care_enable_breadcrumb',
			array(
				'settings'        => 'medical_care_enable_breadcrumb',
				'section'         => 'medical_care_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('medical_care_breadcrumb_separator', array(
        'default' => ' / ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('medical_care_breadcrumb_separator', array(
        'label' => __('Breadcrumb Separator', 'medical-care'),
        'section' => 'medical_care_breadcrumb_settings',
        'type' => 'text',
    ));
	$wp_customize->add_setting( 'medical_care_single_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_single_breadcrumb_heading', array(
		'label'       => esc_html__( 'Single post & Page', 'medical-care' ),
		'section'     => 'medical_care_breadcrumb_settings',
		'settings'    => 'medical_care_single_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'medical_care_single_enable_breadcrumb',
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
			'medical_care_single_enable_breadcrumb',
			array(
				'settings'        => 'medical_care_single_enable_breadcrumb',
				'section'         => 'medical_care_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_setting( 'medical_care_woocommerce_breadcrumb_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_woocommerce_breadcrumb_heading', array(
			'label'       => esc_html__( 'Woocommerce Breadcrumb', 'medical-care' ),
			'section'     => 'medical_care_breadcrumb_settings',
			'settings'    => 'medical_care_woocommerce_breadcrumb_heading',
		) ) );
		$wp_customize->add_setting(
			'medical_care_woocommerce_enable_breadcrumb',
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
				'medical_care_woocommerce_enable_breadcrumb',
				array(
					'settings'        => 'medical_care_woocommerce_enable_breadcrumb',
					'section'         => 'medical_care_breadcrumb_settings',
					'label'           => __( 'Show Breadcrumb', 'medical-care' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'medical-care' ),
						'off'    => __( 'Off', 'medical-care' ),
					),
					'active_callback' => '',
				)
			)
		);
		$wp_customize->add_setting('woocommerce_breadcrumb_separator', array(
	        'default' => ' / ',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_breadcrumb_separator', array(
	        'label' => __('Breadcrumb Separator', 'medical-care'),
	        'section' => 'medical_care_breadcrumb_settings',
	        'type' => 'text',
	    ));
	}

	// woocommerce
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_section('medical_care_woocoomerce_section',array(
	        'title' => __('Custom Woocommerce Settings', 'medical-care'),
	        'panel' => 'woocommerce',
	        'priority' => 4,
	    ) );
		$wp_customize->add_setting( 'medical_care_section_shoppage_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_shoppage_heading', array(
			'label'       => esc_html__( 'Shop Page Settings', 'medical-care' ),
			'section'     => 'medical_care_woocommerce_section',
			'settings'    => 'medical_care_section_shoppage_heading',
		) ) );
		$wp_customize->add_setting( 'medical_care_shop_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Medical_Care_Radio_Image_Control( $wp_customize, 'medical_care_shop_page_sidebar',
			array(
				'type'=>'select',
				'label' => __( 'Show Shop Page Sidebar', 'medical-care' ),
				'section'     => 'medical_care_woocommerce_section',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'medical-care' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'medical-care' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'medical-care' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'medical_care_wocommerce_single_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Medical_Care_Radio_Image_Control( $wp_customize, 'medical_care_wocommerce_single_page_sidebar',
			array(
				'type'=>'select',
				'label'           => __( 'Show Single Product Page Sidebar', 'medical-care' ),
				'section'     => 'medical_care_woocommerce_section',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'medical-care' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'medical-care' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'medical-care' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'medical_care_section_archieve_product_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_archieve_product_heading', array(
			'label'       => esc_html__( 'Archieve Product Settings', 'medical-care' ),
			'section'     => 'medical_care_woocommerce_section',
			'settings'    => 'medical_care_section_archieve_product_heading',
		) ) );
		$wp_customize->add_setting('medical_care_archieve_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'medical_care_sanitize_choices'
		));
		$wp_customize->add_control('medical_care_archieve_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','medical-care'),
	        'section' => 'medical_care_woocommerce_section',
	        'choices' => array(
	            '1' => __('One Column','medical-care'),
	            '2' => __('Two Column','medical-care'),
	            '3' => __('Three Column','medical-care'),
	            '4' => __('four Column','medical-care'),
	            '5' => __('Five Column','medical-care'),
	            '6' => __('Six Column','medical-care'),
	        ),
		) );
		$wp_customize->add_setting( 'medical_care_archieve_shop_perpage', array(
			'default'              => 6,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'medical_care_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'medical_care_archieve_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','medical-care' ),
			'section'     => 'medical_care_woocommerce_section',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 30,
			),
		) );
		$wp_customize->add_setting( 'medical_care_section_related_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_related_heading', array(
			'label'       => esc_html__( 'Related Product Settings', 'medical-care' ),
			'section'     => 'medical_care_woocommerce_section',
			'settings'    => 'medical_care_section_related_heading',
		) ) );
		$wp_customize->add_setting('medical_care_related_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'medical_care_sanitize_choices'
		));
		$wp_customize->add_control('medical_care_related_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','medical-care'),
	        'section' => 'medical_care_woocommerce_section',
	        'choices' => array(
	            '1' => __('One Column','medical-care'),
	            '2' => __('Two Column','medical-care'),
	            '3' => __('Three Column','medical-care'),
	            '4' => __('four Column','medical-care'),
	            '5' => __('Five Column','medical-care'),
	            '6' => __('Six Column','medical-care'),
	        ),
		) );
		$wp_customize->add_setting( 'medical_care_related_shop_perpage', array(
			'default'              => 3,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'medical_care_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'medical_care_related_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','medical-care' ),
			'section'     => 'medical_care_woocommerce_section',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 10,
			),
		) );
		$wp_customize->add_setting(
			'medical_care_related_product',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'medical_care_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(new Medical_Care_Customizer_Customcontrol_Switch($wp_customize,'medical_care_related_product',
			array(
				'settings'        => 'medical_care_related_product',
				'section'         => 'medical_care_woocommerce_section',
				'label'           => __( 'show Related Products', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		));
	}

	// mobile width
	$wp_customize->add_section('medical_care_mobile_options',array(
        'title' => __('Mobile Media settings', 'medical-care'),
        'priority' => 4,
    ) );
    $wp_customize->add_setting( 'medical_care_section_mobile_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_mobile_heading', array(
		'label'       => esc_html__( 'Mobile Media settings', 'medical-care' ),
		'section'     => 'medical_care_mobile_options',
		'settings'    => 'medical_care_section_mobile_heading',
	) ) );
	$wp_customize->add_setting(
		'medical_care_slider_button_mobile_show_hide',
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
			'medical_care_slider_button_mobile_show_hide',
			array(
				'settings'        => 'medical_care_slider_button_mobile_show_hide',
				'section'         => 'medical_care_mobile_options',
				'label'           => __( 'Show Slider Button', 'medical-care' ),
				'description' => __('Control wont function if the button is off in the main slider settings.', 'medical-care') ,				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'medical_care_scroll_enable_mobile',
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
			'medical_care_scroll_enable_mobile',
			array(
				'settings'        => 'medical_care_scroll_enable_mobile',
				'section'         => 'medical_care_mobile_options',
				'label'           => __( 'Show Scroll Top', 'medical-care' ),
				'description' => __('Control wont function if scroll-top is off in the main settings.', 'medical-care') ,					
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'medical_care_section_mobile_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Medical_Care_Customizer_Customcontrol_Section_Heading( $wp_customize, 'medical_care_section_mobile_breadcrumb_heading', array(
		'label'       => esc_html__( 'Mobile Breadcrumb settings', 'medical-care' ),
		'description' => __('Controls wont function if the breadcrumb is off in the main breadcrumb settings.', 'medical-care') ,
		'section'     => 'medical_care_mobile_options',
		'settings'    => 'medical_care_section_mobile_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'medical_care_enable_breadcrumb_mobile',
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
			'medical_care_enable_breadcrumb_mobile',
			array(
				'settings'        => 'medical_care_enable_breadcrumb_mobile',
				'section'         => 'medical_care_mobile_options',
				'label'           => __( 'Theme Breadcrumb', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'medical_care_single_enable_breadcrumb_mobile',
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
			'medical_care_single_enable_breadcrumb_mobile',
			array(
				'settings'        => 'medical_care_single_enable_breadcrumb_mobile',
				'section'         => 'medical_care_mobile_options',
				'label'           => __( 'Single Post & Page', 'medical-care' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'medical-care' ),
					'off'    => __( 'Off', 'medical-care' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_setting(
			'medical_care_woocommerce_enable_breadcrumb_mobile',
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
				'medical_care_woocommerce_enable_breadcrumb_mobile',
				array(
					'settings'        => 'medical_care_woocommerce_enable_breadcrumb_mobile',
					'section'         => 'medical_care_mobile_options',
					'label'           => __( 'wooCommerce Breadcrumb', 'medical-care' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'medical-care' ),
						'off'    => __( 'Off', 'medical-care' ),
					),
					'active_callback' => '',
				)
			)
		);
	}

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'medical_care_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'medical_care_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'medical_care_front_page_sections', 4 );

	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'medical_care_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'medical-care' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'medical-care' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'medical_care_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'medical_care_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'medical_care_customize_register' );

function medical_care_customize_partial_blogname() {
	bloginfo( 'name' );
}

function medical_care_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function medical_care_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function medical_care_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('MEDICAL_CARE_PRO_LINK',__('https://www.ovationthemes.com/products/medical-wordpress-theme','medical-care'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Medical_Care_Pro_Control')):
    class Medical_Care_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md-2 col-sm-6 upsell-btn">
                <a href="<?php echo esc_url( MEDICAL_CARE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE MEDICAL PREMIUM','medical-care');?> </a>
	        </div>
            <div class="col-md-4 col-sm-6">
                <img class="medical_care_img_responsive" src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">

            </div>
	        <div class="col-md-3 col-sm-6">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('MEDICAL PREMIUM - Features', 'medical-care'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'medical-care');?> </li>
                    <li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'medical-care');?> </li>
                   	<li class="upsell-medical_care"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'medical-care');?> </li>
                </ul>
        	</div>
		    <div class="col-md-2 col-sm-6 upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( MEDICAL_CARE_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE MEDICAL PREMIUM','medical-care');?> </a>
		    </div>
        </label>
    <?php } }
endif;
