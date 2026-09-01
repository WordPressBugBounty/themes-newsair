<?php
$newsair_default = newsair_get_default_theme_options();
$wp_customize->add_setting('sticky_header_setting',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Newsair_Section_Title(
        $wp_customize,
        'sticky_header_setting',
        array(
            'label' => __('Sticky Header', 'newsair'),
            'section' => 'sticky_header',
        )
    )
);

$wp_customize->add_setting('sticky_header_toggle',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'sticky_header_toggle', 
    array(
        'label' => esc_html__('On/Off', 'newsair'),
        'type' => 'toggle',
        'section' => 'sticky_header',
    )
));