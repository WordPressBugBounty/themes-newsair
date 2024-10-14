<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Newsair
 */
?>
  <!-- </main> -->
    <?php do_action('newsair_action_footer_missed_section'); ?>
    <!--==================== FOOTER AREA ====================-->
    <?php $newsair_footer_widget_background = get_theme_mod('newsair_footer_widget_background');
    $newsair_footer_overlay_color = get_theme_mod('newsair_footer_overlay_color');
    $style = !empty($newsair_footer_widget_background) ? "background-image:url('".esc_url($newsair_footer_widget_background)."');" : ""; ?>
    <footer class="footer back-img" style="<?php echo $style; ?>">
        <div class="overlay" style="background-color: <?php echo esc_html($newsair_footer_overlay_color);?>;">
            <?php if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
            <!--Start bs-footer-widget-area-->
            <div class="bs-footer-widget-area">
                <div class="container">
                    <div class="row">
                        <?php  dynamic_sidebar( 'footer_widget_area' ); ?>
                    </div>
                    <!--/row-->
                </div>
                <!--/container-->
            </div>
            <!--End bs-footer-widget-area-->
            <?php } do_action('newsair_action_footer_bottom_area') ?>             
            <div class="bs-footer-copyright">
                <?php do_action('newsair_action_footer_copyright');?>
            </div>
        </div>
        <!--/overlay-->
    </footer>
    <!--/footer-->
</div>
<!--/wrapper-->
<?php 
  //Scroll To Top 
  newsair_scrolltoup();
  //Search Popup
  newsair_search_popup();
  //wp_footer
  wp_footer();
?>
</body>
</html>