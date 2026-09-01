<?php
$newsair_default = newsair_get_default_theme_options();
$wp_customize->add_setting('home_icon_settings',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Newsair_Section_Title(
        $wp_customize,
        'home_icon_settings',
        array(
            'label' => __('Home Icon', 'newsair'),
            'section' => 'main_menu_options',
        )
    )
);

$wp_customize->add_setting('newsair_home_icon',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'newsair_home_icon', 
    array(
        'label' => esc_html__('Hide/Show', 'newsair'),
        'type' => 'toggle',
        'section' => 'main_menu_options', 
    )
)); 
