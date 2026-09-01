<?php
$newsair_default = newsair_get_default_theme_options();
$wp_customize->add_setting(
    'top_bar_tabs',
    array(
        'default'           => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( new Custom_Tab_Control ( $wp_customize,'top_bar_tabs',
    array(
        'label'                 => '',
        'type' => 'custom-tab-control',
        'section'               => 'topbar_options',
        'controls_general'      => json_encode( array( 
                                                    '#customize-control-breaking_news_settings', 
                                                    '#customize-control-brk_news_enable',
                                                    '#customize-control-breaking_news_title',
                                                    '#customize-control-date_settings',
                                                    '#customize-control-header_data_enable', 
                                                    '#customize-control-newsair_date_time_show_type', 
                                                    '#customize-control-social_icon_settings',  
                                                    '#customize-control-header_social_icon_enable',
                                                    '#customize-control-newsair_header_social_icons',
                                                    '#customize-control-newsair_social_upgrade_to_pro',
        ) ),
        'controls_design'       => json_encode( array( 
                                                    '#customize-control-top_bar_header_background_color',
                                                    '#customize-control-',
        ) ),
    )
));

// section title
$wp_customize->add_setting('breaking_news_settings',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Newsair_Section_Title(
        $wp_customize,
        'breaking_news_settings',
        array(
            'label' => esc_html__('Breaking', 'newsair'),
            'section' => 'topbar_options',
        )
    )
);
$wp_customize->add_setting('brk_news_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'brk_news_enable', 
    array(
        'label' => esc_html__('Hide/Show', 'newsair'),
        'type' => 'toggle',
        'section' => 'topbar_options',
    )
));
$wp_customize->add_setting(
'breaking_news_title',
    array(
        'default' => $newsair_default['breaking_news_title'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) 
);
$wp_customize->add_control(
'breaking_news_title',
    array(
        'label' => __('Title','newsair'),
        'section' => 'topbar_options',
        'type' => 'text',
    )
);   

$wp_customize->add_setting(
    'date_settings',
    array(
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'newsair_sanitize_text',
        'priority' => 1,
    )
);
$wp_customize->add_control(
'date_settings',
    array(
        'type' => 'hidden',
        'label' => __('Date','newsair'),
        'section' => 'topbar_options',
    )
);
// section title
$wp_customize->add_setting('date_settings',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Newsair_Section_Title(
        $wp_customize,
        'date_settings',
        array(
            'label' => esc_html__('Date', 'newsair'),
            'section' => 'topbar_options',
        )
    )
);
$wp_customize->add_setting('header_data_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'header_data_enable', 
    array(
        'label' => esc_html__('Hide/Show', 'newsair'),
        'type' => 'toggle',
        'section' => 'topbar_options',
    )
));

// date in header display type
$wp_customize->add_setting( 'newsair_date_time_show_type', array(
    'default'           => 'newsair_default',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'newsair_sanitize_select',
    'transport' => 'postMessage',
) );

$wp_customize->add_control( 'newsair_date_time_show_type', array(
    'type'     => 'select',
    'label'    => esc_html__( 'Date in Header Display Type:', 'newsair' ),
    'choices'  => array(
        'newsair_default'          => esc_html__( 'Theme Default Setting', 'newsair' ),
        'wordpress_date_setting' => esc_html__( 'From WordPress Setting', 'newsair' ),
    ),
    'section'  => 'topbar_options',
    'settings' => 'newsair_date_time_show_type',
) );


// STYLE
// top bar bg color
$wp_customize->add_setting(
    'top_bar_header_background_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'newsair_sanitize_alpha_color',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control(
    new newsair_Customize_Alpha_Color_Control(
        $wp_customize,
        'top_bar_header_background_color',
        array(
            'label'    => esc_html__( 'Background Color', 'newsair' ),
            'section'  => 'topbar_options',
        )
    )
);