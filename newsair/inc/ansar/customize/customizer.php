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

// Load customize selective Refresh.
require get_template_directory().'/inc/ansar/customize/selective-refresh-and-partial.php';


$repeater_path = trailingslashit( get_template_directory() ) . '/inc/ansar/customizer-repeater/functions.php';
if ( file_exists( $repeater_path ) ) {
    require_once( $repeater_path );
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

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newsair_customize_preview_js() {
	wp_enqueue_script('newsair-customizer', get_template_directory_uri().'/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'newsair_customize_preview_js');


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
    
    $wp_customize->get_control( 'display_header_text')->label = __('Display Site Title', 'newsair');

    $wp_customize->add_setting('display_header_tagline',
        array(
            'default' => false,
            'transport' => 'postMessage',
            'sanitize_callback' => 'newsair_sanitize_checkbox',
        )
    );
    $wp_customize->add_control('display_header_tagline',
        array(
            'label' => __('Display Tagline', 'newsair'),
            'section' => 'newsair_site_title_section',
            'type' => 'checkbox',
            'priority' => 50,

        )
    );
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