<?php
$newsair_default = newsair_get_default_theme_options();

// Cart Icon Section Heading
$wp_customize->add_setting('cart_btn_settings',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Newsair_Section_Title(
        $wp_customize,
        'cart_btn_settings',
        array(
            'label' => __('Shopping Cart', 'newsair'),
            'section' => 'header_cart_section',
        )
    )
);
// Cart Hide/Show
$wp_customize->add_setting('newsair_cart_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'newsair_cart_enable', 
    array(
        'label' => esc_html__('Hide/Show', 'newsair'),
        'type' => 'toggle',
        'section' => 'header_cart_section',
    )
));