<?php
/**
 * Newsair Theme Customizer
 *
 * @package Newsair
 */

if (!function_exists('newsair_get_option')):
/**
 * Get theme option.
 *
 * @since 1.0.0
 *
 * @param string $key Option key.
 * @return mixed Option value.
 */
function newsair_get_option($key) {

	if (empty($key)) {
		return;
	}

	$value = '';

	$default       = newsair_get_default_theme_options();
	$default_value = null;

	if (is_array($default) && isset($default[$key])) {
		$default_value = $default[$key];
	}

	if (null !== $default_value) {
		$value = get_theme_mod($key, $default_value);
	} else {
		$value = get_theme_mod($key);
	}

	return $value;
}
endif;

// Load customize default values.
require get_template_directory().'/inc/ansar/customize/customizer-callback.php';

// Load customize default values.
require get_template_directory().'/inc/ansar/customize/customizer-default.php';


$repeater_path = trailingslashit( get_template_directory() ) . '/inc/ansar/customizer-repeater/functions.php';
if ( file_exists( $repeater_path ) ) {
require_once( $repeater_path );
}

function banner_slider_option($control) {

        $banner_slider_option = $control->manager->get_setting('banner_options_main')->value();

        if($banner_slider_option == 'banner_slider_section_option'){
            return true;
        } else{
           return false;
        }
    }

    function banner_slider_category_function($control){
  $no_option = $control->manager->get_setting('banner_options_main')->value();
  $banner_slider_category_option = $control->manager->get_setting('banner_slider_section_option')->value();
        if ($banner_slider_category_option == 'banner_slider_category_option' && $no_option == 'banner_slider_section_option') {
            return true;
        }else{ return false;}
    }

    function header_video_act_call($control){
        $video_banner_section = $control->manager->get_setting('banner_options_main')->value();
    
        if($video_banner_section == 'header_video'){
            return true;
        }else{
            return false;
        }
        }


function video_banner_section_function($control){
    $video_banner_section = $control->manager->get_setting('banner_options_main')->value();

    if($video_banner_section == 'video_banner_section'){
        return true;
    }else{
        return false;
    }
    }


function slider_callback($control){
  $banner_slider_option = $control->manager->get_setting('banner_options_main')->value();
  $banner_slider_section_option = $control->manager->get_setting('banner_slider_section_option')->value();
if ($banner_slider_option == 'banner_slider_section_option' && $banner_slider_section_option == 'latest_post_show') {
            return true;
        }else{
            return false;
        }
    }


    function overlay_text($control){

    $banner_slider_option = $control->manager->get_setting('banner_options_main')->value();

    if($banner_slider_option == 'header_video' || $banner_slider_option == 'video_banner_section'){
        return true;
    }else{
       return false;
    }

}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newsair_customize_register($wp_customize) {

	// Load customize controls.
	require get_template_directory().'/inc/ansar/customize/customizer-control.php';

    // Load customize sanitize.
	require get_template_directory().'/inc/ansar/customize/customizer-sanitize.php';

    $wp_customize->get_setting( 'custom_logo')->sanitize_callback  	= 'esc_url_raw';
    $wp_customize->get_setting( 'custom_logo')->transport  			= 'postMessage';
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

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

    $default = newsair_get_default_theme_options();

	/*theme option panel info*/

    require get_template_directory().'/inc/ansar/customize/header-options.php';

	require get_template_directory().'/inc/ansar/customize/theme-options.php';

    /*Theme customizer general option*/
    require get_template_directory().'/inc/ansar/customize/footer-options.php';

	/*theme general layout panel*/
	require get_template_directory().'/inc/ansar/customize/theme-layout.php';

    /*theme Featured Story*/
    require get_template_directory().'/inc/ansar/customize/frontpage-featured-story.php';

}
add_action('customize_register', 'newsair_customize_register');

function custom_logo_selective_refresh() {
    if( get_theme_mod( 'custom_logo' ) === "" ) return;
    echo '<div class="site-logo">'.the_custom_logo().'</div>';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newsair_customize_partial_blogname() {
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
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
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newsair_customize_preview_js() {
	wp_enqueue_script('newsair-customizer', get_template_directory_uri().'/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'newsair_customize_preview_js');


/************************* Related Post Callback function *********************************/

function newsair_rt_post_callback ( $control ) {
    if( true == $control->manager->get_setting ('newsair_enable_related_post')->value()){
        return true;
    }
    else {
        return false;
    }
}
/************************* Theme Customizer with Sanitize function *********************************/
function newsair_theme_option( $wp_customize ){

    $newsair_default = newsair_get_default_theme_options();

    function newsair_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

    $wp_customize->add_panel( 'newsair_site_identity_panel', array(
        'title' => esc_html__( 'Site Identity', 'newsair' ),
        'capability'     => 'edit_theme_options',
        'priority' => 5,
    ));

    $wp_customize->add_section( 'title_tagline', array(
        'title' => esc_html__( 'Logo & Site Icon', 'newsair' ),
        'panel' => 'newsair_site_identity_panel',
    ));
    
    //Site Logo Width
    // For Desktop   
    $wp_customize->add_setting('desktop_side_logo_width',array(

        'default' => '250',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'absint',

    ));
    // For Tablet   
    $wp_customize->add_setting('tablet_side_logo_width',array(

        'default' => '200',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'absint',

    ));
    // For Mobile   
    $wp_customize->add_setting('mobile_side_logo_width',array(

        'default' => '150',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'absint',

    ));
    $wp_customize->add_control( new Responsive_slider_control( $wp_customize, 'side_main_logo_width', array(
      'label' => __('Logo Width' , 'newsair' ),
      'section' => 'title_tagline',
      'settings' => [

        'desktop_input' => 'desktop_side_logo_width',
        'tablet_input' => 'tablet_side_logo_width',
        'mobile_input' => 'mobile_side_logo_width',
      ],
      'is_responsive' => true,
      'input_attrs' => array(
        'min' => 0,
        'max' => 400,
        'step' => 1,
      ),
      
    ) ) );
    
    // Add Section
    $wp_customize->add_section( 'newsair_site_title_section', array(
        'title' => esc_html__( 'Site Title & Tagline', 'newsair' ),
        'panel' => 'newsair_site_identity_panel',
    ));
    $wp_customize->get_control( 'blogname' )->section = 'newsair_site_title_section';
    $wp_customize->get_control( 'display_header_text' )->section = 'newsair_site_title_section';
    $wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display site title', 'newsair' );
    $wp_customize->get_control( 'blogdescription' )->section = 'newsair_site_title_section';
  
    /*--- Site title Font size **/
    // For Desktop   
    $wp_customize->add_setting('newsair_title_fontsize_desktop',array(

    'default' => $newsair_default['newsair_title_fontsize_desktop'],
    'capability' => 'edit_theme_options',
    'transport' => 'postMessage',
    'sanitize_callback' => 'absint',
    
    ));
    // For Tablet   
    $wp_customize->add_setting('newsair_title_fontsize_tablet',array(
    
        'default' => $newsair_default['newsair_title_fontsize_tablet'],
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'absint',
    
    ));
    // For Mobile   
    $wp_customize->add_setting('newsair_title_fontsize_mobile',array(
    
        'default' => $newsair_default['newsair_title_fontsize_mobile'],
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'absint',
    
    ));
    $wp_customize->add_control( new Responsive_slider_control( $wp_customize, 'newsair_title_font_size', array(

      'label' => __('Site Title Size', 'newsair'),
      'section' => 'newsair_site_title_section',
      'settings' => [
        'desktop_input' => 'newsair_title_fontsize_desktop',
        'tablet_input'  => 'newsair_title_fontsize_tablet',
        'mobile_input'  => 'newsair_title_fontsize_mobile',
      ],
      'is_responsive' => true,
      'input_attrs' => array(
        'min' => 0,
        'max' => 100,
        'step' => 1,
      ),
      
    ) ) );
    
    // Add switch for Center Site Title and Tagline
    $wp_customize->add_setting('newsair_center_logo_title',
        array(
            'default' => false,
            'transport' => 'postMessage',
            'sanitize_callback' => 'newsair_sanitize_checkbox',
        )
	);
	$wp_customize->add_control('newsair_center_logo_title',
	    array(
	        'label' => esc_html__('Display Center Site Title and Tagline', 'newsair'),
	        'section' => 'newsair_site_title_section',
	        'type' => 'checkbox',
	        'priority' => 55,
	    )
	);

}
add_action('customize_register','newsair_theme_option');

if ( ! function_exists( 'newsair_get_social_icon_default' ) ) {

    function newsair_get_social_icon_default() {
        return apply_filters(
            'newsair_get_social_icon_default',
            json_encode(
                array(
                    array(
                        'icon_value' => 'fab fa-facebook',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_001',
                    ),
                    array(
                        'icon_value' => 'fa-brands fa-x-twitter',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_003',
                    ),
                    array(
                        'icon_value' => 'fab fa-instagram',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_005',
                    ),
                    array(
                        'icon_value' => 'fab fa-pinterest',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_007',
                    ),
                    array(
                        'icon_value' => 'fab fa-telegram',
                        'link'       => '#',
                        'id'         => 'customizer_repeater_header_social_008',
                    ),
                )
            )
        );
    }
}