<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * Customize for Range, extend the WP customizer
 *
 * @since  1.2.0
 */

class DAHZ_RangeSlider_Control extends WP_Customize_Control {

	  public $type = 'slider';
	/**
    * Enqueue the styles and scripts
    */
    public function enqueue()
    {
        wp_enqueue_script( 'jquery-ui-slider' );
    }

      /**
       * Render the content on the theme customizer page
       */
      public function render_content()
       {
        $ids = $this->id;
  		?>

  		<label>
  			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?>
        <?php if ( ! empty( $this->description ) ) : ?>
          <span class="description customize-control-description"><?php echo $this->description; ?></span>
        <?php endif; ?>
        </span>
        <input id="<?php echo esc_attr($ids . 'input'); ?>" class="input_df_slider_text" type="text" <?php $this->input_attrs(); ?> value="<?php echo $this->value(); ?>" <?php $this->link(); ?>>
  			<div id="<?php echo esc_attr($ids . 'slider'); ?>" class="slider_df_slider_text"></div>
  		</label>

		<?php
		}
}
