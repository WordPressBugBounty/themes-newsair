<?php
$newsair_default = newsair_get_default_theme_options();

// Setting banner_advertisement_section.
$wp_customize->add_setting('banner_ad_image',
    array(
        'default' => $newsair_default['banner_ad_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control($wp_customize, 'banner_ad_image',
        array(
            'label' => esc_html__('Banner Section Advertisement', 'newsair'),
            'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'newsair'), 930, 100),
            'section' => 'header_advert_section',
            'width' => 930,
            'height' => 100,
            'flex_width' => true,
            'flex_height' => true,
        )
    )
);

/*banner_advertisement_section_url*/
$wp_customize->add_setting('banner_ad_url',
    array(
        'default' => $newsair_default['banner_ad_url'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('banner_ad_url',
    array(
        'label' => esc_html__('Link', 'newsair'),
        'section' => 'header_advert_section',
        'type' => 'url',
    )
);

$wp_customize->add_setting('newsair_open_on_new_tab',
    array(
        'default' => true,
        'sanitize_callback' => 'newsair_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Newsair_Toggle_Control( $wp_customize, 'newsair_open_on_new_tab', 
    array(
        'label' => esc_html__('Open link in a new tab', 'newsair'),
        'type' => 'toggle',
        'section' => 'header_advert_section',
    )
));