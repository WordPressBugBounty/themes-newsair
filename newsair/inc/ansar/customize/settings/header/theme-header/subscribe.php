<?php

$newsair_default = newsair_get_default_theme_options();
$wp_customize->add_setting('newsair_subscribe_icon_setting',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Newsair_Section_Title(
        $wp_customize,
        'newsair_subscribe_icon_setting',
        array(
            'label' => __('Subscribe Button', 'newsair'),
            'section' => 'header_subscribe_section',
        )
    )
);
$wp_customize->add_setting('newsair_menu_subscriber',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'newsair_menu_subscriber', 
    array(
        'label' => esc_html__('Hide/Show', 'newsair'),
        'type' => 'toggle',
        'section' => 'header_subscribe_section',
    )
));
// Subscribe Icon Layout
$wp_customize->add_setting(
    'subsc_icon_layout', array(
    'default' => 'play',
    'sanitize_callback' => 'newsair_sanitize_radio',
    'transport' => 'postMessage',
) );
$wp_customize->add_control(
    new Newsair_Custom_Radio_Default_Image_Control( 
        // $wp_customize object
        $wp_customize,
        // $id
        'subsc_icon_layout',
        // $args
        array( 
            'section'       => 'header_subscribe_section',
            'label' => esc_html__('Icon', 'newsair'),
            'choices'       => array(
                'bell' => get_template_directory_uri() . '/images/subs1.svg',
                'play'    => get_template_directory_uri() . '/images/subs3.svg', 
             
            ),
            'active_callback'   => 'newsair_menu_subscriber_section_status',
        )
    )
);

$wp_customize->add_setting(
    'subs_news_title',
    array(
        'default' => esc_html__('Subscribe','newsair'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ) 
);
$wp_customize->add_control(
'subs_news_title',
    array(
        'label' => __('Title','newsair'),
        'section' => 'header_subscribe_section',
        'type' => 'text',
        'active_callback'   => 'newsair_menu_subscriber_section_status',
    )
);   
// Subscribe Link
$wp_customize->add_setting('newsair_subsc_link', 
    array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control('newsair_subsc_link',
    array(
        'label' => esc_html__('Link', 'newsair'),
        'section' => 'header_subscribe_section',
        'type' => 'text',
        'active_callback'   => 'newsair_menu_subscriber_section_status',

    )
);

// Subscribe Open in New Tab
$wp_customize->add_setting('subsc_open_in_new',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'subsc_open_in_new', 
    array(
        'label' => esc_html__('Open link in a new tab', 'newsair'),
        'type' => 'toggle',
        'section' => 'header_subscribe_section',
        'active_callback'   => 'newsair_menu_subscriber_section_status',
    )
)); 