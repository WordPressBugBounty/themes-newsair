<?php
$newsair_default = newsair_get_default_theme_options();
$wp_customize->add_setting('newsair_dark_mode_setting',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Newsair_Section_Title(
        $wp_customize,
        'newsair_dark_mode_setting',
        array(
            'label' => __('Dark and Light Mode Switcher', 'newsair'),
            'section' => 'header_dark_mode_section',

        )
    )
);

$wp_customize->add_setting('newsair_lite_dark_switcher',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'newsair_lite_dark_switcher', 
    array(
        'label' => esc_html__('Hide/Show', 'newsair'),
        'type' => 'toggle',
        'section' => 'header_dark_mode_section',
    )
));