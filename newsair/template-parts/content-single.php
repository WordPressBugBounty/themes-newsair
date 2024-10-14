<?php
/**
 * The template for displaying the Single content.
 * @package Newsair
 */
?>
<!--==================== breadcrumb section ====================-->
<?php do_action('newsair_breadcrumb_content'); ?>
        <!--col-md-->
<?php $newsair_single_page_layout = get_theme_mod('newsair_single_page_layout','single-align-content-right');
if($newsair_single_page_layout == "single-align-content-left") { ?>
        <aside class="col-lg-3 sidebar-left">
                <?php get_sidebar();?>
        </aside>
<?php }  if($newsair_single_page_layout == "single-align-content-right" || $newsair_single_page_layout == "single-align-content-left" ){ ?>
	<div class="col-lg-9 single content-right">
<?php } elseif($newsair_single_page_layout == "single-full-width-content") { ?>
        <div class="col-md-12">
<?php } do_action('newsair_action_main_single_content'); ?>
      </div>
<?php if($newsair_single_page_layout == "single-align-content-right") { ?>
        <aside class="col-lg-3 sidebar-right">
                <?php get_sidebar();?>
        </aside>
<?php } ?>