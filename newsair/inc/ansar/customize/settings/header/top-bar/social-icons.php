<?php
$newsair_default = newsair_get_default_theme_options();
// section title
$wp_customize->add_setting('social_icon_settings',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    new Newsair_Section_Title(
        $wp_customize,
        'social_icon_settings',
        array(
            'label' => esc_html__('Social Icons', 'newsair'),
            'section' => 'social_options',
        )
    )
);
$wp_customize->add_setting('header_social_icon_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'header_social_icon_enable', 
    array(
        'label' => esc_html__('Hide/Show', 'newsair'),
        'type' => 'toggle',
        'section' => 'social_options',
    )
));

$wp_customize->add_setting(
    'newsair_header_social_icons',
    array(
        'default'           => newsair_get_social_icon_default(),
        'sanitize_callback' => 'newsair_repeater_sanitize',
        'transport' => 'postMessage',
    )
);
$wp_customize->add_control(
    new newsair_Repeater_Control(
        $wp_customize,
        'newsair_header_social_icons',
        array(
            'label'                            => esc_html__( 'Social Icons', 'newsair' ),
            'section'                          => 'social_options',
            'add_field_label'                  => esc_html__( 'Add New Social', 'newsair' ),
            'item_name'                        => esc_html__( 'Social', 'newsair' ),
            'customizer_repeater_icon_control' => true,
            'customizer_repeater_link_control' => true,
            'customizer_repeater_checkbox_control' => true,
        )
    )
);

$wp_customize->add_setting( 'newsair_social_upgrade_to_pro', array(
    'capability'            => 'edit_theme_options',
    'sanitize_callback' => 'wp_filter_nohtml_kses',
));
$wp_customize->add_control(
    new newsair_social_section_upgrade(
    $wp_customize,
    'newsair_social_upgrade_to_pro',
        array(
            'section'               => 'social_options',
            'settings'              => 'newsair_social_upgrade_to_pro',
        )
    )
);