<?php
$newsair_default = newsair_get_default_theme_options();
$wp_customize->add_setting('newsair_search_icon_setting',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Newsair_Section_Title(
        $wp_customize,
        'newsair_search_icon_setting',
        array(
            'label' => __('Search', 'newsair'),
            'section' => 'header_search_section',
        )
    )
);

$wp_customize->add_setting('newsair_menu_search',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'newsair_menu_search', 
    array(
        'label' => esc_html__('Hide/Show', 'newsair'),
        'type' => 'toggle',
        'section' => 'header_search_section',
    )
));