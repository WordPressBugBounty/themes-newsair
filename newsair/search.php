<?php
/**
 * The template for displaying search results pages.
 *
 * @package Newsair
 */
get_header(); ?>
<!--==================== main content section ====================-->
<div id="content">
    <!--container-->
    <div class="container">
        <!--==================== breadcrumb section ====================-->
        <?php do_action('newsair_action_archive_page_title'); ?>
        <!--row-->
        <div class="row">
            <?php get_template_part('template-parts/content', 'search'); ?>
            <aside class="col-md-4">
                <?php get_sidebar();?>
            </aside>
        </div><!--/row-->
    </div><!--/container-->
</div>
<?php get_footer(); ?>