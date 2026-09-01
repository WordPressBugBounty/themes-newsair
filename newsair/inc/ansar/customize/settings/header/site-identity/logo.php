<?php
 $newsair_default = newsair_get_default_theme_options();
    newsair_migrate_responsive_range(
        'side_main_logo_width',
        array(
            'desktop' => 'desktop_side_logo_width',
            'tablet'  => 'tablet_side_logo_width',
            'mobile'  => 'mobile_side_logo_width',
        ),
        $newsair_default['side_main_logo_width']
    );

    //Site Logo Width    
    $wp_customize->add_setting('side_main_logo_width', array(
        'default' => $newsair_default['side_main_logo_width'],
        'transport'         => 'postMessage',
        'sanitize_callback' => 'newsair_sanitize_range',
    ));
    $wp_customize->add_control(new Newsair_Range_Control( $wp_customize, 'side_main_logo_width', array(
        'label'       => __('Logo Width', 'newsair'),
        'section'     => 'title_tagline',
        'media_query' => true,
        'size_unit'   => array( 'px', '%', 'vw' ),
        'input_attr'  => array('min'  => 0,'max'  => 400,'step' => 1,),
    )));