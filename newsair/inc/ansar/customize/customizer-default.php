<?php
/**
 * Default theme options.
 *
 * @package Newsair
 */

if (!function_exists('newsair_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function newsair_get_default_theme_options() {

    $defaults = array();

    // Site Title
    $defaults['newsair_title_fontsize_desktop'] = 40;
    $defaults['newsair_title_fontsize_tablet'] = 35;
    $defaults['newsair_title_fontsize_mobile'] = 30;
    
    // Header options section
    $defaults['brk_news_enable'] = true;
    $defaults['breaking_news_title'] = __('Breaking','newsair');


    $defaults['select_brk_news_category'] = 0;
    $defaults['number_of_brk_news'] = 10;
    $defaults['header_layout'] = 'header-layout-1';
    $defaults['banner_ad_image'] = '';
    $defaults['banner_ad_url'] = '#';
    $defaults['newsair_open_on_new_tab'] = 1;
    $defaults['banner_advertisement_scope'] = 'front-page-only';

    // Frontpage Section.
    $defaults['show_popular_tags_title'] = __('Top Tags', 'newsair');
    $defaults['number_of_popular_tags'] = 7;
    $defaults['select_popular_tags_mode'] = 'post_tag';
    $defaults['flash_news_title'] = __('Hot News', 'newsair');
    $defaults['select_flash_news_category'] = 0;
    $defaults['number_of_flash_news'] = 5;
    $defaults['select_flash_new_mode'] = 'flash-slide-left';
    $defaults['banner_flash_news_scope'] = 'front-page-only';
    $defaults['show_main_banner_section'] = 1;
    $defaults['select_main_banner_section_mode'] = 'default';
    $defaults['select_vertical_slider_news_category'] = 0;
    $defaults['vertical_slider_number_of_slides'] = 15;
    $defaults['select_slider_news_category'] = 0; 

    $defaults['slider_title_fontsize_desktop'] = 28;
    $defaults['slider_title_fontsize_tablet'] = 28;
    $defaults['slider_title_fontsize_mobile'] = 24;
    
    $defaults['newsair_trend_title_fontsize_desktop'] = 24;
    $defaults['newsair_trend_title_fontsize_tablet'] = 22;
    $defaults['newsair_trend_title_fontsize_mobile'] = 22;

    $defaults['select_trending_news_category'] = 0;
    $defaults['trending_news_number'] = 1;

    $defaults['select_editor_news_category'] = 0;
    $defaults['editor_news_number'] = 2;

    //Featured Story
    $defaults['show_featured_news_section'] = 1; 
    $defaults['featured_story_section_title'] = __('Featured Story','newsair');
    $defaults['featured_story_category'] = 0;
    $defaults['featured_number_of_story'] = 5;
    $defaults['featured_story_title_fontsize_desktop'] = 24;
    $defaults['featured_story_title_fontsize_tablet'] = 22;
    $defaults['featured_story_title_fontsize_mobile'] = 22; 
    $defaults['featured_story_meta_enable'] = 1;
    $defaults['select_tabbed_thumbs_section_mode'] = 'tabbed';
    $defaults['select_tab_section_mode'] = 'default';
    $defaults['select_thumbs_news_category'] = 0;
    $defaults['number_of_slides'] = 5; 
    $defaults['featured_news_section_title'] = __('Featured Story', 'newsair');
    $defaults['select_featured_news_category'] = 0;
    $defaults['number_of_featured_news'] = 6;
    $defaults['main_banner_section_background_image']= '';
    $defaults['select_editor_choice_category'] = 0;

    //Featured Ads Section
    $defaults['show_editors_pick_section'] = 1;
    $defaults['frontpage_content_alignment'] = 'align-content-left';

    //layout options
    $defaults['newsair_content_layout'] = 'grid-right-sidebar';
    $defaults['global_post_date_author_setting'] = 'show-date-author';
    $defaults['global_hide_post_date_author_in_list'] = 1;
    $defaults['global_widget_excerpt_setting'] = 'trimmed-content';
    $defaults['global_date_display_setting'] = 'theme-date';
    
    $defaults['frontpage_latest_posts_section_title'] = __('You may have missed', 'newsair');
    $defaults['frontpage_latest_posts_category'] = 0;
    $defaults['number_of_frontpage_latest_posts'] = 4;

    //Single
    $defaults['single_show_featured_image'] = true;
    $defaults['single_show_share_icon'] = true;
    
    // You Missed Section.
    $defaults['you_missed_enable'] = true;
    $defaults['you_missed_title'] = __('You Missed', 'newsair'); 
    $defaults['you_missed_number_of_post'] = 4;
    
    // You Missed Section.
    $defaults['hide_copyright'] = true;
    $defaults['newsair_footer_copyright'] = __('Copyright &copy; All rights reserved','newsair');
    
    // Dimensions
    $defaults['newsair_slider_title_font_size'] = wp_json_encode( array( 'desktop' => 28, 'tablet' => 28, 'mobile' => 24, 'desktop_unit' => 'px', 'tablet_unit'  => 'px', 'mobile_unit'  => 'px', ) );
    $defaults['newsair_tren_edit_title_font_size'] = wp_json_encode( array( 'desktop' => 24, 'tablet' => 22, 'mobile' => 22, 'desktop_unit' => 'px', 'tablet_unit'  => 'px', 'mobile_unit'  => 'px', ) );
    $defaults['featured_story_title_font_size'] = wp_json_encode( array( 'desktop' => 24, 'tablet' => 22, 'mobile' => 22, 'desktop_unit' => 'px', 'tablet_unit'  => 'px', 'mobile_unit'  => 'px', ) );
    $defaults['general_header_image_height'] = wp_json_encode( array( 'desktop' => 200, 'tablet' => 150, 'mobile' => 130, 'desktop_unit' => 'px', 'tablet_unit'  => 'px', 'mobile_unit'  => 'px', ) );
    $defaults['side_main_logo_width'] = wp_json_encode( array( 'desktop' => 250, 'tablet' => 200, 'mobile' => 150, 'desktop_unit' => 'px', 'tablet_unit'  => 'px', 'mobile_unit'  => 'px', ) );
    $defaults['newsair_title_font_size'] = wp_json_encode( array( 'desktop' => 40, 'tablet' => 35, 'mobile' => 30, 'desktop_unit' => 'px', 'tablet_unit'  => 'px', 'mobile_unit'  => 'px', ) );
    $defaults['newsair_footer_main_logo_width'] = wp_json_encode( array( 'desktop' => 210, 'tablet' => 170, 'mobile' => 130, 'desktop_unit' => 'px', 'tablet_unit'  => 'px', 'mobile_unit'  => 'px', ) );
    $defaults['newsair_footer_main_logo_height'] = wp_json_encode( array( 'desktop' => 70, 'tablet' => 50, 'mobile' => 40, 'desktop_unit' => 'px', 'tablet_unit'  => 'px', 'mobile_unit'  => 'px', ) );
    $defaults['newsair_theme_sidebar_width'] = wp_json_encode( array( 'desktop' => 33, 'desktop_unit' => '%', ) );
    $defaults['newsair_single_page_sidebar_width'] = wp_json_encode( array( 'desktop' => 25, 'desktop_unit' => '%', ) );
    
    // filter.
    $defaults = apply_filters('newsair_filter_default_theme_options', $defaults);

	return $defaults;
}

endif;

function newsair_migrate_responsive_range( $new_setting, $old_settings, $new_default ) {

    $current_value = get_theme_mod( $new_setting, false );

    if ( false !== $current_value ) {
        return;
    }

    // Convert the new default JSON into an array.
    $values = json_decode( $new_default, true );

    if ( ! is_array( $values ) ) {
        return;
    }

    $has_old_value = false;

    // Check each old setting.
    foreach ( $old_settings as $device => $old_setting ) {

        $old_value = get_theme_mod( $old_setting, false );

        if ( false !== $old_value ) {

            $has_old_value = true;

            // Old value exists, so use it.
            $values[ $device ] = absint( $old_value );
        }
    }

    // No old values exist.
    // Do nothing and let the new control use its default.
    if ( ! $has_old_value ) {
        return;
    }

    // Save migrated value to the new setting.
    set_theme_mod(
        $new_setting,
        wp_json_encode( $values )
    );
}