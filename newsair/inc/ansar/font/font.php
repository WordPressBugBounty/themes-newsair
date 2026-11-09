<?php
/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'newsair_theme_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'newsair_theme_fonts', 1 );

function newsair_theme_fonts() {
    $url = newsair_fonts_url();
    if ( $url ) {
        require_once get_theme_file_path( 'inc/ansar/font/wptt-webfont-loader.php' );
        wp_enqueue_style( 'newsair-theme-fonts', wptt_get_webfont_url( $url ), array(), NEWSAIR_THEME_VERSION );
    }
}

function newsair_fonts_url() {
    $fonts = array(
        'Inter Tight' => array( 400 , 500 , 600 , 700 , 800 ),
        'DM Sans'        => array( 300 , 400 , 500 , 600 ),
    );


    $requested = array(
        array( newsair_get_option( 'site_title_fontfamily' ), newsair_get_option( 'site_title_fontweight' ) ),
        array( newsair_get_option( 'newsair_menu_fontfamily' ), get_theme_mod( 'newsair_menu_fontweight', '500' ) ),
    );

    foreach ( $requested as list( $font, $weight ) ) {
        $font   = trim( explode( ',', (string) $font )[0], " \t\n\r\0\x0B'\"" );
        $weight = absint( $weight ) ?: 400;

        if ( $font && $weight >= 100 && $weight <= 900 ) {
            $fonts[ $font ][] = $weight;
        }
    }

    $fonts = apply_filters( 'newsair_google_fonts', $fonts );
    ksort( $fonts );

    $families = array();

    foreach ( $fonts as $font => $weights ) {
        $weights = array_unique( array_filter( array_map( 'absint', (array) $weights ) ) );
        sort( $weights, SORT_NUMERIC );

        if ( $font && $weights ) {
            $families[] = 'family=' . urlencode( $font ) . ':wght@' . implode( ';', $weights );
        }
    }

    return $families ? 'https://fonts.googleapis.com/css2?' . implode( '&', $families ) . '&display=swap' : '';
}