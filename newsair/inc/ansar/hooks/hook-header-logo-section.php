<?php
if (!function_exists('newsair_header_logo_section')) :
/**
 *  Header
 *
 * @since newsair
 *
 */
function newsair_header_logo_section()
{

  $banner_ad_image = newsair_get_option('banner_ad_image');
  $center_logo = esc_attr(get_theme_mod('newsair_center_logo_title',false))== true ? '12 text-center' : '4 text-start';
  ?>
  <!-- Main Menu Area-->        
  <div class="bs-header-main">
    <div class="inner<?php if(empty($banner_ad_image)){ echo ' responsive';}?>">
      <div class="container">
        <div class="row align-items-center">
          <div class="navbar-header col-lg-<?php echo esc_attr($center_logo);?> d-none d-lg-block">
              <!-- Display the Custom Logo -->
              <div class="site-logo">
                  <?php if(get_theme_mod('custom_logo') !== ""){ the_custom_logo(); } ?>
              </div>

              <div class="site-branding-text <?php echo esc_attr( display_header_text() ? ' ' : 'd-none'); ?>">
                <?php if (is_front_page() || is_home()) { ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
                <?php } else { ?>
                  <p class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
                <?php } ?>
                  <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
              </div>
            </div>
            <?php do_action('newsair_action_banner_advertisement'); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /Main Menu Area-->
<?php 
}
endif;
add_action('newsair_action_header_logo_section', 'newsair_header_logo_section', 4);