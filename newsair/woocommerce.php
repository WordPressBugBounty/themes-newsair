<?php
/**
 * The template for displaying all WooCommerce pages.
 *
 * @package Newsair
 */
get_header(); ?>
<!--==================== ti breadcrumb section ====================-->

<!-- #main -->
<main id="content" class="woo-class">
	<div class="container">
		<!--==================== breadcrumb section ====================-->
		<?php do_action('newsair_action_archive_page_title'); ?>
		<div class="row">
			<div class="col-md-12">
				<?php woocommerce_content(); ?>
			</div>
		</div><!-- .container -->
	</div>	
</main><!-- #main -->
<?php get_footer(); ?>