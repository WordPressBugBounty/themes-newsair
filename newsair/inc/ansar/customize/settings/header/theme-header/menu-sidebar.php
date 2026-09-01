<?php
$newsair_default = newsair_get_default_theme_options();

// Cart Icon Section Heading
$wp_customize->add_setting('menu_sidebar_settings',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Newsair_Section_Title(
        $wp_customize,
        'menu_sidebar_settings',
        array(
            'label' => __('Menu Sidebar', 'newsair'),
            'section' => 'header_menu_sidebar_section',
        )
    )
);
// Hide/Show Menu Sidebar
$wp_customize->add_setting('newsair_menu_sidebar',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'newsair_menu_sidebar', 
    array(
        'label' => esc_html__('Hide/Show', 'newsair'),
        'type' => 'toggle',
        'section' => 'header_menu_sidebar_section',
    )
));