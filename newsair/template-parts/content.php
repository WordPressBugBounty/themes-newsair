<?php
/**
 * The template for displaying the content.
 * @package Newsair
 */
?>
<div class="blog-list">
    <?php 
    while(have_posts()){ the_post(); ?>
    <?php get_template_part('sections/content','data'); ?>
    <?php } newsair_page_pagination(); ?>
</div>