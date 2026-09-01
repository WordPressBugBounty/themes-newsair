<?php
    $newsair_default = newsair_get_default_theme_options();
    newsair_migrate_responsive_range(
        'newsair_title_font_size',
        array(
            'desktop' => 'newsair_title_fontsize_desktop',
            'tablet'  => 'newsair_title_fontsize_tablet',
            'mobile'  => 'newsair_title_fontsize_mobile',
        ),
        $newsair_default['newsair_title_font_size']
    );
    $wp_customize->get_control( 'blogname' )->section = 'newsair_site_title_section';
    $wp_customize->get_control( 'display_header_text' )->section = 'newsair_site_title_section';
    $wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display site title', 'newsair' );
    $wp_customize->get_control( 'blogdescription' )->section = 'newsair_site_title_section';
  
    /*--- Site title Font size **/
    $wp_customize->add_setting('newsair_title_font_size', array(
        'default' => $newsair_default['newsair_title_font_size'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'newsair_sanitize_range',
    ));
    $wp_customize->add_control(new Newsair_Range_Control( $wp_customize, 'newsair_title_font_size', array(
        'label'       => __('Site Title Size', 'newsair'),
        'section'     => 'newsair_site_title_section',
        'media_query' => true,
        'size_unit'   => array( 'px', 'em', 'rem' ),
        'input_attr'  => array('min'  => 0,'max'  => 400,'step' => 1,),
    )));
    
    $wp_customize->get_control( 'display_header_text')->label = __('Display Site Title', 'newsair');

    $wp_customize->add_setting('display_header_tagline',
        array(
            'default' => false,
            'transport' => 'postMessage',
            'sanitize_callback' => 'newsair_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('display_header_tagline',
        array(
            'label' => __('Display Tagline', 'newsair'),
            'section' => 'newsair_site_title_section',
            'type' => 'checkbox',
            'priority' => 50,

        )
    );
    // Add switch for Center Site Title and Tagline
    $wp_customize->add_setting('newsair_center_logo_title',
        array(
            'default' => false,
            'transport' => 'postMessage',
            'sanitize_callback' => 'newsair_sanitize_checkbox',
        )
	);
	$wp_customize->add_control('newsair_center_logo_title',
	    array(
	        'label' => esc_html__('Display Center Site Title and Tagline', 'newsair'),
	        'section' => 'newsair_site_title_section',
	        'type' => 'checkbox',
	        'priority' => 55,
	    )
	);