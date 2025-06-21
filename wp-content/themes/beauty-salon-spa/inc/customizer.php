<?php
/**
 * Beauty Salon Spa: Customizer
 *
 * @subpackage Beauty Salon Spa
 * @since 1.0
 */

function beauty_salon_spa_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.

  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

  	require get_parent_theme_file_path( 'inc/custom-control.php' );

  	//Register the sortable control type.
	$wp_customize->register_control_type( 'Beauty_Salon_Spa_Control_Sortable' );

  	// Add homepage customizer file
  	require get_template_directory() . '/inc/customizer-home-page.php';

  	// pro section
 	$wp_customize->add_section('beauty_salon_spa_pro', array(
        'title'    => __('UPGRADE BEAUTY SALON PREMIUM', 'beauty-salon-spa'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('beauty_salon_spa_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Beauty_Salon_Spa_Pro_Control($wp_customize, 'beauty_salon_spa_pro', array(
        'label'    => __('BEAUTY SALON SPA PREMIUM', 'beauty-salon-spa'),
        'section'  => 'beauty_salon_spa_pro',
        'settings' => 'beauty_salon_spa_pro',
        'priority' => 1,
    )));

    // logo 
   	$wp_customize->add_setting('beauty_salon_spa_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'beauty_salon_spa_sanitize_integer'
	));
	$wp_customize->add_control(new Beauty_Salon_Spa_Slider_Custom_Control( $wp_customize, 'beauty_salon_spa_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','beauty-salon-spa'),
		'section'=> 'title_tagline',
		'settings'=>'beauty_salon_spa_logo_max_height',
		'input_attrs' => array(
			'reset'            => 100,
            'step'             => 1,
			'min'              => 0,
			'max'              => 250,	
        ),
        'priority' => 9,
	)));
	$wp_customize->add_setting('beauty_salon_spa_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_logo_title',
			array(
				'settings'        => 'beauty_salon_spa_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('beauty_salon_spa_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_logo_text',
			array(
				'settings'        => 'beauty_salon_spa_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	//colors
	if ( $wp_customize->get_section( 'colors' ) ) {
        $wp_customize->get_section( 'colors' )->title = __( 'Global Colors', 'beauty-salon-spa' );
        $wp_customize->get_section( 'colors' )->priority = 2;
    }

    $wp_customize->add_setting( 'beauty_salon_spa_global_color_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_global_color_heading', array(
			'label'       => esc_html__( 'Global Colors', 'beauty-salon-spa' ),
			'section'     => 'colors',
			'settings'    => 'beauty_salon_spa_global_color_heading',
			'priority'       => 1,

	) ) );

    $wp_customize->add_setting('beauty_salon_spa_primary_color', array(
	    'default' => '#639edb',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'beauty_salon_spa_primary_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Color', 'beauty-salon-spa'),
	 
	)));

	$wp_customize->add_setting('beauty_salon_spa_heading_color', array(
	    'default' => '#232323',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'beauty_salon_spa_heading_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Heading Color', 'beauty-salon-spa'),
	 
	)));

	$wp_customize->add_setting('beauty_salon_spa_text_color', array(
	    'default' => '#63646d',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'beauty_salon_spa_text_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Text Color', 'beauty-salon-spa'),
	 
	)));

	$wp_customize->add_setting('beauty_salon_spa_primary_fade', array(
	    'default' => '#dcedff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'beauty_salon_spa_primary_fade', array(
	    'section' => 'colors',
	    'label' => esc_html__('theme Color Light', 'beauty-salon-spa'),
	 
	)));

	$wp_customize->add_setting('beauty_salon_spa_footer_bg', array(
	    'default' => '#232323',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'beauty_salon_spa_footer_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('Footer Bg color', 'beauty-salon-spa'),
	)));

	$wp_customize->add_setting('beauty_salon_spa_post_bg', array(
	    'default' => '#ffffff',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'beauty_salon_spa_post_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('sidebar/Blog Post Bg color', 'beauty-salon-spa'),
	)));

	// typography
	$wp_customize->add_section( 'beauty_salon_spa_typography_settings', array(
		'title'       => __( 'Typography Settings', 'beauty-salon-spa' ),
		'priority'       => 3,
	) );
	$font_choices = array(
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
	$wp_customize->add_setting( 'beauty_salon_spa_section_typo_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Settings', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_typography_settings',
		'settings'    => 'beauty_salon_spa_section_typo_heading',
	) ) );
	$wp_customize->add_setting( 'beauty_salon_spa_headings_text', array(
		'sanitize_callback' => 'beauty_salon_spa_sanitize_fonts',
	));
	$wp_customize->add_control( 'beauty_salon_spa_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'beauty-salon-spa'),
		'section' => 'beauty_salon_spa_typography_settings',
		'choices' => $font_choices
	));
	$wp_customize->add_setting( 'beauty_salon_spa_body_text', array(
		'sanitize_callback' => 'beauty_salon_spa_sanitize_fonts'
	));
	$wp_customize->add_control( 'beauty_salon_spa_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'beauty-salon-spa' ),
		'section' => 'beauty_salon_spa_typography_settings',
		'choices' => $font_choices
	) );



    // Theme General Settings
    $wp_customize->add_section('beauty_salon_spa_theme_settings',array(
        'title' => __('Theme General Settings', 'beauty-salon-spa'),
        'priority' => 3
    ) );
    $wp_customize->add_setting( 'beauty_salon_spa_section_sticky_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_sticky_heading', array(
		'label'       => esc_html__( 'Sticky Header Settings', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_theme_settings',
		'settings'    => 'beauty_salon_spa_section_sticky_heading',
	) ) );
    $wp_customize->add_setting(
		'beauty_salon_spa_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_sticky_header',
			array(
				'settings'        => 'beauty_salon_spa_sticky_header',
				'section'         => 'beauty_salon_spa_theme_settings',
				'label'           => __( 'Show Sticky Header', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'beauty_salon_spa_section_loader_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_loader_heading', array(
		'label'       => esc_html__( 'Loader Settings', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_theme_settings',
		'settings'    => 'beauty_salon_spa_section_loader_heading',
	) ) );
	$wp_customize->add_setting(
		'beauty_salon_spa_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_theme_loader',
			array(
				'settings'        => 'beauty_salon_spa_theme_loader',
				'section'         => 'beauty_salon_spa_theme_settings',
				'label'           => __( 'Show Site Loader', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('beauty_salon_spa_loader_style',array(
        'default' => 'style_one',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_loader_style',array(
        'type' => 'select',
        'label' => __('Select Loader Design','beauty-salon-spa'),
        'section' => 'beauty_salon_spa_theme_settings',
        'choices' => array(
            'style_one' => __('Circle','beauty-salon-spa'),
            'style_two' => __('Bar','beauty-salon-spa'),
        ),
	) );
	
	$wp_customize->add_setting( 'beauty_salon_spa_section_theme_width_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_theme_width_heading', array(
		'label'       => esc_html__( 'Theme Width Settings', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_theme_settings',
		'settings'    => 'beauty_salon_spa_section_theme_width_heading',
	) ) );
	$wp_customize->add_setting('beauty_salon_spa_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','beauty-salon-spa'),
        'section' => 'beauty_salon_spa_theme_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','beauty-salon-spa'),
            'Container' => __('Container','beauty-salon-spa'),
            'container_fluid' => __('Container Fluid','beauty-salon-spa'),
        ),
	) );
	$wp_customize->add_setting( 'beauty_salon_spa_section_menu_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_menu_heading', array(
		'label'       => esc_html__( 'Menu Settings', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_theme_settings',
		'settings'    => 'beauty_salon_spa_section_menu_heading',
	) ) );
	$wp_customize->add_setting('beauty_salon_spa_menu_text_transform',array(
        'default' => 'UPPERCASE',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','beauty-salon-spa'),
        'section' => 'beauty_salon_spa_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','beauty-salon-spa'),
            'UPPERCASE' => __('UPPERCASE','beauty-salon-spa'),
            'LOWERCASE' => __('LOWERCASE','beauty-salon-spa'),
        ),
	) );
	$wp_customize->add_setting( 'beauty_salon_spa_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_theme_settings',
		'settings'    => 'beauty_salon_spa_section_scroll_heading',
	) ) );
	$wp_customize->add_setting(
		'beauty_salon_spa_scroll_enable',
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
			'beauty_salon_spa_scroll_enable',
			array(
				'settings'        => 'beauty_salon_spa_scroll_enable',
				'section'         => 'beauty_salon_spa_theme_settings',
				'label'           => __( 'show Scroll Top', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('beauty_salon_spa_scroll_options',array(
        'default' => 'right_align',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_scroll_options',array(
		'type' => 'radio',
		'label'     => __('Scroll Top Alignment', 'beauty-salon-spa'),
		'section' => 'beauty_salon_spa_theme_settings',
		'type' => 'select',
		'choices' => array(
			'left_align' => __('LEFT','beauty-salon-spa'),
			'center_align' => __('CENTER','beauty-salon-spa'),
			'right_align' => __('RIGHT','beauty-salon-spa'),
		)
	) );

	$wp_customize->add_setting('beauty_salon_spa_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_theme_settings',
		'setting'	=> 'beauty_salon_spa_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'beauty_salon_spa_section_cursor_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_cursor_heading', array(
		'label'       => esc_html__( 'Cursor Setting', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_theme_settings',
		'settings'    => 'beauty_salon_spa_section_cursor_heading',
	) ) );

	$wp_customize->add_setting(
		'beauty_salon_spa_enable_custom_cursor',
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
			'beauty_salon_spa_enable_custom_cursor',
			array(
				'settings'        => 'beauty_salon_spa_enable_custom_cursor',
				'section'         => 'beauty_salon_spa_theme_settings',
				'label'           => __( 'show custom cursor', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting( 'beauty_salon_spa_section_animation_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_animation_heading', array(
		'label'       => esc_html__( 'Animation Setting', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_theme_settings',
		'settings'    => 'beauty_salon_spa_section_animation_heading',
	) ) );

	$wp_customize->add_setting(
		'beauty_salon_spa_animation_enable',
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
			'beauty_salon_spa_animation_enable',
			array(
				'settings'        => 'beauty_salon_spa_animation_enable',
				'section'         => 'beauty_salon_spa_theme_settings',
				'label'           => __( 'show/Hide Animation', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Post Layouts
	$wp_customize->add_panel( 'beauty_salon_spa_post_panel', array(
		'title' => esc_html__( 'Post Layout', 'beauty-salon-spa' ),
		'priority' => 4,
	));
    $wp_customize->add_section('beauty_salon_spa_layout',array(
        'title' => __('Single-Post Layout', 'beauty-salon-spa'),
        'panel' => 'beauty_salon_spa_post_panel',
    ) );
    $wp_customize->add_setting( 'beauty_salon_spa_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_post_heading', array(
		'label'       => esc_html__( 'Single Post Structure', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_layout',
		'settings'    => 'beauty_salon_spa_section_post_heading',
	) ) );
	$wp_customize->add_setting( 'beauty_salon_spa_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Beauty_Salon_Spa_Radio_Image_Control( $wp_customize, 'beauty_salon_spa_single_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Single Post Page Layout', 'beauty-salon-spa' ),
			'section' => 'beauty_salon_spa_layout',
			'choices' => array(

				'single_right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'beauty-salon-spa' )
				),
				'single_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'beauty-salon-spa' )
				),
				'single_full_width' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'beauty-salon-spa' )
				),
			)
		)
	) );
	$wp_customize->add_setting('beauty_salon_spa_single_post_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_single_post_date',
			array(
				'settings'        => 'beauty_salon_spa_single_post_date',
				'section'         => 'beauty_salon_spa_layout',
				'label'           => __( 'Show Date', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'beauty_salon_spa_single_post_date', array(
		'selector' => '.date-box',
		'render_callback' => 'beauty_salon_spa_customize_partial_beauty_salon_spa_single_post_date',
	) );
	$wp_customize->add_setting('beauty_salon_spa_single_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_single_date_icon',array(
		'label'	=> __('date Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_layout',
		'setting'	=> 'beauty_salon_spa_single_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('beauty_salon_spa_single_post_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_single_post_admin',
			array(
				'settings'        => 'beauty_salon_spa_single_post_admin',
				'section'         => 'beauty_salon_spa_layout',
				'label'           => __( 'Show Author/Admin', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'beauty_salon_spa_single_post_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'beauty_salon_spa_customize_partial_beauty_salon_spa_single_post_admin',
	) );
	$wp_customize->add_setting('beauty_salon_spa_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_single_author_icon',array(
		'label'	=> __('Author Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_layout',
		'setting'	=> 'beauty_salon_spa_single_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('beauty_salon_spa_single_post_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_single_post_comment',
			array(
				'settings'        => 'beauty_salon_spa_single_post_comment',
				'section'         => 'beauty_salon_spa_layout',
				'label'           => __( 'Show Comment', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('beauty_salon_spa_single_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_single_comment_icon',array(
		'label'	=> __('comment Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_layout',
		'setting'	=> 'beauty_salon_spa_single_comment_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('beauty_salon_spa_single_post_tag_count',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_single_post_tag_count',
			array(
				'settings'        => 'beauty_salon_spa_single_post_tag_count',
				'section'         => 'beauty_salon_spa_layout',
				'label'           => __( 'Show tag count', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('beauty_salon_spa_single_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_single_tag_icon',array(
		'label'	=> __('tag Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_layout',
		'setting'	=> 'beauty_salon_spa_single_tag_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('beauty_salon_spa_single_post_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_single_post_tag',
			array(
				'settings'        => 'beauty_salon_spa_single_post_tag',
				'section'         => 'beauty_salon_spa_layout',
				'label'           => __( 'Show Tags', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'beauty_salon_spa_single_post_tag', array(
		'selector' => '.single-tags',
		'render_callback' => 'beauty_salon_spa_customize_partial_beauty_salon_spa_single_post_tag',
	) );
	$wp_customize->add_setting('beauty_salon_spa_similar_post',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_similar_post',
			array(
				'settings'        => 'beauty_salon_spa_similar_post',
				'section'         => 'beauty_salon_spa_layout',
				'label'           => __( 'Show Similar post', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('beauty_salon_spa_similar_text',array(
		'default' => 'Explore More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('beauty_salon_spa_similar_text',array(
		'label' => esc_html__('Similar Post Heading','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_layout',
		'setting' => 'beauty_salon_spa_similar_text',
		'type'    => 'text'
	));
	$wp_customize->add_section('beauty_salon_spa_archieve_post_layot',array(
        'title' => __('Archieve-Post Layout', 'beauty-salon-spa'),
        'panel' => 'beauty_salon_spa_post_panel',
    ) );
	$wp_customize->add_setting( 'beauty_salon_spa_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_archieve_post_layot',
		'settings'    => 'beauty_salon_spa_section_archive_post_heading',
	) ) );
    $wp_customize->add_setting( 'beauty_salon_spa_post_option',
		array(
			'default' => 'right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new Beauty_Salon_Spa_Radio_Image_Control( $wp_customize, 'beauty_salon_spa_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Post Page Layout', 'beauty-salon-spa' ),
			'section' => 'beauty_salon_spa_archieve_post_layot',
			'choices' => array(
				'right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'beauty-salon-spa' )
				),
				'left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'beauty-salon-spa' )
				),
				'one_column' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'beauty-salon-spa' )
				),
				'three_column' => array(
					'image' => get_template_directory_uri().'/assets/images/3column.jpg',
					'name' => __( 'Three Column', 'beauty-salon-spa' )
				),
				'four_column' => array(
					'image' => get_template_directory_uri().'/assets/images/4column.jpg',
					'name' => __( 'Four Column', 'beauty-salon-spa' )
				),
				'grid_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
					'name' => __( 'Grid-Right-Sidebar Layout', 'beauty-salon-spa' )
				),
				'grid_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-left.png',
					'name' => __( 'Grid-Left-Sidebar Layout', 'beauty-salon-spa' )
				),
				'grid_post' => array(
					'image' => get_template_directory_uri().'/assets/images/grid.jpg',
					'name' => __( 'Grid Layout', 'beauty-salon-spa' )
				)
			)
		)
	) );

	$wp_customize->add_setting('beauty_salon_spa_grid_column',array(
        'default' => '3_column',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_grid_column',array(
		'type' => 'radio',
		'label'     => __('Grid Post Per Row', 'beauty-salon-spa'),
		'section' => 'beauty_salon_spa_archieve_post_layot',
		'type' => 'select',
		'choices' => array(
			'1_column' => __('1','beauty-salon-spa'),
            '2_column' => __('2','beauty-salon-spa'),
            '3_column' => __('3','beauty-salon-spa'),
            '4_column' => __('4','beauty-salon-spa'),
		)
	) );

	$wp_customize->add_setting('archieve_post_order', array(
        'default' => array('title', 'image', 'meta','excerpt','btn'),
        'sanitize_callback' => 'beauty_salon_spa_sanitize_sortable',
    ));
    $wp_customize->add_control(new Beauty_Salon_Spa_Control_Sortable($wp_customize, 'archieve_post_order', array(
    	'label' => esc_html__('Post Order', 'beauty-salon-spa'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'beauty-salon-spa') ,
        'section' => 'beauty_salon_spa_archieve_post_layot',
        'choices' => array(
            'title' => __('title', 'beauty-salon-spa') ,
            'image' => __('media', 'beauty-salon-spa') ,
            'meta' => __('meta', 'beauty-salon-spa') ,
            'excerpt' => __('excerpt', 'beauty-salon-spa') ,
            'btn' => __('Read more', 'beauty-salon-spa') ,
        ) ,
    )));
	$wp_customize->add_setting('beauty_salon_spa_post_excerpt',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'beauty_salon_spa_sanitize_integer'
	));
	$wp_customize->add_control(new Beauty_Salon_Spa_Slider_Custom_Control( $wp_customize, 'beauty_salon_spa_post_excerpt',array(
		'label' => esc_html__( 'Excerpt Limit','beauty-salon-spa' ),
		'section'=> 'beauty_salon_spa_archieve_post_layot',
		'settings'=>'beauty_salon_spa_post_excerpt',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	$wp_customize->add_setting('beauty_salon_spa_read_more_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('beauty_salon_spa_read_more_text',array(
		'label' => esc_html__('Read More Text','beauty-salon-spa'),
		'section' => 'beauty_salon_spa_archieve_post_layot',
		'setting' => 'beauty_salon_spa_read_more_text',
		'type'    => 'text'
	));
	$wp_customize->add_setting('beauty_salon_spa_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_date',
			array(
				'settings'        => 'beauty_salon_spa_date',
				'section'         => 'beauty_salon_spa_archieve_post_layot',
				'label'           => __( 'Show Date', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'beauty_salon_spa_date', array(
		'selector' => '.date-box',
		'render_callback' => 'beauty_salon_spa_customize_partial_beauty_salon_spa_date',
	) );
	$wp_customize->add_setting('beauty_salon_spa_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_date_icon',array(
		'label'	=> __('date Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_archieve_post_layot',
		'setting'	=> 'beauty_salon_spa_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('beauty_salon_spa_sticky_icon',array(
		'default'	=> 'fas fa-thumb-tack',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_sticky_icon',array(
		'label'	=> __('Sticky Post Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_archieve_post_layot',
		'setting'	=> 'beauty_salon_spa_sticky_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('beauty_salon_spa_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_admin',
			array(
				'settings'        => 'beauty_salon_spa_admin',
				'section'         => 'beauty_salon_spa_archieve_post_layot',
				'label'           => __( 'Show Author/Admin', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'beauty_salon_spa_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'beauty_salon_spa_customize_partial_beauty_salon_spa_admin',
	) );
	$wp_customize->add_setting('beauty_salon_spa_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_author_icon',array(
		'label'	=> __('Author Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_archieve_post_layot',
		'setting'	=> 'beauty_salon_spa_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('beauty_salon_spa_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_comment',
			array(
				'settings'        => 'beauty_salon_spa_comment',
				'section'         => 'beauty_salon_spa_archieve_post_layot',
				'label'           => __( 'Show Comment', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'beauty_salon_spa_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'beauty_salon_spa_customize_partial_beauty_salon_spa_comment',
	) );
	$wp_customize->add_setting('beauty_salon_spa_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_comment_icon',array(
		'label'	=> __('comment Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_archieve_post_layot',
		'setting'	=> 'beauty_salon_spa_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('beauty_salon_spa_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch(
			$wp_customize,
			'beauty_salon_spa_tag',
			array(
				'settings'        => 'beauty_salon_spa_tag',
				'section'         => 'beauty_salon_spa_archieve_post_layot',
				'label'           => __( 'Show tag count', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'beauty_salon_spa_tag', array(
		'selector' => '.tags',
		'render_callback' => 'beauty_salon_spa_customize_partial_beauty_salon_spa_tag',
	) );
	$wp_customize->add_setting('beauty_salon_spa_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Beauty_Salon_Spa_Fontawesome_Icon_Chooser(
        $wp_customize,'beauty_salon_spa_tag_icon',array(
		'label'	=> __('tag Icon','beauty-salon-spa'),
		'transport' => 'refresh',
		'section'	=> 'beauty_salon_spa_archieve_post_layot',
		'setting'	=> 'beauty_salon_spa_tag_icon',
		'type'		=> 'icon'
	)));

	// header-image
	$wp_customize->add_setting( 'beauty_salon_spa_section_header_image_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_header_image_heading', array(
		'label'       => esc_html__( 'Header Image Settings', 'beauty-salon-spa' ),
		'section'     => 'header_image',
		'settings'    => 'beauty_salon_spa_section_header_image_heading',
		'priority'    =>'1',
	) ) );

	$wp_customize->add_setting('beauty_salon_spa_show_header_image',array(
        'default' => 'on',
        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
	));
	$wp_customize->add_control('beauty_salon_spa_show_header_image',array(
        'type' => 'select',
        'label' => __('Select Option','beauty-salon-spa'),
        'section' => 'header_image',
        'choices' => array(
            'on' => __('With Header Image','beauty-salon-spa'),
            'off' => __('Without Header Image','beauty-salon-spa'),
        ),
	) );

	// breadcrumb
	$wp_customize->add_section('beauty_salon_spa_breadcrumb_settings',array(
        'title' => __('Breadcrumb Settings', 'beauty-salon-spa'),
        'priority' => 4
    ) );
	$wp_customize->add_setting( 'beauty_salon_spa_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_breadcrumb_heading', array(
		'label'       => esc_html__( ' Theme Breadcrumb Settings', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_breadcrumb_settings',
		'settings'    => 'beauty_salon_spa_section_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'beauty_salon_spa_enable_breadcrumb',
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
			'beauty_salon_spa_enable_breadcrumb',
			array(
				'settings'        => 'beauty_salon_spa_enable_breadcrumb',
				'section'         => 'beauty_salon_spa_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('beauty_salon_spa_breadcrumb_separator', array(
        'default' => ' / ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('beauty_salon_spa_breadcrumb_separator', array(
        'label' => __('Breadcrumb Separator', 'beauty-salon-spa'),
        'section' => 'beauty_salon_spa_breadcrumb_settings',
        'type' => 'text',
    ));
	$wp_customize->add_setting( 'beauty_salon_spa_single_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_single_breadcrumb_heading', array(
		'label'       => esc_html__( 'Single post & Page', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_breadcrumb_settings',
		'settings'    => 'beauty_salon_spa_single_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'beauty_salon_spa_single_enable_breadcrumb',
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
			'beauty_salon_spa_single_enable_breadcrumb',
			array(
				'settings'        => 'beauty_salon_spa_single_enable_breadcrumb',
				'section'         => 'beauty_salon_spa_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_setting( 'beauty_salon_spa_woocommerce_breadcrumb_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_woocommerce_breadcrumb_heading', array(
			'label'       => esc_html__( 'Woocommerce Breadcrumb', 'beauty-salon-spa' ),
			'section'     => 'beauty_salon_spa_breadcrumb_settings',
			'settings'    => 'beauty_salon_spa_woocommerce_breadcrumb_heading',
		) ) );
		$wp_customize->add_setting(
			'beauty_salon_spa_woocommerce_enable_breadcrumb',
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
				'beauty_salon_spa_woocommerce_enable_breadcrumb',
				array(
					'settings'        => 'beauty_salon_spa_woocommerce_enable_breadcrumb',
					'section'         => 'beauty_salon_spa_breadcrumb_settings',
					'label'           => __( 'Show Breadcrumb', 'beauty-salon-spa' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'beauty-salon-spa' ),
						'off'    => __( 'Off', 'beauty-salon-spa' ),
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
	        'label' => __('Breadcrumb Separator', 'beauty-salon-spa'),
	        'section' => 'beauty_salon_spa_breadcrumb_settings',
	        'type' => 'text',
	    ));
	}

	if ( class_exists( 'WooCommerce' ) ) { 	
		$wp_customize->add_section('beauty_salon_spa_woocoomerce_section',array(
	        'title' => __('Custom Woocommerce Settings', 'beauty-salon-spa'),
	        'panel' => 'woocommerce',
	        'priority' => 4,
	    ) );
		$wp_customize->add_setting( 'beauty_salon_spa_section_shoppage_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_shoppage_heading', array(
			'label'       => esc_html__( 'Shop Page Settings', 'beauty-salon-spa' ),
			'section'     => 'beauty_salon_spa_woocoomerce_section',
			'settings'    => 'beauty_salon_spa_section_shoppage_heading',
		) ) );
		$wp_customize->add_setting( 'beauty_salon_spa_shop_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Beauty_Salon_Spa_Radio_Image_Control( $wp_customize, 'beauty_salon_spa_shop_page_sidebar',
			array(
				'type'=>'select',
				'label' => __( 'Show Shop Page Sidebar', 'beauty-salon-spa' ),
				'section'     => 'beauty_salon_spa_woocoomerce_section',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'beauty-salon-spa' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'beauty-salon-spa' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'beauty-salon-spa' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'beauty_salon_spa_wocommerce_single_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new Beauty_Salon_Spa_Radio_Image_Control( $wp_customize, 'beauty_salon_spa_wocommerce_single_page_sidebar',
			array(
				'type'=>'select',
				'label'           => __( 'Show Single Product Page Sidebar', 'beauty-salon-spa' ),
				'section'     => 'beauty_salon_spa_woocoomerce_section',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'beauty-salon-spa' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'beauty-salon-spa' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'beauty-salon-spa' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'beauty_salon_spa_section_archieve_product_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_archieve_product_heading', array(
			'label'       => esc_html__( 'Archieve Product Settings', 'beauty-salon-spa' ),
			'section'     => 'beauty_salon_spa_woocoomerce_section',
			'settings'    => 'beauty_salon_spa_section_archieve_product_heading',
		) ) );
		$wp_customize->add_setting('beauty_salon_spa_archieve_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
		));
		$wp_customize->add_control('beauty_salon_spa_archieve_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','beauty-salon-spa'),
	        'section' => 'beauty_salon_spa_woocoomerce_section',
	        'choices' => array(
	            '1' => __('One Column','beauty-salon-spa'),
	            '2' => __('Two Column','beauty-salon-spa'),
	            '3' => __('Three Column','beauty-salon-spa'),
	            '4' => __('four Column','beauty-salon-spa'),
	            '5' => __('Five Column','beauty-salon-spa'),
	            '6' => __('Six Column','beauty-salon-spa'),
	        ),
		) );
		$wp_customize->add_setting( 'beauty_salon_spa_archieve_shop_perpage', array(
			'default'              => 6,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'beauty_salon_spa_archieve_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','beauty-salon-spa' ),
			'section'     => 'beauty_salon_spa_woocoomerce_section',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 30,
			),
		) );
		$wp_customize->add_setting( 'beauty_salon_spa_section_related_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_related_heading', array(
			'label'       => esc_html__( 'Related Product Settings', 'beauty-salon-spa' ),
			'section'     => 'beauty_salon_spa_woocoomerce_section',
			'settings'    => 'beauty_salon_spa_section_related_heading',
		) ) );
		$wp_customize->add_setting('beauty_salon_spa_related_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'beauty_salon_spa_sanitize_choices'
		));
		$wp_customize->add_control('beauty_salon_spa_related_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','beauty-salon-spa'),
	        'section' => 'beauty_salon_spa_woocoomerce_section',
	        'choices' => array(
	            '1' => __('One Column','beauty-salon-spa'),
	            '2' => __('Two Column','beauty-salon-spa'),
	            '3' => __('Three Column','beauty-salon-spa'),
	            '4' => __('four Column','beauty-salon-spa'),
	            '5' => __('Five Column','beauty-salon-spa'),
	            '6' => __('Six Column','beauty-salon-spa'),
	        ),
		) );
		$wp_customize->add_setting( 'beauty_salon_spa_related_shop_perpage', array(
			'default'              => 3,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'beauty_salon_spa_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'beauty_salon_spa_related_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','beauty-salon-spa' ),
			'section'     => 'beauty_salon_spa_woocoomerce_section',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 10,
			),
		) );
		$wp_customize->add_setting(
			'beauty_salon_spa_related_product',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'beauty_salon_spa_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(new Beauty_Salon_Spa_Customizer_Customcontrol_Switch($wp_customize,'beauty_salon_spa_related_product',
			array(
				'settings'        => 'beauty_salon_spa_related_product',
				'section'         => 'beauty_salon_spa_woocoomerce_section',
				'label'           => __( 'Show Related Products', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		));
	}
// mobile width
	$wp_customize->add_section('beauty_salon_spa_mobile_options',array(
        'title' => __('Mobile Media settings', 'beauty-salon-spa'),
        'priority' => 4,
    ) );
    $wp_customize->add_setting( 'beauty_salon_spa_section_mobile_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_mobile_heading', array(
		'label'       => esc_html__( 'Mobile Media settings', 'beauty-salon-spa' ),
		'section'     => 'beauty_salon_spa_mobile_options',
		'settings'    => 'beauty_salon_spa_section_mobile_heading',
	) ) );
	$wp_customize->add_setting(
		'beauty_salon_spa_slider_button_mobile_show_hide',
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
			'beauty_salon_spa_slider_button_mobile_show_hide',
			array(
				'settings'        => 'beauty_salon_spa_slider_button_mobile_show_hide',
				'section'         => 'beauty_salon_spa_mobile_options',
				'label'           => __( 'Show Slider Button', 'beauty-salon-spa' ),
				'description' => __('Control wont function if the button is off in the main slider settings.', 'beauty-salon-spa') ,				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'beauty_salon_spa_scroll_enable_mobile',
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
			'beauty_salon_spa_scroll_enable_mobile',
			array(
				'settings'        => 'beauty_salon_spa_scroll_enable_mobile',
				'section'         => 'beauty_salon_spa_mobile_options',
				'label'           => __( 'Show Scroll Top', 'beauty-salon-spa' ),
				'description' => __('Control wont function if scroll-top is off in the main settings.', 'beauty-salon-spa') ,					
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'beauty_salon_spa_section_mobile_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Beauty_Salon_Spa_Customizer_Customcontrol_Section_Heading( $wp_customize, 'beauty_salon_spa_section_mobile_breadcrumb_heading', array(
		'label'       => esc_html__( 'Mobile Breadcrumb settings', 'beauty-salon-spa' ),
		'description' => __('Controls wont function if the breadcrumb is off in the main breadcrumb settings.', 'beauty-salon-spa') ,
		'section'     => 'beauty_salon_spa_mobile_options',
		'settings'    => 'beauty_salon_spa_section_mobile_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'beauty_salon_spa_enable_breadcrumb_mobile',
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
			'beauty_salon_spa_enable_breadcrumb_mobile',
			array(
				'settings'        => 'beauty_salon_spa_enable_breadcrumb_mobile',
				'section'         => 'beauty_salon_spa_mobile_options',
				'label'           => __( 'Theme Breadcrumb', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'beauty_salon_spa_single_enable_breadcrumb_mobile',
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
			'beauty_salon_spa_single_enable_breadcrumb_mobile',
			array(
				'settings'        => 'beauty_salon_spa_single_enable_breadcrumb_mobile',
				'section'         => 'beauty_salon_spa_mobile_options',
				'label'           => __( 'Single Post & Page', 'beauty-salon-spa' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'beauty-salon-spa' ),
					'off'    => __( 'Off', 'beauty-salon-spa' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_setting(
			'beauty_salon_spa_woocommerce_enable_breadcrumb_mobile',
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
				'beauty_salon_spa_woocommerce_enable_breadcrumb_mobile',
				array(
					'settings'        => 'beauty_salon_spa_woocommerce_enable_breadcrumb_mobile',
					'section'         => 'beauty_salon_spa_mobile_options',
					'label'           => __( 'wooCommerce Breadcrumb', 'beauty-salon-spa' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'beauty-salon-spa' ),
						'off'    => __( 'Off', 'beauty-salon-spa' ),
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
		'render_callback' => 'beauty_salon_spa_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'beauty_salon_spa_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'beauty_salon_spa_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'beauty_salon_spa_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'beauty-salon-spa' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'beauty-salon-spa' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'beauty_salon_spa_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'beauty_salon_spa_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'beauty_salon_spa_customize_register' );

function beauty_salon_spa_customize_partial_blogname() {
	bloginfo( 'name' );
}
function beauty_salon_spa_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function beauty_salon_spa_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function beauty_salon_spa_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('BEAUTY_SALON_SPA_PRO_LINK',__('https://www.ovationthemes.com/products/beauty-salon-wordpress-theme','beauty-salon-spa'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Beauty_Salon_Spa_Pro_Control')):
    class Beauty_Salon_Spa_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( BEAUTY_SALON_SPA_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE BEAUTY SALON PREMIUM','beauty-salon-spa');?> </a>
	        </div>
            <div class="col-md">
                <img class="beauty_salon_spa_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('BEAUTY SALON SPA PREMIUM - Features', 'beauty-salon-spa'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'beauty-salon-spa');?> </li>
                    <li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'beauty-salon-spa');?> </li>
                   	<li class="upsell-beauty_salon_spa"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'beauty-salon-spa');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( BEAUTY_SALON_SPA_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE BEAUTY SALON PREMIUM','beauty-salon-spa');?> </a>
		    </div>
        </label>
    <?php } }
endif;
