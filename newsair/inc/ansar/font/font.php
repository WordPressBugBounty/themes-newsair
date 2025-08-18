<?php
/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'newsair_theme_fonts',1 );
add_action( 'enqueue_block_editor_assets', 'newsair_theme_fonts',1 );
add_action( 'customize_preview_init', 'newsair_theme_fonts', 1 );

function newsair_theme_fonts() {
    $fonts_url = newsair_fonts_url();
    // Load Fonts if necessary.
    if ( $fonts_url ) {
        require_once get_theme_file_path( 'inc/ansar/font/wptt-webfont-loader.php' );
        wp_enqueue_style( 'newsair-theme-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
    }
}

function newsair_get_google_fonts_list() {
    return array(
        'DM Sans',
        'Open Sans',
        'Kalam',
        'Rokkitt',
        'Jost',
        'Poppins',
        'Lato',
        'Noto Serif',
        'Raleway',
        'Roboto',
        'Inter Tight',
    );
}

function newsair_fonts_url() {
    $fonts_url = '';
    
    // Step 1: Get font names
    $fonts = newsair_get_google_fonts_list();
    
    // Step 2: Set a common weight string
    $common_weights = '100,200,300,400,500,600,700,800,900';
    
    // Step 3: Format fonts for Google Fonts URL
    $font_families = array();
    foreach ( $fonts as $font_name ) {
        $font_families[] = $font_name . ':' . $common_weights;
    }

    // Step 4: Generate the full Google Fonts URL
    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'display' => 'swap',
        'subset'  => 'latin,latin-ext',
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    return $fonts_url;
}