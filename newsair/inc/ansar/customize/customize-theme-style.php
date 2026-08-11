<?php 
// Adding customizer home page setting
function newsair_style_customizer( $wp_customize ){
	$newsair_default = newsair_get_default_theme_options();

    newsair_migrate_responsive_range(
        'general_header_image_height',
        array(
            'desktop' => 'desktop_header_image_height',
            'tablet'  => 'tablet_header_image_height',
            'mobile'  => 'mobile_header_image_height',
        ),
        $newsair_default['general_header_image_height']
    );
    class WP_line_break_Customize_Control extends WP_Customize_Control {
        public $type = 'new_menu';

        function render_content() {
            echo '<hr></hr>';
        }
	}
	// Add Background Settings Section
    $wp_customize->add_section('background_image',
		array(
			'title' => esc_html__('Background Settings', 'newsair'),
			'priority' => 35,
			'capability' => 'edit_theme_options',
		)
    );

	// Background Color Heading
    $wp_customize->add_setting(
        'frontpage_slider_heading',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'newsair_sanitize_text',
            'priority' => 1,
        )
    );
    $wp_customize->add_control(
    'frontpage_slider_heading',
        array(
            'type' => 'hidden',
            'label' => __('Background Color','newsair'),
            'section' => 'colors',
        )
    );
	$wp_customize->add_control('background_color');

    //Theme Background Color
	$wp_customize->add_setting(
	    'body_background_color', array( 'sanitize_callback' => 'newsair_sanitize_alpha_color','default' => '#eff2f7',
        'transport' => 'postMessage',
	    
	) );
	$wp_customize->add_control(new Newsair_Customize_Alpha_Color_Control( $wp_customize,'body_background_color', array(
	   'label'      => __('Background Color', 'newsair' ),
	    'palette' => true,
	    'section' => 'colors',
	    'settings' => 'body_background_color'
		)
	) );

    //Add  Section
    $wp_customize->add_section( 'header_image', array(
        'capability'     => 'edit_theme_options',
        'title'      => __('Header Image','newsair'),
        'priority' => 6,
    ) );
    // $wp_customize->get_control( 'header_image')->priority = 5; 

    	
    // Enable/Disable Footer Widgets typography section
    $wp_customize->add_setting(
        'remove_header_image_overlay',
        array(
            'default'           =>  false,
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'sanitize_text_field',
        ) 
    );
    $wp_customize->add_control('remove_header_image_overlay', array(
        'label' => __('Remove Overlay Color','newsair'),
        'section' => 'header_image', 
        'type'    =>  'checkbox'
    ));

    //Theme Background Color
    $wp_customize->add_setting(
        'newsair_header_overlay_color', 
        array( 
            'sanitize_callback' => 'newsair_sanitize_alpha_color',
            'default' => '',
            'transport' => 'postMessage',
        ) 
    );
    $wp_customize->add_control(new Newsair_Customize_Alpha_Color_Control( $wp_customize,'newsair_header_overlay_color', array(
        'label'      => __('Background Color', 'newsair' ),
        'palette' => true,
        'section' => 'header_image',
        'active_callback'   => function( $setting ) {
                if ( $setting->manager->get_setting( 'remove_header_image_overlay' )->value() == false ) {
                    return true;
                }
                return false;
            }
        )
    ) );

    //================ Header Image Height =================
    $wp_customize->add_setting('general_header_image_height', array(
        'default' => $newsair_default['general_header_image_height'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'newsair_sanitize_range',
    ));
    $wp_customize->add_control(new Newsair_Range_Control( $wp_customize, 'general_header_image_height', array(
        'label'       => __('Height', 'newsair'),
        'section'     => 'header_image',
        'media_query' => true,
        'size_unit'   => array( 'px', '%', 'vh' ),
        'input_attr'  => array('min'  => 0,'max'  => 500,'step' => 1,),
    )));
}


add_action( 'customize_register', 'newsair_style_customizer' );