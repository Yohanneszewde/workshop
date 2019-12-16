<?php
/**
 * TS Charity Theme Customizer
 *
 * @package ts-charity
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ts_charity_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'ts_charity_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'ts-charity' ),
	    'description' => __( 'Description of what this panel does.', 'ts-charity' ),
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'ts_charity_theme_color_option', array( 
		'panel' => 'ts_charity_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'ts-charity' ) 
	) );

  	$wp_customize->add_setting( 'ts_charity_theme_color', array(
	    'default' => '#fcb20b',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ts_charity_theme_color', array(
  		'label' => 'Color Option',
	    'description' => __('One can change complete theme color on just one click.', 'ts-charity'),
	    'section' => 'ts_charity_theme_color_option',
	    'settings' => 'ts_charity_theme_color',
  	)));

	//Layouts
	$wp_customize->add_section( 'ts_charity_left_right', array(
    	'title'      => __( 'Layout Settings', 'ts-charity' ),
		'priority'   => 30,
		'panel' => 'ts_charity_panel_id'
	) );

	$wp_customize->add_setting('ts_charity_theme_options',array(
        'default' => __('Default','ts-charity'),
        'sanitize_callback' => 'ts_charity_sanitize_choices'
	));
	$wp_customize->add_control('ts_charity_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','ts-charity'),
        'description' => __('Here you can change the Width layout. ','ts-charity'),
        'section' => 'ts_charity_left_right',
        'choices' => array(
            'Default' => __('Default','ts-charity'),
            'Container' => __('Container','ts-charity'),
            'Box Container' => __('Box Container','ts-charity'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('ts_charity_layout_options',array(
	        'default' => __('Right Sidebar','ts-charity'),
	        'sanitize_callback' => 'ts_charity_sanitize_choices'	        
	)  );
	$wp_customize->add_control('ts_charity_layout_options',array(
        'type' => 'radio',
        'label' => __('Sidebar Layouts','ts-charity'),
        'section' => 'ts_charity_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','ts-charity'),
            'Right Sidebar' => __('Right Sidebar','ts-charity'),
            'One Column' => __('One Column','ts-charity'),
            'Three Columns' => __('Three Columns','ts-charity'),
            'Four Columns' => __('Four Columns','ts-charity'),
            'Grid Layout' => __('Grid Layout','ts-charity')
        ),
	) );

	$font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface', 
        'Acme' => 'Acme', 
        'Anton' => 'Anton',
        'Architects Daughter' =>'Architects Daughter', 
        'Arimo' => 'Arimo', 
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo', 
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' =>  'Alfa Slab One', 
        'Averia Serif Libre' =>  'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script', 
        'Bitter' =>  'Bitter', 
        'Bree Serif' => 'Bree Serif', 
        'BenchNine' => 'BenchNine',
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo', 
        'Courgette' => 'Courgette', 
        'Cherry Swash' => 'Cherry Swash', 
        'Cormorant Garamond' => 'Cormorant Garamond', 
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One',
        'Dosis' => 'Dosis', 
        'Droid Sans' => 'Droid Sans',
        'Economica' =>  'Economica',
        'Fredoka One' => 'Fredoka One', 
        'Fjalla One' => 'Fjalla One', 
        'Francois One' => 'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' =>  'Great Vibes', 
        'Handlee' => 'Handlee',
        'Hammersmith One' =>'Hammersmith One', 
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC',
        'Julius Sans One' => 'Julius Sans One', 
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans',
        'Kanit' => 'Kanit', 
        'Lobster' =>  'Lobster', 
        'Lato' => 'Lato', 
        'Lora' =>'Lora',
        'Libre Baskerville' =>  'Libre Baskerville', 
        'Lobster Two' => 'Lobster Two',
        'Merriweather' => 'Merriweather', 
        'Monda' => 'Monda', 
        'Montserrat' => 'Montserrat', 
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script', 
        'Noto Serif' => 'Noto Serif', 
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>  'Overpass Mono', 
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron',
        'Patua One' => 'Patua One', 
        'Pacifico' =>  'Pacifico',
        'Padauk' => 'Padauk',
        'Playball' =>  'Playball', 
        'Playfair Display' => 'Playfair Display',
        'PT Sans' => 'PT Sans', 
        'Philosopher' => 'Philosopher', 
        'Permanent Marker' => 'Permanent Marker', 
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light' => 'Shadows Into Light',
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand',
        'Tangerine' => 'Tangerine', 
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round',
        'Vampiro One' => 'Vampiro One', 
        'Vollkorn' => 'Vollkorn', 
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz', 
    );

	//Typography
	$wp_customize->add_section( 'ts_charity_typography', array(
    	'title'      => __( 'Typography', 'ts-charity' ),
		'priority'   => 30,
		'panel' => 'ts_charity_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'ts_charity_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ts_charity_paragraph_color', array(
		'label' => __('Paragraph Color', 'ts-charity'),
		'section' => 'ts_charity_typography',
		'settings' => 'ts_charity_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('ts_charity_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ts_charity_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ts_charity_paragraph_font_family', array(
	    'section'  => 'ts_charity_typography',
	    'label'    => __( 'Paragraph Fonts','ts-charity'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('ts_charity_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ts_charity_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','ts-charity'),
		'section'	=> 'ts_charity_typography',
		'setting'	=> 'ts_charity_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'ts_charity_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ts_charity_atag_color', array(
		'label' => __('"a" Tag Color', 'ts-charity'),
		'section' => 'ts_charity_typography',
		'settings' => 'ts_charity_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('ts_charity_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ts_charity_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ts_charity_atag_font_family', array(
	    'section'  => 'ts_charity_typography',
	    'label'    => __( '"a" Tag Fonts','ts-charity'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'ts_charity_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ts_charity_li_color', array(
		'label' => __('"li" Tag Color', 'ts-charity'),
		'section' => 'ts_charity_typography',
		'settings' => 'ts_charity_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('ts_charity_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ts_charity_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ts_charity_li_font_family', array(
	    'section'  => 'ts_charity_typography',
	    'label'    => __( '"li" Tag Fonts','ts-charity'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'ts_charity_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ts_charity_h1_color', array(
		'label' => __('H1 Color', 'ts-charity'),
		'section' => 'ts_charity_typography',
		'settings' => 'ts_charity_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('ts_charity_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ts_charity_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ts_charity_h1_font_family', array(
	    'section'  => 'ts_charity_typography',
	    'label'    => __( 'H1 Fonts','ts-charity'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('ts_charity_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('ts_charity_h1_font_size',array(
		'label'	=> __('H1 Font Size','ts-charity'),
		'section'	=> 'ts_charity_typography',
		'setting'	=> 'ts_charity_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'ts_charity_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ts_charity_h2_color', array(
		'label' => __('h2 Color', 'ts-charity'),
		'section' => 'ts_charity_typography',
		'settings' => 'ts_charity_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('ts_charity_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ts_charity_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ts_charity_h2_font_family', array(
	    'section'  => 'ts_charity_typography',
	    'label'    => __( 'h2 Fonts','ts-charity'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('ts_charity_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ts_charity_h2_font_size',array(
		'label'	=> __('h2 Font Size','ts-charity'),
		'section'	=> 'ts_charity_typography',
		'setting'	=> 'ts_charity_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'ts_charity_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ts_charity_h3_color', array(
		'label' => __('h3 Color', 'ts-charity'),
		'section' => 'ts_charity_typography',
		'settings' => 'ts_charity_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('ts_charity_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ts_charity_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ts_charity_h3_font_family', array(
	    'section'  => 'ts_charity_typography',
	    'label'    => __( 'h3 Fonts','ts-charity'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('ts_charity_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ts_charity_h3_font_size',array(
		'label'	=> __('h3 Font Size','ts-charity'),
		'section'	=> 'ts_charity_typography',
		'setting'	=> 'ts_charity_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'ts_charity_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ts_charity_h4_color', array(
		'label' => __('h4 Color', 'ts-charity'),
		'section' => 'ts_charity_typography',
		'settings' => 'ts_charity_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('ts_charity_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ts_charity_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ts_charity_h4_font_family', array(
	    'section'  => 'ts_charity_typography',
	    'label'    => __( 'h4 Fonts','ts-charity'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('ts_charity_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ts_charity_h4_font_size',array(
		'label'	=> __('h4 Font Size','ts-charity'),
		'section'	=> 'ts_charity_typography',
		'setting'	=> 'ts_charity_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'ts_charity_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ts_charity_h5_color', array(
		'label' => __('h5 Color', 'ts-charity'),
		'section' => 'ts_charity_typography',
		'settings' => 'ts_charity_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('ts_charity_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ts_charity_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ts_charity_h5_font_family', array(
	    'section'  => 'ts_charity_typography',
	    'label'    => __( 'h5 Fonts','ts-charity'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('ts_charity_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ts_charity_h5_font_size',array(
		'label'	=> __('h5 Font Size','ts-charity'),
		'section'	=> 'ts_charity_typography',
		'setting'	=> 'ts_charity_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'ts_charity_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ts_charity_h6_color', array(
		'label' => __('h6 Color', 'ts-charity'),
		'section' => 'ts_charity_typography',
		'settings' => 'ts_charity_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('ts_charity_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'ts_charity_sanitize_choices'
	));
	$wp_customize->add_control(
	    'ts_charity_h6_font_family', array(
	    'section'  => 'ts_charity_typography',
	    'label'    => __( 'h6 Fonts','ts-charity'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('ts_charity_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ts_charity_h6_font_size',array(
		'label'	=> __('h6 Font Size','ts-charity'),
		'section'	=> 'ts_charity_typography',
		'setting'	=> 'ts_charity_h6_font_size',
		'type'	=> 'text'
	));

	//Top Bar
	$wp_customize->add_section('ts_charity_topbar_header',array(
		'title'	=> __('Top Bar Section','ts-charity'),
		'description'	=> __('Add Top Bar Content here','ts-charity'),
		'priority'	=> null,
		'panel' => 'ts_charity_panel_id',
	) );

	$wp_customize->add_setting('ts_charity_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );	
	$wp_customize->add_control('ts_charity_youtube_url',array(
		'label'	=> __('Add Youtube link','ts-charity'),
		'section'	=> 'ts_charity_topbar_header',
		'setting'	=> 'ts_charity_youtube_url',
		'type'		=> 'url'
	) );

	$wp_customize->add_setting('ts_charity_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('ts_charity_facebook_url',array(
		'label'	=> __('Add Facebook link','ts-charity'),
		'section'	=> 'ts_charity_topbar_header',
		'setting'	=> 'ts_charity_facebook_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('ts_charity_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );	
	$wp_customize->add_control('ts_charity_twitter_url',array(
		'label'	=> __('Add Twitter link','ts-charity'),
		'section'	=> 'ts_charity_topbar_header',
		'setting'	=> 'ts_charity_twitter_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('ts_charity_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );	
	$wp_customize->add_control('ts_charity_rss_url',array(
		'label'	=> __('Add RSS link','ts-charity'),
		'section'	=> 'ts_charity_topbar_header',
		'setting'	=> 'ts_charity_rss_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('ts_charity_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );	
	$wp_customize->add_control('ts_charity_insta_url',array(
		'label'	=> __('Add Instagram link','ts-charity'),
		'section'	=> 'ts_charity_topbar_header',
		'setting'	=> 'ts_charity_insta_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('ts_charity_pint_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );	
	$wp_customize->add_control('ts_charity_pint_url',array(
		'label'	=> __('Add Pintrest link','ts-charity'),
		'section'	=> 'ts_charity_topbar_header',
		'setting'	=> 'ts_charity_pint_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('ts_charity_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('ts_charity_call',array(
		'label'	=> __('Add Phone Number','ts-charity'),
		'section'	=> 'ts_charity_topbar_header',
		'setting'	=> 'ts_charity_call',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ts_charity_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ts_charity_time',array(
		'label'	=> __('Add Time','ts-charity'),
		'section'	=> 'ts_charity_topbar_header',
		'setting'	=> 'ts_charity_time',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ts_charity_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ts_charity_email',array(
		'label'	=> __('Add Email','ts-charity'),
		'section'	=> 'ts_charity_topbar_header',
		'setting'	=> 'ts_charity_email',
		'type'		=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'ts_charity_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'ts-charity' ),
		'priority'   => null,
		'panel' => 'ts_charity_panel_id'
	) );

	$wp_customize->add_setting('ts_charity_slider_hide_show',array(
      'default' => 'false',
      'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ts_charity_slider_hide_show',array(
	  'type' => 'checkbox',
	  'label' => __('Show / Hide slider','ts-charity'),
	  'section' => 'ts_charity_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'ts_charity_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'ts_charity_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'ts_charity_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'ts-charity' ),
			'section'  => 'ts_charity_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Our Causes
	$wp_customize->add_section('ts_charity_causes_section',array(
		'title'	=> __('Our Causes','ts-charity'),
		'description'	=> '',
		'priority'	=> null,
		'panel' => 'ts_charity_panel_id',
	));
	
	$wp_customize->add_setting('ts_charity_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('ts_charity_title',array(
		'label'	=> __('Title','ts-charity'),
		'section'	=> 'ts_charity_causes_section',
		'type'	=> 'text'
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

	$wp_customize->add_setting('ts_charity_causes_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('ts_charity_causes_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Latest Post','ts-charity'),
		'section' => 'ts_charity_causes_section',
	));

	//Blog Post
	$wp_customize->add_section('ts_charity_blog_post',array(
		'title'	=> __('Blog Page Settings','ts-charity'),
		'panel' => 'ts_charity_panel_id',
	));	

	$wp_customize->add_setting('ts_charity_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('ts_charity_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','ts-charity'),
       'section' => 'ts_charity_blog_post'
    ));

    $wp_customize->add_setting('ts_charity_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('ts_charity_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','ts-charity'),
       'section' => 'ts_charity_blog_post'
    ));

    $wp_customize->add_setting('ts_charity_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('ts_charity_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','ts-charity'),
       'section' => 'ts_charity_blog_post'
    ));

    $wp_customize->add_setting('ts_charity_tags_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('ts_charity_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','ts-charity'),
       'section' => 'ts_charity_blog_post'
    ));

    $wp_customize->add_setting( 'ts_charity_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'ts_charity_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','ts-charity' ),
		'section'     => 'ts_charity_blog_post',
		'type'        => 'textfield',
		'settings'    => 'ts_charity_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('ts_charity_button_text',array(
		'default'=> 'Read More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ts_charity_button_text',array(
		'label'	=> __('Add Button Text','ts-charity'),
		'section'=> 'ts_charity_blog_post',
		'type'=> 'text'
	));

	//footer
	$wp_customize->add_section('ts_charity_footer_section',array(
		'title'	=> __('Footer Text','ts-charity'),
		'priority'	=> null,
		'panel' => 'ts_charity_panel_id',
	));

	$wp_customize->add_setting('ts_charity_footer_widget_areas',array(
        'default'           => '4',
        'sanitize_callback' => 'ts_charity_sanitize_choices',
    ));
    $wp_customize->add_control('ts_charity_footer_widget_areas',array(
        'type'        => 'select',
        'label'       => __('Footer widget area', 'ts-charity'),
        'section'     => 'ts_charity_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'ts-charity'),
        'choices' => array(
            '1'     => __('One', 'ts-charity'),
            '2'     => __('Two', 'ts-charity'),
            '3'     => __('Three', 'ts-charity'),
            '4'     => __('Four', 'ts-charity')
        ),
    ));
	
	$wp_customize->add_setting('ts_charity_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('ts_charity_footer_copy',array(
		'label'	=> __('Copyright Text','ts-charity'),
		'section'	=> 'ts_charity_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ts_charity_enable_disable_scroll',array(
        'default' => 'true',
        'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ts_charity_enable_disable_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll Top Button','ts-charity'),
      	'section' => 'ts_charity_footer_section',
	));

	$wp_customize->add_setting('ts_charity_scroll_setting',array(
        'default' => __('Right','ts-charity'),
        'sanitize_callback' => 'ts_charity_sanitize_choices'
	));
	$wp_customize->add_control('ts_charity_scroll_setting',array(
        'type' => 'select',
        'label' => __('Scroll Back to Top Position','ts-charity'),
        'section' => 'ts_charity_footer_section',
        'choices' => array(
            'Left' => __('Left','ts-charity'),
            'Right' => __('Right','ts-charity'),
            'Center' => __('Center','ts-charity'),
        ),
	) );
	
}
add_action( 'customize_register', 'ts_charity_customize_register' );	

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class TS_Charity_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'TS_Charity_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new TS_Charity_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Charity Pro Theme', 'ts-charity' ),
					'pro_text' => esc_html__( 'Go Pro','ts-charity' ),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/premium-charity-wordpress-theme/')
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ts-charity-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ts-charity-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
TS_Charity_Customize::get_instance();