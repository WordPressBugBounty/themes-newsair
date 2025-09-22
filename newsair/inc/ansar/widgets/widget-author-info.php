<?php add_action('admin_enqueue_scripts','newsair_author_widget_scripts');

function newsair_author_widget_scripts() {    

    wp_enqueue_media();

    wp_enqueue_script('news_author_widget_script', get_template_directory_uri() . '/js/widget-image.js', false, '1.0', true);

}
class newsair_author_info extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'newsair-author-widget',
            __( 'AR: Author Info', 'newsair' )
        );
    }

    function widget($args, $instance) {

        extract($args);

        $defaults = array(
            'title'    => '',
            'name'     => '',
            'desc'     => '',
            'image_uri'=> '',
            'facebook' => '',
            'twt'      => '',
            'insta'    => '',
            'youtube'  => '',
            'pntr'     => '',
            'lnk'      => '',
            'open_btnone_new_window' => 0,
        );
        
        $instance = wp_parse_args( (array) $instance, $defaults );

        echo $before_widget;
        
        $newsair_btnone_target = '_self';
        if( !empty($instance['open_btnone_new_window']) ):
            $newsair_btnone_target = '_blank';
        endif; ?>
        <div class="newsair-auhtor-widget">

        <?php if (!empty($instance['title'])){ ?>
                <!-- bs-sec-title -->
                <div class="bs-widget-title st1">
                    <h4 class="title"><?php echo esc_html($instance['title']); ?></h4>
                </div>
                <!-- // bs-sec-title -->
            <?php } ?>
            
            <div class="bs-author text-center">
                <?php  if( !empty($instance['image_uri']) ): ?>  
                    <img class="rounded-circle" src="<?php echo esc_url($instance['image_uri']); ?>" alt="<?php echo apply_filters('widget_title', $instance['name']); ?>" />
                <?php endif; ?>
                <h4><?php echo $instance['name']; ?></h4>
                <p><?php echo $instance['desc'] ?></p>
                
                <ul class="bs-social justify-content-center post-share-icons">
        
                    <?php if($instance['facebook'] !=''){?>
                    <li>
                        <a class="facebook" <?php if($instance['open_btnone_new_window']) { ?> target="_blank" <?php } ?>href="<?php echo esc_url($instance['facebook']); ?>">
                            <i class="fab  fa-facebook"></i>
                        </a>
                    </li>
                    <?php } if($instance['twt'] !=''){ ?>
                    <li>
                        <a class="x-twitter" <?php if($instance['open_btnone_new_window']) { ?>target="_blank" <?php } ?>href="<?php echo esc_url($instance['twt']);?>">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    </li>
                    <?php } if($instance['insta'] !=''){ ?>
                    <li>
                        <a class="instagram" <?php if($instance['open_btnone_new_window']) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($instance['insta']); ?>">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <?php } if($instance['youtube'] !=''){ ?>
                    <li>
                        <a class="youtube" <?php if($instance['open_btnone_new_window']) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($instance['youtube']); ?>">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <?php } if($instance['lnk'] !=''){ ?>
                    <li>
                        <a class="linkedin" <?php if($instance['open_btnone_new_window']) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($instance['lnk']); ?>">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </li>
                    <?php }  if($instance['pntr'] !=''){ ?>
                    <li>
                        <a class="pinterest" <?php if($instance['open_btnone_new_window']) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($instance['pntr']); ?>">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </li>
                    <?php } ?>
                </ul>   
            </div>
            </div>
        <?php
        echo $after_widget;
    }
    
    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        // Basic text fields
        $instance['title'] = sanitize_text_field( $new_instance['title'] ?? '' );
        $instance['name']  = sanitize_text_field( $new_instance['name'] ?? '' );

        // Description - lets keep it plain text but use textarea sanitizer
        $instance['desc'] = sanitize_textarea_field( $new_instance['desc'] ?? '' );

        // Image URL and social URLs — sanitize as URLs
        $instance['image_uri'] = esc_url_raw( $new_instance['image_uri'] ?? '' );
        $instance['facebook']  = esc_url_raw( $new_instance['facebook'] ?? '' );
        $instance['twt']       = esc_url_raw( $new_instance['twt'] ?? '' );
        $instance['insta']     = esc_url_raw( $new_instance['insta'] ?? '' );
        $instance['youtube']   = esc_url_raw( $new_instance['youtube'] ?? '' );
        $instance['pntr']      = esc_url_raw( $new_instance['pntr'] ?? '' );
        $instance['lnk']       = esc_url_raw( $new_instance['lnk'] ?? '' );

        // Checkbox — ensure it's always 0 or 1 (avoids undefined index / null)
        $instance['open_btnone_new_window'] = ! empty( $new_instance['open_btnone_new_window'] ) ? 1 : 0;

        return $instance;
    }

    function form($instance) {
        $defaults = array(
            'title' => 'Author Details',
            'name'  => '',
            'desc'  => '',
            'image_uri' => '',
            'facebook' => '',
            'twt' => '',
            'insta' => '',
            'youtube' => '',
            'pntr' => '',
            'lnk' => '',
            'open_btnone_new_window' => 0,
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ?>
           <p>
          <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title','newsair' ); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
          </p>
            <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Author Image', 'newsair'); ?></label><br/>

            <?php

            if ( !empty($instance['image_uri']) ) :

                echo '<img class="custom_media_image_team" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'newsair' ).'" /><br />';

            endif;

            ?>

            <input type="text" class="widefat custom_media_url_team" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button_team" id="custom_media_button_team" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','newsair'); ?>" style="margin-top:5px;">
        </p>

        <p>
          <label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name','newsair' ); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $instance['name'] ); ?>" />
          </p>

        <p>
          <label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e( 'Description','newsair' ); ?></label> 
           <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'desc' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'desc' )); ?>"><?php echo esc_textarea( $instance['desc'] ); ?></textarea>
        </p>
      
            
        <table>
            <tr>
                <td>
                    <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook Link', 'newsair'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="<?php echo $this->get_field_name('facebook'); ?>" id="<?php echo $this->get_field_id('facebook'); ?>" value="<?php if( !empty($instance['facebook']) ): echo $instance['facebook']; endif; ?>" class="widefat"/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="<?php echo $this->get_field_id('twt'); ?>"><?php _e('Twitter Link', 'newsair'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="<?php echo $this->get_field_name('twt'); ?>" id="<?php echo $this->get_field_id('twt'); ?>" value="<?php if( !empty($instance['twt']) ): echo $instance['twt']; endif; ?>" class="widefat"/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="<?php echo $this->get_field_id('insta'); ?>"><?php _e('Instagram Link', 'newsair'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="<?php echo $this->get_field_name('insta'); ?>" id="<?php echo $this->get_field_id('insta'); ?>" value="<?php if( !empty($instance['insta']) ): echo $instance['insta']; endif; ?>" class="widefat"/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube Link', 'newsair'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="<?php echo $this->get_field_name('youtube'); ?>" id="<?php echo $this->get_field_id('youtube'); ?>" value="<?php if( !empty($instance['youtube']) ): echo $instance['youtube']; endif; ?>" class="widefat"/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="<?php echo $this->get_field_id('lnk'); ?>"><?php _e('Linkedin Link', 'newsair'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="<?php echo $this->get_field_name('lnk'); ?>" id="<?php echo $this->get_field_id('lnk'); ?>" value="<?php if( !empty($instance['lnk']) ): echo $instance['lnk']; endif; ?>" class="widefat"/>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="<?php echo $this->get_field_id('pntr'); ?>"><?php _e('Pintrest Link', 'newsair'); ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="<?php echo $this->get_field_name('pntr'); ?>" id="<?php echo $this->get_field_id('pntr'); ?>" value="<?php if( !empty($instance['pntr']) ): echo $instance['pntr']; endif; ?>" class="widefat"/>
                </td>
            </tr>
        </table>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('open_btnone_new_window')); ?>">
                <input type="checkbox" 
                    id="<?php echo esc_attr($this->get_field_id('open_btnone_new_window')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('open_btnone_new_window')); ?>"
                    value="1" <?php checked( $instance['open_btnone_new_window'], 1 ); ?> />
                <?php esc_html_e( 'Open link in new tab','blogus' ); ?>
            </label>
        </p>
    <?php

    }
}