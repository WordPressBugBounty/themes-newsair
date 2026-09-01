<?php
/**
 * Custom Customizer Controls.
 *
 * @package Newsair
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
    return;
}

class Newsair_Section_Title extends WP_Customize_Control {
    public $type = 'section-title';
    public $label = '';
    public $description = '';

    public function enqueue()
    {

        wp_enqueue_style('newsair-custom-controls-css', trailingslashit(get_template_directory_uri()) . 'inc/ansar/customize/css/customizer.css', array(), '1.0', 'all');
    }

    public function render_content() {
        ?>
        <h3><?php echo esc_html( $this->label ); ?></h3>
        <?php if (!empty($this->description)) { ?>
            <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
        <?php } ?>
        <?php
    }
}

/**
 * Customize Control for Taxonomy Select.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class Newsair_Dropdown_Taxonomies_Control extends WP_Customize_Control {

    /**
     * Control type.
     *
     * @access public
     * @var string
     */
    public $type = 'dropdown-taxonomies';

    /**
     * Taxonomy.
     *
     * @access public
     * @var string
     */
    public $taxonomy = '';

    /**
     * Constructor.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Manager $manager Customizer bootstrap instance.
     * @param string               $id      Control ID.
     * @param array                $args    Optional. Arguments to override class property defaults.
     */
    public function __construct( $manager, $id, $args = array() ) {

        $our_taxonomy = 'category';
        if ( isset( $args['taxonomy'] ) ) {
            $taxonomy_exist = taxonomy_exists( $args['taxonomy']  );
            if ( true === $taxonomy_exist ) {
                $our_taxonomy =  $args['taxonomy'];
            }
        }
        $args['taxonomy'] = $our_taxonomy;
        $this->taxonomy =  $our_taxonomy;

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render content.
     *
     * @since 1.0.0
     */
    public function render_content() {

        $tax_args = array(
            'hierarchical' => 0,
            'taxonomy'     => $this->taxonomy,
        );
        $all_taxonomies = get_categories( $tax_args );

        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
            <?php endif; ?>
            <select <?php $this->link(); ?>>
                <?php
                printf( '<option value="%s" %s>%s</option>', 0, selected( $this->value(), '', false ), __( 'All', 'newsair' )  );
                ?>
                <?php if ( ! empty( $all_taxonomies ) ) :  ?>
                    <?php foreach ( $all_taxonomies as $key => $tax ) :  ?>
                        <?php
                        printf( '<option value="%s" %s>%s</option>', esc_attr( $tax->term_id ), selected( $this->value(), $tax->term_id, false ), esc_html( $tax->name ) );
                        ?>
                    <?php endforeach ?>
                <?php endif ?>
            </select>
        </label>
        <?php
    }
}
class WP_line_break_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';

    function render_content() {
        echo '<hr></hr>';
    }
}

class Newsair_Custom_Radio_Default_Image_Control extends WP_Customize_Control {
        
    /**
     * Declare the control type.
     *
     * @access public
     * @var string
     */
    public $type = 'radio-image';
    
    public $is_text = false;
    /**
     * Enqueue scripts and styles for the custom control.
     * 
     * Scripts are hooked at {@see 'customize_controls_enqueue_scripts'}.
     * 
     * Note, you can also enqueue stylesheets here as well. Stylesheets are hooked
     * at 'customize_controls_print_styles'.
     *
     * @access public
     */

    public function enqueue() {
        wp_enqueue_script( 'jquery-ui-button' );
    }
    
    /**
     * Render the control to be displayed in the Customizer.
     */
    public function render_content() {
        if ( empty( $this->choices ) ) {
            return;
        }           
        // $is_text;
        $name = '_customize-radio-' . $this->id;
        ?>
        <span class="customize-control-title">
            <?php echo esc_attr( $this->label ); ?>
            <?php if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
            <?php endif; ?>
        </span>
        <div id="input_<?php echo $this->id; ?>" class="custom-radio-control text-center image">
            <?php if ($this->is_text == true ){ ?>
                <?php foreach ( $this->choices as $key => $value ) : ?>
                <label class="radio-button-label"  value="<?php echo esc_attr( $key ); ?>">
                    <input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
                    <span><?php echo esc_html( $value ); ?>
                        <span class="radio-tooltip normal">Unset</span>
                        <span class="radio-tooltip italic">Italic</span>
                        <span class="radio-tooltip none">None</span>
                        <span class="radio-tooltip capitalize">Capitalize</span>
                        <span class="radio-tooltip lowercase">Lowercase</span>
                        <span class="radio-tooltip Uppercase">Uppercase</span>
                    </span>
                </label>
                <?php endforeach; ?>
            <?php } else { ?>
                    <?php foreach ( $this->choices as $value => $label ) : ?>
                    <input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo $this->id . $value; ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                    <label for="<?php echo $this->id . $value; ?>">
                        <img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                    </label>
                    </input>
                    <?php endforeach; ?>
            <?php } ?> 
        </div>
        <script>jQuery(document).ready(function($) { $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset(); });</script>
        <?php
    }
}
//Pro Button
class newsair_social_section_upgrade extends WP_Customize_Control {
    public function render_content() { ?>
        <div class="upgrade-to-pro-box customizer_newsair_social_upgrade_to_pro" style="display: none;">
            <h3 class="upgrade-to-pro-title">
            <span class="title"><span class="dashicons dashicons-warning"></span><?php esc_html_e('To Add More','newsair'); ?></span><br>
                <a class="btn" href="<?php echo esc_url( 'https://themeansar.com/themes/newsair-pro/' ); ?>" target="_blank">
                    <?php esc_html_e('Upgrade to Pro','newsair'); ?> 
                </a>  
            </h3>
        </div>
    <?php
    }
}