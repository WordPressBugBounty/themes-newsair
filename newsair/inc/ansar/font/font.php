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

function newsair_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
        
        $font_families = array(
            'DM Sans:300,400,500,700',
            'Open Sans:300,400,600,700',
            'Kalam:300,400,700',
            'Rokkitt:300,400,700',
            'Jost:300,400,500,700',
            'Poppins:300,400,500,600,700',
            'Lato:300,400,700',
            'Noto Serif:300,400,700',
            'Raleway:300,400,500,700',
            'Roboto:300,400,500,700',
            'Inter Tight:100,200,300,400,500,600,700,800,900',
        );

        // Build the URL
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'display' => 'swap',
            'subset' => 'latin,latin-ext',
        );
 
    return apply_filters( 'newsair_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );

    return $fonts_url;
}