<?php
/**
 * The template for displaying the Search Result.
 * @package Newsair
 */
?>
<div class="col-md-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'8' ); ?>">
    <h2><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','newsair'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if ( have_posts() ) { /* Start the Loop */
        while ( have_posts() ) { the_post(); ?>
        <div class="bs-blog-post list-blog">
            <div class="bs-blog-thumb lg back-img">
                <?php newsair_post_image_display_type($post); ?>               
            </div> 
            <article class="small">
                <?php newsair_post_categories(); ?>
                <h4 class="entry-title title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                <?php newsair_post_meta(); ?> 
                <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
            </article> 
        </div> 
        <?php } newsair_page_pagination(); } else { ?> 
            <h2><?php esc_html_e( "Nothing Found", 'newsair' ); ?></h2>
            <div class="">
                <p><?php esc_html_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'newsair' ); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .blog_con_mn -->
        <?php } ?>
    </div>  
</div>