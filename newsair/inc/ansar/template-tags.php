<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Newsair
 */

if (!function_exists('newsair_post_categories')) :
    function newsair_post_categories($separator = '&nbsp')
    {
        if ( 'post' === get_post_type() ) {
            $categories = wp_get_post_categories(get_the_ID());
            if(!empty($categories)){
                ?>
                <div class="bs-blog-category">
                    <?php
                    foreach($categories as $c){
                        $style = '';
                        $cat = get_category( $c );
                        // $color = get_term_meta($cat->term_id, 'category_color', true);
                        $color = get_theme_mod('category_' .absint($cat->term_id). '_color' , '#005aff');
                        if($color){
                            $style = "background-color:".esc_attr($color);
                        }
                        ?>
                        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" style="<?php echo esc_attr($style);?>" id="<?php echo 'category_' .absint($cat->term_id). '_color'; ?>" >
                            <?php echo esc_html($cat->cat_name);?>
                        </a>
                    <?php } ?>
                 </div>
                <?php
            }
        }
        
    }
endif;

/*Save Date Formate*/
if ( ! function_exists( 'newsair_date_content' ) ) :
    function newsair_date_content($date_format = 'default-date') { ?>
    <?php if($date_format == 'default-date'){ ?>
        <span class="bs-blog-date">
            <a href="<?php echo esc_url(get_month_link(esc_html(get_post_time('Y')),esc_html(get_post_time('m')))); ?>"><time datetime=""><?php echo get_the_date('M'); ?> <?php echo get_the_date('j,'); ?> <?php echo get_the_date('Y'); ?></time></a>
        </span>
    <?php } else{ ?>
        <span class="bs-blog-date">
            <a href="<?php echo esc_url(get_month_link(esc_html(get_post_time('Y')),esc_html(get_post_time('m')))); ?>"><time datetime=""><?php echo esc_html(get_the_date()); ?></time></a>
        </span>
    <?php } ?>
    <?php }
endif;

/*Save Author Content*/
if ( ! function_exists( 'newsair_author_content' ) ) :
    function newsair_author_content() { ?>
        <span class="bs-author">
            <a class="auth" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> 
            <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?><?php the_author(); ?>
            </a> 
        </span>
    <?php }
endif;

/*Save Category fields*/
if(!function_exists('newsair_save_category_fields')):
    function newsair_save_category_fields($term_id) {
        if ( isset( $_POST['category_color'] ) && ! empty( $_POST['category_color']) ) {
            update_term_meta( $term_id, 'category_color', sanitize_hex_color( $_POST['category_color'] ) );
        }else{
            delete_term_meta( $term_id, 'category_color' );
        }
    }
endif;
add_action( 'created_category', 'newsair_save_category_fields' , 10, 3 );
add_action( 'edited_category', 'newsair_save_category_fields' , 10, 3 );


if (!function_exists('newsair_post_meta')) :

    function newsair_post_meta() {
        $global_post_date = get_theme_mod('global_post_date_author_setting','show-date-author');
        $newsair_global_comment_enable = get_theme_mod('newsair_global_comment_enable',false); 
        $page_meta_date_swichter = esc_attr(get_theme_mod('page_meta_date_swichter', 'default-date'));?>
        <div class="bs-blog-meta">
            <?php if($global_post_date =='show-date-author') {
                newsair_author_content();
                newsair_date_content($page_meta_date_swichter);        
            } elseif($global_post_date =='show-date-only') { ?> 
                <?php newsair_date_content($page_meta_date_swichter);
            } elseif($global_post_date =='show-author-only') {
                newsair_author_content();
            } elseif($global_post_date =='hide-date-author') { }
            if($newsair_global_comment_enable == true) { ?>
                <span class="comments-link"> 
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        if ( get_comments_number() == 0 ) {
                            esc_html_e(  __('No Comments', 'newsair') );
                        } else {
                            echo get_comments_number() . ' ';
                            esc_html_e( get_comments_number() == 1 ? __('Comment', 'newsair') : __('Comments', 'newsair') );
                        } ?>
                    </a>
                </span>
            <?php } ?>
            <?php newsair_edit_link(); ?>
        </div>
        <?php
    }
endif; 

if ( ! function_exists( 'newsair_posted_content' ) ) :
    function newsair_posted_content() { 
      $newsair_blog_content  = get_theme_mod('newsair_blog_content','excerpt');

        if ( 'excerpt' == $newsair_blog_content ){
            $newsair_excerpt = newsair_the_excerpt( absint( 18) );
            if ( !empty( $newsair_excerpt ) ) :                   
                echo wp_kses_post( wpautop( $newsair_excerpt ) );
            endif; 
        } else { 
            the_content( __('Read More','newsair') );
        }
    }
endif;

if ( ! function_exists( 'newsair_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     */
    function newsair_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( get_the_excerpt($post_obj) ) ) {
            $source_content = get_the_excerpt($post_obj);
        } 
        // Check if non-breaking space exists in the text with variations
        if (preg_match('/\s*(&nbsp;|\xA0)\s*/u', $source_content)) {
            // Remove non-breaking space and its variations from the text
            $source_content = preg_replace('/\s*(&nbsp;|\xA0)\s*/u', ' ', $source_content);
            
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;
    }
endif;

if ( ! function_exists( 'newsair_breadcrumb_trail' ) ) :
    /**
     * Theme default breadcrumb function.
     *
     * @since 1.0.0
     */
    function newsair_breadcrumb_trail() {
        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            // load class file
            require_once get_template_directory() . '/inc/ansar/breadcrumb-trail/breadcrumb-trail.php';
        }

        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );
    }
    add_action( 'newsair_breadcrumb_trail_content', 'newsair_breadcrumb_trail' );
endif;


if( ! function_exists( 'newsair_breadcrumb' ) ) :
    /**
     *
     * @package newsair
     */
    function newsair_breadcrumb() {
        if ( is_front_page() || is_home() ) return;
        $breadcrumb_settings = get_theme_mod('breadcrumb_settings','true');
        if($breadcrumb_settings == true) {
        $newsair_site_breadcrumb_type = get_theme_mod('newsair_site_breadcrumb_type','default');
            ?>
            <div class="bs-breadcrumb-section">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <?php if($newsair_site_breadcrumb_type == 'yoast') {
                                        if( function_exists( 'yoast_breadcrumb' ) ) {
                                            yoast_breadcrumb();
                                        }
                                    }
                                    elseif($newsair_site_breadcrumb_type == 'navxt') {
                                        if( function_exists( 'bcn_display' ) ) {
                                            bcn_display();
                                        }
                                    }
                                    elseif($newsair_site_breadcrumb_type == 'rankmath') {
                                        if( function_exists( 'rank_math_the_breadcrumbs' ) ) {
                                            rank_math_the_breadcrumbs();
                                        }                                        
                                    }
                                    else {
                                        do_action( 'newsair_breadcrumb_trail_content' );
                                    }
                                    ?> 
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <?php } 
    }
endif;
add_action( 'newsair_breadcrumb_content', 'newsair_breadcrumb' );


if( ! function_exists( 'newsair_add_menu_description' ) ) :
    
    function newsair_add_menu_description( $item_output, $item, $depth, $args ) {
        if($args->theme_location != 'primary') return $item_output;
        
        if ( !empty( $item->description ) ) {
            $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-link-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
        }
        return $item_output;
    }
    add_filter( 'walker_nav_menu_start_el', 'newsair_add_menu_description', 10, 4 );
endif;

if (!function_exists('newsair_page_pagination')) :

    function newsair_page_pagination() {
        ?>
             <div class="col-md-12 text-center d-md-flex justify-content-between">
            <?php //Previous / next page navigation
                $prev_text =  (is_rtl()) ? "right" : "left";
                $next_text =  (is_rtl()) ? "left" : "right";
                
                the_posts_pagination( array(
                        'prev_text'          => '<i class="fas fa-angle-'.$prev_text.'"></i>',
                        'next_text'          => '<i class="fas fa-angle-'.$next_text.'"></i>',
                    ) 
                );
            ?>
            <div class="navigation"><p><?php posts_nav_link(); ?></p></div>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'newsair_header_right_nav_content' ) ) :
    function newsair_header_right_nav_content() { 
        newsair_header_search();
        newsair_header_dark_switcher();
        newsair_header_subs();
        newsair_header_cart();
        newsair_header_sidebar();
    }
endif;

if ( ! function_exists( 'newsair_header_search' ) ) :
    function newsair_header_search() {
        $newsair_menu_search  = get_theme_mod('newsair_menu_search',true); 
        if($newsair_menu_search == true) { ?>
          <a class="msearch ml-auto" data-bs-target="#exampleModal"  href="#" data-bs-toggle="modal"> 
            <i class="fas fa-search"></i> 
          </a>
        <?php }
    }
endif;

if ( ! function_exists( 'newsair_header_dark_switcher' ) ) :
    function newsair_header_dark_switcher() {
        $newsair_lite_dark_switcher = get_theme_mod('newsair_lite_dark_switcher',true);
        if($newsair_lite_dark_switcher == true){ 
          if ( isset( $_COOKIE["newsair-site-mode-cookie"] ) ) {
            $newsair_skin_mode = $_COOKIE["newsair-site-mode-cookie"];
          } else {
            $newsair_skin_mode = get_theme_mod( 'newsair_skin_mode', 'defaultcolor' );
          } ?>
          <label class="switch" for="switch">
            <input type="checkbox" name="theme" id="switch" class="<?php echo esc_attr( $newsair_skin_mode ); ?>" data-skin-mode="<?php echo esc_attr( $newsair_skin_mode ); ?>">
            <span class="slider"></span>
          </label>
        <?php }
    }
endif;

if ( ! function_exists( 'newsair_header_subs' ) ) :
    function newsair_header_subs() {
        $subsc_link = get_theme_mod('newsair_subsc_link', '#'); 
        $newsair_menu_subscriber  = get_theme_mod('newsair_menu_subscriber',true);
        $subsc_icon  = get_theme_mod('subsc_icon_layout','play');
        $subsc_open_in_new  = get_theme_mod('subsc_open_in_new',true) == true ? ' target="_blank"':'';
        $subs_title  = get_theme_mod('subs_news_title','Subscribe');

        if($newsair_menu_subscriber == true) { ?> 
            <a href="<?php echo esc_url($subsc_link) ?>" class="subscribe-btn"<?php echo esc_attr($subsc_open_in_new) ?>>
            <i class="fas fa-<?php echo esc_html($subsc_icon) ?>"></i> 
            <?php if(!empty($subs_title)){
                echo '<span>'.$subs_title.'</span>';
            } ?>
            </a>
        <?php } 
    }
endif;

if ( ! function_exists( 'newsair_header_cart' ) ) :
    function newsair_header_cart() {
        if( class_exists( 'WooCommerce' ) ) { 
        $enable_cart  = get_theme_mod('newsair_cart_enable',1);
            if($enable_cart == 1){ ?>
                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="bs-cart" > 
                    <span class='bs-cart-total'>
                        <?php echo WC()->cart->get_cart_subtotal(); ?>
                    </span> 
                    <span class="bs-cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    </span>
                    <span class='bs-cart-count'>
                        <?php echo WC()->cart->get_cart_contents_count(); ?>
                    </span>
                </a>
            <?php
            } 
        }  
    }
endif;

if ( ! function_exists( 'newsair_header_sidebar' ) ) :
    function newsair_header_sidebar() {
        $newsair_menu_sidebar  = get_theme_mod('newsair_menu_sidebar',true);
        if($newsair_menu_sidebar == true){ ?>
            <!-- Off Canvas -->
            <a href="#" class="mneu-sidebar offcbtn d-none d-lg-block" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" role="button" aria-controls="offcanvas-start" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </a>
            <!-- /Off Canvas -->
        <?php }
    }
endif;