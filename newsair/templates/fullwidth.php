<?php
/**
 * Template Name: Full Width Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package newsair
 */
get_header(); ?>
<main id="content" class="full-width-class content">
  <div class="container">
    <!--==================== breadcrumb section ====================-->
    <?php do_action('newsair_action_archive_page_title'); ?>
    <div class="row">
      <div class="col-md-12">
      <div class="bs-card-box padding-20">
      <?php while ( have_posts() ) : the_post();
        if(has_post_thumbnail()) { ?>
          <figure class="post-thumbnail">
            <?php the_post_thumbnail('full', array('class' => 'img-fluid attachment-full size-full')); ?>					
          </figure>
        <?php }
				the_content(); 
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
          newsair_edit_link();
				endif;
			endwhile; // End of the loop. ?>
      </div>
      </div>
    </div>
  </div>
</main>
<?php
get_footer();