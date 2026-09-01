<?php

function newsair_customize_options() {

  // Initialize string
  $newsair_custom_css = '';

  $all_defaults = newsair_get_default_theme_options();
  
  $rangeValue = '';
  
  $rangeValue = array(

		'.bs-slide .inner .title' => array(
			array( 'key' => 'newsair_slider_title_font_size', 'property' => 'font-size' ),
		),
		'.multi-post-widget .bs-blog-post.three.sm .title' => array(
			array( 'key' => 'newsair_tren_edit_title_font_size', 'property' => 'font-size' ),
		),
		'.bs-default .bs-header-main .inner, .bs-headthree .bs-header-main .inner' => array(
      array( 'key' => 'general_header_image_height', 'property' => 'height' ),
		),
		'.bs-header-main .navbar-brand img, .bs-headfour .navbar-header img' => array(
      array( 'key' => 'side_main_logo_width', 'property' => 'width' ),
		),
    '.site-branding-text .site-title a' => array(
      array( 'key' => 'newsair_title_font_size', 'property' => 'font-size' ),
    ),
    '.postcrousel .bs-blog-post .title' => array(
      array( 'key' => 'featured_story_title_font_size', 'property' => 'font-size' ),
    ),
    'footer .bs-footer-bottom-area .custom-logo' => array(
      array( 'key' => 'newsair_footer_main_logo_width', 'property' => 'width' ),
      array( 'key' => 'newsair_footer_main_logo_height', 'property' => 'height'),
    ),
    ':root' => array(
      array( 'key' => 'newsair_theme_sidebar_width', 'property' => '--mainWidth', 'media_query' => false, ),
      array( 'key' => 'newsair_single_page_sidebar_width', 'property' => '--singleWidth', 'media_query' => false, ),
    ),
	);

	foreach ( $rangeValue as $selector => $properties ) {
		foreach ( $properties as $setting ) {
			$key         = $setting['key'];
			$property    = $setting['property'];

			$current_val = newsair_get_option( $key );
			$default_val = isset( $all_defaults[$key] ) ? $all_defaults[$key] : array();
			$media_query = isset( $setting['media_query'] ) ? $setting['media_query'] : true;

			$newsair_custom_css .= newsair_range_css( $selector, $default_val, $current_val, $property, $media_query );
		}
	}
	
  $main_width = newsair_get_option( 'newsair_theme_sidebar_width' );
  $main_width_data = json_decode( $main_width, true );
  $main_width = $main_width_data['desktop'];
  $main_unit = $main_width_data['desktop_unit'];

  $content_widht = '1130px';

  if ( $main_unit == '%') {
    $content_widht = '100%';
  }
  if ( ! empty( $main_width_data['desktop'] ) ) {

    $newsair_custom_css .= '@media (min-width: 992px) {
                        .archive-class .sidebar-right, .archive-class .sidebar-left , .index-class .sidebar-right, .index-class .sidebar-left{
                          flex: 100;
                          width: '.$main_width.$main_unit.'!important;
                        }
                        .archive-class .content-right , .index-class .content-right {
                          width: calc('.$content_widht.' - '.$main_width.$main_unit.') !important;
                        }
    }';

  }
	
  $single_width = newsair_get_option( 'newsair_single_page_sidebar_width' );
  $single_width_data = json_decode( $single_width, true );
  $single_width = $single_width_data['desktop'];
  $single_unit = $single_width_data['desktop_unit'];

  $content_single_widht = '1130px';

  if ( $single_unit == '%') {
    $content_single_widht = '100%';
  }
  if ( ! empty( $single_width_data['desktop'] ) ) {

    $newsair_custom_css .= '@media (min-width: 992px) {
      .single-class .sidebar-right, .single-class .sidebar-left {
        flex: 100;
        width: '.$single_width.$single_unit.'!important;
        }
        .single-class .content-right{
                          width: calc('.$content_single_widht.' - '.$single_width.$single_unit.') !important;
                        }
    }';
  }

  if ( ! empty( $newsair_custom_css ) ) {
    wp_add_inline_style( 'newsair-style', $newsair_custom_css );
  }
}