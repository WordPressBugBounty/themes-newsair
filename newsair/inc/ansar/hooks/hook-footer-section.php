<?php if (!function_exists('newsair_footer_social_section')) :
/**
 *  Header
 *
 * @since newsair pro
 *
 */
function newsair_footer_social_section() { 

  $footer_social_icon_enable = get_theme_mod('footer_social_icon_enable',true);
  if($footer_social_icon_enable == 1) { ?>
    <ul class="bs-social justify-content-center justify-content-md-end">
      <?php
      $social_icons = get_theme_mod( 'newsair_footer_social_icons', newsair_get_social_icon_default() );
      $social_icons = json_decode( $social_icons );
      if ( $social_icons != '' ) {
        foreach ( $social_icons as $social_item ) {
          $social_icon = ! empty( $social_item->icon_value ) ? apply_filters( 'newsair_translate_single_string', $social_item->icon_value, 'Footer section' ) : '';
          $open_new_tab = ! empty( $social_item->open_new_tab ) ? apply_filters( 'newsair_translate_single_string', $social_item->open_new_tab, 'Footer section' ) : '';
          $social_link = ! empty( $social_item->link ) ? apply_filters( 'newsair_translate_single_string', $social_item->link, 'Footer section' ) : '';
          ?>
          <li>
            <a <?php if ($open_new_tab == 'yes') { echo 'target="_blank"';} ?> href="<?php echo esc_url( $social_link ); ?>">
              <i class="<?php echo esc_attr( $social_icon ); ?>"></i>
            </a>
          </li>
          <?php
        }
      }
      ?>
    </ul>
  <?php }
}
endif;
add_action('newsair_action_footer_social_section', 'newsair_footer_social_section', 2);


if( ! function_exists( 'newsair_footer_copyright' ) ) :
  function newsair_footer_copyright() { 
    $hide_copyright = esc_attr(get_theme_mod('hide_copyright',true));
    $newsair_footer_copyright = get_theme_mod( 'newsair_footer_copyright','Copyright &copy; All rights reserved' );
    if ($hide_copyright == true ) { ?>
      <div class="copyright-overlay">
        <div class="container">
          <div class="row">
            <?php if ( has_nav_menu( 'footer' ) ) { ?>
              <div class="col-md-6 text-md-start text-xs">
                <p class="mb-0">
                  <span class="text"><?php echo esc_html($newsair_footer_copyright); ?></span>
                  <span class="sep"> | </span>
                  <?php  printf(esc_html__('%1$s by %2$s.', 'newsair'), '<a href="https://themeansar.com/free-themes/newsair/" target="_blank">Newsair</a>', '<a href="https://themeansar.com" target="_blank">Themeansar</a>'); ?>
                </p>
              </div>
              <div class="col-md-6 text-md-end text-xs">
                <?php wp_nav_menu( array(
                'theme_location' => 'footer',
                'container'  => 'nav-collapse collapse navbar-inverse-collapse',
                'menu_class' => 'info-right',
                'fallback_cb' => 'newsair_fallback_page_menu',
                'walker' => new newsair_nav_walker()
                ) ); ?>
              </div>
            <?php } else { ?>
              <div class="col-md-12 text-center">
                <p class="mb-0">
                  <span class="text"><?php echo esc_html($newsair_footer_copyright); ?></span>
                  <span class="sep"> | </span>
                  <?php  printf(esc_html__('%1$s by %2$s.', 'newsair'), '<a href="https://themeansar.com/free-themes/newsair/" target="_blank">Newsair</a>', '<a href="https://themeansar.com" target="_blank">Themeansar</a>'); ?>
                </p>
              </div>
            <?php } ?>
              </div>
            </div>
        </div>
      </div> 
    <?php } 
  }
endif;
add_action( 'newsair_action_footer_copyright', 'newsair_footer_copyright' );

if( ! function_exists( 'newsair_footer_bottom_area' ) ) :
  function newsair_footer_bottom_area() { ?>
  <!--Start bs-footer-bottom-area-->
   <div class="bs-footer-bottom-area">
      <div class="container">
        <div class="divide-line"></div>
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="footer-logo text-xs">
              <!-- Display the Custom Logo -->
              <div class="site-logo">
                <?php if(get_theme_mod('custom_logo') !== ""){ the_custom_logo(); } ?>
              </div>
              <?php if (display_header_text()) { ?>
                  <div class="site-branding-text">
                    <p class="site-title-footer"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <p class="site-description-footer mb-3"><?php bloginfo('description'); ?></p>
                  </div>
              <?php } ?>
            </div>
          </div>
          <!--col-md-3-->
          <div class="col-md-6">
            <?php do_action('newsair_action_footer_social_section'); ?>
          </div>
          <!--/col-md-3-->
        </div>
        <!--/row-->
      </div>
      <!--/container-->
    </div>
    <!--End bs-footer-bottom-area-->
  <?php }
endif;
add_action( 'newsair_action_footer_bottom_area', 'newsair_footer_bottom_area' );