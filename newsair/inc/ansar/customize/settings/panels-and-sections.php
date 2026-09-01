<?php
// Top Bar Panel
$wp_customize->add_panel( 'topbar_option_panel', array(
    'title' => __('Top Bar', 'newsair'),
    'priority' => 3,
), );
    $wp_customize->add_section( 'topbar_options' , array(
        'title' => __('Top Bar', 'newsair'),
        'panel' => 'topbar_option_panel',
    ) );
    $wp_customize->add_section( 'social_options' , array(
        'title' => __('Social icons', 'newsair'),
        'panel' => 'topbar_option_panel',
    ) );
// Site Identity Panel
$wp_customize->add_panel( 'newsair_site_identity_panel', array(
    'title' => __( 'Site Identity', 'newsair' ),
    'priority' => 5,
));
    $wp_customize->add_section( 'title_tagline', array(
        'title' => __( 'Logo & Site Icon', 'newsair' ),
        'panel' => 'newsair_site_identity_panel',
    ));
    $wp_customize->add_section( 'newsair_site_title_section', array(
        'title' => __( 'Site Title & Tagline', 'newsair' ),
        'panel' => 'newsair_site_identity_panel',
    ));

// Theme Header Panel
$wp_customize->add_panel('header_option_panel', array(
    'title' => __('Theme Header', 'newsair'),
    'priority' => 6,
) );
    $wp_customize->add_section( 'header_advert_section' , array(
        'title' => __('Banner Advertisement', 'newsair'),
        'panel' => 'header_option_panel',
    )  );
    $wp_customize->add_section( 'main_menu_options' , array(
        'title' => __('Menu', 'newsair'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'header_search_section' , array(
        'title' => __('Search', 'newsair'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'header_dark_mode_section' , array(
        'title' => __('Dark and Light Mode Switcher', 'newsair'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'header_subscribe_section' , array(
        'title' => __('Subscribe Button', 'newsair'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'header_cart_section' , array(
        'title' => __('Shopping Cart', 'newsair'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'header_menu_sidebar_section' , array(
        'title' => __('Menu Sidebar', 'newsair'),
        'panel' => 'header_option_panel',
    ) );
    $wp_customize->add_section( 'sticky_header' , array(
        'title' => __('Sticky Header', 'newsair'),
        'panel' => 'header_option_panel',
    ) );
// $wp_customize->get_section('header_image')->panel = 'header_option_panel';
$wp_customize->get_section( 'header_image')->priority = 6;
