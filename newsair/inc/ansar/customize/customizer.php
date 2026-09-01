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

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newsair_customize_register($wp_customize) {

	// Load customize controls.

    $wp_customize->get_setting( 'custom_logo')->sanitize_callback  	= 'esc_url_raw';
    $wp_customize->get_setting( 'custom_logo')->transport  			= 'postMessage';
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

}
add_action('customize_register', 'newsair_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newsair_customize_preview_js() {
	wp_enqueue_script('newsair-customizer', get_template_directory_uri().'/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'newsair_customize_preview_js');


/************************* Theme Customizer with Sanitize function *********************************/
function newsair_theme_option( $wp_customize ){

   
    function newsair_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }
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