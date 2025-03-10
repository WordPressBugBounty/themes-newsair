<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Newsair
 */
?>
<!--==================== breadcrumb section ====================-->
	<!-- Page Area -->
	<?php if( class_exists('woocommerce') && (is_account_page() || is_cart() || is_checkout())) { ?>
		<div class="col-md-12">
			<div class="mg-card-box wd-back">
		<?php if (have_posts()) {  while (have_posts()) : the_post(); ?>
	<?php the_content(); endwhile; } } else { ?>

		<?php $newsair_page_layout = get_theme_mod('newsair_page_layout','page-align-content-right');
		if($newsair_page_layout == "page-align-content-left"){ ?>
			<aside class="col-md-4 sidebar-left">
				<?php get_sidebar();?>
			</aside>
		<?php } ?>
		<div class="<?php echo esc_attr(($newsair_page_layout == "page-full-width-content") ? 'col-lg-12' : 'col-lg-8 content-right'); ?>">
			<div class="mg-card-box wd-back">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
						<figure class="post-thumbnail">
							<?php the_post_thumbnail( 'full', array( 'class'=>'img-responsive' ) ); ?>
						</figure>
						<?php the_content();
						if ( comments_open() || get_comments_number() ) : ?>
							<?php comments_template(); ?>
						<?php endif; ?>

						<?php newsair_edit_link(); ?>

					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<!--Sidebar Area-->
		<?php if($newsair_page_layout == "page-align-content-right") { ?>
			<!--sidebar-->
			<!--col-md-4-->
			<aside class="col-md-4 sidebar-right">
				<?php get_sidebar(); ?>
			</aside>
			<!--/col-md-4-->
			<!--/sidebar-->
		<?php }
	} ?>
	<!--Sidebar Area-->
<?php