<?php

/**
 * Newsair Selective Refresh
 *
 * @package Newsair
 */
function newsair_selective_refresh( $wp_customize ) {
	if (isset($wp_customize->selective_refresh)) {

		// site logo
		$wp_customize->selective_refresh->add_partial('custom_logo', array(
			'selector'        => '.site-logo', 
			'render_callback' => 'custom_logo_selective_refresh'
		));
		
		// site title
		$wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a , .site-title-footer a',
            'render_callback' => 'newsair_customize_partial_blogname',
        ));

		// site tagline
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description , .site-description-footer',
            'render_callback' => 'newsair_customize_partial_blogdescription',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_header_social_icons', array(
            'selector'        => '.bs-head-detail .bs-social'
        ));
        $wp_customize->selective_refresh->add_partial('footer_social_icon_enable', array(
            'selector'        => '.bs-footer-bottom-area .col-md-6 + .col-md-6, .bs-footer-copyright .col-md-4:last-child',
            'render_callback' => 'newsair_customize_partial_footer_social_icon',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_footer_social_icons', array(
            'selector'        => '.bs-footer-bottom-area .col-md-6 + .col-md-6, .bs-footer-copyright .col-md-4:last-child',
            'render_callback' => 'newsair_customize_partial_footer_social_icon',
        ));
        $wp_customize->selective_refresh->add_partial('breaking_news_title', array(
            'selector'        => '.bs-head-detail .mg-latest-news .title span',
            'render_callback' => 'newsair_customize_partial_breaking_news_title',
        ));
        $wp_customize->selective_refresh->add_partial('brk_news_enable', array(
            'selector'        => '.bs-head-detail',
            'render_callback' => 'newsair_customize_partial_header_top',
        ));
        $wp_customize->selective_refresh->add_partial('header_data_enable', array(
            'selector'        => '.bs-head-detail .d-flex.flex-wrap.align-items-center',
            'render_callback' => 'newsair_customize_partial_header_social',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_date_time_show_type', array(
            'selector'        => '.bs-head-detail .d-flex.flex-wrap.align-items-center',
            'render_callback' => 'newsair_customize_partial_header_social',
        ));
        $wp_customize->selective_refresh->add_partial('header_social_icon_enable', array(
            'selector'        => '.bs-head-detail .d-flex.flex-wrap.align-items-center',
            'render_callback' => 'newsair_customize_partial_header_social',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_header_social_icons', array(
            'selector'        => '.bs-head-detail .d-flex.flex-wrap.align-items-center',
            'render_callback' => 'newsair_customize_partial_header_social',
        ));
        $wp_customize->selective_refresh->add_partial('subs_news_title', array(
            'selector'        => '.right-nav .subscribe-btn span',
            'render_callback' => 'newsair_customize_partial_subs_news_title',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_scrollup_enable', array(
            'selector'        => '.bs_upscr',
        ));
        $wp_customize->selective_refresh->add_partial('you_missed_title', array(
            'selector'        => '.missed .bs-widget-title .title',
            'render_callback' => 'newsair_customize_partial_you_missed_title',
        ));
        $wp_customize->selective_refresh->add_partial('sidebar_menu', array(
            'selector'        => '.navbar-wp [data-bs-toggle=offcanvas]',
            'render_callback' => 'newsair_customize_partial_sidebar_menu',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_home_icon', array(
            'selector'        => '.homebtn a.title',
        ));
        // $wp_customize->selective_refresh->add_partial('newsair_menu_search', array(
        //     'selector'        => '.bs-default .navbar-wp .m-header .right-nav',
        //     'render_callback' => 'newsair_customize_partial_search',
        // ));
        $wp_customize->selective_refresh->add_partial('newsair_menu_search', array(
            'selector'        => '.bs-default .navbar-wp .desk-header.right-nav',
            'render_callback' => 'newsair_customize_partial_right_nav',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_lite_dark_switcher', array(
            'selector'        => '.bs-default .navbar-wp .desk-header.right-nav',
            'render_callback' => 'newsair_customize_partial_right_nav',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_menu_subscriber', array(
            'selector'        => '.bs-default .navbar-wp .desk-header.right-nav',
            'render_callback' => 'newsair_customize_partial_right_nav',
        ));
        $wp_customize->selective_refresh->add_partial('subsc_icon_layout', array(
            'selector'        => '.bs-default .navbar-wp .desk-header.right-nav',
            'render_callback' => 'newsair_customize_partial_right_nav',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_subsc_link', array(
            'selector'        => '.bs-default .navbar-wp .desk-header.right-nav',
            'render_callback' => 'newsair_customize_partial_right_nav',
        ));
        $wp_customize->selective_refresh->add_partial('subsc_open_in_new', array(
            'selector'        => '.bs-default .navbar-wp .desk-header.right-nav',
            'render_callback' => 'newsair_customize_partial_right_nav',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_cart_enable', array(
            'selector'        => '.bs-default .navbar-wp .desk-header.right-nav',
            'render_callback' => 'newsair_customize_partial_right_nav',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_menu_sidebar', array(
            'selector'        => '.bs-default .navbar-wp .desk-header.right-nav',
            'render_callback' => 'newsair_customize_partial_right_nav',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_single_post_admin_details', array(
            'selector'        => '.bs-blog-post .bs-header .bs-blog-meta ',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_drop_caps_enable', array(
            'selector'        => '.content-right .bs-blog-post .bs-blog-meta, .content-full .bs-blog-post .bs-blog-meta', 
        ));
        $wp_customize->selective_refresh->add_partial('newsair_footer_copyright', array(
            'selector'        => 'footer .bs-footer-copyright p .text', 
            'render_callback' => 'newsair_customize_partial_newsair_footer_copyright',
        ));
        $wp_customize->selective_refresh->add_partial('hide_copyright', array(
            'selector'        => '.bs-footer-copyright', 
            'render_callback' => 'newsair_customize_partial_hide_copyright',
        ));
        $wp_customize->selective_refresh->add_partial('main_banner_section_background_image', array(
            'selector'        => '.homemain .bs-blog-post.three .bs-blog-meta', 
        ));
        $wp_customize->selective_refresh->add_partial('select_trending_news_category', array(
            'selector'        => '.multi-post-widget .col-12 .bs-blog-post.three .bs-blog-meta', 
        ));
        $wp_customize->selective_refresh->add_partial('select_editor_news_category', array(
            'selector'        => '.multi-post-widget .col-sm-6 .bs-blog-post.three .bs-blog-meta', 
        ));
        $wp_customize->selective_refresh->add_partial('featured_story_section_title', array(
            'selector'        => '.crousel-widget .bs-widget-title .title', 
            'render_callback' => 'newsair_customize_partial_featured_story_section_title',
        ));
        $wp_customize->selective_refresh->add_partial('banner_ad_image', array(
            'selector'        => '.header-ads-img', 
        ));
        $wp_customize->selective_refresh->add_partial('show_popular_tags_title', array(
            'selector'        => '.mg-tpt-txnlst .mg-tpt-txnlst-title', 
            'render_callback' => 'newsair_customize_partial_show_popular_tags_title',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_related_post_title', array(
            'selector'        => '.single-related-post .bs-widget-title .title', 
            'render_callback' => 'newsair_customize_partial_newsair_related_post_title',
        ));
        $wp_customize->selective_refresh->add_partial('breadcrumb_settings', array(
            'selector'        => '.bs-breadcrumb-section .breadcrumb a[rel="home"]', 
        ));
        $wp_customize->selective_refresh->add_partial('newsair_404_title', array(
            'selector'        => '.bs-error-404 h4', 
            'render_callback' => 'newsair_customize_partial_newsair_404_title',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_404_desc', array(
            'selector'        => '.bs-error-404 p', 
            'render_callback' => 'newsair_customize_partial_newsair_404_desc',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_404_btn_title', array(
            'selector'        => '.bs-error-404 a.btn-theme', 
            'render_callback' => 'newsair_customize_partial_newsair_404_btn_title',
        ));
        $wp_customize->selective_refresh->add_partial('newsair_content_layout', array(
            'selector'        => '.index-class .container > .row, .archive-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_content_layout',
        ));
		$wp_customize->selective_refresh->add_partial('newsair_page_layout', array(
			'selector'        => '.page-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_page_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_single_page_layout', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_single_post_category', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_single_post_admin_details', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_single_post_date', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_single_post_tag', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('single_show_featured_image', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_blog_post_icon_enable', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_enable_single_admin_details', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_enable_related_post', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_enable_single_post_category', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_enable_single_post_admin_details', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_enable_single_post_date', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
		$wp_customize->selective_refresh->add_partial('newsair_enable_single_post_comments', array(
			'selector'        => '.single-class > .container > .row',
			'render_callback' => 'newsair_customize_partial_single_layout',
		));
	}

}
add_action( 'customize_register', 'newsair_selective_refresh' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function custom_logo_selective_refresh() {
    if( get_theme_mod( 'custom_logo' ) === "" ) return;
    echo '<div class="site-logo">'.the_custom_logo().'</div>';
}

function newsair_customize_partial_blogname() {
	bloginfo('name');
}

function newsair_customize_partial_blogdescription() {
	bloginfo('description');
}

function newsair_customize_partial_header_data_enable() {
    return get_theme_mod( 'header_data_enable' );
}

function newsair_customize_partial_footer_social_icon() {
    return do_action( 'newsair_action_footer_social_section' ); 
}

function newsair_customize_partial_breaking_news_title() {
    return get_theme_mod( 'breaking_news_title' ); 
}

function newsair_customize_partial_header_social() {
    newsair_date_display_type();
    do_action('newsair_action_header_social_section');
}

function newsair_customize_partial_header_top() {
    return do_action('newsair_action_header_section');
}

function newsair_customize_partial_subs_news_title() {
    return get_theme_mod( 'subs_news_title' ); 
}

function newsair_customize_partial_you_missed_title() {
    return get_theme_mod( 'you_missed_title' ); 
}

function newsair_customize_partial_sidebar_menu() {
    return get_theme_mod( 'sidebar_menu' ); 
}

function newsair_customize_partial_newsair_menu_subscriber() {
    return get_theme_mod( 'newsair_menu_subscriber' ); 
}

function newsair_customize_partial_featured_story_section_title() {
    return get_theme_mod( 'featured_story_section_title' ); 
}

function newsair_customize_partial_newsair_404_title() {
    return get_theme_mod( 'newsair_404_title' ); 
}

function newsair_customize_partial_newsair_404_desc() {
    return get_theme_mod( 'newsair_404_desc' ); 
}

function newsair_customize_partial_newsair_404_btn_title() {
    return get_theme_mod( 'newsair_404_btn_title' ); 
}

function newsair_customize_partial_newsair_related_post_title() {
    return get_theme_mod( 'newsair_related_post_title' ); 
}

function newsair_customize_partial_show_popular_tags_title() {
    return get_theme_mod( 'show_popular_tags_title' ); 
}

function newsair_customize_partial_content_layout() {
    return do_action('newsair_action_main_content_layouts');
}

function newsair_customize_partial_right_nav() {
    return newsair_header_right_nav_content();
}

// function newsair_customize_partial_search() {
//     return newsair_header_search();
// }

function newsair_customize_partial_newsair_footer_copyright() {
    return get_theme_mod( 'newsair_footer_copyright' ); 
}

function newsair_customize_partial_hide_copyright() {
	return do_action('newsair_action_footer_copyright');
}

function newsair_customize_partial_page_layout() {
	return get_template_part('template-parts/content', 'page');
}

function newsair_customize_partial_single_layout() {
	return get_template_part('template-parts/content', 'single');
}