<?php
/**
 * Sanitization functions.
 *
 * @package Newsair
 */

if ( ! function_exists( 'newsair_sanitize_checkbox' ) ) :

    /**
     * Sanitize checkbox.
     *
     * @since 1.0.0
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     */
    function newsair_sanitize_checkbox( $checked ) {

        return ( ( isset( $checked ) && true === $checked ) ? true : false );

    }

endif;


if ( ! function_exists( 'newsair_sanitize_select' ) ) :

    /**
     * Sanitize select.
     *
     * @since 1.0.0
     *
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function newsair_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_text_field( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }

endif;

if ( ! function_exists( 'newsair_sanitize_positive_integer' ) ) :

    /**
     * Sanitize positive integer.
     *
     * @since 1.0.0
     *
     * @param int                  $input Number to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return int Sanitized number; otherwise, the setting default.
     */
    function newsair_sanitize_positive_integer( $input, $setting ) {

        $input = absint( $input );

        // If the input is an absolute integer, return it.
        // otherwise, return the default.
        return ( $input ? $input : $setting->default );

    }

endif;

if ( ! function_exists( 'newsair_sanitize_radio' ) ) :
function newsair_sanitize_radio( $val, $setting ) {
        $val = sanitize_key( $val );
        $choices = $setting->manager->get_control( $setting->id )->choices;
        return array_key_exists( $val, $choices ) ? $val : $setting->default;
    }
endif;

if ( ! function_exists( 'newsair_sanitize_alpha_color' ) ) :
    function newsair_sanitize_alpha_color( $value ) {
        // Check if the value is a valid hexadecimal color
        if ( preg_match( '/^#([a-f0-9]{3}){1,2}$/i', $value ) ) {
            return sanitize_hex_color( $value );
        }
        
        // Check if the value is a valid RGB color
        if ( preg_match( '/^rgb\((\d{1,3}),(\d{1,3}),(\d{1,3})\)$/i', $value, $matches ) ) {
            $red = intval( $matches[1] );
            $green = intval( $matches[2] );
            $blue = intval( $matches[3] );
            
            return "rgb($red, $green, $blue)";
        }
        
        // Check if the value is a valid RGBA color
        if ( preg_match( '/^rgba\((\d{1,3}),(\d{1,3}),(\d{1,3}),([\d\.]+)\)$/i', $value, $matches ) ) {
            $red = intval( $matches[1] );
            $green = intval( $matches[2] );
            $blue = intval( $matches[3] );
            $alpha = floatval( $matches[4] );
            
            // Ensure alpha value is between 0 and 1
            $alpha = max( 0, min( 1, $alpha ) );
            
            return "rgba($red, $green, $blue, $alpha)";
        }
        
        // If none of the above formats match, return a default value
        return '';
    }
endif;

/**
 * Sanitize values for range inputs.
 *
 * @param string $input Control input.
 */
function newsair_sanitize_range( $input ) {
    if ( $input === '' ) { return ''; }

    if ( is_string( $input ) ) {
        $decoded = json_decode( $input, true );
        
        if ( is_array( $decoded ) ) {
            $sanitized = array();
            $allowed_units = array( 'px', '%', 'em', 'rem', 'vh', 'vw' );
            $fallback_unit = isset( $decoded['unit'] ) && in_array( $decoded['unit'], $allowed_units, true ) ? $decoded['unit'] : 'px';
            
            $sanitized['desktop'] = ( isset( $decoded['desktop'] ) && is_numeric( $decoded['desktop'] ) ) ? floatval( $decoded['desktop'] ) : '';
            $sanitized['tablet']  = ( isset( $decoded['tablet'] )  && is_numeric( $decoded['tablet'] ) )  ? floatval( $decoded['tablet'] )  : '';
            $sanitized['mobile']  = ( isset( $decoded['mobile'] )  && is_numeric( $decoded['mobile'] ) )  ? floatval( $decoded['mobile'] )  : '';

            foreach ( array( 'desktop', 'tablet', 'mobile' ) as $device ) {
                $unit_key = "{$device}_unit";
                $unit = isset( $decoded[ $unit_key ] ) ? $decoded[ $unit_key ] : $fallback_unit;

                $sanitized[ $unit_key ] = in_array( $unit, $allowed_units, true ) ? $unit : $fallback_unit;
            }
            
            return wp_json_encode( $sanitized );
        }
    }
    
    return is_numeric( $input ) ? floatval( $input ) : '';
}

function newsair_json( $string ) {
    return is_string( $string ) && is_array( json_decode( $string, true ) ) ? true : false;
}