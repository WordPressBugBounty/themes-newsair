<?php 
// Adding customizer home page setting

$newsair_default = newsair_get_default_theme_options();

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