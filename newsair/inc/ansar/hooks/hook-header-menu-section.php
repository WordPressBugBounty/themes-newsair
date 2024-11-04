<?php
if (!function_exists('newsair_header_menu_section')) :
/**
 *  Header
 *
 * @since newsair
 *
 */
function newsair_header_menu_section() {
    
  $header_menu_layout = get_theme_mod('header_menu_layout','default');
  $home_icon_disable = get_theme_mod('newsair_home_icon',true);
  $sticky_header = get_theme_mod('sticky_header_toggle', true) == true ? 'sticky-header' : '';
  ?> 
  <div class="bs-menu-full <?php echo esc_attr($sticky_header); ?>">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-wp">
        <?php if($home_icon_disable == true){ ?>
        <!-- Home Icon -->
        <div class="active homebtn home d-none d-lg-flex">
          <a class="title" title="Home" href="<?php echo esc_url( home_url() )?>">
            <span class="fa-solid fa-house-chimney"></span>
          </a>
        </div>
        <!-- /Home Icon -->
        <?php } ?>
        <!-- Mobile Header -->
        <div class="m-header align-items-center justify-content-justify">
          <!-- navbar-toggle -->
          <button id="nav-btn" class="navbar-toggler x collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbar-wp" aria-controls="navbar-wp" aria-expanded="false"
            aria-label="<?php esc_attr_e('Toggle navigation','newsair'); ?>">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-header">
            <!-- Display the Custom Logo -->
            <div class="site-logo">
              <?php if(get_theme_mod('custom_logo') !== ""){ the_custom_logo(); } ?>
            </div>
            <div class="site-branding-text <?php echo esc_attr( display_header_text() ? ' ' : 'd-none'); ?>">
              <div class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></div>
              <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
            </div>
          </div>
          <div class="right-nav"> 
          <!-- /navbar-toggle -->
            <?php newsair_header_search(); ?>
          </div>
        </div>
        <!-- /Mobile Header -->
        <div class="collapse navbar-collapse" id="navbar-wp">
          <?php 
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'  => 'nav-collapse collapse',
            'menu_class' => 'me-auto nav navbar-nav'.(is_rtl() ? ' sm-rtl' :''),
            'fallback_cb' => 'newsair_fallback_page_menu',
            'walker' => new newsair_nav_walker()
          ) );
          ?>
        </div>
        <!-- Right nav -->
        <div class="desk-header right-nav pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center">
          <?php newsair_header_right_nav_content(); ?>
        </div>
        <!-- /Right nav -->
      </nav> <!-- /Navigation -->
    </div>
  </div>
  <?php
}
endif;
add_action('newsair_action_header_menu_section', 'newsair_header_menu_section', 6);