<?php
function theme_options_color() {
	/*=================== Top Bar Color ===================*/
	$top_bar_header_background_color = get_theme_mod('top_bar_header_background_color','');
	$body_background_color = get_theme_mod( 'body_background_color','#eff2f7' );
	/*=================== Menus Color ===================*/
	$menu_area_bg_color = get_theme_mod('menu_area_bg_color');	
	?>
	<style type="text/css">
		:root {
			--wrap-color: <?php echo esc_attr($body_background_color); ?>
		}
	/*==================== Site Logo ====================*/
	.bs-header-main .navbar-brand img, .bs-headfour .navbar-header img{
		width:<?php echo esc_attr(get_theme_mod('desktop_side_logo_width','250').'px'); ?>;
		height: auto;
	}
	@media (max-width: 991.98px)  {
		.m-header .navbar-brand img, .bs-headfour .navbar-header img{
			width:<?php echo esc_attr(get_theme_mod('tablet_side_logo_width','200').'px'); ?>; 
		}
	}
	@media (max-width: 575.98px) {
		.m-header .navbar-brand img, .bs-headfour .navbar-header img{
			width:<?php echo esc_attr(get_theme_mod('mobile_side_logo_width','150').'px'); ?>; 
		}
	}
	/*==================== Site title and tagline ====================*/
	.site-title a, .site-description{
		color: #<?php echo esc_attr(get_theme_mod('header_textcolor', "000")); ?>;
	}
	body.dark .site-title a, body.dark .site-description{
		color: <?php echo esc_attr(get_theme_mod('header_text_dark_color', "#fff")); ?>;
	}
	/*==================== Top Bar color ====================*/
	.bs-head-detail, .bs-headtwo .bs-head-detail, .mg-latest-news .bn_title{
		background: <?php echo esc_attr($top_bar_header_background_color); ?>;
	}
	/*==================== Menu color ====================*/
	.bs-default .bs-menu-full{
		background: <?php echo esc_attr($menu_area_bg_color); ?>;
	} 
	.homebtn a {
		color: <?php echo esc_attr($menu_area_bg_color); ?>;
	}
	/*==================== Footer color ====================*/
	footer .bs-widget p, .site-branding-text .site-title-footer a, .site-branding-text .site-title-footer a:hover, .site-branding-text .site-description-footer, .site-branding-text .site-description-footer:hover, footer .bs-widget h6, footer .mg_contact_widget .bs-widget h6{
		color: <?php echo esc_attr(get_theme_mod('newsair_footer_text_color')); ?>;
	}
	footer .bs-footer-copyright .copyright-overlay{
		background: <?php echo esc_attr(get_theme_mod('newsair_footer_copy_bg')); ?>;
	}
	footer .bs-footer-copyright p, footer .bs-footer-copyright a {
		color: <?php echo esc_attr(get_theme_mod('newsair_footer_copy_text')); ?>;
	}
	@media (max-width: 991.98px)  { 
		.bs-default .bs-menu-full{
			background: var(--box-color);
		}
	}
	/*=================== Slider Color ===================*/
	.multi-post-widget .bs-blog-post.three.sm .title{
		font-size:<?php echo newsair_get_option('newsair_trend_title_fontsize_desktop').'px'; ?>;
	}
	.bs-slide .inner .title{
		font-size:<?php echo newsair_get_option('slider_title_fontsize_desktop').'px'; ?>;
	} 
	@media (max-width: 991.98px)  {
		.bs-slide .inner .title{ 
			font-size:<?php echo newsair_get_option('slider_title_fontsize_tablet').'px'; ?>;
		}
		.multi-post-widget .bs-blog-post.three.sm .title{
			font-size:<?php echo newsair_get_option('newsair_trend_title_fontsize_tablet').'px'; ?>;
		}
	}
	@media (max-width: 575.98px) {
		.bs-slide .inner .title{ 
			font-size:<?php echo newsair_get_option('slider_title_fontsize_mobile').'px'; ?>;
		}
		.multi-post-widget .bs-blog-post.three.sm .title{
			font-size:<?php echo newsair_get_option('newsair_trend_title_fontsize_mobile').'px'; ?>;
		}
	}
	/*=================== Featured Story ===================*/
	.postcrousel .bs-blog-post .title{
		font-size: <?php echo newsair_get_option('featured_story_title_fontsize_desktop').'px'; ?>;
	} 
	@media (max-width:991px) {
		.postcrousel .bs-blog-post .title{ 
			font-size: <?php echo newsair_get_option('featured_story_title_fontsize_tablet').'px'; ?>; 
		}
	}
	@media (max-width:576px) {
		.postcrousel .bs-blog-post .title{ 
			font-size: <?php echo newsair_get_option('featured_story_title_fontsize_mobile').'px'; ?>;
		}
	}
	</style>
<?php } 
 
function custom_typography_function() { ?>
	<style>	:root{
		--title-font: <?php echo esc_attr(get_theme_mod('site_title_fontfamily','Inter Tight')); ?>;
		--title-weight: <?php echo esc_attr(get_theme_mod('site_title_fontweight','700')); ?>;
		--menus-font: <?php echo esc_attr(get_theme_mod('newsair_menu_fontfamily','Inter Tight')); ?>;
	}

	.site-branding-text p, .bs-default .site-branding-text .site-title, .bs-default .site-branding-text .site-title a{
		font-weight: var(--title-weight);
		font-family: var(--title-font);
	}
	.navbar-wp .navbar-nav > li> a, .navbar-wp .dropdown-menu > li > a{ 
		font-family: var(--menus-font);
	}
	</style>
<?php }